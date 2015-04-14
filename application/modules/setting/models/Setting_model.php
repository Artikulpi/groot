<?php

if (!defined('BASEPATH'))
    exit('No direct script are allowed');

class Setting_model extends CI_Model {

    public function get($param = array()) {

        if (isset($param['id'])) {
            $this->db->where('setting_id', $param['id']);
        }
        
        if (isset($param['name'])) {
            $this->db->where('setting_name', $param['name']);
        }

        if (isset($param['id']) OR isset($param['name'])) {
            return $this->db->get('g_setting')->row_array();
        } else {
            return $this->db->get('g_setting')->result_array();
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
            $this->db->update('g_setting');
        }
        
        if (isset($param['google'])) {
            $this->db->set('setting_value', $param['google']);
            $this->db->where('setting_id', 2);
            $this->db->update('g_setting');
        }
        
        if (isset($param['from'])) {
            $this->db->set('setting_value', $param['from']);
            $this->db->where('setting_id', 3);
            $this->db->update('g_setting');
        }
        
        if (isset($param['from_name'])) {
            $this->db->set('setting_value', $param['from_name']);
            $this->db->where('setting_id', 4);
            $this->db->update('g_setting');
        }
        
        if (isset($param['protocol'])) {
            $this->db->set('setting_value', $param['protocol']);
            $this->db->where('setting_id', 5);
            $this->db->update('g_setting');
        }
        
        if (isset($param['smtp_host'])) {
            $this->db->set('setting_value', $param['smtp_host']);
            $this->db->where('setting_id', 6);
            $this->db->update('g_setting');
        }
        
        if (isset($param['smtp_port'])) {
            $this->db->set('setting_value', $param['smtp_port']);
            $this->db->where('setting_id', 7);
            $this->db->update('g_setting');
        }
        
        if (isset($param['smtp_user'])) {
            $this->db->set('setting_value', $param['smtp_user']);
            $this->db->where('setting_id', 8);
            $this->db->update('g_setting');
        }
        
        if (isset($param['smtp_pass'])) {
            $this->db->set('setting_value', $param['smtp_pass']);
            $this->db->where('setting_id', 9);
            $this->db->update('g_setting');
        }
        
        if (isset($param['smtp_timeout'])) {
            $this->db->set('setting_value', $param['smtp_timeout']);
            $this->db->where('setting_id', 10);
            $this->db->update('g_setting');
        }
        
        if (isset($param['mailtype'])) {
            $this->db->set('setting_value', $param['mailtype']);
            $this->db->where('setting_id', 11);
            $this->db->update('g_setting');
        }
        
        if (isset($param['charset'])) {
            $this->db->set('setting_value', $param['charset']);
            $this->db->where('setting_id', 12);
            $this->db->update('g_setting');
        }
        
        if (isset($param['newline'])) {
            $this->db->set('setting_value', $param['newline']);
            $this->db->where('setting_id', 13);
            $this->db->update('g_setting');
        }
        
        if (isset($param['crlf'])) {
            $this->db->set('setting_value', $param['crlf']);
            $this->db->where('setting_id', 14);
            $this->db->update('g_setting');
        }

    }

}
