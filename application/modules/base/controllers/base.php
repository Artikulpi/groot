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
        //$data['client'] = $this->Client_model->get(array('limit' => 5, 'status' => 1));
        //$data['product'] = $this->Product_model->get(array('limit' => 12, 'status' => 1));
        $data['main'] = 'main';
        $this->load->view('layout', $data);
    }

}

/* End of file base.php */
/* Location: ./application/controllers/base.php */