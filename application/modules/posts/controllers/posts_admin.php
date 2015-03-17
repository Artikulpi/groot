<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Posts controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Posts_admin extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged_admin') == NULL)
            redirect('gadmin/auth');
        $this->load->model(array('Posts_model', 'Activity_log_model'));
        $this->load->library('upload');
    }

    // Posts view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['posts'] = $this->Posts_model->get(array('limit' => 10, 'offset' => $offset));
        $data['category'] = $this->Posts_model->get_category();
        $config['base_url'] = site_url('gadmin/posts/index');
        $config['total_rows'] = $this->db->count_all('g_posts');
        $this->pagination->initialize($config);

        $data['title'] = 'Posting';
        $data['main'] = 'posts/posts_list';
        $this->load->view('admin/layout', $data);
    }

    function view($id = NULL) {
        if ($this->Posts_model->get(array('id' => $id)) == NULL) {
            redirect('gadmin/posts');
        }
        $data['posts'] = $this->Posts_model->get(array('id' => $id));
        $data['title'] = 'Detail posting';
        $data['main'] = 'posts/posts_view';
        $this->load->view('admin/layout', $data);
    }

    // Category view in list
    public function category($offset = NULL) {
        $this->load->library('pagination');
        $data['categories'] = $this->Posts_model->get_category(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('gadmin/posts/category');
        $config['total_rows'] = $this->db->count_all('g_posts_category');
        $this->pagination->initialize($config);
        $data['title'] = 'Kategori Posting';
        $data['main'] = 'posts/category_list';
        $this->load->view('admin/layout', $data);
    }

    // Add Posts and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('posts_title', 'Title', 'required');
        $this->form_validation->set_rules('posts_description', 'Description', 'required');
        $this->form_validation->set_rules('posts_content', 'Content', 'required');
        $this->form_validation->set_rules('category_id_new', 'Kategori', 'is_unique[g_posts_category.category_name]');
        $this->form_validation->set_rules('posts_is_published', 'Publish Status', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if (!empty($_FILES['inputGambar']['name'])) {
                $params['posts_image'] = $this->do_upload();
            } elseif ($this->input->post('inputGambarExisting')) {
                $params['posts_image'] = $this->input->post('inputGambarExisting');
            } else {
                if ($this->input->post('posts_id')) {
                    $params['posts_image'] = $this->input->post('inputGambarCurrent');
                } else {
                    $params['posts_image'] = '';
                }
            }

            if ($this->input->post('posts_id')) {
                $params['posts_id'] = $this->input->post('posts_id');
            } else {
                $params['posts_input_date'] = date('Y-m-d H:i:s');
            }

            $params['user_id'] = $this->session->userdata('user_id_admin');
            $params['posts_last_update'] = date('Y-m-d H:i:s');
            $params['posts_published_date'] = ($this->input->post('posts_published_date')) ? $this->input->post('posts_published_date') : date('Y-m-d H:i:s');
            $params['posts_title'] = $this->input->post('posts_title');
            $params['posts_description'] = stripslashes($this->input->post('posts_description'));
            $params['posts_content'] = stripslashes($this->input->post('posts_content'));
            $params['category_id'] = $this->input->post('category_id');
            $params['posts_is_published'] = $this->input->post('posts_is_published');
            $params['posts_is_commentable'] = $this->input->post('posts_is_commentable');
            $status = $this->Posts_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Posting',
                        'activity_log_action' => $data['operation'],
                        'activity_log_info' => 'ID:null;Title:' . $params['posts_title']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' posting berhasil');
            redirect('gadmin/posts');
        } else {
            if ($this->input->post('posts_id')) {
                redirect('gadmin/posts/edit/' . $this->input->post('posts_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['posts'] = $this->Posts_model->get(array('id' => $id));
            }
            $data['category'] = $this->get_category();
            $data['title'] = $data['operation'] . ' Posting';
            $data['main'] = 'posts/posts_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Add Category
    public function add_category($id = NULL) {
        $this->load->model('Posts_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Name', 'required|is_unique[g_posts_category.category_name]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('category_id')) {
                $params['category_id'] = $this->input->post('category_id');
                $params['category_input_date'] = $this->input->post('category_input_date');
            } else {
                $params['category_input_date'] = date('Y-m-d H:i:s');
            }
            $params['category_last_update'] = date('Y-m-d H:i:s');
            $params['category_name'] = $this->input->post('category_name');
            $res = $this->Posts_model->add_category($params);

            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Posting',
                        'activity_log_action' => $data['operation'],
                        'activity_log_info' => 'ID:null;Title:' . $params['category_name']
                    )
            );

            if ($this->input->is_ajax_request()) {
                echo $res;
            } else {
            $this->session->set_flashdata('success', $data['operation'] . ' kategori berhasil');
            redirect('gadmin/posts/category');
            }
        } else {
            if ($this->input->post('category_id')) {
                redirect('gadmin/category/edit/' . $this->input->post('category_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                if ($id == 1) {
                    redirect('gadmin/posts/category/');
                }
                $data['category'] = $this->Posts_model->get_category(array('id' => $id));
            }
            $data['title'] = 'Tambah Kategori';
            $data['main'] = 'posts/category_add';
            $this->load->view('admin/layout', $data);
        }
    }

    protected function get_category() {
        $res = json_encode($this->Posts_model->get_category());
        return $res;
    }

    // Delete Posts
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Posts_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Posting',
                        'activity_log_action' => 'Hapus',
                        'activity_log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus posting berhasil');
            redirect('gadmin/posts');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('gadmin/posts/edit/' . $id);
        }
    }

    // Delete Category
    public function delete_category($id = NULL) {
        if ($_POST) {
            $params['category_id'] = '1';
            $this->Posts_model->set_default_category($id, $params);

            $this->Posts_model->delete_category($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Kategori Posting',
                        'activity_log_action' => 'Hapus',
                        'activity_log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus kategori posting berhasil');
            redirect('gadmin/posts/category');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('gadmin/posts/category/edit/' . $id);
        }
    }

}

/* End of file posts.php */
/* Location: ./application/controllers/gadmin/posts.php */
