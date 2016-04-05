<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table = 'posting';

    // Get From Databases
	function get($params = array())
	{
		if(isset($params['id']))
		{
			$this->db->where('posting_id', $params['id']);
		}
		if(isset($params['posting_category_id']))
		{
			$this->db->where('posting_category_id', $params['posting_category_id']);
		}
		if(isset($params['posting_user_id']))
		{
			$this->db->where('posting_user_id', $params['posting_user_id']);
		}

		if(isset($params['posting_title']))
		{
			$this->db->like('posting_title', $params['posting_title']);
		}

		if(isset($params['date_start']) AND isset($params['date_end']))
		{
			$this->db->where('posting_input_date', $params['date_start']);
			$this->db->or_where('posting_input_date', $params['date_end']);
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
			$this->db->order_by('posting_last_update', 'desc');
		}

		$this->db->select('posting_id, posting_title, posting_description, posting_content, posting_published_date, posting_image, posting_input_date, posting_last_update, posting_is_published, posting_is_commentable, posting_category_id, 
			posting_user_id, user_name, category_name');
		$this->db->join('posting_category', 'posting_category.category_id = posting.posting_category_id', 'left');
		$this->db->join('user', 'user.user_id = posting.posting_user_id');
		$res = $this->db->get('posting');

		if(isset($params['id']))
		{
			return $res->row_array();
		}
		else
		{
			return $res->result_array();
		}
	}

    // Add and update to database
	function add($data = array()) {

		if(isset($data['posting_id'])) {
			$this->db->set('posting_id', $data['posting_id']);
		}

		if(isset($data['posting_title'])) {
			$this->db->set('posting_title', $data['posting_title']);
		}

		if(isset($data['posting_description'])) {
			$this->db->set('posting_description', $data['posting_description']);
		}

		if(isset($data['posting_content'])) {
			$this->db->set('posting_content', $data['posting_content']);
		}

		if(isset($data['posting_published_date'])) {
			$this->db->set('posting_published_date', $data['posting_published_date']);
		}

		if(isset($data['posting_image'])) {
			$this->db->set('posting_image', $data['posting_image']);
		}

		if(isset($data['posting_input_date'])) {
			$this->db->set('posting_input_date', $data['posting_input_date']);
		}

		if(isset($data['posting_last_update'])) {
			$this->db->set('posting_last_update', $data['posting_last_update']);
		}

		if(isset($data['posting_is_published'])) {
			$this->db->set('posting_is_published', $data['posting_is_published']);
		}

		if(isset($data['posting_is_commentable'])) {
			$this->db->set('posting_is_commentable', $data['posting_is_commentable']);
		}

		if(isset($data['posting_category_id'])) {
			$this->db->set('posting_category_id', $data['posting_category_id']);
		}

		if(isset($data['posting_user_id'])) {
			$this->db->set('posting_user_id', $data['posting_user_id']);
		}

		if (isset($data['posting_id'])) {
			$this->db->where('posting_id', $data['posting_id']);
			$this->db->update('posting');
			$id = $data['posting_id'];
		} else {
			$this->db->insert('posting');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

    // Delete to database
	function delete($id) {
		$this->db->where('posting_id', $id);
		$this->db->delete('posting');
	}

    // Get category from database
	function get_category($params = array())
	{
		if(isset($params['id']))
		{
			$this->db->where('category_id', $params['id']);
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
			$this->db->order_by('category_id', 'desc');
		}

		$this->db->select('category_id, category_name, category_input_date, category_last_update');
		$res = $this->db->get('posting_category');

		if(isset($params['id']))
		{
			return $res->row_array();
		}
		else
		{
			return $res->result_array();
		}
	}

    // Add and Update category to database
	function add_category($data = array()) {
		if(isset($data['category_id'])) {
			$this->db->set('category_id', $data['category_id']);
		}

		if(isset($data['category_name'])) {
			$this->db->set('category_name', $data['category_name']);
		}

		if(isset($data['category_input_date'])) {
			$this->db->set('category_input_date', $data['category_input_date']);
		}

		if(isset($data['category_last_update'])) {
			$this->db->set('category_last_update', $data['category_last_update']);
		}

		if (isset($data['category_id'])) {
			$this->db->where('category_id', $data['category_id']);
			$this->db->update('posting_category');
			$id = $data['category_id'];
		} else {
			$this->db->insert('posting_category');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

    // Delete category to database
	function delete_category($id) {
		$this->db->where('category_id', $id);
		$this->db->delete('posting_category');
	}

    // Set Default category
	function set_default_category($id,$params) {
		$this->db->where('posting_category_id', $id);
		$this->db->update('posting', $params);
	}

}


/* End of file Posting_model.php */
/* Location: ./application/modules/posting/models/Posting_model.php */