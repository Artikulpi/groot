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

    }

}
