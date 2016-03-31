<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	var $table = 'posting';

	// get data dari database
	public function get($params = array())
	{
		if (isset($params['id'])) {
			$this->db->where('posting_id', $params['id']);
		}

		if (isset($params['category_id'])) {
			$this->db->where('posting_category_id', $params['category_id']);
		}

		if (isset($params['user_id'])) {
			$this->db->where('posting_user_id', $params['user_id']);
		}

		if (isset($params['posting_title'])) {
			$this->db->where('posting_title', $params['posting_title']);
		}

		if (isset($params['posting_published_date'])) {
			$this->db->where('posting_published_date', $params['posting_published_date']);
		}

		if (isset($params['posting_is_published'])) {
			$this->db->where('posting_is_published', $params['posting_is_published']);
		}

		if (isset($params['posting_is_commentable'])) {
			$this->db->where('posting_is_commentable', $params['posting_is_commentable']);
		}

		if(isset($params['status']))
        {
            $this->db->where('posting_is_published', $params['status']);
        }

		if (isset($params['limit'])) {
			if (!isset($params['offset'])) {
				$params['offset'] = NULL;
			}
			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->db->select('*');
		$this->db->join('posting_category', 'posting_category.category_id = posting.posting_category_id');
		$this->db->join('user', 'user.user_id = posting.posting_user_id');
		$res = $this->db->get('posting');

		if (isset($params['id'])) {
			return $res->row_array();
		}
		else {
			return $res->result_array();
		}
	}

	// add dan update ke database 
	public function add($data = array())
	{
		if (isset($data['posting_id'])) {
			$this->db->set($data['posting_id'], $data['posting_id']);
		}

		if (isset($data['posting_title'])) {
			$this->db->set($data['posting_title'], $data['posting_title']);
		}

		if (isset($data['posting_description'])) {
			$this->db->set($data['posting_description'], $data['posting_description']);
		}

		if (isset($data['posting_content'])) {
			$this->db->set($data['posting_content'], $data['posting_content']);
		}

		if (isset($data['posting_published_date'])) {
			$this->db->set($data['posting_published_date'], $data['posting_published_date']);
		}

		if (isset($data['posting_image'])) {
			$this->db->set($data['posting_image'], $data['posting_image']);
		}

		if (isset($data['posting_input_date'])) {
			$this->db->set($data['posting_input_date'], $data['posting_input_date']);
		}

		if (isset($data['posting_last_update'])) {
			$this->db->set($data['posting_last_update'], $data['posting_last_update']);
		}

		if (isset($data['posting_is_published'])) {
			$this->db->set($data['posting_is_published'], $data['posting_is_published']);
		}

		if (isset($data['posting_is_commentable'])) {
			$this->db->set($data['posting_is_commentable'], $data['posting_is_commentable']);
		}

		if (isset($data['posting_category_id'])) {
			$this->db->set($data['posting_category_id'], $data['posting_category_id']);
		}

		if (isset($data['posting_user_id'])) {
			$this->db->set($data['posting_user_id'], $data['posting_user_id']);
		}

		if (isset($data['posting_id'])) {
			$this->db->where('posting_id', $data['posting_id']);
			$this->db->update('posting');
			$id = $data['posting_id'];
		}
		else {
			$this->db->insert('posting');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

	// delete to database
	public function delete($id)
	{
		$this->db->where('posting_id', $id);
		$this->db->delete('posting');
	}

	public function get_category($params = array())
	{
		if (isset($params['id'])) {
			$this->db->where('category_id', $params['id']);
		}

		if (isset($params['limit'])) {
			if (!isset($params['offset'])) {
				$params['offset'] = NULL;
			}
			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->db->select('*');
		$res = $this->db->get('posting_category');

		if (isset($params['id'])) {
			return $res->row_array();
		}
		else {
			return $res->result_array();
		}
	}

	public function add_category($data = array())
	{
		$param = array(
			'category_name' => $data['category_name'],
			'category_input_date' => $data['category_input_date'],
			'category_last_update' => $data['category_last_update']
		);
		$this->db->set($param);

		if (isset($data['category_id'])) {
			$this->db->where('category_id', $data['category_id']);
			$this->db->update('posting_category');
			$id = $data['category_id'];
		}
		else {
			$this->db->insert('posting_category');
			$id = $this->db->insert_id();
		}
	}

	public function delete_category($id)
	{
		$this->db->where('category_id', $id);
		$this->db->delete('posting_category');
	}

	public function set_default_category($id, $params)
	{
		$this->db->where('category_id', $id);
		$this->db->update('posting', $params);
	}

}

/* End of file Posts_model.php */
/* Location: ./application/modules/posts/models/Posts_model.php */