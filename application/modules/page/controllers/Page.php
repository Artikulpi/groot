<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Page_model');
        $this->load->model('Setting_model');
        $this->load->helper('text');
    }

    public function index()
    {
        
    }

    public function detail($id = NULL, $name = '')
    {
        $data['name'] = str_replace('.html', '', $name);
        $data['page'] = $this->Page_model->get(array('id' => $id));
        $data['main'] = 'page_detail';
        $data['title'] = $data['page']['page_name'];
        $this->load->view('layout', $data);
    }
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
