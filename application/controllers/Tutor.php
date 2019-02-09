<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {
    
    function __construct()
  {
    parent::__construct();
    $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('send_email');
        $this->load->model('Front_end_model');
        $this->load->model('Home_model');
		$this->load->model('Tutor_model');
		$this->load->model('Student_model');
        $this->load->model('users');
        $this->load->library('pagination');
        $this->load->library('email');
        $this->load->helper('captcha_helper');

         if($this->session->userdata('user_status') != 1)
			 redirect('existing_user');
    // error_reporting(0);
   // header("Access-Control-Allow-Origin: *");
    }
	
	//http://free.currencyconverterapi.com/api/v5/convert?q=USD_INR&compact=y
	
	public function converter($money ="") {		 
				
				 //$data_string = http_build_query($data);
				 							 
				 $url="http://free.currencyconverterapi.com/api/v5/convert?q=USD_INR&compact=y";	

				 $ch = curl_init();
				 
				 if (!$ch) {
					 die("Couldn't initialize a cURL handle");
				 }
				 $ret = curl_setopt($ch, CURLOPT_URL, $url);
				 $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				 $curlresponse = curl_exec($ch); // execute      	   
				 $data=json_decode($curlresponse);  
				 
				  $data= $data->USD_INR;
				  echo $data->val*$money;
				 
             if (curl_errno($ch))
             //echo 'curl error : ' . curl_error($ch);
                 if (empty($ret)) {
                     // some kind of an error happened
                    // die(curl_error($ch));
                     curl_close($ch); // close cURL handler
					} else {
                     //$info = curl_getinfo($ch);
                     print_r($info);
                     curl_close($ch); // close cURL handler
                 }
      }
	
	
	private function upload_file($file_name)
    {
      //ini_set('upload_max_filesize', '30480000');
            $upload_path1 = "uploads/tutor_documents/";
            $config1['upload_path'] = $upload_path1;
            $config1['allowed_types'] = "*";
            $config1['max_size'] = "304800000";
            $img_name1 = strtolower($_FILES[$file_name]['name']);
            $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
            $config1['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name1;
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            $this->upload->do_upload($file_name);
            $fileDetailArray1 = $this->upload->data();         

            return $fileDetailArray1['file_name'];
    }
	
	
	function get_from_level($study_level_id="")
    {
		
			echo  '<option value="">--Select Level--</option>'; 
						
			$levels= $this->Tutor_model->get_levels($study_level_id);
			foreach ($levels as $row1) {				
				
            echo '<option value="' . $row1->id . '" >' . $row1->from_level . '</option>';
			}
       
    
    } 
	function get_to_level($study_level_id="")
    {
		
			echo  '<option value="">--Select To Level--</option>';     
						
			$levels= $this->Tutor_model->get_levels($study_level_id);
			foreach ($levels as $row1) {
            echo '<option value="' . $row1->id . '">' . $row1->from_level . '</option>';
			}
       
    
    } 
	function get_course()
    {
		$study_level_id= $this->input->get_post('study_level_id');
		$from_level = $this->input->get_post('from_level');
		$to_level = $this->input->get_post('to_level');
		$course= $this->Tutor_model->get_course($study_level_id,$from_level,$to_level);
			echo  '<option value="">--Select Course--</option>'; 
			foreach ($course as $row) {
            echo '<option value="' . $row->course_generate_id . '">' . $row->course . '</option>';
			}     
    
    }
function get_subject()
    {
		
		$course_id = $this->input->get_post('course_id');
		$subject= $this->Tutor_model->get_subject($course_id);
				echo  '<option value="">--Select Subjects--</option>';
			foreach ($subject as $row) {
            echo '<option value="' . $row->subject_generate_id . '">' . $row->subject . '</option>';
			}     
    
    }	
	
	function tutor_page_check(){
	
    		    $id = $this->session->userdata('user_id');
				$where['tutor_id'] = $id;
				$result=$this->Tutor_model->get_id_data('tutor_steps',$where);
				if($result == "success") {
					$page_status1 = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_1');
					$page_status2 = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_2');
					$page_status3 = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_3');
					$page_status4 = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_4');
					$page_status5 = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_5');
					$final_status = $this->Tutor_model->tutor_page_status('tutor_steps',$id,'page_status');
					if($page_status1 == 0){
						redirect('tutor_personal_information');
					}if($page_status2 == 0){
						redirect('tutor_subject');
					}if($page_status3 == 0){
						redirect('tutor_qualifications');
					}if($page_status4 == 0){
						redirect('tutor_teaching');
					}if($page_status5 == 0){
						redirect('tutor_time_slot');
					}if($final_status == 1){
						redirect('tutor_dashboard');
					}else{
						redirect('tutor_final_step');
					}
				}else{
					redirect('tutor_page');
				}
				
    	}

	
	
	function content_page(){
		if($this->input->post()){
					$data=array('tutor_id'=>$this->input->post('user_id'));
				  
				  $result=$this->Tutor_model->insert('tutor_steps',$data);
					if($result){						
						redirect('tutor_personal_information');
					}
		}
		
		    $page_data['page_name']  = 'profile_email_message_content';
			$page_data['page_title'] = 'Welocome';
			$this->load->view('frontend/index', $page_data);
	}
	function personal_information(){
	    $id = $this->session->userdata('user_id');
	    $admin_status=$this->db->where('id',$id)->get('tutor')->row()->admin_status;
	        if($admin_status == 1)
	            redirect('tutor_subject');
	    
		      if($this->input->post()){			 
					
				  $id=$this->input->post('user_id');
				  $where['tutor_id']=$id;
				  $page_status = $this->Tutor_model->get_id_data('tutor_personal_profile',$where);
				  if($page_status=="failure"){			
					
					  
					$this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('last_name', 'Last name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
					$this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('gender', 'gender', 'required');
                    $this->form_validation->set_rules('dob', 'Date of birth', 'required');
					$this->form_validation->set_rules('address_1', 'address', 'required');
                    $this->form_validation->set_rules('city', 'city name', 'required');
                    $this->form_validation->set_rules('zip_code', 'zip_code', 'required');
					$this->form_validation->set_rules('skype_id', 'skype_id', 'required');                   
					
					if ($this->form_validation->run() == FALSE)
                {
						$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
						$id = $this->session->userdata('user_id');
						$page_data['saved_data']  = $this->Tutor_model->tutor_data($id);
						$page_data['govt_id']  = $this->Tutor_model->get_active_data('govt_id_prof');
						$page_data['address_id']  = $this->Tutor_model->get_active_data('address_prof');
						$page_data['country']  = $this->Tutor_model->get_active_data('country');
						$page_data['page_name']  = 'profile_personal_inormation_step';
						$page_data['page_title'] = 'personal information';
						$this->load->view('frontend/index', $page_data);  
                
        		}else{
					
					if(empty($_POST['web_file']) && $_FILES['user_file']['name']==""){
						$webfile= '';
					}else{
						if(!empty($_POST['web_file'])){
						$img = $_POST['web_file'];
						$folderPath = "uploads/tutor_profile/";
					  
						$image_parts = explode(";base64,", $img);
						$image_type_aux = explode("image/", $image_parts[0]);
						$image_type = $image_type_aux[1];
					  
						$image_base64 = base64_decode($image_parts[1]);
						$fileName = uniqid() .time(). '.jpg';
					  
						$file = $folderPath . $fileName;
						file_put_contents($file, $image_base64);
						 $webfile= $fileName;
													 
						
					}else{
						    $config['upload_path']          = 'uploads/tutor_profile/';
                            $config['allowed_types']        = '*';      
                            $config['max_size'] = "204800000";
            
                            $img_name1 = strtolower($_FILES['user_file']['name']);
                            $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
                            $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name1;
                            
                            $this->upload->initialize($config);
                            $upload=$this->upload->do_upload('user_file');
                            $uploadData = $this->upload->data();
                            $webfile = $uploadData['file_name'];
						 
					}						
					}				
					
								
					
					if($this->input->post('skip_govt_id') == '0'){
					    $skip_govt_id = 0;						
					}else{
					    $skip_govt_id = 1;						
					}
					if($this->input->post('pan_status') == '0'){
					    $pan_status = 0;						
					}else{
					    $pan_status = 1;						
					}
					
					if($this->input->post('skip_address_prof') == '0'){
						$skip_address_prof=0;
					}else{
						$skip_address_prof=1;
					}
					
					if($skip_govt_id == 0){
						$govt_id_prof_file="";
					}else if($skip_govt_id == 1){
						$govt_id_prof_file= $this->upload_file('govt_id_prof_file');
					}
					
					if($skip_address_prof == 0){						
						$address_prof_file="";					    
					}else if($skip_address_prof == 1){						
						$address_prof_file= $this->upload_file('address_prof_file');				    
						 
					}
					
					$data = array(
					   'tutor_id'=>$this->input->post('user_id'),
					   'title'=>$this->input->post('title'), 
					   'first_name'=>$this->input->post('first_name'),
					   'last_name'=>$this->input->post('last_name'),
					   'display_name'=>$this->input->post('display_name'), 
					   'gender'=>$this->input->post('gender'),
					   'dob'=>$this->input->post('dob'),
					   'govt_id_prof_id'=>$this->input->post('govt_id_prof_id'),
					   'govt_id_prof_file'=>$govt_id_prof_file,
					   'skip_govt_id'=>$skip_govt_id,
					   'pan_card'=>$this->input->post('pan_card'),
					   'pan_status'=>$pan_status,
					   'address_1'=>$this->input->post('address_1'),					   
					   'city'=>$this->input->post('city'), 
					   'zip_code'=>$this->input->post('zip_code'),
					   'landmark'=>$this->input->post('landmark'),
					   'state'=>$this->input->post('state'), 
					   'country_id'=>$this->input->post('country_id'),
					   'home_town'=>$this->input->post('home_town'),
					   'address_proof_id'=>$this->input->post('address_proof_id'),
					   'address_prof_file'=>$address_prof_file,
					   'skip_address_prof'=>$skip_address_prof,
					   'mobile'=>$this->input->post('mobile'),
					   'mobile_2'=>$this->input->post('mobile_2'),
					   'whatsup_no'=>$this->input->post('whatsup_no'),
					   'skype_id'=>$this->input->post('skype_id'),
					   'email'=>$this->input->post('email'),
					   'alternative_email'=>$this->input->post('alternative_email'),					   
					   'facebook_link'=>$this->input->post('facebook_link'),
					   'twitter_link'=>$this->input->post('twitter_link'),
					   'linkedin_link'=>$this->input->post('linkedin_link'),
					   'youtube_link'=>$this->input->post('youtube_link'),
					   'profile_image'=>$webfile
					   
					    );
						//echo "<pre>";print_r($data);die;
					$result=$this->Tutor_model->insert('tutor_personal_profile',$data);
					if($result){
						$step_data=array(					        
					        'page_1'=>1
					        );
							$where['tutor_id']=$this->input->post('user_id');
					    $this->Tutor_model->update('tutor_steps',$step_data,$where);
						$this->session->set_flashdata('page_success', "Personal Information Updated");
						redirect('tutor_subject');
					}
					
				}
					  
				  }else{
					  
					  /*update*/
					  
					$this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('last_name', 'Last name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
					$this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('gender', 'gender', 'required');
                    $this->form_validation->set_rules('dob', 'Date of birth', 'required');
					$this->form_validation->set_rules('address_1', 'address', 'required');
                    $this->form_validation->set_rules('city', 'city name', 'required');
                    $this->form_validation->set_rules('zip_code', 'zip_code', 'required');
					$this->form_validation->set_rules('skype_id', 'skype_id', 'required');                   
					
					if ($this->form_validation->run() == FALSE)
                {
					$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
					$id = $this->session->userdata('user_id');			
					$page_data['tutor_data']  = $this->Tutor_model->get_tutor_data('tutor_personal_profile',$id);
					$page_data['saved_data']  = $this->Tutor_model->tutor_data($id);
					$page_data['govt_id']  = $this->Tutor_model->get_active_data('govt_id_prof');
					$page_data['address_id']  = $this->Tutor_model->get_active_data('address_prof');
					$page_data['country']  = $this->Tutor_model->get_active_data('country');
					$page_data['page_name']  = 'profile_personal_inormation_step';
					$page_data['page_title'] = 'personal information';
					$this->load->view('frontend/index', $page_data);	 
                
        		}else{
					 //echo "<pre>";print_r($_POST);
					   //print_r($_FILES);die;
					   
					  
					  if(empty($_POST['web_file']) && $_FILES['user_file']['name']==""){
						$webfile= $this->input->post('old_profile_image');
					}else{
						if(!empty($_POST['web_file'])){
						$img = $_POST['web_file'];
						$folderPath = "uploads/tutor_profile/";
					  
						$image_parts = explode(";base64,", $img);
						$image_type_aux = explode("image/", $image_parts[0]);
						$image_type = $image_type_aux[1];
					  
						$image_base64 = base64_decode($image_parts[1]);
						$fileName = uniqid() .time(). '.jpg';
					  
						$file = $folderPath . $fileName;
						file_put_contents($file, $image_base64);
						 $webfile= $fileName;
													 
						
					}else{
						    $config['upload_path']          = 'uploads/tutor_profile/';
                            $config['allowed_types']        = '*';      
                            $config['max_size'] = "204800000";
            
                            $img_name1 = strtolower($_FILES['user_file']['name']);
                            $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
                            $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name1;
                            
                            $this->upload->initialize($config);
                            $upload=$this->upload->do_upload('user_file');
                            $uploadData = $this->upload->data();
                            $webfile = $uploadData['file_name'];
						 
					}						
					}

						if($this->input->post('skip_govt_id') == '0'){
					    $skip_govt_id = 0;						
					}else{
					    $skip_govt_id = 1;						
					}
					if($this->input->post('pan_status') == '0'){
					    $pan_status = 0;						
					}else{
					    $pan_status = 1;						
					}
					
					if($this->input->post('skip_address_prof') == '0'){
						$skip_address_prof=0;
					}else{
						$skip_address_prof=1;
					}
					
					if($skip_govt_id == 0){
						$govt_id_prof_file="";
					}else if($skip_govt_id == 1){						
						if($_FILES['govt_id_prof_file']['name']==""){						
						$govt_id_prof_file=$this->input->post('old_govt_proof');
					}else{
						$govt_id_prof_file= $this->upload_file('govt_id_prof_file');
					}
					}					
					if($skip_address_prof == 0){						
						$address_prof_file="";					    
					}else if($skip_address_prof == 1){
						if($_FILES['address_prof_file']['name']==""){						
						$address_prof_file=$this->input->post('old_address_proof');
					}else{
						$address_prof_file= $this->upload_file('address_prof_file');
					}
										    
						 
						 }
					
					$data = array(					   
					   'title'=>$this->input->post('title'), 
					   'first_name'=>$this->input->post('first_name'),
					   'last_name'=>$this->input->post('last_name'),
					   'display_name'=>$this->input->post('display_name'), 
					   'gender'=>$this->input->post('gender'),
					   'dob'=>$this->input->post('dob'),
					   'govt_id_prof_id'=>$this->input->post('govt_id_prof_id'),
					   'govt_id_prof_file'=>$govt_id_prof_file,
					   'skip_govt_id'=>$skip_govt_id,
					   'pan_card'=>$this->input->post('pan_card'),
					   'pan_status'=>$pan_status,
					   'address_1'=>$this->input->post('address_1'),					   
					   'city'=>$this->input->post('city'), 
					   'zip_code'=>$this->input->post('zip_code'),
					   'landmark'=>$this->input->post('landmark'),
					   'state'=>$this->input->post('state'), 
					   'country_id'=>$this->input->post('country_id'),
					   'home_town'=>$this->input->post('home_town'),
					   'address_proof_id'=>$this->input->post('address_proof_id'),
					   'address_prof_file'=>$address_prof_file,
					   'skip_address_prof'=>$skip_address_prof,
					   'mobile'=>$this->input->post('mobile'),
					   'mobile_2'=>$this->input->post('mobile_2'),
					   'whatsup_no'=>$this->input->post('whatsup_no'),
					   'skype_id'=>$this->input->post('skype_id'),
					   'email'=>$this->input->post('email'),
					   'alternative_email'=>$this->input->post('alternative_email'),					   
					   'facebook_link'=>$this->input->post('facebook_link'),
					   'twitter_link'=>$this->input->post('twitter_link'),
					   'linkedin_link'=>$this->input->post('linkedin_link'),
					   'youtube_link'=>$this->input->post('youtube_link'),
					   'profile_image'=>$webfile
					   
					    );
						//echo "<pre>";print_r($data);die;
					$where['tutor_id']=$this->input->post('user_id');
					$result=$this->Tutor_model->update('tutor_personal_profile',$data,$where);
					if($result){
						$this->session->set_flashdata('page_success', "Personal Information Updated");
						redirect('tutor_subject');
					}
				}
					  
					  
					  
					  
                
            }
			  }
			$id = $this->session->userdata('user_id');			
			$page_data['tutor_data']  = $this->Tutor_model->get_tutor_data('tutor_personal_profile',$id);
			$page_data['saved_data']  = $this->Tutor_model->tutor_data($id);
			$page_data['govt_id']  = $this->Tutor_model->get_active_data('govt_id_prof');
			$page_data['address_id']  = $this->Tutor_model->get_active_data('address_prof');
			$page_data['country']  = $this->Tutor_model->get_active_data('country');
		    $page_data['page_name']  = 'profile_personal_inormation_step';
			$page_data['page_title'] = 'personal information';
			$this->load->view('frontend/index', $page_data);
	}
	
	
	function check_subject(){	   
			
			if(isset($_POST['subject_id'])) {
				$where['tutor_id']=$this->session->userdata('user_id');
        $where['subject_id'] = $_POST['subject_id'];
        $result=$this->Student_model->get_id_data('tutor_subjects',$where);        
        if($result=="success"){
            echo "false";
        } else {
            echo "true";
        }
    }
	
	}
	function check_back_subject(){	   
			
			if(isset($_POST['subject_id'])) {
				$where['tutor_id']=$this->session->userdata('user_id');
        $where['subject_id'] = $_POST['subject_id'];
        $result=$this->Student_model->get_id_data('tutor_subjects',$where);        
        if($result=="success"){
            echo FALSE;
        } else {
            echo TRUE;
        }
    }
	}
	
	function tutor_subject(){
           
          if($this->input->post()){				
						//print_r($_POST);die;
							$this->form_validation->set_rules('study_level_id', 'Study Level', 'required');
							$this->form_validation->set_rules('from_level_id', 'From Level', 'required');							
							$this->form_validation->set_rules('subject_id', 'Subject', 'required');							
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							$this->form_validation->set_message('degree_id','Already You Entered This Qualification');
							
							if ($this->form_validation->run() == FALSE)
                {
						//print_r($_POST);die;
						$tutor_id=$this->session->userdata('user_id');
						$page_data['study_level']  = $this->Tutor_model->get_active_data('study_level');						
						$page_data['subjects']  = $this->Tutor_model->get_active_data('subjects');
						$page_data['subjects_data']  = $this->Tutor_model->tutor_subject_data('tutor_subjects',$tutor_id);
						$page_data['page_name']  = 'profile_subject_step';
						$page_data['page_title'] = 'subjects';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					 $data=array(
							  'tutor_id'=>$this->input->post('user_id'),
							  'study_level_id'=>$this->input->post('study_level_id'),
							  'from_level_id'=>$this->input->post('from_level_id'),							  
							  'subject_id'=>$this->input->post('subject_id'),
							  'topics'=>$this->input->post('topics')
							  );
								//print_r($data);die;
							  $result=$this->Tutor_model->insert('tutor_subjects',$data);
								if($result){
									$step_data=array(					        
												'page_2'=>1
												);
												$where['tutor_id']=$this->input->post('user_id');
											$this->Tutor_model->update('tutor_steps',$step_data,$where);
									
								  $this->session->set_flashdata('page_success', "your Subjects Details Updated");
												redirect('tutor_subject');
								}
						}
                   
         
            }

                $tutor_id=$this->session->userdata('user_id');
                $page_data['study_level']  = $this->Tutor_model->get_active_data('study_level');                
                $page_data['subjects']  = $this->Tutor_model->get_active_data('subjects');
                $page_data['subjects_data']  = $this->Tutor_model->tutor_subject_data('tutor_subjects',$tutor_id);
                $page_data['page_name']  = 'profile_subject_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		function check_subject_update($subject="" ,$id=""){	  
		
								$subject_id = $subject;
								
								$result=$this->Tutor_model->check_subject_id_update_data('tutor_subjects',$subject_id,$id);
								
								if($result=="success"){
									return FALSE;
								} else {
									return TRUE;
								}
						   
							}
		
		function tutor_subject_update($subject_id=""){
           
					if($this->input->post()){
						$degree_status=$this->check_subject_update($_POST['subject_id'],$_POST['table_id']);
						if($degree_status == FALSE){						
							$this->form_validation->set_rules('subject_id', 'Subject', 'required|callback_check_subject_update',array('check_subject_update' => 'Already This Subject Exists'));
														
						}else{							
							$this->form_validation->set_rules('subject_id', 'Subject', 'required');
							
						}						
						//print_r($_POST); die;
							$this->form_validation->set_rules('study_level_id', 'Study Level', 'required');
							$this->form_validation->set_rules('from_level_id', 'From Level', 'required');							
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');							
                    if ($this->form_validation->run() == FALSE)
                {
                      // print_r($_POST);die;
						$tutor_id=$this->session->userdata('user_id');
						$subject_id1 = $this->Tutor_model->get_subject_id($subject_id);
						$page_data['study_level']  = $this->Tutor_model->get_active_data('study_level');						
						$page_data['subjects']  = $this->Tutor_model->get_active_data('subjects');
						$page_data['subjects_edit_data']  = $this->Tutor_model->subject_edit_data('tutor_subjects',$subject_id1);
						$page_data['page_name']  = 'profile_subject_step';
						$page_data['page_title'] = 'subjects';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					
					$data=array(					
					'study_level_id'=>$this->input->post('study_level_id'),
					'from_level_id'=>$this->input->post('from_level_id'),					
					'subject_id'=>$this->input->post('subject_id'),
					'topics'=>$this->input->post('topics')
					);
					
					$where['id']=$_POST['table_id'];
					$result=$this->Tutor_model->update('tutor_subjects',$data,$where);
						if($result){
							$this->session->set_flashdata('page_success', "your Subjects Details Updated");
                            redirect('tutor_subject');
						}
				}
						
							
                    
            }

				$tutor_id=$this->session->userdata('user_id');
				$subject_id1 = $this->Tutor_model->get_subject_id($subject_id);
                $page_data['study_level']  = $this->Tutor_model->get_active_data('study_level');                
                $page_data['subjects']  = $this->Tutor_model->get_active_data('subjects');
                $page_data['subjects_edit_data']  = $this->Tutor_model->subject_edit_data('tutor_subjects',$subject_id1);
                $page_data['page_name']  = 'profile_subject_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		function tutor_subject_delete($subject_id=""){
           
					
					$where['id']=$subject_id;
					$result=$this->Tutor_model->delete_data('tutor_subjects',$where);
						if($result){
							$this->session->set_flashdata('page_error', "your Subjects data Deleted");
                            redirect('tutor_subject');
						}
				
        }
		
		function check_request_course(){	   
			
			if(isset($_POST['request_course'])) {
        $where['course'] = strip_tags($_POST['request_course']);
        $result=$this->Student_model->get_id_data('course',$where);
        
        if($result=="success"){
            echo 'false';
        } else {
            echo 'true';
        }
    }
	
	}
		
		function check_request_subject(){	   
			
			if(isset($_POST['request_subject'])) {
        $where['subject'] = strip_tags($_POST['request_subject']);
        $result=$this->Student_model->get_id_data('subjects',$where);
        
        if($result=="success"){
            echo 'false';
        } else {
            echo 'true';
        }
    }
	
	}
		
        
        function request_subject(){
					if($this->input->post()){
						//print_r($_POST);die;
					    $data=array(
					          'tutor_id'=>$this->session->userdata('user_id'),
                              'study_level_id'=>$this->input->post('request_study_level_id'),
                              'from_level_id'=>$this->input->post('request_from_level_id'),	
                              'subject'=>$this->input->post('request_subject')
					        );
							
					    $result=$this->Tutor_model->insert('tutor_request_subject',$data);
						if($result){
							$this->session->set_flashdata('page_success', "your request is send to admin after admin approval it will added in This List ");
                            redirect('tutor_subject');
						}
					}
				
        }
			
			function check_degree($degree){	   
		
		$where['tutor_id']=$this->session->userdata('user_id');		
        $where['degree_id'] = $degree;
        $result=$this->Tutor_model->get_id_data('tutor_degree',$where);
        
        if($result=="success"){
            return FALSE;
        } else {
            return TRUE;
        }
   
	}
	function check_degree1(){	   
			
			if(isset($_POST['degree_id'])) {
				$where['tutor_id']=$this->session->userdata('user_id');
        $where['degree_id'] = $_POST['degree_id'];
        $result=$this->Student_model->get_id_data('tutor_degree',$where);
        
        if($result=="success"){
            echo 'false';
        } else {
            echo 'true';
        }
    }
	}
		
		function tutor_qualifications(){
           
					if($this->input->post()){
						
							$this->form_validation->set_rules('institution', 'institution', 'required');
							$this->form_validation->set_rules('degree_id', 'Qualification', 'required|callback_check_degree',array('check_degree' => 'Already This Qualification Exists'));
							$this->form_validation->set_rules('specialization', 'specialization', 'required');
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							$this->form_validation->set_message('degree_id','Already You Entered This Qualification');
							
							if ($this->form_validation->run() == FALSE)
                {
                      
						$tutor_id=$this->session->userdata('user_id');
						$page_data['degree_data']  = $this->Tutor_model->tutor_subject_data('tutor_degree',$tutor_id);
						$page_data['degree']  = $this->Tutor_model->get_active_data('degree');
						$page_data['page_name']  = 'profile_add_more_qualifications_step';
						$page_data['page_title'] = 'Qualifications';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					
					$data=array(
					          'tutor_id'=>$this->input->post('tutor_id'),
                              'institution'=>$this->input->post('institution'),
                              'degree_id'=>$this->input->post('degree_id'),
                              'specialization'=>$this->input->post('specialization'),                              
					        );
							//print_r($data);die;
							$result=$this->Tutor_model->insert('tutor_degree',$data);
						if($result){
							$step_data=array('page_3'=>1);
							$where['tutor_id']=$this->input->post('user_id');
							$this->Tutor_model->update('tutor_steps',$step_data,$where);
							$this->session->set_flashdata('page_success', "your Qualification Details Updated ");
                            redirect('tutor_qualifications');
						}
				}
                   
            }

				
				$tutor_id=$this->session->userdata('user_id');
				$page_data['degree_data']  = $this->Tutor_model->tutor_subject_data('tutor_degree',$tutor_id);
				$page_data['degree']  = $this->Tutor_model->get_active_data('degree');
                $page_data['page_name']  = 'profile_add_more_qualifications_step';
                $page_data['page_title'] = 'Qualifications';
                $this->load->view('frontend/index', $page_data);
        }
		
		function check_degree_update($degree="" ,$id=""){	  
		
								$degree_id = $degree;
								
								$result=$this->Tutor_model->get_id_update_data('tutor_degree',$degree_id,$id);
								
								if($result=="success"){
									return FALSE;
								} else {
									return TRUE;
								}
						   
							}
		
		
		
		function tutor_degree_update($degree_id=""){
			
					if($this->input->post()){
						
						$degree_status=$this->check_degree_update($_POST['degree_id'],$_POST['table_id']);
						if($degree_status == FALSE){						
							$this->form_validation->set_rules('degree_id', 'Qualification', 'required|callback_check_degree_update',array('check_degree_update' => 'Already This Qualification Exists'));
														
						}else{							
							$this->form_validation->set_rules('degree_id', 'Qualification', 'required');
							
						}						
						//print_r($_POST); die;
							$this->form_validation->set_rules('institution', 'institution', 'required');							
							$this->form_validation->set_rules('specialization', 'specialization', 'required');
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							$this->form_validation->set_message('degree_id','Already You Entered This Qualification');
                    if ($this->form_validation->run() == FALSE)
                {
                      
						$degree_id1 = $this->Tutor_model->get_degree_id($degree_id);							 
						$tutor_id=$this->session->userdata('user_id');
						$page_data['degree']  = $this->Tutor_model->get_active_data('degree');	
						$page_data['degree_edit_data']  = $this->Tutor_model->degree_edit_data('tutor_degree',$degree_id1);;
						$page_data['page_name']  = 'profile_add_more_qualifications_step';
						$page_data['page_title'] = 'subjects';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					$data=array(					
					  'institution'=>$this->input->post('institution'),
					  'degree_id'=>$this->input->post('degree_id'),
					  'specialization'=>$this->input->post('specialization'),									
					);
					//print_r($data);die;
					
					$degree_id = $this->Tutor_model->get_degree_id($degree_id);
					$where['id']=$_POST['table_id'];
					$result=$this->Tutor_model->update('tutor_degree',$data,$where);
						if($result){
							$this->session->set_flashdata('page_success', "your Qualification Details Updated");
                            redirect('tutor_qualifications');
						}
				}
					
            }
				 $degree_id2 = $this->Tutor_model->get_degree_id($degree_id);
					
				$tutor_id=$this->session->userdata('user_id');
				$page_data['degree']  = $this->Tutor_model->get_active_data('degree');	
                $page_data['degree_edit_data']  = $this->Tutor_model->degree_edit_data('tutor_degree',$degree_id2);
                $page_data['page_name']  = 'profile_add_more_qualifications_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		
		function tutor_degree_delete($degree_id=""){
           
					
					$where['id']=$degree_id;
					$result=$this->Tutor_model->delete_data('tutor_degree',$where);
						if($result){
							$this->session->set_flashdata('page_error',"your Qualification data Deleted");
                            redirect('tutor_qualifications');
						}
				
        }
		function request_degree(){
					if($this->input->post()){
						//print_r($_POST);die;
					    $data=array(
					          'tutor_id'=>$this->input->post('tutor_id1'),
                              'institution'=>$this->input->post('institution1'),
                              'degree_id'=>$this->input->post('degree_id1'),
                              'specialization'=>$this->input->post('specialization1'),                              
					        );
					    $result=$this->Tutor_model->insert('tutor_request_degree',$data);
						if($result){
							$this->session->set_flashdata('page_success', "your Degree request is send to admin after admin approval it will added in your profile ");
                            redirect('tutor_qualifications');
						}
					}
				
        }	
		
		function tutor_teaching(){
           
					if($this->input->post()){
						$id=$this->input->post('user_id');
				  $where['tutor_id']=$id;
				  $page_status = $this->Tutor_model->get_id_data('tutor_teaching',$where);
				  if($page_status=="failure"){
							$this->form_validation->set_rules('teaching_expertise', 'Teaching expertise', 'required');							
							$this->form_validation->set_rules('medium_id', 'Medium', 'required');
							$this->form_validation->set_rules('total_experience', 'Total experience', 'required');
							$this->form_validation->set_rules('online_experience', 'Online experience', 'required');
							$this->form_validation->set_rules('digital_pen_status', 'Digital pen', 'required');
							$this->form_validation->set_rules('digital_slate_status', 'Digital slate', 'required');
							$this->form_validation->set_rules('full_time_teacher', 'Employed status', 'required');
							$this->form_validation->set_rules('opportunities', 'work time', 'required');
							$this->form_validation->set_rules('hourly_price', 'Hourly price', 'required');
							$this->form_validation->set_rules('teaching_approach', 'Teaching approach', 'required');
							$this->form_validation->set_rules('not_shared', 'shared status', 'required');
							$this->form_validation->set_error_delimiters('<span style="color:red" >','</span>');
							
							
							if ($this->form_validation->run() == FALSE)
                {
                        $this->session->set_flashdata('form_error',"Please fill all mandatory fields");
						$page_data['medium']  = $this->Tutor_model->get_active_data('medium');
						$page_data['page_name']  = 'profile_teaching_details_step';
						$page_data['page_title'] = 'Qualifications';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					if(!empty($this->input->post('not_shared'))){
								$not_shared=$this->input->post('not_shared');
							}else{
								$not_shared=1;
							}
							
							$data=array(
							  'tutor_id'=>$this->input->post('user_id'),
							  'teaching_expertise'=>$this->input->post('teaching_expertise'),
							  'medium_id'=>$this->input->post('medium_id'),
							  'total_experience'=>$this->input->post('total_experience'),
							  'online_experience'=>$this->input->post('online_experience'),
							  'digital_pen_status'=>$this->input->post('digital_pen_status'),
							  'digital_slate_status'=>$this->input->post('digital_slate_status'),
							  'full_time_teacher'=>$this->input->post('full_time_teacher'),
							  'opportunities'=>$this->input->post('opportunities'),
							  'hourly_price'=>$this->input->post('hourly_price'),
							  'hourly_price_inr'=>$this->input->post('hourly_price_inr'),
							  'teaching_approach'=>$this->input->post('teaching_approach'),
							  'not_shared'=>$this->input->post('not_shared')
                          
								  );
								  //print_r($data);die;
								  $result=$this->Tutor_model->insert('tutor_teaching',$data);
									if($result){
										$step_data=array(					        
													'page_4'=>1
													);
													$where['tutor_id']=$this->input->post('user_id');
												$this->Tutor_model->update('tutor_steps',$step_data,$where);
										
									  $this->session->set_flashdata('page_success', "Your Teaching Details Updated");
													redirect('tutor_time_slot');
									}
					
				}
					}else{
						/*update*/
						
							$this->form_validation->set_rules('teaching_expertise', 'Teaching expertise', 'required');							
							$this->form_validation->set_rules('medium_id', 'Medium', 'required');
							$this->form_validation->set_rules('total_experience', 'Total experience', 'required');
							$this->form_validation->set_rules('online_experience', 'Online experience', 'required');
							$this->form_validation->set_rules('digital_pen_status', 'Digital pen', 'required');
							$this->form_validation->set_rules('digital_slate_status', 'Digital slate', 'required');
							$this->form_validation->set_rules('full_time_teacher', 'Employed status', 'required');
							$this->form_validation->set_rules('opportunities', 'work time', 'required');
							$this->form_validation->set_rules('hourly_price', 'Hourly price', 'required');
							$this->form_validation->set_rules('teaching_approach', 'Teaching approach', 'required');
							$this->form_validation->set_rules('not_shared', 'shared status', 'required');
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							
							
							if ($this->form_validation->run() == FALSE)
                {
                        $this->session->set_flashdata('form_error',"Please fill all mandatory fields");
						$where['tutor_id']=$this->session->userdata('user_id');
						$page_status = $this->Tutor_model->get_id_data('tutor_teaching',$where);
						if($page_status=="success"){
						$id=$this->session->userdata('user_id');
						$page_data['teaching_data']  = $this->Tutor_model->get_tutor_data('tutor_teaching',$id);
							}				
						$page_data['medium']  = $this->Tutor_model->get_active_data('medium');
						$page_data['page_name']  = 'profile_teaching_details_step';
						$page_data['page_title'] = 'Qualifications';
						$this->load->view('frontend/index', $page_data); 
                
        		}else{
					if(!empty($this->input->post('not_shared'))){
								$not_shared=$this->input->post('not_shared');
							}else{
								$not_shared=1;
							}
							$data=array(							  
									  'teaching_expertise'=>$this->input->post('teaching_expertise'),
									  'medium_id'=>$this->input->post('medium_id'),
									  'total_experience'=>$this->input->post('total_experience'),
									  'online_experience'=>$this->input->post('online_experience'),
									  'digital_pen_status'=>$this->input->post('digital_pen_status'),
									  'digital_slate_status'=>$this->input->post('digital_slate_status'),
									  'full_time_teacher'=>$this->input->post('full_time_teacher'),
									  'opportunities'=>$this->input->post('opportunities'),
									  'hourly_price'=>$this->input->post('hourly_price'),
									  'hourly_price_inr'=>$this->input->post('hourly_price_inr'),
									  'teaching_approach'=>$this->input->post('teaching_approach'),
									  'not_shared'=>$this->input->post('not_shared')                          
									);
								  //print_r($data);die;
								  $where['tutor_id']=$this->input->post('user_id');
								  $update = $this->Tutor_model->update('tutor_teaching',$data,$where);								 
								  if($update){					
										 $this->session->set_flashdata('page_success', "Your Teaching Details Updated");
										 redirect('tutor_teaching');
									}
					}
						
							
					}
		  	}
			
			
				$where['tutor_id']=$this->session->userdata('user_id');
				$page_status = $this->Tutor_model->get_id_data('tutor_teaching',$where);
				if($page_status=="success"){
				$id=$this->session->userdata('user_id');
				$page_data['teaching_data']  = $this->Tutor_model->get_tutor_data('tutor_teaching',$id);
					}				
				$page_data['medium']  = $this->Tutor_model->get_active_data('medium');
                $page_data['page_name']  = 'profile_teaching_details_step';
                $page_data['page_title'] = 'Qualifications';
                $this->load->view('frontend/index', $page_data);
        }
		function request_medium(){
					if($this->input->post()){
						//print_r($_POST);die;
					    $data=array(
					          'tutor_id'=>$this->input->post('tutor_id1'),                              
                              'medium'=>$this->input->post('medium')                             
					        );
					    $result=$this->Tutor_model->insert('tutor_request_medium',$data);
						if($result){
							$this->session->set_flashdata('page_success', "your medium request is send to admin after admin approval it will added in medium List ");
                            redirect('tutor_teaching');
						}
					}
				
        }	
		
		
		
		function tutor_time_slot(){
           
					if($this->input->post()){
					//print_r($_POST);die;
							$this->form_validation->set_rules('time_zone','time_zone','required');
							$this->form_validation->set_rules('week','week', 'required');
							$this->form_validation->set_rules('from_time','from_time', 'required');
							$this->form_validation->set_rules('to_time','to_time','required');													
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							
							
							if ($this->form_validation->run() == FALSE)
							{	
								$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
								$tutor_id=$this->session->userdata('user_id');
								$page_data['days']  = $this->Tutor_model->get_active_data('days_list');
								$page_data['timeslot_data']  = $this->Tutor_model->tutor_subject_data('tutor_timeslot',$tutor_id);
								$page_data['page_name']  = 'profile_teaching_time_slot_details_step';
								$page_data['page_title'] = 'Time Slot';
								$this->load->view('frontend/index', $page_data);
							}else{
								date_default_timezone_set("Asia/Calcutta");
							$time1= strtotime($this->input->post('from_time'));
							$time2= strtotime($this->input->post('to_time'));
							
							date_default_timezone_set("UTC");
							$utc_from_time = date("H:i",$time1);
							$utc_to_time = date("H:i",$time2);
							
							$data=array(
							'tutor_id'=>$this->input->post('tutor_id'),
							'time_zone'=>$this->input->post('time_zone'),
							'week'=>$this->input->post('week'),
							'from_time'=>$this->input->post('from_time'),
							'to_time'=>$this->input->post('to_time'),
							'utc_from_time'=>$utc_from_time,
					        'utc_to_time'=>$utc_to_time
							);
							 //print_r($data);die;
							 date_default_timezone_set("Asia/Calcutta");
							  $result=$this->Tutor_model->insert('tutor_timeslot',$data);
								if($result){
									$step_data=array(					        
												'page_5'=>1
												);
												$where['tutor_id']=$this->input->post('tutor_id');
											$this->Tutor_model->update('tutor_steps',$step_data,$where);
									
								  $this->session->set_flashdata('page_success', "your Time slot Details Updated");
												redirect('tutor_time_slot');
								}
							}
						
							
							
							
                   
            }				
				$tutor_id=$this->session->userdata('user_id');
				$page_data['days']  = $this->Tutor_model->get_active_data('days_list');
				$page_data['timeslot_data']  = $this->Tutor_model->tutor_subject_data('tutor_timeslot',$tutor_id);
                $page_data['page_name']  = 'profile_teaching_time_slot_details_step';
                $page_data['page_title'] = 'Time Slot';
                $this->load->view('frontend/index', $page_data);
        }
		
		function tutor_timeslot_update($id=""){
           
					if($this->input->post()){
					//print_r($_POST);die;
													
							$this->form_validation->set_rules('time_zone', 'time_zone','required');
							$this->form_validation->set_rules('week', 'week','required');
							$this->form_validation->set_rules('from_time', 'from_time','required');
							$this->form_validation->set_rules('to_time', 'to_time','required');													
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');
							
							
							if ($this->form_validation->run() == FALSE)
							{	
								//print_r($_POST);die;
								$page_data['days']  = $this->Tutor_model->get_active_data('days_list');
								$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
								$tutor_id=$this->session->userdata('user_id');                
								$page_data['timeslot_edit_data']  = $this->Tutor_model->timeslot_edit_data('tutor_timeslot',$id);
								$page_data['page_name']  = 'profile_teaching_time_slot_details_step';
								$page_data['page_title'] = 'Time Slot';
								$this->load->view('frontend/index', $page_data);
								
							}else{
								date_default_timezone_set("Asia/Calcutta");
									$time1= strtotime($this->input->post('from_time'));
									$time2= strtotime($this->input->post('to_time'));
									
									date_default_timezone_set("UTC");
									$utc_from_time = date("H:i",$time1);
									$utc_to_time = date("H:i",$time2);
									
									$data=array(					
									'time_zone'=>$this->input->post('time_zone'),
									'week'=>$this->input->post('week'),
									'from_time'=>$this->input->post('from_time'),
									'to_time'=>$this->input->post('to_time'),
									'utc_from_time'=>$utc_from_time,
									'utc_to_time'=>$utc_to_time	
									);
									 //print_r($data);die;
									date_default_timezone_set("Asia/Calcutta");
									$where['id']=$id;
									$result=$this->Tutor_model->update('tutor_timeslot',$data,$where);
										if($result){
											$this->session->set_flashdata('page_success', "your Time slot Details Updated");
											redirect('tutor_time_slot');
										}
							}
						
							
                    
            }

				$tutor_id=$this->session->userdata('user_id'); 
				$page_data['days']  = $this->Tutor_model->get_active_data('days_list');
                $page_data['timeslot_edit_data']  = $this->Tutor_model->timeslot_edit_data('tutor_timeslot',$id);
                $page_data['page_name']  = 'profile_teaching_time_slot_details_step';
                $page_data['page_title'] = 'Time Slot';
                $this->load->view('frontend/index', $page_data);
        }
		function tutor_timeslot_delete($id=""){
           
					
					$where['id']=$id;
					$result=$this->Tutor_model->delete_data('tutor_timeslot',$where);
						if($result){
							$this->session->set_flashdata('page_error', "your Time slot data Deleted");
                            redirect('tutor_time_slot');
						}
				
        }
		
		function tutor_final_step(){
           
					if($this->input->post()){	
						$step_data=array('page_status'=>1);
						$where['tutor_id']=$this->input->post('tutor_id');
						$this->Tutor_model->update('tutor_steps',$step_data,$where);
                         $this->session->set_flashdata('page_success', "Thankyou !  After Admin Permision, Your Further Process will continue");
                          redirect('tutor_final_step');
            }

				
                $page_data['page_name']  = 'profile_tutor_final_step';
                $page_data['page_title'] = 'Qualifications';
                $this->load->view('frontend/index', $page_data);
        }

/*=====Dashboard pages==========*/

	function tutor_profile(){
		    if($this->input->post()){
				//echo "<pre>";print_r($_POST);
				
				if(empty($_POST['web_file']) && $_FILES['user_file']['name']==""){
						$webfile= $this->input->post('old_profile_image');
					}else{
						if(!empty($_POST['web_file'])){
						$img = $_POST['web_file'];
						$folderPath = "uploads/tutor_profile/";
					  
						$image_parts = explode(";base64,", $img);
						$image_type_aux = explode("image/", $image_parts[0]);
						$image_type = $image_type_aux[1];
					  
						$image_base64 = base64_decode($image_parts[1]);
						$fileName = uniqid() .time(). '.jpg';
					  
						$file = $folderPath . $fileName;
						file_put_contents($file, $image_base64);
						 $webfile= $fileName;
													 
						
					}else{
						    $config['upload_path']          = 'uploads/tutor_profile/';
                            $config['allowed_types']        = '*';      
                            $config['max_size'] = "204800000";
            
                            $img_name1 = strtolower($_FILES['user_file']['name']);
                            $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
                            $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name1;
                            
                            $this->upload->initialize($config);
                            $upload=$this->upload->do_upload('user_file');
                            $uploadData = $this->upload->data();
                            $webfile = $uploadData['file_name'];
						 
					}						
					}
					
					
					
					
					if($_FILES['govt_id_prof_file']['name']==""){						
						$govt_id_prof_file=$this->input->post('old_govt_proof');
					}else{
						$govt_id_prof_file= $this->upload_file('govt_id_prof_file');
					}
					if($_FILES['address_prof_file']['name']==""){						
						$address_prof_file=$this->input->post('old_address_proof');
					}else{
						$address_prof_file= $this->upload_file('address_prof_file');
					}
					if($this->input->post('skip_govt_id')) {
					    $skip_govt_id=0;
					}else{
					   $skip_govt_id=1; 
					}
					if($this->input->post('skip_address_prof')) {
					    $skip_address_prof=0;
					}else{
					   $skip_address_prof=1; 
					}
					
					$data = array(					   
					   'title'=>$this->input->post('title'), 
					   'first_name'=>$this->input->post('first_name'),
					   'last_name'=>$this->input->post('last_name'),
					   'display_name'=>$this->input->post('display_name'), 
					   'gender'=>$this->input->post('gender'),
					   'dob'=>$this->input->post('dob'),
					   'govt_id_prof_id'=>$this->input->post('govt_id_prof_id'),
					   'govt_id_prof_file'=>$govt_id_prof_file,
					   'skip_govt_id'=>$skip_govt_id,
					   'pan_card'=>$this->input->post('pan_card'),
					   'pan_status'=>$this->input->post('pan_status'),
					   'address_1'=>$this->input->post('address_1'),					   
					   'city'=>$this->input->post('city'), 
					   'zip_code'=>$this->input->post('zip_code'),
					   'landmark'=>$this->input->post('landmark'),
					   'state'=>$this->input->post('state'), 
					   'country_id'=>$this->input->post('country_id'),
					   'home_town'=>$this->input->post('home_town'),
					   'address_proof_id'=>$this->input->post('address_proof_id'),
					   'address_prof_file'=>$address_prof_file,
					   'skip_address_prof'=>$skip_address_prof,
					   'mobile'=>$this->input->post('mobile'),
					   'mobile_2'=>$this->input->post('mobile_2'),
					   'whatsup_no'=>$this->input->post('whatsup_no'),
					   'skype_id'=>$this->input->post('skype_id'),
					   'email'=>$this->input->post('email'),
					   'alternative_email'=>$this->input->post('alternative_email'),					   
					   'facebook_link'=>$this->input->post('facebook_link'),
					   'twitter_link'=>$this->input->post('twitter_link'),
					   'linkedin_link'=>$this->input->post('linkedin_link'),
					   'youtube_link'=>$this->input->post('youtube_link'),
					   'profile_image'=>$webfile
					   
					    );
						//echo "<pre>";print_r($data);die;
					$where['tutor_id']=$this->input->post('user_id');
					$result=$this->Tutor_model->update('tutor_personal_profile',$data,$where);
					if($result){
						$this->session->set_flashdata('page_success', "Personal Information Updated");
						redirect('tutor_subject');
					}
					
				
			}
			   
					$id = $this->session->userdata('user_id');
					$page_data['tutor_data']  = $this->Tutor_model->get_tutor_data('tutor_personal_profile',$id);
					$page_data['saved_data']  = $this->Tutor_model->tutor_data($id);
					$page_data['govt_id']  = $this->Tutor_model->get_active_data('govt_id_prof');
					$page_data['address_id']  = $this->Tutor_model->get_active_data('address_prof');
					$page_data['country']  = $this->Tutor_model->get_active_data('country');
					$page_data['page_name']  = 'profile_personal_inormation_step';
					$page_data['page_title'] = 'personal information';
					$this->load->view('frontend/index', $page_data);
					}

	function tutor_dashboard(){
			   
					$id=$this->session->userdata('user_id');
					//$page_data['admin_status']=$this->Tutor_model->admin_status('tutor',$id);
					$admin_status=$this->Tutor_model->admin_status('tutor',$id);
					if($admin_status == 0){
					 redirect('tutor_final_step');
						}
					$page_data['demo_data']  = $this->Tutor_model->get_demo_class();	
					$page_data['page_name']  = 'tutor_dashboard';
					$page_data['page_title'] = 'Dashboard';
					$this->load->view('frontend/index1', $page_data);
			}
	function tutor_classes_completed(){
	   
			
			$page_data['page_name']  = 'tutor_classes_completed';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_demo_completed(){
	   
			
			$page_data['page_name']  = 'tutor_demo_completed';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_classes_schduled(){
	   
			
			$page_data['page_name']  = 'tutor_classes_schduled';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}

	function tutor_messages(){
				if($this->input->post()){
					$data=array(
					'tutor_id'=>$this->session->userdata('user_id'),
					'student_id'=>$this->input->post('send_id'),
					'subject'=>$this->input->post('subject'),
					'message'=>$this->input->post('message')					
					);
					//print_r($data);die;
					$result=$this->Tutor_model->insert('tutor_messages',$data);
					if($result){
						$this->session->set_flashdata('page_success', "Your Message Posted");
						redirect('tutor_messages');
					}
				}
			$page_data['users_list']  = $this->Tutor_model->get_users_list();	
			$page_data['page_name']  = 'tutor_messages';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_messages_inbox(){
		
			$tutor_id=$this->session->userdata('user_id');
			$page_data['messages']  = $this->Tutor_model->tutor_inbox_messages('student_messages',$tutor_id);
			$page_data['page_name']  = 'tutor_messages_inbox';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_messages_sent(){
	   
			$tutor_id=$this->session->userdata('user_id');
			$page_data['messages']  = $this->Tutor_model->tutor_sent_messages('tutor_messages',$tutor_id);
			$page_data['page_name']  = 'tutor_messages_sent';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_payments(){
	   
			
			$page_data['page_name']  = 'tutor_payments';
			$page_data['page_title'] = 'Payments';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_payments_referrals(){
	   
			
			$page_data['page_name']  = 'tutor_payments_referrals';
			$page_data['page_title'] = 'Payments';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_referrals(){
			if($this->input->post()){
			
			$data=array(
			'tutor_id'=>$this->input->post('user_id'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'mobile'=>$this->input->post('mobile'),
			'country_id'=>$this->input->post('country_id'),
			'subject_course_id'=>$this->input->post('subject_course_id'),
			'parent_name'=>$this->input->post('parent_name'),
			'parent_email'=>$this->input->post('user_id'),
			'parent_mobile'=>$this->input->post('user_id'),
			'class_status'=>0,
			'created_at'=>time()			
			);
			
			$result=$this->Tutor_model->insert('tutor_referred',$data);
			if($result){
						$this->session->set_flashdata('page_success', "Thankyou ! For Referring tutor to Eduzyte");
						redirect('tutor_referrals');
					}
		}   
			
			$page_data['country']  = $this->Student_model->get_data('country');			
            $page_data['subjects']  = $this->Student_model->get_active_data('subjects');			
			$page_data['page_name']  = 'tutor_referrals';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_view_reffered(){
	   
			$tutor_id=$this->session->userdata('user_id');
			$page_data['referrs']  = $this->Tutor_model->tutor_subject_data('tutor_referred',$tutor_id);
			$page_data['page_name']  = 'tutor_view_reffered';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function tutor_view_schemes(){
	   
			$page_data['scheme']  = $this->Student_model->get_active_data('scheme');
			$page_data['page_name']  = 'tutor_view_schemes';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function rate_your_student(){
				if($this->input->post()){
				if(empty($this->input->post('rating'))){
					$rating=1;
					}else{
						$rating=$this->input->post('rating');
					}
				
				  $data=array(
				  'tutor_id'=>$this->session->userdata('user_id'),
				  'student_id'=>$this->input->post('send_id'),				  
				  'rating'=>$rating,
				  'message'=>$this->input->post('testimonial')
				  );
				  //print_r($data);die;
				  $result=$this->Tutor_model->insert('tutor_ratings',$data);
				  if($result){
					$this->session->set_flashdata('page_success', "Your rating Posted");
					redirect('rate_your_student');
				  }
        }
			$page_data['users_list']  = $this->Tutor_model->get_users_list();	
			$page_data['page_name']  = 'rate_your_student';
			$page_data['page_title'] = 'Ratings';
			$this->load->view('frontend/index1', $page_data);
	}
	function ratings_by_student(){
	   
			$tutor_id=$this->session->userdata('user_id');
			$page_data['rating_data']  = $this->Tutor_model->tutor_ratings('student_ratings',$tutor_id);
			$page_data['page_name']  = 'ratings_by_student';
			$page_data['page_title'] = 'Ratings';
			$this->load->view('frontend/index1', $page_data);
	}




}


?>