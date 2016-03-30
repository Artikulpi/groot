<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	var $table = 'user';

	// Get From Databases
    function get($params = array())
    {
        $this->db->select('user.user_id, user_name, user_password, user_full_name, user_description,
            user_email, user_input_date, user_last_update, user.user_role_id, user_role.role_name'); 
        
        if(isset($params['id']))
        {
            $this->db->where('user.user_id', $params['id']);
        }
        elseif(isset($params['user_id']))
        {
            $this->db->where('user.user_id', $params['user_id']);
        }
        elseif(isset($params['name']))
        {
            $this->db->like('user_name', $params['name']);
        }
        elseif(isset($params['date']))
        {
            $this->db->where('user_input_date', $params['date']);
        }
        
        if(isset($params['user_role_id']))
        {
            $this->db->where('user_role_id', $params['user_role_id']);
        }

        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('user_last_update', 'desc');
        }

        $this->db->join('user_role', 'user_role.role_id = user.user_role_id', 'left');
        $res = $this->db->get('user');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }
    
    // Get Role From Databases
    function get_role($params = array())
    {
        $this->db->select('user_role.role_id, role_name, role_input_date, role_last_update'); 
        
        if(isset($params['id']))
        {
            $this->db->where('user_role.role_id', $params['id']);
        }
        if(isset($params['role_id']))
        {
            $this->db->where('user_role.role_id', $params['role_id']);
        }
        
        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('role_last_update', 'desc');
        }
        
        $res = $this->db->get('user_role');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    function add($data = array()) {
        
         if(isset($data['user_id'])) {
            $this->db->set('user_id', $data['user_id']);
        }
        
         if(isset($data['user_name'])) {
            $this->db->set('user_name', $data['user_name']);
        }
        
         if(isset($data['user_password'])) {
            $this->db->set('user_password', $data['user_password']);
        }
        
         if(isset($data['user_full_name'])) {
            $this->db->set('user_full_name', $data['user_full_name']);
        }
        
         if(isset($data['user_email'])) {
            $this->db->set('user_email', $data['user_email']);
        }
        
         if(isset($data['user_description'])) {
            $this->db->set('user_description', $data['user_description']);
        }
        
         if(isset($data['user_input_date'])) {
            $this->db->set('user_input_date', $data['user_input_date']);
        }
        
         if(isset($data['user_last_update'])) {
            $this->db->set('user_last_update', $data['user_last_update']);
        }
        
         if(isset($data['user_role'])) {
            $this->db->set('user_role', $data['user_role']);
        }
        
        if (isset($data['user_id'])) {
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('user');
            $id = $data['user_id'];
        } else {
            $this->db->insert('user');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function add_role($data = array()) {
        
         if(isset($data['role_id'])) {
            $this->db->set('role_id', $data['role_id']);
        }
        
         if(isset($data['role_name'])) {
            $this->db->set('role_name', $data['role_name']);
        }
        
         if(isset($data['role_input_date'])) {
            $this->db->set('role_input_date', $data['role_input_date']);
        }
        
         if(isset($data['role_last_update'])) {
            $this->db->set('role_last_update', $data['role_last_update']);
        }
        
        if (isset($data['role_id'])) {
            $this->db->where('role_id', $data['role_id']);
            $this->db->update('user_role');
            $id = $data['role_id'];
        } else {
            $this->db->insert('user_role');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    function delete_role($id) {
        $this->db->where('role_id', $id);
        $this->db->delete('user_role');
    }

    function change_password($id, $params){
       $this->db->where('user_id', $id);
       $this->db->update('user', $params);   
   }

}

/* End of file User_model.php */
/* Location: ./application/modules/user/models/User_model.php */