<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('gadmin/auth');
        $this->load->model('Setting_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        if ($_POST) {
            if (!empty($_FILES['inputGambar']['name'])) {
                $param['favicon'] = $this->input->post('inputGambarCurrent');
            } elseif ($this->input->post('inputGambarCurrent')) {
                $param['favicon'] = $this->input->post('inputGambarCurrent');
            } else {
                $params['favicon'] = $this->input->post('inputGambarCurrent');
            }
            $this->Setting_model->save($param);
            $this->session->set_flashdata('success', 'Sunting pengaturan berhasil');
            redirect('gadmin/setting');
        } else {
            $data['favicon'] = $this->Setting_model->get(array('id' => 1));
            $data['setting'] = $this->Setting_model->get();
            $data['main'] = 'setting/setting_list';
            $this->load->view('admin/layout', $data);
        }
    }

}