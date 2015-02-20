<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_log extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('g_admin/auth/login');
        $this->load->model('Activity_log_model');
        $this->load->helper(array('form', 'url'));
    }

    // View log_activity in list
    public function index($offset = NULL) {
            $this->load->library('pagination');

            $this->load->model('User_model');
            $data['data'] = $this->Activity_log_model->get(array('limit' => 10, 'offset' => $offset));
            $data['title'] = 'Log Aktivitas';
            $data['main'] = 'g_admin/activity_log/list';
            $config['base_url'] = site_url('g_admin/activity_log/index');
            $config['total_rows'] = $this->db->count_all('g_activity_log');
            $this->pagination->initialize($config);

            $this->load->view('g_admin/layout', $data);
    }

}

/* End of file log_activity.php */
/* Location: ./application/controllers/log_activity.php */