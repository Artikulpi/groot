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

    public function save($id = NULL)
    {
        $this->form_validation->set_rules('contact_name', 'Name', 'required');
        $this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact_message', 'Pesan', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('contact_id')) {
                $params['contact_id'] = $this->input->post('contact_id');
            } else {
                $params['contact_input_date'] = date('Y-m-d H:i:s');
            }
            $params['contact_name'] = $this->input->post('contact_name');
            $params['contact_email'] = $this->input->post('contact_email');
            $params['contact_message'] = $this->input->post('contact_message');

            $status = $this->Contact_model->save($params);
            $this->session->set_flashdata('success', 'Pesan anda telah terkirim !');
            redirect('contact');
        } else {
            $data['main'] = 'contact_detail';
            $this->load->view('layout', $data);
        }
    }

}

/* End of file Contact_manage.php */
/* Location: ./application/modules/contact/controllers/Contact_manage.php */