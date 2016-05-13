<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_manage extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    public function index()
    {
        if ($_POST) {
            if ($this->input->post('upload')) {
                if (!empty($_FILES['inputGambar']['name'])) {
                    $param['favicon'] = $this->input->post('inputGambarCurrent');
                } elseif ($this->input->post('inputGambarCurrent')) {
                    $param['favicon'] = $this->input->post('inputGambarCurrent');
                } else {
                    $param['favicon'] = $this->input->post('inputGambarCurrent');
                }
            } else {
                $param['favicon'] = '-';
            }
            $param['contact'] = $this->input->post('contact');
            $this->Setting_model->save($param);
            $this->session->set_flashdata('success', 'Sunting pengaturan berhasil');
            redirect('manage/setting');
        } else {
            $data['title'] = 'Pengaturan';
            $data['favicon'] = $this->Setting_model->get(array('id' => 1));
            $data['contact'] = $this->Setting_model->get(array('name' => 'text_contact'));
            $data['setting'] = $this->Setting_model->get();
            $data['main'] = 'setting/setting_list';
            $this->load->view('manage/layout', $data);
        }
    }
    
    public function email()
    {
        $this->form_validation->set_rules('from', 'Pengirim', 'required');
        $this->form_validation->set_rules('from_name', 'Nama', 'required');
        $this->form_validation->set_rules('protocol', 'Protocol', 'required');
        $this->form_validation->set_rules('smtp_host', 'smtp host', 'required');
        $this->form_validation->set_rules('smtp_port', 'smtp port', 'required');
        $this->form_validation->set_rules('smtp_user', 'smtp user', 'required');
        $this->form_validation->set_rules('smtp_pass', 'smtp pass', 'required');
        $this->form_validation->set_rules('smtp_timeout', 'smtp timeout', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $param['from'] = $this->input->post('from');
            $param['from_name'] = $this->input->post('from_name');          
            $param['protocol'] = $this->input->post('protocol');
            $param['smtp_host'] = $this->input->post('smtp_host');
            $param['smtp_port'] = $this->input->post('smtp_port');
            $param['smtp_user'] = $this->input->post('smtp_user');
            $param['smtp_pass'] = $this->input->post('smtp_pass');
            $param['smtp_timeout'] = $this->input->post('smtp_timeout');
            $this->Setting_model->save($param);
            $this->session->set_flashdata('success', 'Sunting email berhasil');
            redirect('manage/setting/email');
        } else {
            $data['from'] = $this->Setting_model->get(array('name' => 'from'));
            $data['from_name'] = $this->Setting_model->get(array('name' => 'from_name'));
            $data['protocol'] = $this->Setting_model->get(array('name' => 'protocol'));
            $data['smtp_host'] = $this->Setting_model->get(array('name' => 'smtp_host'));
            $data['smtp_port'] = $this->Setting_model->get(array('name' => 'smtp_port'));
            $data['smtp_user'] = $this->Setting_model->get(array('name' => 'smtp_user'));
            $data['smtp_pass'] = $this->Setting_model->get(array('name' => 'smtp_pass'));
            $data['smtp_timeout'] = $this->Setting_model->get(array('name' => 'smtp_timeout'));
            $data['title'] = 'Pengaturan Email';
            $data['main'] = 'setting/setting_list_email';
            $this->load->view('manage/layout', $data);
        }
    }

}

/* End of file Setting_manage.php */
/* Location: ./application/modules/setting/controllers/Setting_manage.php */