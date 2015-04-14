<?php

if (!defined('BASEPATH'))
    exit('No direct script are allowed');

class Contact_model extends CI_Model {

    public function get($param = array()) {

        if (isset($param['id'])) {
            $this->db->where('contact_id', $param['id']);
        }
        
        if (isset($param['name'])) {
            $this->db->where('contact_name', $param['name']);
        }

        if (isset($param['id']) OR isset($param['name'])) {
            return $this->db->get('g_contact')->row_array();
        } else {
            return $this->db->get('g_contact')->result_array();
        }
    }

    public function get_value($params = array()) {
        $contact = $this->get($params);

        if (!empty($contact['contact_value']))
            return $contact['contact_value'];
        else
            return '';
    }

    public function save($param = array()) {
        if (isset($param['name'])) {
            $this->db->set('contact_value', $param['name']);
            $this->db->where('contact_id', 1);
            $this->db->update('g_contact');
        }
        
        if (isset($param['email'])) {
            $this->db->set('contact_value', $param['email']);
            $this->db->where('contact_id', 2);
            $this->db->update('g_contact');
        }
        
        if (isset($param['phone'])) {
            $this->db->set('contact_value', $param['phone']);
            $this->db->where('contact_id', 3);
            $this->db->update('g_contact');
        }
        
        if (isset($param['address'])) {
            $this->db->set('contact_value', $param['address']);
            $this->db->where('contact_id', 4);
            $this->db->update('g_contact');
        }
        
        if (isset($param['facebook'])) {
            $this->db->set('contact_value', $param['facebook']);
            $this->db->where('contact_id', 5);
            $this->db->update('g_contact');
        }
        
        if (isset($param['twitter'])) {
            $this->db->set('contact_value', $param['twitter']);
            $this->db->where('contact_id', 6);
            $this->db->update('g_contact');
        }

    }

}
