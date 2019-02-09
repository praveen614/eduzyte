<?php

class Salesman_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }






   function get_where($table="" ,$id="")  
    {
      
      return $result=$this->db->where('employee_id',$id)->get($table)->row();

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