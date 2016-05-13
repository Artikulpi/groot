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
        $this->template->load_landing($data);
    }

    public function search($query='', $offset=NULL)
    {

        if($_POST AND $this->input->post('search', TRUE))
        {
            redirect('search/'.urlencode($this->input->post('search', TRUE)));
        }
        
        if(empty($query))
        {
            redirect('base');
        }

        $this->load->library('pagination');
        $query = urldecode($query);
        $this->load->helper('text');
        if($this->Posting_model->get(array('status' => 1, 'posting_title' => $query)) == !NULL){ 
            $data['posting'] = $this->Posting_model->get(array('status' => 1, 'posting_title' => $query, 'limit' => 5, 'offset' => $offset));
        }
        $config['base_url'] = site_url('search/'.$query);
        $config['total_rows'] = count($this->Posting_model->get(array('status' => 1, 'posting_title' => $query)));
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['query'] = $query;
        $data['title'] = 'Pencarian kata '.$query;
        $data['posting_other'] = $this->Posting_model->get(array('status' => 1, 'limit' => 2));
        $data['main'] = 'search';
        $this->template->load_default($data);
    }

}

/* End of file Base.php */
/* Location: ./application/modules/base/controllers/Base.php */