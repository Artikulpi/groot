<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Page Model Class
 *
 * @package     GROOT
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Page_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table = 'g_page';

    // Get From Databases
    function get($params = array()) {
        if (isset($params['id'])) {
            $this->db->where('g_page.page_id', $params['id']);
        } elseif (isset($params['user_id'])) {
            $this->db->where('g_page.user_id', $params['user_id']);
        } elseif (isset($params['page_name'])) {
            $this->db->like('page_name', $params['name']);
        } elseif (isset($params['date'])) {
            $this->db->where('page_input_date', $params['date']);
        }

        if (isset($params['status'])) {
            $this->db->where('page_is_published', $params['status']);
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
            $this->db->order_by('page_last_update', 'desc');
        }

        $this->db->select('*');
        $this->db->join('g_user', 'g_user.user_id = g_page.user_id', 'left');
        $this->db->group_by('g_page.page_id');
        $res = $this->db->get('g_page');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {

        if (isset($data['page_id'])) {
            $this->db->set('page_id', $data['page_id']);
        }

        if (isset($data['page_name'])) {
            $this->db->set('page_name', $data['page_name']);
        }

        if (isset($data['page_description'])) {
            $this->db->set('page_description', $data['page_description']);
        }

        if (isset($data['page_content'])) {
            $this->db->set('page_content', $data['page_content']);
        }

        if (isset($data['page_published_date'])) {
            $this->db->set('page_published_date', $data['page_published_date']);
        }

        if (isset($data['page_image'])) {
            $this->db->set('page_image', $data['page_image']);
        }

        if (isset($data['page_input_date'])) {
            $this->db->set('page_input_date', $data['page_input_date']);
        }

        if (isset($data['page_last_update'])) {
            $this->db->set('page_last_update', $data['page_last_update']);
        }

        if (isset($data['page_is_published'])) {
            $this->db->set('page_is_published', $data['page_is_published']);
        }

        if (isset($data['page_is_commentable'])) {
            $this->db->set('page_is_commentable', $data['page_is_commentable']);
        }

        if (isset($data['user_id'])) {
            $this->db->set('user_id', $data['user_id']);
        }

        if (isset($data['page_id'])) {
            $this->db->where('page_id', $data['page_id']);
            $this->db->update('g_page');
            $id = $data['page_id'];
        } else {
            $this->db->insert('g_page');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('page_id', $id);
        $this->db->delete('g_page');
    }

    /**
     * Update menu
     *
     * Update menu record
     * 
     * @param array $data data
     * @return boolean TRUE if success, FALSE if failure
     */
    public function update_menu($data = array()) {
        $this->db->set('url', $data['url']);
        $this->db->where('id', $data['id']);
        $this->db->update('mptt');

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : TRUE;
    }

}
