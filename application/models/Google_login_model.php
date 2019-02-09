<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Google_login_model extends CI_Model{
	function __construct() {
		$this->tableName = 'users';
		$this->primaryKey = 'id';
	}
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('email'=>$data['email']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			//$data['updated_at'] = time();
			//$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			$userID = $prevResult['id'];
		}else{
			$this->db->set('full_name',$data['first_name'].' '.$data['last_name']);
			$this->db->set('email',$data['email']);
			$this->db->set('profile_image',$data['picture_url']);
			$this->db->set('created_at',time());
			$this->db->set('updated_at',time());
			$insert = $this->db->insert($this->tableName);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }
}
