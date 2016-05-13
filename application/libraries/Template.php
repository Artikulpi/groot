<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template 
{
    var $ci;
    var $basepath;
    var $templates;
    var $current_template;
    var $current_layout;

    function __construct() 
    {
        $this->ci =& get_instance();
        $this->ci->load->model('setting/Setting_model');
        $this->templates = $this->ci->Setting_model->get(array('name' => 'template'));
        $this->basepath = 'templates/'.$this->templates['setting_value'].'/';
        $this->current_template = $this->templates['setting_value'];
        $this->current_layout = 'templates/'.$this->current_template.'/layout';
    }

    function load($tpl_view, $data = null, $return = false) 
    {
        return $this->ci->load->view($this->basepath.$tpl_view, $data, $return);
    }

    function load_landing($data = null)
    {
        return $this->ci->load->view($this->current_layout, $data);
    }

    function load_default($data = null)
    {
      return $this->ci->load->view($this->current_layout, $data);  
  }
}
