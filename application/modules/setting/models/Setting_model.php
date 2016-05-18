<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function get($param = array()) {

        if (isset($param['id'])) {
            $this->db->where('setting_id', $param['id']);
        }
        
        if (isset($param['name'])) {
            $this->db->where('setting_name', $param['name']);
        }

        if (isset($param['id']) OR isset($param['name'])) {
            return $this->db->get('setting')->row_array();
        } else {
            return $this->db->get('setting')->result_array();
        }
    }

    public function get_value($params = array()) {
        $setting = $this->get($params);

        if (!empty($setting['setting_value']))
            return $setting['setting_value'];
        else
            return '';
    }

    public function save($param = array()) {
        if (isset($param['favicon'])) {
            $this->db->set('setting_value', $param['favicon']);
            $this->db->where('setting_id', 1);
            $this->db->update('setting');
        }
        
        if (isset($param['google'])) {
            $this->db->set('setting_value', $param['google']);
            $this->db->where('setting_id', 2);
            $this->db->update('setting');
        }

        if (isset($param['name_contact'])) {
            $this->db->set('setting_value', $param['name_contact']);
            $this->db->where('setting_id', 3);
            $this->db->update('setting');
        }

        if (isset($param['email_contact'])) {
            $this->db->set('setting_value', $param['email_contact']);
            $this->db->where('setting_id', 4);
            $this->db->update('setting');
        }

        if (isset($param['phone'])) {
            $this->db->set('setting_value', $param['phone']);
            $this->db->where('setting_id', 5);
            $this->db->update('setting');
        }

        if (isset($param['address'])) {
            $this->db->set('setting_value', $param['address']);
            $this->db->where('setting_id', 6);
            $this->db->update('setting');
        }

        if (isset($param['facebook'])) {
            $this->db->set('setting_value', $param['facebook']);
            $this->db->where('setting_id', 7);
            $this->db->update('setting');
        }

        if (isset($param['twitter'])) {
            $this->db->set('setting_value', $param['twitter']);
            $this->db->where('setting_id', 8);
            $this->db->update('setting');
        }

        if (isset($param['from_name'])) {
            $this->db->set('setting_value', $param['from_name']);
            $this->db->where('setting_id', 9);
            $this->db->update('setting');
        }
        
        if (isset($param['protocol'])) {
            $this->db->set('setting_value', $param['protocol']);
            $this->db->where('setting_id', 10);
            $this->db->update('setting');
        }
        
        if (isset($param['smtp_host'])) {
            $this->db->set('setting_value', $param['smtp_host']);
            $this->db->where('setting_id', 11);
            $this->db->update('setting');
        }
        
        if (isset($param['smtp_port'])) {
            $this->db->set('setting_value', $param['smtp_port']);
            $this->db->where('setting_id', 12);
            $this->db->update('setting');
        }
        
        if (isset($param['smtp_user'])) {
            $this->db->set('setting_value', $param['smtp_user']);
            $this->db->where('setting_id', 13);
            $this->db->update('setting');
        }
        
        if (isset($param['smtp_pass'])) {
            $this->db->set('setting_value', $param['smtp_pass']);
            $this->db->where('setting_id', 14);
            $this->db->update('setting');
        }
        
        if (isset($param['smtp_timeout'])) {
            $this->db->set('setting_value', $param['smtp_timeout']);
            $this->db->where('setting_id', 15);
            $this->db->update('setting');
        }

        if (isset($param['template'])) {
            $this->db->set('setting_value', $param['template']);
            $this->db->where('setting_id', 16);
            $this->db->update('setting');
        }
    }	

}

/* End of file Setting_model.php */
/* Location: ./application/modules/setting/models/Setting_model.php */