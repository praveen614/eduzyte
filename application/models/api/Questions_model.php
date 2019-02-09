<?php

class Questions_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_data($table='')
{
     return   $result=$this->db->get($table)->result();        
            
   }
   function get_options($table='', $id=NULL)   
{
             $this->db->where('questions_id',$id);
     return   $result=$this->db->get($table)->result();        
            
   }

}
?>