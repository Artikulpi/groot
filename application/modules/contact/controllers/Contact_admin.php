<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL)
            redirect('gadmin/auth');
        $this->load->model('Contact_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('twitter', 'Twitter', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $param['name'] = $this->input->post('name');
            $param['phone'] = $this->input->post('phone');
            $param['email'] = $this->input->post('email');
            $param['address'] = $this->input->post('address');
            $param['facebook'] = $this->input->post('facebook');
            $param['twitter'] = $this->input->post('twitter');
            $this->Contact_model->save($param);
            $this->session->set_flashdata('success', 'Sunting contact berhasil');
            redirect('gadmin/contact');
        } else {
            $data['name'] = $this->Contact_model->get(array('name' => 'contact_name'));
            $data['email'] = $this->Contact_model->get(array('name' => 'email'));
            $data['phone'] = $this->Contact_model->get(array('name' => 'phone'));
            $data['address'] = $this->Contact_model->get(array('name' => 'address'));
            $data['facebook'] = $this->Contact_model->get(array('name' => 'facebook'));
            $data['twitter'] = $this->Contact_model->get(array('name' => 'twitter'));
            $data['contact'] = $this->Contact_model->get();
            $data['main'] = 'contact/contact_list';
            $this->load->view('admin/layout', $data);
        }
    }

}