<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_manage extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Template_model');
        $this->load->model('Setting_model');
        
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
    }
    
    public function index()
    {
        $this->form_validation->set_rules('template', 'Template Default', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $param['template'] = $this->input->post('template');
            $this->Setting_model->save($param);
            $this->session->set_flashdata('success', 'Sunting template berhasil');
            redirect('manage/template');
        } else {
            $data['template'] = $this->Template_model->get(array('name' => 'template'));
            $data['templates'] = $this->Template_model->get();
            $data['setting'] = $this->Setting_model->get(array('name' => 'template'));
            $data['title'] = 'Pengaturan Template';
            $data['main'] = 'template/template_list';
            $this->load->view('manage/layout', $data);
        }
    }

}

/* End of file Template_manage.php */
/* Location: ./application/modules/template/controllers/Template_manage.php */