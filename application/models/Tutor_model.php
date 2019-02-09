<?php

class Tutor_model extends CI_model {
	
	
function get_course($study_level="",$from_level="",$to_level="")
{
	return  $result=$this->db->where('study_level_id',$study_level)->where('from_level_id',$from_level)->where('to_level_id',$to_level)->get('course')->result();        
            
   }
   function get_subject($course_id="")
{
	return  $result=$this->db->where('status',1)->where('from_level_id',$course_id)->get('subjects')->result();        
            
   }
   
   function get_demo_class()
{
	$tutor_id=$this->session->userdata('user_id');
	$tutor_id=$this->db->where('id',$tutor_id)->get('tutor')->row()->generated_id;
	return  $result=$this->db->where('tutor_id',$tutor_id)->get('demo_class_table')->result();        
            
   }
   function get_users_list()
{
	$tutor_id=$this->session->userdata('user_id');
	$tutor_id=$this->db->where('id',$tutor_id)->get('tutor')->row()->generated_id;
	$class_id = $this->db->where('tutor_id',$tutor_id)->get('demo_class_table')->row()->class_id;
	$result= $this->db->where('class_id',$class_id)->get('demo_student_link')->result();
	
	foreach($result as $row){
		$id=$row->student_id;
		 $row->user = $this->db->where('generated_id',$id)->get('student')->row();
		}
		
		return $result;
          
   }

function tutor_page_status($table='',$id="",$page="")
{
	return  $result=$this->db->where('tutor_id',$id)->get($table)->row()->$page;
        
            
   }
   function admin_status($table='',$id="")
{
	return  $result=$this->db->where('id',$id)->get($table)->row()->admin_status;
        
            
   }
   
   function tutor_data($id="")
{
	//echo $id;die;
	return  $result=$this->db->where('id',$id)->get('tutor')->row();
        
            
   }
   function subject_edit_data($table='',$subject_id)
{		

	  $tutor_id=$this->session->userdata('user_id'); 	
	return  $result=$this->db->where('tutor_id',$tutor_id)->where('subject_id',$subject_id)->get($table)->row();
        
            
   }
   function degree_edit_data($table='',$degree_id)
{
	$tutor_id=$this->session->userdata('user_id');  	
	return  $result=$this->db->where('tutor_id',$tutor_id)->where('degree_id',$degree_id)->get($table)->row();
        
            
   }
   function timeslot_edit_data($table='',$id)
{
	   	
	return  $result=$this->db->where('id',$id)->get($table)->row();
        
            
   }
   function get_tutor_data($table='',$id="")
{
	   	
	return  $result=$this->db->where('tutor_id',$id)->get($table)->row();
        
            
   }
   
   function levels_id($table="",$id="")
{
	return  $result=$this->db->where('id',$id)->get($table)->row()->from_level;        
            
   }
   function get_study_level($id="")
{
	return  $result=$this->db->where('id',$id)->get('study_level')->row()->study_level;        
            
   }
   
   function get_subject_course($id="")
{
	
    $tab_letter=substr($id,0,1);
	
	if($tab_letter == "s"){
		$table="subjects";
		$column="subject_generate_id";
		$subject="subject";
	}else{
		$table="course";
		$column="course_generate_id";
		$subject="course";
	}
	return  $result=$this->db->where($column,$id)->get($table)->row()->$subject;
        
            
   }
   function get_degree($id="")
{
	return  $result=$this->db->where('id',$id)->get('degree')->row()->degree;       
            
   }
   function tutor_degree_id($tutor_id="",$degree_id="")
{
	return  $result=$this->db->where('tutor_id',$tutor_id)->where('degree_id',$degree_id)->get('tutor_degree')->row()->id;       
            
   }
   
   
   function get_degree_id($url_slug="")
{
	//echo $url_slug;die;
	return  $result=$this->db->where('url_slug',$url_slug)->get('degree')->row()->id;       
            
   }
   function get_degree_url($id="")
{
	return  $result=$this->db->where('id',$id)->get('degree')->row()->url_slug;      
            
   }
   function get_subject_url($id="")
{
	return  $result=$this->db->where('subject_generate_id',$id)->get('subjects')->row()->subject_url_slug;      
            
   }
   function get_subject_id($url="")
{
	return  $result=$this->db->where('subject_url_slug',$url)->get('subjects')->row()->subject_generate_id;      
            
   }
   function get_level_heading($study_level_id="")
{
	$this->db->select('level_heading.level_heading,levels.level_heading_id,levels.study_level_id');
	$this->db->from('levels');
	$this->db->where('levels.study_level_id',$study_level_id);
	$this->db->join('level_heading','level_heading.id = levels.level_heading_id'); 
	$this->db->group_by('levels.level_heading_id');	
	return $result = $this->db->get()->result();	
            
   }
   
   function get_levels($study_level_id="")
{
	$this->db->select('from_level.*');
	$this->db->from('from_level');
	$this->db->where('from_level.study_level_id',$study_level_id);	
	return $result = $this->db->get()->result();	
            
   }
   
   function get_id_data($table='',$where='')
{	
	
	$result=$this->db->get_where($table,$where);
	if($result->num_rows() > 0){
		return "success";
	}else{
		return "failure";
	}
        
            
   }
   function get_id_update_data($table='',$degree_id='' ,$id="")
{	
	$tutor_id=$this->session->userdata('user_id');
	if ($id) {
               $this->db->where("id!=$id");
           }
		   $this->db->where('tutor_id',$tutor_id)->where("degree_id=$degree_id");
	$result=$this->db->get($table);
	
	if($result->num_rows() > 0){
		return "success";
	}else{
		return "failure";
	}       
            
   }
   function check_subject_id_update_data($table='',$subject_id='' ,$id="")
{	
	$tutor_id=$this->session->userdata('user_id');
	if ($id) {
               $this->db->where("id!=$id");
           }
		   $this->db->where('tutor_id',$tutor_id)->where('subject_id',$subject_id);
	$result=$this->db->get($table);
	
	if($result->num_rows() > 0){
		return "success";
	}else{
		return "failure";
	}       
            
   }
   
   function get_data($table='')
{
	return  $result=$this->db->get($table)->result();
        
            
   }
   function get_active_data($table='')
{
	return  $result=$this->db->where('status',1)->get($table)->result();
        
            
   }
   function insert($table='', $data="")
{
	return  $result=$this->db->insert($table,$data);
        
            
   }
   
   function tutor_subject_data($table='',$tutor_id="")
{ 	
	return  $result=$this->db->where('tutor_id',$tutor_id)->get($table)->result();
           
   }
   function tutor_ratings($table='',$tutor_id)
{
	$this->db->select('student.name,student.generated_id,student_ratings.*');
	$this->db->from('student_ratings');
	$this->db->where('student_ratings.tutor_id',$tutor_id);
	$this->db->where('student_ratings.admin_status',1);
	$this->db->join('student','student.id = student_ratings.student_id');
	$query=$this->db->get();
	//echo $this->db->last_query();die;
	 return $result = $query->result(); 
	 
	    
   }
   
   function tutor_inbox_messages($table='',$tutor_id="")
{
	$this->db->select('student.name,student.generated_id,student_messages.message');
	$this->db->from('student_messages');
	$this->db->where('student_messages.tutor_id',$tutor_id);
	$this->db->where('student_messages.admin_status',1);
	$this->db->join('student','student.id = student_messages.student_id');	
	return $result = $this->db->get()->result();
	   	
	     
            
   }
   function tutor_sent_messages($table='',$tutor_id="")
{ 
	$this->db->select('student.name,student.generated_id,tutor_messages.message');
	$this->db->from('tutor_messages');
	$this->db->where('tutor_messages.tutor_id',$tutor_id);
	//$this->db->where('tutor_messages.admin_status',1);
	$this->db->join('student','student.id = tutor_messages.student_id');	
	return $result = $this->db->get()->result();
   }
   function update($table='',$data='', $where='')
{
 
   return $result  = $this->db->update($table, $data, $where);
    
  } 
  function delete_data($table='', $where='')

  {
    return  $result=$this->db->delete($table,$where);
        
  } 
   
   
}
?>