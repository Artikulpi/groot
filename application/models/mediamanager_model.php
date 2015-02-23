<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mediamanager_model extends CI_Model {
    public
        $limit = 15,
        $select = '*',
        $lastInsertId = null;
    protected $table = 'mediamanager';

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

    public function gets ($offset, $keyword='', $params=array()) { 
    	$limit = '';
    	$where = ' WHERE
    					mm.album_id <= 0';
    	if(strlen($keyword) > 0) {
    		$where .= " AND ( label LIKE %'".$keyword."'% OR name LIKE %'".$keyword."'% ) ";
    	}
    	 
    	if(isset($params['isfile'])) {
    		$where .= " AND mm.isfile = ".$params['isfile'];
    	}
    	
    	if (is_numeric($offset)) {
    		$limit = ' LIMIT '.$offset.', '.$this->limit;
    	}
    	$sql = 'SELECT 
    				alb.id, 0 as name,"" as type, alb.label, 0 as info,alb.upload_at,
    				(SELECT COUNT(*) FROM mediamanager mm WHERE mm.album_id = alb.id) count,
    				0 as sequence
				FROM
				   mediamanager_album alb
				UNION
				SELECT 
				   mm.id, mm.name, mm.type, mm.label, mm.info,mm.upload_at, 0 as count, 1 as sequence
				FROM
				   mediamanager mm
    			'.$where.'
				ORDER BY sequence ASC, upload_at DESC'.
    			$limit;
    	
    	$execute = $this->db->query($sql);
    	$result['count'] = $execute->num_rows();
    	$result['data'] = $execute->result_array();
    	
    	return $result;
    }

    public function getFromAlbum($album_id, $offset, $keyword = '') {
    	$this->db->select($this->select);
    	$this->db->where('album_id', $album_id);
    	if(strlen($keyword) > 0) {
    		$this->db->like('label', $keyword);
    		$this->db->or_like('name', $keyword);
    	}
    
    	$result['count']	= $this->db->get($this->table)->num_rows();
    	
    	$this->db->where('album_id', $album_id);
    	if(strlen($keyword) > 0) {
    		$this->db->like('label', $keyword);
    		$this->db->or_like('name', $keyword);
    	}
    
    	if (is_numeric($offset)) {
    		$this->db->limit($this->limit, $offset);
    	}
    	$this->db->order_by('upload_at', 'desc');
    
    	$result['data']		= $this->db->get($this->table)->result_array();
    	//echo '<pre>'; print_r($this->db->last_query()); echo '<pre/>'; exit();
    	return $result;
    }
    
    public function count($isfile=0) {
    	$this->db->where('isfile', $isfile);
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
    
    /**
     * Delete media_manager
     *
     * Delete news with selected ID
     *
     * @param integer $id news id
     * @return boolean TRUE if success, FALSE if failure
     */
    public function delete($id = NULL)
    {
    	$this->db->delete('mediamanager', array('id' => $id));
    	$status = $this->db->affected_rows();
    	return ($status == 0) ? FALSE : TRUE;
    }
    
    public function tempCreateTable () {
    	//$q1 = 'ALTER TABLE  `informasi` ADD  `category_id` INT( 11 ) NOT NULL AFTER  `user_id`';
    	$q2 = "INSERT INTO  `themes` (
`id` ,
`name` ,
`directory_name` ,
`user_id` ,
`active`
)
VALUES (
NULL ,  'alternative_2',  'alternative_2',  '0',  '0'
)";
    	/* $q2 = "
INSERT INTO `permission_access` (`role_id`, `name`, `value`) VALUES
(1, 'dashboard', 0),
(1, 'profil', 0),
(1, 'news', 0),
(1, 'event', 0),
(1, 'directory_aceh', 0),
(1, 'service', 0),
(1, 'hukum', 0),
(1, 'jelajah', 0),
(1, 'page', 0),
(1, 'banner', 0),
(1, 'surat', 0),
(1, 'document', 0),
(1, 'aggregator', 0),
(1, 'setting', 0),
(1, 'template', 0),
(2, 'dashboard', 0),
(2, 'profil', 0),
(2, 'news', 0),
(2, 'event', 0),
(2, 'directory_aceh', 0),
(2, 'service', 0),
(2, 'hukum', 0),
(2, 'jelajah', 0),
(2, 'page', 0),
(2, 'banner', 0),
(2, 'surat', 0),
(2, 'document', 0),
(2, 'aggregator', 0),
(2, 'setting', 0),
(2, 'template', 0),
(3, 'dashboard', 0),
(3, 'profil', 0),
(3, 'news', 0),
(3, 'event', 0),
(3, 'directory_aceh', 0),
(3, 'service', 0),
(3, 'hukum', 0),
(3, 'jelajah', 0),
(3, 'page', 0),
(3, 'banner', 0),
(3, 'surat', 0),
(3, 'document', 0),
(3, 'aggregator', 0),
(3, 'setting', 0),
(3, 'template', 0),
(1, 'activity', 0),
(2, 'activity', 0),
(3, 'activity', 0),
(1, 'media_manager', 0);;
    			";
    	 */
    	//$x1 = $this->db->query($q1);
    	$x2 = $this->db->query($q2);
    	echo '<pre>'; var_dump($x2); echo '<pre/>'; exit();
    	//var_dump($x1, $x2);
    	
    	

        /* $res = $this->db->get('permission_access')->result_array();
    	echo '<pre>'; print_r($res); echo '<pre/>'; exit(); */
    }
    
}
