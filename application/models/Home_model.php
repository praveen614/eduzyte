<?php

class Home_model extends CI_model {

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
function class_student_list($table="",$cid=''){
	return $this->db->where('class_id',$cid)->get($table)->result();	  
	
}
function get_email_gen_id($table="",$gid=''){
	return $this->db->where('generated_id',$gid)->get($table)->row()->email;	  
	
}

function get_tutor_name($tutor_id=''){
	return $this->db->where('id',$tutor_id)->get('tutor')->row()->name;	  
	 
}

function get_generate_id($table="",$id=''){
	

  $this->db->where('id',$id)->get($table);//->row()->generated_id;   
  return $this->db->last_query();
}

function get_student_name($student_id=''){ 
	return $this->db->where('id',$student_id)->get('student')->row()->name;  
	
}

function course_by_subject($tutor_id='',$subject_id=''){
	$course_id = $this->db->where('tutor_id',$tutor_id)->where('subject_id',$subject_id)->get('tutor_subjects')->row()->subject_course_id;
	return  $this->sub_course_name($course_id);
	
}
function get_student_data($table='')
{   
		
			$query = $this->db->query('SELECT * FROM student where id in (select student_id from student_steps where page_1 =1 AND page_2 =1 AND page_3 =1)');
			
		       return $query->result();            
   }
   function incomplete_student_data($table='')
{   
		
			$query = $this->db->query('SELECT * FROM student where id in (select student_id from student_steps where page_1 =1 AND (page_2=0 OR page_3=0))');
			
		       return $query->result();            
   }
   
   
   function get_tutor_data($table='')
{   
		
    $query = $this->db->query('SELECT * FROM tutor where id in (select tutor_id from tutor_steps where page_1 =1 AND page_2 =1 AND page_3 =1 AND page_4 =1 AND page_5 =1)');
			
		       return $query->result(); ;        
            
   }
   
   function incopmlete_tutor_data($table='')
{   
	// $query = $this->db->query('SELECT * FROM tutor where id in (select tutor_id from tutor_steps where page_1 =0 OR page_2 =0 OR page_3 =0 OR page_4 =0 OR page_5 =0))');	
    $query = $this->db->query('SELECT * FROM tutor where id in (select tutor_id from tutor_steps where page_1 =1 AND (page_2 =0 OR page_3 =0 OR page_4 =0 OR page_5 =0))');
			
		       return $query->result(); ;        
            
   }
   
   function table_type($table_id="")
{   
		
     $table_type = substr($table_id,0,1);
if($table_type =="s"){
	return $table="subject";
	
}if($table_type =="c"){
	return $table="course";
	   
            
   }
}
function sub_course_name($table_id="")
{		

     $table_type = substr($table_id,0,1);
if($table_type =="s"){	
   
	return $data = $this->db->where('subject_generate_id',$table_id)->get('subjects')->row()->subject;
}
if($table_type =="c"){	
	
	return $data = $this->db->where('course_generate_id',$table_id)->get('course')->row()->course;     
            
   }
}

function get_group_subject()
{
     return   $result=$this->db->where('status',1)->group_by('subject')->get('subjects')->result();        
            
   }
function get_data($table='')
{
     return   $result=$this->db->get($table)->result();        
            
   }

   function get_active_data($table='')
{
     return   $result=$this->db->where('admin_status',1)->get($table)->result();        
            
   }
   function get_to_expire($table='')
{ 
    $date=date('Y-m-d', strtotime('+1 days'));
      
   $query = $this->db->where('end_date',$date)->get($table);
   if($query->num_rows()>0){
      $result = $query->result();
      foreach($result as $row){
        return  $this->db->where('class_id',$row->class_id)->get('demo_class_table')->result();    
   }}else{
	return $data=array();
   }       
            
   }
   function get_expired($table='')
{
      $date=date('Y-m-d');      
      $query = $this->db->where('end_date<',$date)->get($table);
      $result = $query->result();
      foreach($result as $row){
        return  $this->db->where('class_id',$row->class_id)->get('demo_class_table')->result();    
      }
            
   }
   function get_to_expire_main($table='')
	{ 
		$date=date('Y-m-d', strtotime('+1 days'));
		
	   $query = $this->db->where('end_date',$date)->get($table);   
	   if($query->num_rows() > 0){
		  $result = $query->result();
		  foreach($result as $row){
			return  $this->db->where('class_id',$row->class_id)->get('main_class_table')->result();    
		  }       
	   }else{
	   return $data=array();
	   }     
	   }
   function get_expired_main($table='')
{
      $date=date('Y-m-d');
      
      $query = $this->db->where('end_date<',$date)->get($table);
      $result = $query->result();
      foreach($result as $row){
        return  $this->db->where('class_id',$row->class_id)->get('main_class_table')->result();    
      }
            
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







function insert($table='',$data='')
{
	$result=$this->db->insert($table,$data);
        if($result)
            return "success";
        else
            return "error";
}


/*
function user_data($table='',$user_id="")
{
  
        $this->db->select('user.*,city.city');
        $this->db->from($table);
        $this->db->join('city','city.id = user.city_id');
       
        
        return $result=$this->db->get()->result_array();
        
            
   }
   
   function user_ad_data($table='',$user_id="")
{
  $this->db->select('ad_post.*,categories.name,ad_post_images.ad_post_id,ad_post_images.image,ad_post_personal_information.mobile,ad_post_personal_information.expire_date,ad_post_personal_information.city_id,city.city');
        $this->db->from($table);        
        $this->db->where('ad_post.user_id',$user_id);
        $this->db->where('ad_post.user_type','user');
        $this->db->join('ad_post_images','ad_post_images.ad_post_id = ad_post.id');
        $this->db->join('categories','categories.id = ad_post.category_id'); 
        $this->db->join('ad_post_personal_information','ad_post_personal_information.ad_post_id = ad_post.id');          
        $this->db->join('city','city.id = ad_post_personal_information.city_id');
        $this->db->group_by('ad_post_images.ad_post_id');
        
        return $result=$this->db->get()->result_array();
        
            
   }


function active_ads_list($table='',$user_id="")
{
 
        $this->db->select('ad_post.*,ad_post_images.ad_post_id,ad_post_images.image,ad_post_personal_information.mobile,ad_post_personal_information.expire_date,ad_post_personal_information.city_id,city.city');
        $this->db->from($table);        
        $this->db->where('ad_post.current_status','Active');
        $this->db->join('ad_post_images','ad_post_images.ad_post_id = ad_post.id'); 
        $this->db->join('ad_post_personal_information','ad_post_personal_information.ad_post_id = ad_post.id');          
        $this->db->join('city','city.id = ad_post_personal_information.city_id');
        $this->db->group_by('ad_post_images.ad_post_id');
        
        return $result=$this->db->get()->result_array();
        
            
   } 

   function get_feature_data($table='')
{
         $this->db->select('featured_ads.ad_post_id,ad_post.id,ad_post.ad_title,ad_post.ad_cost,ad_post_images.ad_post_id,ad_post_images.image,ad_post_personal_information.city_id,city.city');
         $this->db->from('featured_ads');        
         $this->db->join('ad_post','ad_post.id = featured_ads.ad_post_id');  
         $this->db->join('ad_post_images','ad_post_images.ad_post_id = ad_post.id'); 
         $this->db->join('ad_post_personal_information','ad_post_personal_information.ad_post_id = ad_post.id');          
         $this->db->join('city','city.id = ad_post_personal_information.city_id');
         $this->db->group_by('ad_post_images.ad_post_id');
          
          $result=$this->db->get()->result_array();
        return $result;

 
            
   } */




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



function upload_delete($table='',$where='')
{
  $unlink =$this->db->select('image')->get($table, $where)->row_array();
  unlink("uploads/image_path/".$unlink['image']);
  $result=$this->db->delete($table,$where);
        if($result)
            return "success";
        else
            return "error";
}






}
?>