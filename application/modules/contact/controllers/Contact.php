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
        $this->load->library('email');
        $this->load->config('email');

        $this->form_validation->set_rules('contact_name', 'Name', 'required');
        $this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact_message', 'Message', 'required');

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('contact_id')) {
                $params['contact_id'] = $this->input->post('contact_id');
            } else {
                $params['contact_input_date'] = date('Y-m-d H:i:s');
            }
            $params['contact_name'] = $this->input->post('contact_name');
            $params['contact_email'] = $this->input->post('contact_email');
            $params['contact_message'] = $this->input->post('contact_message');

            $status = $this->Contact_model->save($params);

            // configurasi kirim email
            $to = $this->config->item('from');
            $subject = 'Notifikasi';
            $message = nl2br("Nama Pengirim: " . $this->input->post('contact_name') . "\nEmail Pengirim: " . $this->input->post('contact_email') . "\nPesan: " . $this->input->post('contact_message'));
            
            $this->email->from($this->config->item('smpt_user'), $this->config->item('from_name'));
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
                
            if($this->email->send()) {
                $this->session->set_flashdata('complete', 'Pesan berhasil terkirim!');
                redirect('contact');
            } else {
                echo $this->email->print_debugger();
                redirect('contact');
            }
        } elseif ($_POST AND $this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('incomplete', 'Form harus diisi secara lengkap!');
            redirect('contact');
        } else {
            $data['contact'] = $this->Setting_model->get(array('name' => 'text_contact'));
            $data['title'] = 'Hubungi Kami';
            $data['main'] = 'contact_detail';
            $this->load->view('layout', $data);
        }
    }
    
}

/* End of file Contact.php */
/* Location: ./application/modules/contact/controllers/Contact.php */