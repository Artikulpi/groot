<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mediaalbum_model extends CI_Model {
    public
        $limit = 15,
        $select = '*',
        $lastInsertId = null;
    protected $table = 'mediamanager_album';

    public function __construct()
    {
        parent::__construct();
    }
	
    public function insert($fileData) {
    	$now = new Datetime('now');
    	
    	$data = array(
	    	'name' => $fileData['file_name'],
	    	'info' => serialize($fileData),
	    	'upload_at' => $now->format('Y-m-d H:i:s')
    	);
    	
    	if(isset($fileData['label']))
    		$data['label'] = $fileData['label'];
    	
    	$this->add($data);
    	
    	return $this->lastInsertId;
    	
    }
    public function add($data) {
        $this->db->set($data);
        $this->db->insert($this->table);

        $this->lastInsertId = $this->db->insert_id();

        return $this->db->affected_rows();
    }

    public function get($id) {
        $this->db->select($this->select);
        $this->db->where('id', $id);

        $res = $this->db->get($this->table)->result_array();

        return $res ? $res[0] : false;
    }

    public function gets($offset, $keyword = '') {
    	$limit = '';
    	if (is_numeric($offset)) {
    		$limit = ' LIMIT '.$offset.', '.$this->limit;
    	}
        $sql = 'SELECT 
				   alb.id, alb.label, alb.upload_at,
				   (SELECT COUNT(*) FROM mediamanager mm WHERE mm.album_id = alb.id) count
				FROM
				   mediamanager_album alb
				ORDER BY
				   alb.upload_at DESC '.
        		$limit;
        
        $execute = $this->db->query($sql);
    	$result['count'] = $execute->num_rows();
    	$result['data'] = $execute->result_array();
        
        return $result;
    }

    public function count() {
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function createPage($start, $limit, $total) {
    	if($start == 0)
    			$start = 1;
    	$page	= 0;
    	$untill	= ($start * $limit) - 1;
    	
    	$numpages       = ceil((int)$total/ (int) $limit);
    	
    	if($start > 1) {
    		$page           = ($start-1) * $limit;
    		$untill         = ($start * $limit) - 1;
    	}
    	
    	if($page > 0)
    		$page   = (int) $page;
    	
    	$pages['page']          = (int) $start;
        $pages['numpages']      = (int) $numpages;
        $pages['lastpage']      = (int) $numpages;
        $pages['next']          = ($start + 1);
        $pages['prev']          = ($start > 1) ? ($start - 1) : 1;
        $pages['hasnext']       = ($start > 0 && $start < $numpages) ? true : false;
        $pages['hasprev']       = ($start > 1) ? true : false;
    	
        return $pages;
    }
    
}
