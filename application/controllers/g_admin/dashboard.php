<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('g_admin/auth/login');
    }

    // Dashboard View
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['main'] = 'g_admin/dashboard';
        $this->load->view('g_admin/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/g_admin/dashboard.php */
