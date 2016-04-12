<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->model('Posting_model');
    }

    public function index($offset = NULL)
    {
        $this->load->library('pagination');
        $this->load->helper('text');
        $data['title'] = 'Indeks Posting';
        $data['posting'] = $this->Posting_model->get(array( 'status' => 1, 'limit' => 10, 'offset' => $offset));
        $config['uri_segment']= 3;
        $config['per_page'] = 10;
        $config['base_url'] = site_url('posting/index');
        $config['total_rows'] = count($this->Posting_model->get(array( 'status' => 1)));
        $this->pagination->initialize($config);
        $data['main'] = 'posting_indeks';
        $this->load->view('layout', $data);
    }

    public function category($id = NULL, $offset = NULL)
    {
        $this->load->library('pagination');
        $data['posting'] = $this->Posting_model->get(array('category_id' => $id, 'status' => 1, 'limit' => 10, 'offset' => $offset));
        $data['title'] = 'Posting';
        $data['category_name'] = isset($data['posting'][0]) ? $data['posting'][0]['category_name'] : 'Not Found';
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $config['base_url'] = site_url('posting/category/'.$id);
        $config['total_rows'] = count($this->Posting_model->get(array('category_id' => $id, 'status' => 1)));
        $this->pagination->initialize($config);
        $data['main'] = 'posting_category';
        $this->load->view('layout', $data);
    }

    public function detail($id = NULL, $name = '', $offset=NULL)
    {
        $data['posting'] = $this->Posting_model->get(array('id' => $id));
        $data['posting_other'] = $this->Posting_model->get(array('limit' => 5));
        $data['main'] = 'posting_detail';
        $data['title'] = $data['posting']['posting_title'];
        $this->load->view('layout', $data);
    }

}

/* End of file posting.php */
/* Location: ./application/controllers/posting.php */
