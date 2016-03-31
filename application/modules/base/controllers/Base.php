<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('manage');		
	}

}

/* End of file Base.php */
/* Location: ./application/modules/base/controllers/Base.php */