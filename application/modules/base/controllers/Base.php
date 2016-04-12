<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('posting/Posting_model');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['posting'] = $this->Posting_model->get(array('limit' => 5, 'status' => 1));
		$data['main'] = 'main';
		$this->load->view('layout', $data);
	}

}

/* End of file Base.php */
/* Location: ./application/modules/base/controllers/Base.php */