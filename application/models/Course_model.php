<?php

class Course_model extends CI_model {

	function check_login($table='',$credential='')
	{
		
		$query = $this->db->get_where($table, $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          
          $this->session->set_userdata('login', 1);
          $this->session->set_userdata('login_user_id', $row->u_id);
          $this->session->set_userdata('name', $row->users);
          $this->session->set_userdata('login_data', $row);
          //redirect('welcome/dashboard', 'refresh');
          return "success";

	}else{
		return "error";
	}


}
function get_name_id($id=""){
	$query= $this->db->where('generated_id',$id)->get('tutor');
	if($query->num_rows()>0){
	return 'Tutor-'.$query->row()->name;
		}else{
		return 'Student-'.$this->db->where('generated_id',$id)->get('student')->row()->name;
		}
}
function get_gid($table="",$id=""){
	return $this->db->where('id',$id)->get($table)->row()->generated_id;
}
function get_name($table="",$id=""){
	return $this->db->where('id',$id)->get($table)->row()->name;
}
function check_subject($id="")
{
	
	$request = $this->db->where('id',$id)->get('tutor_request_subject')->row();
	$check = $this->db->where('study_level_id',$request->study_level_id)->where('from_level_id',$request->from_level_id)->where('subject',$request->subject)->get('subjects');
     if($check->num_rows()>0){
	  return 1;
	 }else{
		return 0;
		 }
	         
            
   }
   function check_student_subject($id="")
{
	
	$request = $this->db->where('id',$id)->get('student_request_subject')->row();
	$check = $this->db->where('study_level_id',$request->study_level_id)->where('from_level_id',$request->from_level_id)->where('subject',$request->subject)->get('subjects');
     if($check->num_rows()>0){
	  return 1;
	 }else{
		return 0;
		 }
	         
            
   }


function get_data($table='')
{
     return $result=$this->db->get($table)->result();        
            
   }
   function get_feedback_report($table='', $id=NULL)   
{
             $this->db->where('users_feedback_id',$id);
     return   $result=$this->db->get($table)->result();        
            
   }

   function edit_operation($table='', $where='')
  {   
       
    $result  = $this->db->get_where($table, $where)->row();

    return $result;

  } 
  function get_from_level($id='')
  {   
       
    $result  = $this->db->where('id',$id)->get('from_level')->row()->from_level;

    return $result;

  } 
  function get_to_level($id='')
  {   
       
    $result  = $this->db->where('id',$id)->get('to_level')->row()->to_level;

    return $result;

  } 







function insert($table='',$data='')
{
	$result=$this->db->insert($table,$data);
        if($result)
            return "success";
        else
            return "error";
}


   function get_data_by_id($table='',$where='')
{
  
  return  $result  = $this->db->get_where($table, $where)->result_array();
        
            
   }   

   function get_single_data($table='',$where='')
{
  return  $result  = $this->db->get_where($table, $where)->row_array();
        
            
   }
    

   
  function update($table='',$data='', $where='')
{
  
 // print_r($data);die;
   return $result  = $this->db->update($table, $data, $where);
    
     

  } 
  function delete($table='', $where='')

  {
    return  $result=$this->db->delete($table,$where);
        
  } 

function image_delete($table='',$where='')
{
  
  $unlink =$this->db->get_where($table, $where)->row_array();  
  unlink("uploads/eduzyte/".$unlink['image']);
	$result=$this->db->delete($table,$where);
        if($result)
            return "success";
        else
            return "error";
}


}
?>