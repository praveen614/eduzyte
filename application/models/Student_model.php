<?php

class Student_model extends CI_model {


function get_course($study_level="")
{
	return  $result=$this->db->where('study_level_id',$study_level)->get('course')->result();        
	
   }
   function get_subject($course_id="")
{
	return  $result=$this->db->where('status',1)->where('from_level_id',$course_id)->get('subjects')->result();        
            
   }
   function get_demo_class()
{
	$student_id=$this->session->userdata('user_id');
	$student_id=$this->db->where('id',$student_id)->get('student')->row()->generated_id;
	return  $result=$this->db->where('student_id',$student_id)->get('demo_student_link')->result();        
            
   }
   
   function get_users_list()
{
	$student_id=$this->session->userdata('user_id');
	$student_id=$this->db->where('id',$student_id)->get('student')->row()->generated_id;
	$class_id = $this->db->where('student_id',$student_id)->get('demo_student_link')->row()->class_id;
	$result= $this->db->where('class_id',$class_id)->get('demo_class_table')->result();
	
	foreach($result as $row){
		$id=$row->tutor_id;
		 $row->user = $this->db->where('generated_id',$id)->get('tutor')->row();
		}
		
		return $result;
          
   }
   function get_levels($study_level_id="")
{
	$this->db->select('from_level.*');
	$this->db->from('from_level');
	$this->db->where('from_level.study_level_id',$study_level_id);	
	return $result = $this->db->get()->result();	
            
   }
   
function student_page_status($table='',$id="",$page="")
{
	return  $result=$this->db->where('student_id',$id)->get($table)->row()->$page;
        
            
   }
   function student_qualification_data($table="",$id="")
{
	
	return  $result=$this->db->where('student_id',$id)->get($table)->result();
         
   }
   function admin_status($table='',$id="")
{
	return  $result=$this->db->where('id',$id)->get($table)->row()->admin_status;
        
            
   }
   
   function student_data($id="")
{
	//echo $id;die;
	return  $result=$this->db->where('id',$id)->get('student')->row();
         
   }
   function get_student_data($table='',$id="")
{
	   	
	return  $result=$this->db->where('student_id',$id)->get($table)->row();
        
            
   }
   function levels_id($table="",$id="")
{
	return  $result=$this->db->where('id',$id)->get($table)->row()->from_level;       
            
   }
   function get_study_level($id="")
{
	return  $result=$this->db->where('id',$id)->get('study_level')->row()->study_level;        
            
   }
   
   
   function study_level_first_id($table="",$sid="",$cid="")
{
				$from_id =$this->db->where('study_level_id',$sid)->where('course_generate_id',$cid)->get($table)->row()->from_level_id;        
        return    $result = $this->db->where('id',$from_id)->get('from_level')->row()->from_level;
   }
   function study_level_last_id($table="",$sid="",$cid="")
{
				$to_id =$this->db->where('study_level_id',$sid)->where('course_generate_id',$cid)->get($table)->row()->to_level_id;
        return  $result = $this->db->where('id',$to_id)->get('from_level')->row()->from_level;
            
   }
   function get_course_gid($id="")
{
	return  $result=$this->db->where('url_slug',$id)->get('course')->row()->course_generate_id;
}
   function get_course_urlslug($id="")
{
	return  $result=$this->db->where('course_generate_id',$id)->get('course')->row()->url_slug;
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
   
   
   function student_subject_data($table='',$student_id)
{
	   	
	return  $result=$this->db->where('student_id',$student_id)->get($table)->result();
          
   }
   function check_subject_id_update_data($table='',$subject_id='' ,$id="")
{	
	$student_id=$this->session->userdata('user_id');
	if ($id) {
               $this->db->where("id!=$id");
           }
		   $this->db->where('student_id',$student_id)->where('subject_id',$subject_id);
	$result=$this->db->get($table);
	
	if($result->num_rows() > 0){
		return "success";
	}else{
		return "failure";
	}       
            
   }
   function student_ratings($table='',$student_id)
{
	$this->db->select('tutor.name,tutor.generated_id,tutor_ratings.*');
	$this->db->from('tutor_ratings');
	$this->db->where('tutor_ratings.student_id',$student_id);
	$this->db->where('tutor_ratings.admin_status',1);
	$this->db->join('tutor','tutor.id = tutor_ratings.tutor_id');	
	return $result = $this->db->get()->result();  	
	    
   }
   
   
   
   
    function student_inbox_messages($table='',$student_id)
{
	$this->db->select('tutor.name,tutor.generated_id,tutor_messages.message');
	$this->db->from('tutor_messages');
	$this->db->where('tutor_messages.student_id',$student_id);
	$this->db->where('tutor_messages.admin_status',1);
	$this->db->join('tutor','tutor.id = tutor_messages.tutor_id');	
	return $result = $this->db->get()->result();  	
	
          
   }
   function student_sent_messages($table='',$student_id)
{
	   	
	$this->db->select('tutor.name,tutor.generated_id,student_messages.message');
	$this->db->from('student_messages');
	$this->db->where('student_messages.student_id',$student_id);
	//$this->db->where('student_messages.admin_status',1);
	$this->db->join('tutor','tutor.id = student_messages.tutor_id');	
	return $result = $this->db->get()->result();
          
   }
   function subject_edit_data($table='',$subject_id)
{
	 
	 $student_id=$this->session->userdata('user_id'); 	
	return  $result=$this->db->where('student_id',$student_id)->where('subject_id',$subject_id)->get($table)->row();
		//$id=$this->db->where('subject_course_id',$subject_id)->get($table)->row()->id;
	//return  $result=$this->db->where('id',$id)->get($table)->row();
        
            
   }
   function get_subject_url($id="")
{
	return  $result=$this->db->where('subject_generate_id',$id)->get('subjects')->row()->subject_url_slug;      
            
   }
   function get_subject_id($url="")
{
	return  $result=$this->db->where('subject_url_slug',$url)->get('subjects')->row()->subject_generate_id;      
            
   }

	function get_data($table='')
{
	return  $result=$this->db->get($table)->result();
        
            
   }
   function get_active_data($table='')
{
	return  $result=$this->db->where('status',1)->get($table)->result();
        
            
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
   
   function insert($table='', $data)
{
	return  $result=$this->db->insert($table,$data);
        
            
   }
   
    function update($table='',$data='', $where='')
{
  
   return $result  = $this->db->update($table, $data, $where);
    
  } 
  function delete_data($table='', $where='')

  {
    return  $result=$this->db->delete($table,$where);
        
  } 
   function join_demo(){
	    /*$this->db->select('ad_post.*,ad_post_images.ad_post_id,ad_post_images.image');
        $this->db->from($table);
        $this->db->limit(12);
        $this->db->order_by('ad_post.id','desc');
        $this->db->where('ad_post.current_status','Active');
        $this->db->join('ad_post_images','ad_post_images.ad_post_id = ad_post.id'); 
        $this->db->join('ad_post_personal_information','ad_post_personal_information.ad_post_id = ad_post.id');          
        $this->db->join('city','city.id = ad_post_personal_information.city_id');
        $this->db->group_by('ad_post_images.ad_post_id');*/
		
   }

}
?>
