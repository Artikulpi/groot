<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->model('setting/Setting_model');
    }

    public function index()
    {
        $data['contact'] = $this->Setting_model->get(array('name' => 'text_contact'));
        $data['title'] = 'Hubungi Kami';
        $data['main'] = 'contact_detail';
        $this->load->view('layout', $data);
    }

    public function email()
    {
        $this->load->library('email');
        $this->load->config('email');

        $name = $this->input->post('contact_name');
        $to = $this->input->post('contact_email');
        $subject = 'Notifikasi';
        
        $this->email->from($this->config->item('from'), $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($this->input->post('contact_message'));
            
        if($this->email->send()) {
            $this->session->set_flashdata('success', 'Pesan berhasil terkirim!');
            redirect('contact');
        } else {
            echo $this->email->print_debugger();
            redirect('contact');
        }
    }
    
}

/* End of file Contact.php */
/* Location: ./application/modules/contact/controllers/Contact.php */