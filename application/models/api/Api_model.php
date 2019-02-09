<?php

class Api_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($table="")  
    {
    	//echo $table;die;
    	return $result=$this->db->get($table)->result();

    }
    function get_where($table="" ,$id="")  
    {
    	//echo $table;die;
    	return $result=$this->db->where('id',$id)->get($table)->row();

    }



}
?>