<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('gadmin/auth/login');
    }

    // Dashboard View
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard';
        $this->load->view('template/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
