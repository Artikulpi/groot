<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->model('Contact_model');
    }

    public function index() {
        $this->load->helper('email');
        $this->load->config('email');
        $this->load->library('email');

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Pesan', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {


            if ($this->config->item('email')) {
                $message = $this->input->post(nl2br("Nama Pengirim: " . $this->input->post('name') . "\nEmail Pengirim: " . $this->input->post('email') . "\nPesan: " . $this->input->post('message')));
                $to = $this->Contact_model->get(array('name' => 'email'))['contact_value'];

                $this->email->from($this->config->item('from'), $this->config->item('from_name'));
                $this->email->to($to);
                $this->email->subject('Notifikasi');
                $this->email->message($message);
                if (!$this->email->send()) {
                    $this->session->set_flashdata('incomplete', 'Contact error, silahkan cek setting');
                }
                $this->email->send();
                echo $this->email->print_debugger();
            }
            $this->session->set_flashdata('complete', 'oke');
            redirect('contact');
        } elseif ($_POST AND $this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('incomplete', 'Form harus diisi secara lengkap.');
            redirect('contact');
        } else {

            $data['title'] = 'Contact';
            $data['name'] = $this->Contact_model->get(array('name' => 'contact_name'));
            $data['phone'] = $this->Contact_model->get(array('name' => 'phone'));
            $data['address'] = $this->Contact_model->get(array('name' => 'address'));
            $data['email'] = $this->Contact_model->get(array('name' => 'email'));
            // if ($this->Contact_model->get(array('name' => 'email'))['contact_value'] != '-') {
            //     $data['email'] = $this->Contact_model->get(array('name' => 'email'));
            // }
            $data['main'] = 'contact_detail';
            $this->load->view('layout', $data);
        }
    }

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */