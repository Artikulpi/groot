<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_manage extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Posting_model', 'activity_log/Activity_log_model'));
        $this->load->library('upload');
    }

    // Posting view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['posting'] = $this->Posting_model->get(array('limit' => 10, 'offset' => $offset));
        $data['category'] = $this->Posting_model->get_category();
        $config['base_url'] = site_url('manage/posting/index');
        $config['total_rows'] = $this->db->count_all('posting');
        $this->pagination->initialize($config);

        $data['title'] = 'Posting';
        $data['main'] = 'posting/posting_list';
        $this->load->view('manage/layout', $data);
    }

    function view($id = NULL) {
        if ($this->Posting_model->get(array('id' => $id)) == NULL) {
            redirect('manage/posting');
        }
        $data['posting'] = $this->Posting_model->get(array('id' => $id));
        $data['title'] = 'Detail posting';
        $data['main'] = 'posting/posting_view';
        $this->load->view('manage/layout', $data);
    }

    // Category view in list
    public function category($offset = NULL) {
        $this->load->library('pagination');
        $data['categories'] = $this->Posting_model->get_category(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('manage/posting/category');
        $config['total_rows'] = $this->db->count_all('posting_category');
        $this->pagination->initialize($config);
        $data['title'] = 'Kategori Posting';
        $data['main'] = 'posting/category_list';
        $this->load->view('manage/layout', $data);
    }

    // Add Posting and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('posting_title', 'Title', 'required');
        $this->form_validation->set_rules('posting_content', 'Content', 'required');
        $this->form_validation->set_rules('posting_description', 'Description', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if (!empty($_FILES['inputGambar']['name'])) {
                $params['posting_image'] = $this->do_upload();
            } elseif ($this->input->post('inputGambarExisting')) {
                $params['posting_image'] = $this->input->post('inputGambarExisting');
            } else {
                if ($this->input->post('posting_id')) {
                    $params['posting_image'] = $this->input->post('inputGambarCurrent');
                } else {
                    $params['posting_image'] = '';
                }
            }

            if ($this->input->post('posting_id')) {
                $params['posting_id'] = $this->input->post('posting_id');
            } else {
                $params['posting_input_date'] = date('Y-m-d H:i:s');
            }

            $params['posting_is_published'] = ($this->input->post('posting_is_published', TRUE) == 1);
            $params['posting_user_id'] = $this->session->userdata('uid');
            $params['posting_last_update'] = date('Y-m-d H:i:s');
            $params['posting_published_date'] = ($this->input->post('posting_published_date')) ? $this->input->post('posting_published_date') : date('Y-m-d H:i:s');
            $params['posting_title'] = $this->input->post('posting_title');
            $params['posting_content'] = stripslashes($this->input->post('posting_content'));
            $params['posting_description'] = stripslashes($this->input->post('posting_description'));
            $params['posting_category_id'] = $this->input->post('posting_category_id');
            $params['posting_is_published'] = $this->input->post('posting_is_published');
            $params['posting_is_commentable'] = $this->input->post('posting_is_commentable');
            
            // echo "<pre>";
            // print_r ($params);
            // echo "</pre>";

            // echo "<pre>";
            // print_r ($this->input->post());
            // echo "</pre>";
            // die();

            $status = $this->Posting_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'log_user_id' => $this->session->userdata('uid'),
                    'log_module' => 'Posting',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:null;Title:' . $params['posting_title']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' posting berhasil');
            redirect('manage/posting');
        } else {
            if ($this->input->post('posting_id')) {
                redirect('manage/posting/edit/' . $this->input->post('posting_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['posting'] = $this->Posting_model->get(array('id' => $id));
            }
            $data['ngApp'] = 'ng-app';
            $data['category'] = $this->get_category();
            $data['title'] = $data['operation'] . ' Posting';
            $data['main'] = 'posting/posting_add';
            $this->load->view('manage/layout', $data);
        }
    }

    // Add Category
    public function add_category($id = NULL) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Name', 'required|is_unique[posting_category.category_name]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('category_id')) {
                $params['category_id'] = $this->input->post('category_id');
            } else {
                $params['category_input_date'] = date('Y-m-d H:i:s');
            }
            $params['category_last_update'] = date('Y-m-d H:i:s');
            $params['category_name'] = $this->input->post('category_name');
            $res = $this->Posting_model->add_category($params);

            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'log_user_id' => $this->session->userdata('uid'),
                    'log_module' => 'Posting',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$res.';Title:' . $params['category_name']
                    )
                );

            if ($this->input->is_ajax_request()) {
                // echo $res;
            } else {
                $this->session->set_flashdata('success', $data['operation'] . ' kategori berhasil');
                redirect('manage/posting/category');
            }
        } else {
            if ($this->input->post('category_id')) {
                redirect('manage/posting/category');
            }

            // Edit mode
            if (!is_null($id)) {
                if ($id == 1) {
                    redirect('manage/posting/category/');
                }
                $data['category'] = $this->Posting_model->get_category(array('id' => $id));
            }

            $data['title'] = 'Tambah Kategori';
            $data['main'] = 'posting/category_add';
            $this->load->view('manage/layout', $data);
        }
    }

    public function add_category_ajax($id = NULL) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Name', 'required|is_unique[posting_category.category_name]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            $params['category_input_date'] = date('Y-m-d H:i:s');
            $params['category_last_update'] = date('Y-m-d H:i:s');
            $params['category_name'] = $this->input->post('category_name');
            $res = $this->Posting_model->add_category($params);

            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'log_user_id' => $this->session->userdata('uid'),
                    'log_module' => 'Posting',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$res.';Title:' . $params['category_name']
                    )
                );

            echo $res;
        } 
    }

    protected function get_category() {
        $res = json_encode($this->Posting_model->get_category());
        return $res;
    }

    // Delete Posting
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Posting_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'log_user_id' => $this->session->userdata('uid'),
                    'log_module' => 'Posting',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus posting berhasil');
            redirect('manage/posting');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('manage/posting/edit/' . $id);
        }
    }

    // Delete Category
    public function delete_category($id = NULL) {
        if ($_POST) {
            $params['posting_category_id'] = '1';
            $this->Posting_model->set_default_category($id, $params);

            $this->Posting_model->delete_category($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'log_user_id' => $this->session->userdata('uid'),
                    'log_module' => 'Kategori Posting',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus kategori posting berhasil');
            redirect('manage/posting/category');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('manage/posting/category/edit/' . $id);
        }
    }

}

/* End of file Posting.php */
/* Location: ./application/modules/posting/controllers/Posting.php */