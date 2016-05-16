<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_manage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header('Location:' . site_url('user/auth/login') . '?location=' . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model('Contact_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index($offset = NULL)
    {
        $data['contact'] = $this->Contact_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('manage/contact/index');
        $config['total_rows'] = count($this->Contact_model->get());
        $this->pagination->initialize($config);

        $data['title'] = 'Contact';
        $data['main'] = 'contact/contact_list';
        $this->load->view('manage/layout', $data);
    }

    function view($id = NULL) {
        if ($this->Contact_model->get(array('id' => $id)) == NULL) {
            redirect('manage/contact');
        }
        $data['contact'] = $this->Contact_model->get(array('id' => $id));
        $data['title'] = 'Detail Kontak';
        $data['main'] = 'contact/contact_view';
        $this->load->view('manage/layout', $data);
    }

    public function delete($id = NULL)
    {
        if ($this->Contact_model->get(array('id' => $id)) == NULL) {
            redirect('manage/contact');
        }
        $id = $this->input->post('kode');
        $this->Contact_model->delete($id);
        $this->session->set_flashdata('success', 'Hapus Contact berhasil');
    }

}

/* End of file Contact_manage.php */
/* Location: ./application/modules/contact/controllers/Contact_manage.php */