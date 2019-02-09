<?php

class Users extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }
 
    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("news_events");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("news_events");
    }

     



}

?>