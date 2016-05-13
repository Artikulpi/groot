<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model {

	public function get($param = array())
	{
        if (isset($param['id'])) {
            $this->db->where('template_id', $param['id']);
        }
        
        if (isset($param['name'])) {
            $this->db->where('template_name', $param['name']);
        }

        if (isset($param['id']) OR isset($param['name'])) {
            return $this->db->get('template')->row_array();
        } else {
            return $this->db->get('template')->result_array();
        }
    }

    public function get_value($params = array())
    {
        $template = $this->get($params);

        if (!empty($template['template_value']))
            return $template['template_value'];
        else
            return '';
    }	

}

/* End of file Template_model.php */
/* Location: ./application/modules/template/models/Template_model.php */