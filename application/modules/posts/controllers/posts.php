<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->model('Posts_model');
    }

    public function index($offset = NULL)
    {
        $this->load->library('pagination');
        $this->load->helper('text');
        $data['title'] = 'Indeks Posting';
        $data['posts'] = $this->Posts_model->get(array( 'status' => 1, 'limit' => 10, 'offset' => $offset));
        $config['uri_segment']= 3;
        $config['per_page'] = 10;
        $config['base_url'] = site_url('posts/index');
        $config['total_rows'] = count($this->Posts_model->get(array( 'status' => 1)));
        $this->pagination->initialize($config);
        $data['main'] = 'posts_indeks';
        $this->load->view('layout', $data);
    }

    public function category($id = NULL, $offset = NULL)
    {
        $this->load->library('pagination');
        $data['posts'] = $this->Posts_model->get(array('category_id' => $id, 'status' => 1, 'limit' => 10, 'offset' => $offset));
        $data['title'] = 'Posting';
        $data['category_name'] = isset($data['posts'][0]) ? $data['posts'][0]['category_name'] : 'Not Found';
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $config['base_url'] = site_url('posts/category/'.$id);
        $config['total_rows'] = count($this->Posts_model->get(array('category_id' => $id, 'status' => 1)));
        $this->pagination->initialize($config);
        $data['main'] = 'posts_category';
        $this->load->view('layout', $data);
    }

    public function detail($id = NULL, $name = '', $offset=NULL)
    {
        $data['posts'] = $this->Posts_model->get(array('id' => $id));
        $data['posts_other'] = $this->Posts_model->get(array('limit' => 5));
        $data['main'] = 'posts_detail';
        $data['title'] = $data['posts']['posts_title'];
        $this->load->view('layout', $data);
    }

}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */
