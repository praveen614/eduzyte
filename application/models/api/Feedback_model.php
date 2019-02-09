<?php

class Feedback_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($table="", $data="")  
    {
    	//print_r($data);die;
    	return $result=$this->db->insert($table,$data);
        
    }

    function get($table="")  
    {
        //echo $table;die;
        return $result=$this->db->get($table)->result();

    }
     function delete($table="",$id="")  
    {
        //echo $table;die;
        return $result=$this->db->where('id',$id)->delete($table);

    }
    function update($table="",$id="",$data="")  
    {
        //echo $table;die;
        return $result=$this->db->where('id',$id)->update($table,$data);

    }

    function get_where($table="" ,$id="")  
    {
    	//echo $table;die;
    	return $result=$this->db->where('id',$id)->get($table)->row();

    }



}
?>