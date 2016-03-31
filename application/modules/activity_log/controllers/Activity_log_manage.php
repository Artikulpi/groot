<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Activity_log_model');

		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
	}
	public function index($offset = NULL)
	{
		$data['log'] = $this->Activity_log_model->get(array('limit' => 10, 'offset' => $offset));
        $data['title'] = 'Log Aktivitas';
        $data['main'] = 'activity_log/list';
        $config['per_page'] = 10;
        $config['base_url'] = site_url('manage/activity_log/index');
        $config['total_rows'] = $this->db->count_all('activity_log');
        $this->pagination->initialize($config);

        $this->load->view('manage/layout', $data);
	}

}

/* End of file Activity_log_manage.php */
/* Location: ./application/modules/activity_log/controllers/Activity_log_manage.php */