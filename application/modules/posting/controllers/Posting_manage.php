<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_manage extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		$this->load->model('Posting_model');

        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
	}

	public function index()
	{
        $data['posting'] = $this->Posting_model->get();
        $data['title'] = 'Indeks Posting';
        $data['main'] = 'posting/posting_list';
        $this->load->view('manage/layout', $data);
	}

    public function view($id = NULL)
    {
        if ($this->Posting_model->get(array('id' => $id)) == NULL) {
            redirect('manage/posting','refresh');
        }
        $data['posting'] = $this->Posting_model->get(array('id' => $id));
        $data['title'] = 'Detail Posting';
        $data['main'] = 'posting/posting_view';
        $this->load->view('manage/layout', $data);
    }

    public function view_category($id = NULL)
    {
        if ($this->Posting_model->get_category(array('id' => $id)) == NULL) {
            redirect('manage/category','refresh');
        }
        $data['category'] = $this->Posting_model->get_category(array('id' => $id));
        $data['title'] = 'Detail Kategori';
        $data['main'] = 'posting/category_view';
        $this->load->view('manage/layout', $data);
    }

	// Add Posts and Update
    public function add($id = NULL)
    {
        $this->form_validation->set_rules('posting_title', 'Title', 'required');
        $this->form_validation->set_rules('posting_description', 'Description', 'required');
        $this->form_validation->set_rules('posting_content', 'Content', 'required');
        $this->form_validation->set_rules('category_id_new', 'Kategori', 'is_unique[posting_category.category_name]');
        $this->form_validation->set_rules('posting_is_published', 'Publish Status', 'required');

        $data['operation'] = isset($id) ? 'Edit' : 'Tambah';

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

            $params['posting_user_id'] = $this->session->userdata('user_id_admin');
            $params['posting_last_update'] = date('Y-m-d H:i:s');
            $params['posting_published_date'] = ($this->input->post('posting_published_date')) ? $this->input->post('posting_published_date') : date('Y-m-d H:i:s');
            $params['posting_title'] = $this->input->post('posting_title');
            $params['posting_description'] = stripslashes($this->input->post('posting_description'));
            $params['posting_content'] = stripslashes($this->input->post('posting_content'));
            $params['posting_category_id'] = $this->input->post('posting_category_id');
            $params['posting_is_published'] = $this->input->post('posting_is_published');
            $params['posting_is_commentable'] = $this->input->post('posting_is_commentable');
            $status = $this->Posting_model->add($params);

            $this->session->set_flashdata('message', $data['operation'] . ' posting berhasil');
            redirect('manage/posting');
        } else {
            if ($this->input->post('posting_id')) {
                redirect('manage/posting/edit/' . $this->input->post('posting_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['posting'] = $this->Posting_model->get(array('id' => $id));
            }
            $data['category'] = $this->Posting_model->get_category();
            $data['title'] = $data['operation'] . ' Posting';
            $data['main'] = 'posting/posting_add';
            $this->load->view('manage/layout', $data);
        }
    }

	public function category()
	{
		$data['category'] = $this->Posting_model->get_category();
		$data['title'] = 'Indeks Category';
		$data['main'] = 'posting/category_list';
		$this->load->view('manage/layout', $data);
	}

    protected function get_category() {
        $res = json_encode($this->Posts_model->get_category());
        return $res;
    }

	public function add_category($id = NULL)
	{
		$data['operation'] = isset($id) ? 'Edit' : 'Tambah';
		$this->form_validation->set_rules('category_name', 'Name', 'trim|required|is_unique[posting_category.category_name]');

		if ($_POST AND $this->form_validation->run() == TRUE) {
			if ($this->input->post('category_id')) {
				$params['category_id'] = $this->input->post('category_id');
				$params['category_input_date'] = $this->input->post('category_input_date');
			}
			else {
				$params['category_input_date'] = date('Y-m-d H:i:s');
			}
			$params['category_last_update'] = date('Y-m-d H:i:s');
			$params['category_name'] = $this->input->post('category_name');
			$res = $this->Posting_model->add_category($params);

			if ($this->input->is_ajax_request()) {
                echo $res;
            } else {
	            $this->session->set_flashdata('message', $data['operation'] . ' kategori berhasil');
	            redirect('manage/posting/category');
            }
		} else {
			if ($this->input->post('category_id')) {
                redirect('manage/category/edit/' . $this->input->post('category_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                if ($id == 1) {
                    redirect('manage/posting/category/');
                }
                $data['category'] = $this->Posting_model->get_category(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Kategori';
            $data['main'] = 'posting/category_add';
            $this->load->view('manage/layout', $data);
		}
	}

    // Delete Posts
    public function delete($id = NULL)
    {
        if ($_POST) {
            $this->Posting_model->delete($this->input->post('del_id'));
            $this->session->set_flashdata('message', 'Hapus posting berhasil');
            redirect('manage/posting');
        }
        elseif (!$_POST) {
            $this->session->set_flashdata('message', 'Delete');
            redirect('manage/posting/edit/' . $id);
        }
    }

    // Delete Category
    public function delete_category($id = NULL) {
        if ($_POST) {
            // $params['category_id'] = '1';
            // $this->Posting_model->set_default_category($id, $params);

            $this->Posting_model->delete_category($this->input->post('del_id'));
            $this->session->set_flashdata('message', 'Hapus kategori posting berhasil');
            redirect('manage/posting/category');
        } elseif (!$_POST) {
            $this->session->set_flashdata('message', 'Delete');
            redirect('manage/posting/category/edit/' . $id);
        }
    }

}

/* End of file Posting.php */
/* Location: ./application/modules/posting/controllers/Posting.php */