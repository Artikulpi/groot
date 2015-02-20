<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Page Model Class
 *
 * @package     SIPSI
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Page_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table = 'page';
    
    
    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('page.page_id', $params['id']);
        }
        elseif(isset($params['user_id']))
        {
            $this->db->where('page.user_id', $params['user_id']);
        }
        elseif(isset($params['page_name']))
        {
            $this->db->like('page_name', $params['name']);
        }
        elseif(isset($params['date']))
        {
            $this->db->where('page_input_date', $params['date']);
        }
        
        if(isset($params['status']))
        {
            $this->db->where('page_is_published', $params['status']);
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
            $this->db->order_by('page_last_update', 'desc');
        }

        $this->db->select('*');
        $this->db->join('user', 'user.user_id = page.user_id', 'left');
        $this->db->group_by('page.page_id');
        $res = $this->db->get('page');

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
        $param = array(
            'page_name' => $data['page_name'],
            'page_content' => $data['page_content'],
            'page_short_desc' => $data['page_short_desc'],
            'page_image' => $data['page_image'],
            'page_publish_date' => $data['page_publish_date'],
            'page_last_update' => $data['page_last_update'],
            'page_is_published' => $data['page_is_published'],
            'page_is_commentable' => $data['page_is_commentable'],
            'user_id' => $data['user_id'],
            'page_input_date' => $data['page_input_date'],
        );
        $this->db->set($param);

        if (isset($data['page_id'])) {
            $this->db->where('page_id', $data['page_id']);
            $this->db->update('page');
            $id = $data['page_id'];
        } else {
            $this->db->insert('page');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function delete($id) {
        $this->db->where('page_id', $id);
        $this->db->delete('page');
    }
    
    function total() {
       return $this->db->count_all('page');
    }
    
    /**
     * Update menu
     *
     * Update menu record
     * 
     * @param array $data data
     * @return boolean TRUE if success, FALSE if failure
    */
    public function update_menu($data = array())
    {
        $this->db->set('url', $data['url']);
        $this->db->where('id', $data['id']);
        $this->db->update('mptt');

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : TRUE;
    }
    
}
