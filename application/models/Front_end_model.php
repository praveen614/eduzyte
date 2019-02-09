<?php

class Front_end_model extends CI_model {


function get_session_name()
{
	if($this->session->userdata('user_status')==1)
	{
		$id=$this->session->userdata('user_id');
		$table=$this->session->userdata('user_type');
		$user = $this->db->where('id',$id)->get($table)->row();
		return $name=ucfirst($user->name);
		}else{
			return $name="Guest";
			}


   }
	 function tutor_multi_data($table="",$id=""){
		 return $this->db->where('tutor_id',$id)->get($table)->result();
	 }
	 function get_degree_name($id=""){
		 return $this->db->where('id',$id)->get('degree')->row()->degree;
	 }
	 function subject_data($sid="",$fid=""){	
		 $data['subject'] = $this->db->where('subject_generate_id',$sid)->get('subjects')->row()->subject;
		 $data['from_level'] = $this->db->where('id',$fid)->get('from_level')->row()->from_level;		 
		 return $data;
	 }
	 function footer_subject(){
		$this->db->select('subjects.*,from_level.from_level');
		$this->db->from('subjects');		
		$this->db->join('from_level','subjects.from_level_id = from_level.id','left');
		$this->db->order_by('id', 'RANDOM');
        $this->db->limit(10);
		$this->db->group_by('subjects.subject');		
		return  $result=$this->db->get()->result(); 
	 }
	 function tuter_subject($id=""){
		$this->db->select('subjects.*,from_level.from_level');
		$this->db->from('subjects');		
		$this->db->join('from_level','subjects.from_level_id = from_level.id','left');
		$this->db->order_by('id', 'RANDOM');
        $this->db->limit(10);
		$this->db->group_by('subjects.subject');		
		return  $result=$this->db->get()->result(); 
	 }



   function single_tutor_data($table='', $where=''){

	   $this->db->select('tutor.*,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,
	   tutor_personal_profile.dob,tutor_personal_profile.gender,tutor_personal_profile.city,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,
		tutor_teaching.teaching_expertise,tutor_teaching.teaching_approach,
		degree.degree');
		$this->db->from('tutor');
		$this->db->where($where);
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_subjects','tutor.id = tutor_subjects.tutor_id','left');
		$this->db->join('tutor_teaching','tutor.id = tutor_teaching.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		$this->db->group_by('tutor_degree.tutor_id');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->row();
   }
function get_generate_id($table='',$generate_id)
{

	return  $result=$this->db->where('generated_id',$generate_id)->get($table);


   }
   function get_filter_tutor()
	{

     if(count($this->input->get_post('country'))>0){
			$this->db->where_in('tutor_personal_profile.country_id', $this->input->get_post('country'));
		}

		if($this->input->get_post('course') !=''){
			$this->db->where_in('tutor_subjects.subject_id', $this->input->get_post('course'));
		}
		 if($this->input->get_post('gender')){
			$this->db->where_in('tutor_personal_profile.gender', $this->input->get_post('gender'));
		}
		if($this->input->get_post('experience')){
			$this->db->where_in('tutor_teaching.total_experience', $this->input->get_post('experience'));
		}
		if($this->input->get_post('age')){
		$age = $this->input->get_post('age');
		for($i=0;$i<count($age);$i++){
			//echo count($age);
			if(count($age)==1){
			if($age[$i] == '18'){
				$first_date=date('Y-m-d', strtotime('-18 years'));
				$second_date=date('Y-m-d', strtotime('-30 years'));
				$sql="";
				$this->db->where("(tutor_personal_profile.dob >= '".$second_date."' and tutor_personal_profile.dob <= '".$first_date."')");
				//$this->db->where("tutor_personal_profile.dob BETWEEN '".$second_date."' AND '".$first_date."'");
				//$this->db->where('tutor_personal_profile.dob >=', $second_date);
			}
			if($age[$i] == '45'){
				$first_date=date('Y-m-d', strtotime('-31 years'));
				$second_date=date('Y-m-d', strtotime('-45 years'));
				$this->db->where("(tutor_personal_profile.dob >= '".$second_date."' and tutor_personal_profile.dob <= '".$first_date."')");
				//$this->db->where("tutor_personal_profile.dob BETWEEN '".$second_date."' AND '".$first_date."'");
				//$this->db->where('tutor_personal_profile.dob >=', $second_date);
			}
			if($age[$i] == '46'){
				$first_date=date('Y-m-d', strtotime('-46 years'));
				$this->db->where('tutor_personal_profile.dob <=', $first_date);
			}
			}
			if(count($age)==2){
				if($age[1]==46 && $age[0] != 18){
					$age[0] = 31;
					$age[1] = 100;
				}
				if($age[1]==46 && $age[0] == 18){
					$age[0] = 18;
					$age[1] = 100;
				}

				echo $age[0].$age[1];
				echo $first_date=date('Y-m-d', strtotime('-'.$age[0].'years'));
				echo $second_date=date('Y-m-d', strtotime('-'.$age[1].'years'));
				$this->db->where("tutor_personal_profile.dob BETWEEN '".$second_date."' AND '".$first_date."'");
				break;
				//$this->db->where("(tutor_personal_profile.dob >= '".$second_date."' and tutor_personal_profile.dob <= '".$first_date."')");
			}
			if(count($age)==3){
				$first_date=date('Y-m-d', strtotime('-18 years'));
				$second_date=date('Y-m-d', strtotime('-60 years'));
				$this->db->where("tutor_personal_profile.dob BETWEEN '".$second_date."' AND '".$first_date."'");
				break;
				//$this->db->where("(tutor_personal_profile.dob >= '".$second_date."' and tutor_personal_profile.dob <= '".$first_date."')");
			}

		}
		}

		$this->db->select('tutor.generated_id,tutor.created_at,tutor.id,tutor.name,tutor.generated_id,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,profile_image,tutor_personal_profile.dob,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,degree.degree');
		$this->db->from('tutor');
		$this->db->where('tutor.admin_status','1');
		$this->db->where('tutor.block_status','1');
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_subjects','tutor.id = tutor_subjects.tutor_id','left');
		$this->db->join('tutor_teaching','tutor.id = tutor_teaching.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		$this->db->group_by('tutor_degree.tutor_id');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->result();


   }
   function get_tutors_course($course_id="")
	{
		$this->db->select('tutor.id,tutor.created_at,tutor.name,tutor.generated_id,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,degree.degree');
		$this->db->from('tutor');
		$this->db->where('tutor.admin_status','1');
		$this->db->where('tutor.block_status','1');
		$this->db->where('tutor_subjects.from_level_id',$course_id);
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		$this->db->join('tutor_subjects','tutor.id = tutor_subjects.tutor_id','left');		
		$this->db->group_by('tutor_subjects.tutor_id');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->result();


   }
   function get_f_search() {
	    
		$this->db->order_by('subject_id','DESC');
		$this->db->limit(5);
		$this->db->group_by('subject_id');
		$query=$this->db->get('frequently_searched');
		return $query->result();
		
	   }
   
   
   function get_tutors_subject($subject_id="")
	{
		$this->db->select('tutor.id,tutor.created_at,tutor.name,tutor.generated_id,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,degree.degree');
		$this->db->from('tutor');
		$this->db->where('tutor.admin_status','1');
		$this->db->where('tutor.block_status','1');
		$this->db->where('tutor_subjects.subject_id',$subject_id);
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		$this->db->join('tutor_subjects','tutor.id = tutor_subjects.tutor_id','left');		
		$this->db->group_by('tutor_subjects.tutor_id');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->result();


   }


   function get_tutors($table='')
	{
		$this->db->select('tutor.id,tutor.created_at,tutor.name,tutor.generated_id,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,degree.degree');
		$this->db->from('tutor');
		$this->db->where('tutor.admin_status','1');
		$this->db->where('tutor.block_status','1');
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		//$this->db->group_by('tutor_subjects.tutor_id');
		$this->db->group_by('tutor_degree.tutor_id');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->result();


   }
   function get_shortlist_by_id($id="")
	{
		$this->db->select('tutor.id,tutor.name,tutor.generated_id,tutor_personal_profile.profile_image,tutor_personal_profile.first_name,
		tutor_degree.degree_id,tutor_degree.institution,tutor_degree.specialization,degree.degree');
		$this->db->from('tutor');
		$this->db->where('tutor.admin_status','1');
		$this->db->where('tutor.id',$id);
		$this->db->join('tutor_personal_profile','tutor.id = tutor_personal_profile.tutor_id','left');
		$this->db->join('tutor_degree','tutor.id = tutor_degree.tutor_id','left');
		$this->db->join('degree','tutor_degree.degree_id = degree.id','left');
		//$result=$this->db->get();
		//echo $this->db->last_query();die;
		return  $result=$this->db->get()->row();

   }
   function get_levels($study_level_id="")
{
	  $this->db->select('from_level.*');
	  $this->db->from('from_level');
	  $this->db->where('from_level.study_level_id',$study_level_id);  
	  return $result = $this->db->get()->result();

   }
   function get_subject($course_id="")
{
  return  $result=$this->db->where('from_level_id',$course_id)->get('subjects')->result();        
            
   }
   function get_course($study_level="",$from_level="",$to_level="")
{
	return  $result=$this->db->where('study_level_id',$study_level)->where('from_level_id',$from_level)->where('to_level_id',$to_level)->get('course')->result();

   }

	function get_data($table='')
	{
	return  $result=$this->db->get($table)->result();

   }
   function get_active_data($table='')
	{
	return  $result=$this->db->where('status','1')->get($table)->result();

   }

   function get_testimonial($table='')
{
  return  $result=$this->db->order_by('id','desc')->get($table)->result();


   }

   function get_home_faq($table='')
{
  return  $result=$this->db->where('home_status',1)->order_by('priority','asc')->get($table)->result();


   }

   function get_tutor_faq($table='')
{
  return  $result=$this->db->where('tutor_status',1)->order_by('priority','asc')->get($table)->result();

   }

   function search_tutor_faq($table='', $question='')
{

  return  $result=$this->db->where('tutor_status',1)->like('question', $question)->get($table)->result();

   }

   function get_tutor_subfaq($table='')
{
  return  $result=$this->db->where(array('tutor_status'=>1,'faq_id'=>0))->order_by('priority','asc')->get($table)->result();


   }

   function get_student_faq($table='')
{
  return  $result=$this->db->where('student_status',1)->order_by('priority','asc')->get($table)->result();

   }

   function search_student_faq($table='', $question='')
{

  return  $result=$this->db->where('student_status',1)->like('question', $question)->get($table)->result();

   }

   function get_student_subfaq($table='')
{
  return  $result=$this->db->where(array('student_status'=>1,'faq_id'=>0))->order_by('priority','asc')->get($table)->result();


   }

   function get_single_data($table='')
{
  return  $result=$this->db->get($table)->row();


   }

   function user_insert($table='',$data='')
  {
  return  $result=$this->db->insert($table,$data);

   }

   function delete($table='',$where='')
  {
    $result=$this->db->delete($table,$where);
    if($result)
      return "success";
    else
      return "fail";
   }

function insert($table='',$data='')
{
 return $result=$this->db->insert($table,$data);

}

   function update($table='',$data='', $where='')
{


   return $result  = $this->db->update($table, $data, $where);

  }
  function email_mobile_chk($table='',$email)
{
	    $result = $this->db->where("(email = '$email' OR mobile = '$email')")->get($table)->row();
			$count=count($result);
			if($count == 1){
				return TRUE;
			}else{
				return FALSE;
			}
      

   }

  function login_chk($table='',$email,$password)
{
	    $this->db->where("(email = '$email' OR mobile = '$email')");
        $this->db->where('password', $password);
      return  $result=$this->db->get($table);

   }
   function get_otp($table='',$id='')
{
	return  $result=$this->db->where('id',$id)->get($table)->row()->otp;


   }



   function get_system($table='')
{
	return  $result=$this->db->get($table)->result();


   }
   function get_terms_data($table='',$id='')
{
  return  $result=$this->db->where('id',$id)->get($table)->row();


   }

   function get_row_data($table='',$id='')
{
  return  $result=$this->db->where('id',$id)->get($table)->row();


   }

   function get_url_data($table='',$url='')
{
  return  $result=$this->db->where('seo_url',$url)->get($table)->row();


   }

   function get_post_id($table='',$url='')
{
  return  $result=$this->db->where('seo_url',$url)->get($table)->row()->id;


   }

   function get_post_url($table='',$id='')
{
  return  $result=$this->db->where('id',$id)->get($table)->row()->seo_url;


   }

   function forget_password($table='',$email="")
{

	   $query = $this->db->where("(email = '$email' OR mobile = '$email')")->get($table);
      if($query->num_rows() >0){
		  return "success";
	  }else{
		 return "failure";
	  }
}
	  function change_password($table='',$password="" ,$id="")
{
		$old_password=md5($password);
	   $query = $this->db->where('id',$id)->where('password',$old_password)->get($table);
      if($query->num_rows() >0){
		  return "success";
	  }else{
		 return "failure";
	  }

   }
   function get_user_email($table='',$email="")
{
	  return $result = $this->db->where("(email = '$email' OR mobile = '$email')")->get($table)->row();


   }
   function get_request_data($tutor_id="")
{

		$student_id=$this->session->userdata('user_id');
		$result1 = $this->db->where('request_tutor_id',$tutor_id)->where('student_id',$student_id)->get('student_request_class')->result();
		//echo $this->db->last_query();die;
		//print_r($result1);die;
			if(count($result1) > 0){
				return 1;
			}else{
				return 0;
			}
}
   function get_shortlist_data()
{
		$student_id=$this->session->userdata('user_id');
		$result = $this->db->where('student_id',$student_id)->get('student_shortlist');
			if(count($result) > 0){
				return "have";
			}else{
				return "empty";
			}


   }
   function get_shortlist_tutor()
{
		$student_id=$this->session->userdata('user_id');
		return $result = $this->db->where('student_id',$student_id)->get('student_shortlist')->result();



   }
   function get_subject_name($id=""){

	  return $this->db->where('subject_generate_id',$id)->get('subjects')->row()->subject;
   }






 }

	?>
