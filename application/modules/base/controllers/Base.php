<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct() {
        parent::__construct();
    $this->load->model('Posts_model');
    //$this->load->model('Product_model');
    //$this->load->model('Client_model');
    }
    
    public function index() {
        $data['title'] = 'Home';
        $data['posts'] = $this->Posts_model->get(array('limit' => 5, 'status' => 1));
        $data['main'] = 'main';
        $this->load->view('layout', $data);
    }
    
    public function search($query='', $offset=NULL){
        
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
        if($this->Posts_model->get(array('status' => 1, 'posts_title' => $query)) == !NULL){ 
        $data['posts'] = $this->Posts_model->get(array('status' => 1, 'posts_title' => $query, 'limit' => 5, 'offset' => $offset));
        }
        $config['base_url'] = site_url('search/'.$query);
        $config['total_rows'] = count($this->Posts_model->get(array('status' => 1, 'posts_title' => $query)));
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['query'] = $query;
        $data['title'] = 'Pencarian kata '.$query;
        $data['posts_other'] = $this->Posts_model->get(array('status' => 1, 'limit' => 2));
        $data['main'] = 'search';
        $this->load->view('layout', $data);
        
    }

}

/* End of file base.php */
/* Location: ./application/controllers/base.php */