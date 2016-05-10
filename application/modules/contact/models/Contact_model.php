<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function get($params = array())
    {
        if (isset($params['id'])) {
            $this->db->where('contact_id', $params['id']);
        }

        if (isset($params['limit'])) {
            if (!isset($params['offset'])) {
                $params['offset'] = NULL;
            }
            $this->db->limit($params['limit'], $params['offset']);
        }

        if (isset($params['order_by'])) {
            $this->db->order_by($params['order_by'], 'desc');
        } else {
            $this->db->order_by('contact_id', 'desc');
        }

        $this->db->select('contact_id, contact_name, contact_email, contact_message, contact_input_date');
        $res = $this->db->get('contact');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    public function save($params = array())
    {
        if (isset($params['contact_id'])) {
            $this->db->set('contact_id', $params['contact_id']);
        }

        if (isset($params['contact_name'])) {
            $this->db->set('contact_name', $params['contact_name']);
        }

        if (isset($params['contact_email'])) {
            $this->db->set('contact_email', $params['contact_email']);
        }

        if (isset($params['contact_message'])) {
            $this->db->set('contact_message', $params['contact_message']);
        }

        if (isset($params['contact_input_date'])) {
            $this->db->set('contact_input_date', $params['contact_input_date']);
        }

        $this->db->insert('contact');
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    public function delete($id)
    {
        $this->db->where('contact_id', $id);
        $this->db->delete('contact');
    }

}

/* End of file Contact_model.php */
/* Location: ./application/modules/contact/models/Contact_model.php */
