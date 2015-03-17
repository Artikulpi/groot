<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Posts Model Class
 *
 * @package     GROOT
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Posts_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table = 'g_posts';
    
    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('g_posts.posts_id', $params['id']);
        }
        if(isset($params['category_id']))
        {
            $this->db->where('g_posts.category_id', $params['category_id']);
        }
        if(isset($params['user_id']))
        {
            $this->db->where('g_posts.user_id', $params['user_id']);
        }
        if(isset($params['posts_title']))
        {
            $this->db->like('posts_title', $params['posts_title']);
        }
        if(isset($params['posts_is_published']))
        {
            $this->db->where('posts_is_published', $params['posts_is_published']);
        }
        if(isset($params['posts_is_commentable']))
        {
            $this->db->where('posts_is_commentable', $params['posts_is_commentable']);
        }
        if(isset($params['posts_published_date']))
        {
            $this->db->where('posts_published_date', $params['posts_published_date']);
        }
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('posts_published_date', $params['date_start']);
            $this->db->or_where('posts_published_date', $params['date_end']);
        }

        if(isset($params['status']))
        {
            $this->db->where('posts_is_published', $params['status']);
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
            $this->db->order_by('posts_last_update', 'desc');
        }

        $this->db->select('*');
        $this->db->join('g_posts_category', 'g_posts_category.category_id = g_posts.category_id');
        $this->db->join('g_user', 'g_user.user_id = g_posts.user_id');
        $res = $this->db->get('g_posts');

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
        
         if(isset($data['posts_id'])) {
            $this->db->set('posts_id', $data['posts_id']);
        }
        
         if(isset($data['posts_title'])) {
            $this->db->set('posts_title', $data['posts_title']);
        }
        
         if(isset($data['posts_description'])) {
            $this->db->set('posts_description', $data['posts_description']);
        }
        
         if(isset($data['posts_content'])) {
            $this->db->set('posts_content', $data['posts_content']);
        }
        
         if(isset($data['posts_published_date'])) {
            $this->db->set('posts_published_date', $data['posts_published_date']);
        }
        
         if(isset($data['posts_image'])) {
            $this->db->set('posts_image', $data['posts_image']);
        }
        
         if(isset($data['posts_input_date'])) {
            $this->db->set('posts_input_date', $data['posts_input_date']);
        }
        
         if(isset($data['posts_last_update'])) {
            $this->db->set('posts_last_update', $data['posts_last_update']);
        }
        
         if(isset($data['posts_is_published'])) {
            $this->db->set('posts_is_published', $data['posts_is_published']);
        }
        
         if(isset($data['posts_is_commentable'])) {
            $this->db->set('posts_is_commentable', $data['posts_is_commentable']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_id', $data['user_id']);
        }
        
         if(isset($data['category_id'])) {
            $this->db->set('category_id', $data['category_id']);
        }
        
        if (isset($data['posts_id'])) {
            $this->db->where('posts_id', $data['posts_id']);
            $this->db->update('g_posts');
            $id = $data['posts_id'];
        } else {
            $this->db->insert('g_posts');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('posts_id', $id);
        $this->db->delete('g_posts');
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

        $this->db->select('*');
        $res = $this->db->get('g_posts_category');

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
        $param = array(
            'category_name' => $data['category_name'],
            'category_input_date' => $data['category_input_date'],
            'category_last_update' => $data['category_last_update']
        );
        $this->db->set($param);
        
        if (isset($data['category_id'])) {
            $this->db->where('category_id', $data['category_id']);
            $this->db->update('posts_category');
            $id = $data['category_id'];
        } else {
            $this->db->insert('g_posts_category');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete category to database
    function delete_category($id) {
        $this->db->where('category_id', $id);
        $this->db->delete('g_posts_category');
    }

    // Set Default category
    function set_default_category($id,$params) {
        $this->db->where('category_id', $id);
        $this->db->update('g_posts', $params);
    }
    
}
