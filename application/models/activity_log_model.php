<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Log_activitas Model Class
 *
 * @package     GROOT
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Activity_log_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    var $table = 'g_activity_log';
    // Get From Databases
    function get($params = array())
    {
        $this->db->select('activity_log_id, activity_log_date, activity_log_action, activity_log_module, activity_log_info, g_activity_log.user_id, g_user.user_name'); 
        
        if(isset($params['id']))
        {
            $this->db->where('g_activity_log.activity_log_id', $params['id']);
        }
        if(isset($params['user_id']))
        {
            $this->db->where('g_activity_log.user_id', $params['user_id']);
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
            $this->db->order_by('activity_log_date', 'desc');
        }

        $this->db->join('g_user', 'g_user.user_id = g_activity_log.user_id', 'left');
        $res = $this->db->get('g_activity_log');

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
            'activity_log_date' => $data['activity_log_date'],
            'activity_log_action' => $data['activity_log_action'],
            'activity_log_module' => $data['activity_log_module'],
            'activity_log_info' => $data['activity_log_info'],
            'user_id' => $data['user_id'],
        );
        $this->db->insert('g_activity_log', $param);
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

}
