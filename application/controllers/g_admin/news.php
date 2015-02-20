<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged_manage') == NULL) redirect('manage/auth');
        $this->load->model(array('News_model', 'Log_activity_model'));
        $this->load->library('upload');
    }

    // News view in list
    public function index($offset = NULL) {
        $this->load->model('News_model');
        $this->load->library('pagination');
        $data['news'] = $this->News_model->get(array('limit' => 10, 'offset' => $offset));
        $data['category'] = $this->News_model->get_category();
        $config['base_url'] = site_url('manage/news/index');
        $config['total_rows'] = $this->db->count_all('news');
        $this->pagination->initialize($config);

        $data['title'] = 'Berita';
        $data['main'] = 'manage/news/news_list';
        $this->load->view('manage/layout', $data);
    }

    // Category view in list
    public function category($offset = NULL) {
        $this->load->library('pagination');
        $data['categories'] = $this->News_model->get_category(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('manage/news/category');
        $config['total_rows'] = $this->db->count_all('news_category');
        $this->pagination->initialize($config);
        $data['title'] = 'Kategori Berita';
        $data['main'] = 'manage/news/category_list';
        $this->load->view('manage/layout', $data);
    }

    // Add News and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('news_title', 'Title', 'required');
        $this->form_validation->set_rules('news_short_desc', 'Description', 'required');
        $this->form_validation->set_rules('news_content', 'Content', 'required');
        $this->form_validation->set_rules('category_id_new', 'Kategori', 'is_unique[news_category.category_name]');
        $this->form_validation->set_rules('news_is_published', 'Publish Status', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('category_id_new')) {
                $params['category_input_date'] = date('Y-m-d H:i');
                $params['category_last_update'] = date('Y-m-d H:i');
                $params['category_name'] = $this->input->post('category_id_new');
                $this->News_model->add_category($params);
                $this->db->select('*');
                $this->db->from('news_category');
                $this->db->where('category_name', $this->input->post('category_id_new'));
                $query = $this->db->get();
            }
            if (!empty($_FILES['inputGambar']['name'])) {
                $params['news_image'] = $this->do_upload();
            } elseif ($this->input->post('inputGambarExisting')) {
                $params['news_image'] = $this->input->post('inputGambarExisting');
            } else {
                if ($this->input->post('news_id')) {
                    $params['news_image'] = $this->input->post('inputGambarCurrent');
                } else {
                    $params['news_image'] = '';
                }
            }

            if ($this->input->post('news_id')) {
                $params['news_id'] = $this->input->post('news_id');
                $params['news_post_date'] = $this->input->post('news_post_date');
            } else {
                $params['news_post_date'] = date('Y-m-d H:i');
            }

            $params['user_id'] = $this->session->userdata('user_id_manage');
            $params['news_last_update'] = date('Y-m-d H:i');
            $params['news_published_date'] = ($this->input->post('news_published_date')) ? $this->input->post('news_published_date') : date('Y-m-d H:i');
            $params['news_title'] = $this->input->post('news_title');
            $params['news_short_desc'] = stripslashes($this->input->post('news_short_desc'));
            $params['news_content'] = stripslashes($this->input->post('news_content'));
            if ($this->input->post('category_id_new')) {
                $params['category_id'] = $query->row('category_id');
            } else {
                $params['category_id'] = $this->input->post('category_id');
            }
            $params['news_is_published'] = $this->input->post('news_is_published');
            $params['news_is_commentable'] = $this->input->post('news_is_commentable');
            $status = $this->News_model->add($params);


            // activity log
            $this->Log_activity_model->add(
                    array(
                        'activity_date' => date('Y-m-d H:i'),
                        'user_id' => $this->session->userdata('user_id_manage'),
                        'activity_module' => 'News',
                        'activity_action' => $data['operation'],
                        'activity_info' => 'ID:null;Title:' . $params['news_title']
                    )
            );

            if ($this->input->post('action') == 'preview') {
                $news = $this->News_model->get(array('id' => $status));
                redirect(news_url($news));
            }

            $this->session->set_flashdata('success', $data['operation'] . ' berita berhasil');
            redirect('manage/news');
        } else {
            if ($this->input->post('news_id')) {
                redirect('manage/news/edit/' . $this->input->post('news_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['news'] = $this->News_model->get(array('id' => $id));
            }
            $data['category'] = $this->News_model->get_category();
            $data['title'] = $data['operation'] . ' Berita';
            $data['main'] = 'manage/news/news_add';
            $this->load->view('manage/layout', $data);
        }
    }

    // Add Category
    public function add_category($id = NULL) {
        $this->load->model('News_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Name', 'required|is_unique[news_category.category_name]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('category_id')) {
                $params['category_id'] = $this->input->post('category_id');
                $params['category_input_date'] = $this->input->post('category_input_date');
            } else {
                $params['category_input_date'] = date('Y-m-d H:i');
            }
            $params['category_last_update'] = date('Y-m-d H:i');
            $params['category_name'] = $this->input->post('category_name');
            $this->News_model->add_category($params);

            // activity log
            $this->Log_activity_model->add(
                    array(
                        'activity_date' => date('Y-m-d H:i'),
                        'user_id' => $this->session->userdata('user_id_manage'),
                        'activity_module' => 'News',
                        'activity_action' => $data['operation'],
                        'activity_info' => 'ID:null;Title:' . $params['category_name']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' kategori berhasil');
            redirect('manage/news/category');
        } else {
            if ($this->input->post('category_id')) {
                redirect('manage/category/edit/' . $this->input->post('category_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                if ($id == 1) {
                    redirect('manage/news/category/');
                }
                $data['category'] = $this->News_model->get_category(array('id' => $id));
            }
            $data['title'] = 'Tambah Kategori';
            $data['main'] = 'manage/news/category_add';
            $this->load->view('manage/layout', $data);
        }
    }

    // Delete News
    public function delete($id = NULL) {
        if ($_POST) {
            $this->News_model->delete($this->input->post('del_id'));
            // activity log
            $this->Log_activity_model->add(
                    array(
                        'activity_date' => date('Y-m-d H:i'),
                        'user_id' => $this->session->userdata('user_id_manage'),
                        'activity_module' => 'Berita',
                        'activity_action' => 'Hapus',
                        'activity_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus berita berhasil');
            redirect('manage/news');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('manage/news/edit/' . $id);
        }
    }

    // Delete Category
    public function delete_category($id = NULL) {
        if ($_POST) {
            $params['category_id'] = '1';
            $this->News_model->set_default_category($id, $params);

            $this->News_model->delete_category($this->input->post('del_id'));
            // activity log
            $this->Log_activity_model->add(
                    array(
                        'activity_date' => date('Y-m-d H:i'),
                        'user_id' => $this->session->userdata('user_id_manage'),
                        'activity_module' => 'Kategori Berita',
                        'activity_action' => 'Hapus',
                        'activity_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus kategori berita berhasil');
            redirect('manage/news/category');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('manage/news/category/edit/' . $id);
        }
    }

}

/* End of file news.php */
/* Location: ./application/controllers/manage/news.php */
