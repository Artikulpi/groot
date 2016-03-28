<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_manage extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
        	header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    // Dashboard View
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard';
        $this->load->view('manage/layout', $data);
    }

}

/* End of file Dashboard_manage.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard_manage.php */