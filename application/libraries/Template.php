<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template 
{
    var $ci;
    var $basepath;

    function __construct() 
    {
        $this->ci =& get_instance();
        $this->basepath = 'templates/'.$this->ci->config->item('template').'/';
    }

    function load($tpl_view, $data = null, $return = false) 
    {
        return $this->ci->load->view($this->basepath.$tpl_view, $data, $return);
    }
}
