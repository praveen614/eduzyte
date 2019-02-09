<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Student extends CI_Controller {
        
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
    	
    	
    	function student_page_check(){
    		    $id = $this->session->userdata('user_id');
				$where['student_id'] = $id;
				$result=$this->Student_model->get_id_data('student_steps',$where);
				if($result == "success") {
					$page_status1 = $this->Student_model->student_page_status('student_steps',$id,'page_1');
					$page_status2 = $this->Student_model->student_page_status('student_steps',$id,'page_2');
					$page_status3 = $this->Student_model->student_page_status('student_steps',$id,'page_3');
					$final_status = $this->Student_model->student_page_status('student_steps',$id,'page_status');
					if($page_status1 == 0){
						redirect('student_personal_information');
					}if($page_status2 == 0){
						redirect('student_subject');
					}if($page_status3 == 0){
						redirect('student_final_step');
					}if($final_status == 1){
						redirect('student_dashboard');
					}else{
						redirect('student_final_step');
					}
				}else{
					redirect('student_personal_information');
				}
				
    	}
		
		


    	function student_personal_information(){
    	    
            if($this->input->post()){
                $id=$this->input->post('user_id');
				$where['student_id']=$id;
                $page_status = $this->Student_model->get_id_data('student_steps',$where);
                if($page_status=="failure"){
					//echo"<pre>";print_r($_POST);die;
                
                    $this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('display_name', 'Display name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
                  
                 /*  $this->form_validation->set_error_delimiters('<span class="error" style="color:red" >', '</span>');*/

                if ($this->form_validation->run() == FALSE)
                {
						$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
						$id = $this->session->userdata('user_id');
			            $page_data['saved_data']  = $this->Student_model->student_data($id);
                        $page_data['currency']  = $this->Student_model->get_data('currency');
            			$page_data['country']  = $this->Student_model->get_data('country');
            		    $page_data['page_name']  = 'profile_student_personal_inormation_step';
            			$page_data['page_title'] = 'Welocome';
            			$this->load->view('frontend/index', $page_data);  
                
        		}else{
					
        		    
    
					if(!empty($_POST['web_file'])){
						$img = $_POST['web_file'];
						$folderPath = "uploads/student_profile/";
					  
						$image_parts = explode(";base64,", $img);
						$image_type_aux = explode("image/", $image_parts[0]);
						$image_type = $image_type_aux[1];
					  
						$image_base64 = base64_decode($image_parts[1]);
						$fileName = uniqid() .time(). '.jpg';
					  
						$file = $folderPath . $fileName;
						file_put_contents($file, $image_base64);
						 $webfile= $fileName;					
						
					}else{
						    $config['upload_path']          = 'uploads/student_profile/';
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
					if($this->input->post('private_status')) {
					    $private_status=0;
					}else{
					   $private_status=1; 
					}
					
					
					
					$data = array(
					   'student_id'=>$this->input->post('user_id'),
					   'title'=>$this->input->post('title'), 
					   'first_name'=>$this->input->post('first_name'),
					   'last_name'=>$this->input->post('last_name'),
					   'display_name'=>$this->input->post('display_name'), 
					   'gender'=>$this->input->post('gender'),
					   'dob'=>$this->input->post('dob'),
					   'currency_id'=>$this->input->post('currency_id'), 
					   'address_1'=>$this->input->post('address_1'),
					   'address_2'=>$this->input->post('address_2'),
					   'city'=>$this->input->post('city'), 
					   'zip_code'=>$this->input->post('zip_code'),
					   'landmark'=>$this->input->post('landmark'),
					   'state'=>$this->input->post('state'), 
					   'country_id'=>$this->input->post('country_id'),
					   'home_town'=>$this->input->post('home_town'),
					   'mobile'=>$this->input->post('mobile'),
					   'mobile_2'=>$this->input->post('mobile_2'),
					   'whatsup_no'=>$this->input->post('whatsup_no'),
					   'skype_id'=>$this->input->post('skype_id'),
					   'current_employer'=>$this->input->post('current_employer'),
					   'designation'=>$this->input->post('designation'),
					   'email'=>$this->input->post('email'),
					   'alternative_email'=>$this->input->post('alternative_email'),
					   'about_yourself'=>$this->input->post('about_yourself'),
					   'your_objective'=>$this->input->post('your_objective'),
					   'facebook_link'=>$this->input->post('facebook_link'),
					   'twitter_link'=>$this->input->post('twitter_link'),
					   'linkedin_link'=>$this->input->post('linkedin_link'),
					   'youtube_link'=>$this->input->post('youtube_link'),
					   'profile_image'=>$webfile,
					   'private_status'=>$private_status
					    );
					
					$result=$this->Student_model->insert('student_personal_profile',$data);
					if($result){
					    $step_data=array(
					        'student_id'=>$this->input->post('user_id'),
					        'page_1'=>1
					        );
					    $this->Student_model->insert('student_steps',$step_data);
					    $count=count($_POST["qualification"]);
					    $qualification = $_POST["qualification"];
					    $subject = $_POST["subject"];
					    $institution = $_POST["institution"];
					    $passout_year = $_POST["passout_year"];
					    
					    for($i=0; $i<$count; $i++){

                $data_option['student_id'] = $this->input->post('user_id');
                $data_option['qualification'] = $qualification[$i];
                $data_option['subject'] = $subject[$i];
                $data_option['institution'] = $institution[$i];
                $data_option['passout_year'] = $passout_year[$i];
                 
                $result=$this->Student_model->insert('student_personal_qualification',$data_option);     

               }
               $this->session->set_flashdata('page_success', "Personal Information Updated");
               redirect('student_subject');
					}
        		}
            }else{	/*update*/
			
				//echo "<pre>";print_r($_POST);die;
					$this->form_validation->set_rules('first_name', 'First name', 'required');
                    $this->form_validation->set_rules('display_name', 'Display name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
					
				if ($this->form_validation->run() == FALSE)
                {		
			
						$this->session->set_flashdata('form_error',"Please fill all mandatory fields");
						$id = $this->session->userdata('user_id');
						$page_data['student_data']  = $this->Student_model->get_student_data('student_personal_profile',$id);
						$page_data['qualification_data']  = $this->Student_model->student_qualification_data('student_personal_qualification',$id);
						$page_data['saved_data']  = $this->Student_model->student_data($id);
						$page_data['currency']  = $this->Student_model->get_data('currency');
						$page_data['country']  = $this->Student_model->get_data('country');
						$page_data['page_name']  = 'profile_student_personal_inormation_step';
						$page_data['page_title'] = 'Welocome';
						$this->load->view('frontend/index', $page_data);  
                
        		}else{
					if(!empty($_POST['web_file']) || !empty($_FILES['user_file']['name'])){
					if(!empty($_POST['web_file'])){
						$img = $_POST['web_file'];
						$folderPath = "uploads/student_profile/";
					  
						$image_parts = explode(";base64,", $img);
						$image_type_aux = explode("image/", $image_parts[0]);
						$image_type = $image_type_aux[1];
					  
						$image_base64 = base64_decode($image_parts[1]);
						$fileName = uniqid() .time(). '.jpg';
					  
						$file = $folderPath . $fileName;
						file_put_contents($file, $image_base64);
						 $webfile= $fileName;					
						
					}else{
						    $config['upload_path']          = 'uploads/student_profile/';
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
					
				}else{
					$webfile = $this->input->post('old_profile_image');					
				}
				
				
				
				if($this->input->post('private_status')) {
					    $private_status=0;
					}else{
					   $private_status=1; 
					}
					
					$data = array(					   
					   'title'=>$this->input->post('title'), 
					   'first_name'=>$this->input->post('first_name'),
					   'last_name'=>$this->input->post('last_name'),
					   'display_name'=>$this->input->post('display_name'), 
					   'gender'=>$this->input->post('gender'),
					   'dob'=>$this->input->post('dob'),
					   'currency_id'=>$this->input->post('currency_id'), 
					   'address_1'=>$this->input->post('address_1'),
					   'address_2'=>$this->input->post('address_2'),
					   'city'=>$this->input->post('city'), 
					   'zip_code'=>$this->input->post('zip_code'),
					   'landmark'=>$this->input->post('landmark'),
					   'state'=>$this->input->post('state'), 
					   'country_id'=>$this->input->post('country_id'),
					   'home_town'=>$this->input->post('home_town'),
					   'mobile'=>$this->input->post('mobile'),
					   'mobile_2'=>$this->input->post('mobile_2'),
					   'whatsup_no'=>$this->input->post('whatsup_no'),
					   'skype_id'=>$this->input->post('skype_id'),
					   'current_employer'=>$this->input->post('current_employer'),
					   'designation'=>$this->input->post('designation'),
					   'email'=>$this->input->post('email'),
					   'alternative_email'=>$this->input->post('alternative_email'),
					   'about_yourself'=>$this->input->post('about_yourself'),
					   'your_objective'=>$this->input->post('your_objective'),
					   'facebook_link'=>$this->input->post('facebook_link'),
					   'twitter_link'=>$this->input->post('twitter_link'),
					   'linkedin_link'=>$this->input->post('linkedin_link'),
					   'youtube_link'=>$this->input->post('youtube_link'),
					   'profile_image'=>$webfile,
					   'private_status'=>$private_status
					    );
						
				
					//echo "<pre>"; print_r($_POST); die;
					$where['student_id'] = $this->session->userdata('user_id');
					$result=$this->Student_model->update('student_personal_profile',$data,$where);
					if($result){
						
						$count=count($_POST["qualification"]);
						$update_count=count($_POST["qualification_id"]);
						$qualification_id = $_POST["qualification_id"];
					    $qualification = $_POST["qualification"];
					    $subject = $_POST["subject"];
					    $institution = $_POST["institution"];
					    $passout_year = $_POST["passout_year"];
						
						for($i=0; $i<$count; $i++){
							
							if(empty($qualification_id[$i]) && !empty($qualification[$i])) {
								
								$data_option['student_id'] = $this->input->post('user_id');
								$data_option['qualification'] = $qualification[$i];
								$data_option['subject'] = $subject[$i];
								$data_option['institution'] = $institution[$i];
								$data_option['passout_year'] = $passout_year[$i];
								 
								$result=$this->Student_model->insert('student_personal_qualification',$data_option);
						}}
						for($i=0; $i<$update_count; $i++){
								if(!empty($qualification_id[$i]) && !empty($qualification[$i])) {
								
								$where['id']=$qualification_id[$i];								
								$data_option['qualification'] = $qualification[$i];
								$data_option['subject'] = $subject[$i];
								$data_option['institution'] = $institution[$i];
								$data_option['passout_year'] = $passout_year[$i];
								$result=$this->Student_model->update('student_personal_qualification',$data_option,$where);
							}
						}							

               }
			   $this->session->set_flashdata('page_success', "Personal Information Updated");
                redirect('student_subject');
				}
			}					
					
                
            }
    		
				$id = $this->session->userdata('user_id');
				$page_data['student_data']  = $this->Student_model->get_student_data('student_personal_profile',$id);
				$page_data['qualification_data']  = $this->Student_model->student_qualification_data('student_personal_qualification',$id);
			    $page_data['saved_data']  = $this->Student_model->student_data($id);
    			$page_data['currency']  = $this->Student_model->get_data('currency');
    			$page_data['country']  = $this->Student_model->get_data('country');
    		    $page_data['page_name']  = 'profile_student_personal_inormation_step';
    			$page_data['page_title'] = 'Welocome';
    			$this->load->view('frontend/index', $page_data);
    	}
		
		function get_course()
    {
		$study_level_id= $this->input->get_post('study_level_id');		
		$course= $this->Student_model->get_course($study_level_id);
			echo  '<option value="">--Select course--</option>';
			foreach ($course as $row) {
            echo '<option value="' . $row->course_generate_id . '">' . $row->course . '</option>';
			}     
    
    }
	function get_from_level($study_level_id="")
    {
		
			echo  '<option value="">--Select Level--</option>'; 
						
			$levels= $this->Student_model->get_levels($study_level_id);
			foreach ($levels as $row1) {				
				
            echo '<option value="' . $row1->id . '" >' . $row1->from_level . '</option>';
			}
       
    
    }
	function get_subject()
    {
		
		$course_id = $this->input->get_post('course_id');
		$subject= $this->Student_model->get_subject($course_id);
				echo  '<option value="">--Select Subjects--</option>';
			foreach ($subject as $row) {
            echo '<option value="' . $row->subject_generate_id . '">' . $row->subject . '</option>';
			}     
    
    }	
	function check_subject(){	   
			
			if(isset($_POST['subject_id'])) {
				$where['student_id']=$this->session->userdata('user_id');
        $where['subject_id'] = $_POST['subject_id'];
        $result=$this->Student_model->get_id_data('student_subject',$where);        
        if($result=="success"){
            echo "false";
        } else {
            echo "true";
        }
    }
	
	}
		

        function student_subject(){
           
					if($this->input->post()){				
                    
					//print_r($_POST);die;
					date_default_timezone_set("Asia/Calcutta");
					$time1= strtotime($this->input->post('from_time'));
					$time2= strtotime($this->input->post('to_time'));
					
					date_default_timezone_set("UTC");
					$utc_from_time = date("H:i",$time1);
					$utc_to_time = date("H:i",$time2);                   
					
					
					$data=array(
					'student_id'=>$this->input->post('user_id'),
					'time_zone'=>$this->input->post('time_zone'),
					'from_time'=>$this->input->post('from_time'),
					'to_time'=>$this->input->post('to_time'),
					'utc_from_time'=>$utc_from_time,
					'utc_to_time'=>$utc_to_time,
					'study_level_id'=>$this->input->post('study_level_id'),
					'from_level_id'=>$this->input->post('from_level_id'),
					'subject_id'=>$this->input->post('subject_id')	
					);
					//echo"<pre>";print_r($data);die;
					date_default_timezone_set("Asia/Calcutta");
					$result=$this->Student_model->insert('student_subject',$data);
						if($result){
							$this->session->set_flashdata('page_success', "your Subjects Details Updated");
                            redirect('student_subject');
						}
            }

				$student_id=$this->session->userdata('user_id');
                $page_data['study_level']  = $this->Student_model->get_active_data('study_level');
                //$page_data['course']  = $this->Student_model->get_active_data('course');
                $page_data['subjects']  = $this->Student_model->get_active_data('subjects');
				$page_data['subjects_data']  = $this->Student_model->student_subject_data('student_subject',$student_id);
                $page_data['page_name']  = 'profile_student_subject_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		function check_back_subject(){	   
			
			if(isset($_POST['subject_id'])) {
				$where['student_id']=$this->session->userdata('user_id');
        $where['subject_id'] = $_POST['subject_id'];
        $result=$this->Student_model->get_id_data('tutor_subjects',$where);        
        if($result=="success"){
            echo FALSE;
        } else {
            echo TRUE;
        }
    }
	}
	function check_subject_update($subject="" ,$id=""){	  
		
								$subject_id = $subject;
								
								$result=$this->Student_model->check_subject_id_update_data('student_subject',$subject_id,$id);
								
								if($result=="success"){
									return FALSE;
								} else {
									return TRUE;
								}
						   
							}
		
		function student_subject_update($subject_id=""){
           
					if($this->input->post()){
						
						
						$subject_status=$this->check_subject_update($_POST['subject_id'],$_POST['table_id']);
						if($subject_status == FALSE){						
							$this->form_validation->set_rules('subject_id', 'Subject', 'required|callback_check_subject_update',array('check_subject_update' => 'Already This Subject Exists'));
														
						}else{							
							$this->form_validation->set_rules('subject_id', 'Subject', 'required');							
						}
							$this->form_validation->set_rules('study_level_id', 'Study Level', 'required');
							$this->form_validation->set_rules('from_time', 'From Time', 'required');
							$this->form_validation->set_rules('to_time', 'To Time', 'required');
							$this->form_validation->set_rules('from_level_id', 'Level', 'required');
							$this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');							
							if ($this->form_validation->run() == FALSE)
						{
							  // print_r($_POST);die;
								$subject_id1=$this->Student_model->get_subject_id($subject_id);
								$student_id=$this->session->userdata('user_id'); 
								$page_data['subjects_edit_data']  = $this->Student_model->subject_edit_data('student_subject',$subject_id1);
								$page_data['study_level']  = $this->Student_model->get_active_data('study_level');
								//$page_data['course']  = $this->Student_model->get_active_data('course');
								$page_data['subjects']  = $this->Student_model->get_active_data('subjects');
								//$page_data['subjects_data']  = $this->Student_model->student_subject_data('student_subject',$student_id);
								$page_data['page_name']  = 'profile_student_subject_step';
								$page_data['page_title'] = 'subjects';
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
							'from_time'=>$this->input->post('from_time'),
							'to_time'=>$this->input->post('to_time'),
							'utc_from_time'=>$utc_from_time,
							'utc_to_time'=>$utc_to_time,
							'study_level_id'=>$this->input->post('study_level_id'),
							'from_level_id'=>$this->input->post('from_level_id'),
							'subject_id'=>$this->input->post('subject_id')									
							);
							
							date_default_timezone_set("Asia/Calcutta");
							
							$where['id']=$_POST['table_id'];
							$result=$this->Student_model->update('student_subject',$data,$where);
								if($result){
									$this->session->set_flashdata('page_success', "your Subjects Details Updated");
									redirect('student_subject');
								}
						}
						
						
						
            }
				
				$subject_id1=$this->Student_model->get_subject_id($subject_id);
				$student_id=$this->session->userdata('user_id'); 
				$page_data['subjects_edit_data']  = $this->Student_model->subject_edit_data('student_subject',$subject_id1);
                $page_data['study_level']  = $this->Student_model->get_active_data('study_level');
                //$page_data['course']  = $this->Student_model->get_active_data('course');
                $page_data['subjects']  = $this->Student_model->get_active_data('subjects');
				//$page_data['subjects_data']  = $this->Student_model->student_subject_data('student_subject',$student_id);
                $page_data['page_name']  = 'profile_student_subject_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		
		function student_subject_delete($subject_id=""){
           
					
					$where['id']=$subject_id;
					$result=$this->Student_model->delete_data('student_subject',$where);
						if($result){
							$this->session->set_flashdata('page_error', "your Subjects data Deleted");
                            redirect('student_subject');
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
					
					    $data=array(
					          'student_id'=>$this->input->post('student_id'),
					          'study_level_id'=>$this->input->post('request_study_level_id'),
                              'from_level_id'=>$this->input->post('request_from_level_id'),	
                              'subject'=>$this->input->post('request_subject')                            
					        );
							
					    $result=$this->Student_model->insert('student_request_subject',$data);
						if($result){
							$this->session->set_flashdata('page_success', "your subject request is send to admin after admin approval it will added in subject List ");
                            redirect('student_subject');
						}
					}
				
        }
		
		function student_final_step(){
            if($this->input->post()){
				
				$data=array('page_2'=>1,'page_3'=>1,'page_status'=>1);
				    $where['student_id']=$this->input->post('user_id');
					$result=$this->Student_model->update('student_steps',$data,$where);
					if($result){
							$this->session->set_flashdata('page_success', "Thankyou !  After Admin Permision, Your Further Process will continue");
                            redirect('student_final_step');  
						}
						                  
            }

                $page_data['study_level']  = $this->Student_model->get_data('study_level');
                //$page_data['course']  = $this->Student_model->get_data('course');
                $page_data['subjects']  = $this->Student_model->get_data('subjects');
                $page_data['page_name']  = 'profile_student_final_step';
                $page_data['page_title'] = 'subjects';
                $this->load->view('frontend/index', $page_data);
        }
		
		/*=====Dashboard pages==========*/
		
		
	function student_dashboard(){
		$id=$this->session->userdata('user_id');
					//$page_data['admin_status']=$this->Student_model->admin_status('student',$id);
					$admin_status=$this->Student_model->admin_status('student',$id);
					if($admin_status == 0){
					 redirect('student_final_step');
						}
			$page_data['demo_data']  = $this->Student_model->get_demo_class();			
			$page_data['page_name']  = 'tutor_dashboard';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_classes_completed(){        

			
			$page_data['page_name']  = 'tutor_classes_completed';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_demo_completed(){        

			
			$page_data['page_name']  = 'tutor_demo_completed';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_classes_schduled(){        

			
			$page_data['page_name']  = 'tutor_classes_schduled';
			$page_data['page_title'] = 'Dashboard';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_messages(){
			if($this->input->post()){
					$data=array(
					'student_id'=>$this->session->userdata('user_id'),
					'tutor_id'=>$this->input->post('send_id'),
					'subject'=>$this->input->post('subject'),
					'message'=>$this->input->post('message')					
					);
					//print_r($data);die;
					$result=$this->Student_model->insert('student_messages',$data);
					if($result){
						$this->session->set_flashdata('page_success', "Your Message Posted");
						redirect('student_messages');
					}
				}		
			$page_data['users_list']  = $this->Student_model->get_users_list();
			$page_data['page_name']  = 'tutor_messages';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_messages_inbox(){
	   
			$student_id=$this->session->userdata('user_id');
			$page_data['messages']  = $this->Student_model->student_inbox_messages('tutor_messages',$student_id);
			$page_data['page_name']  = 'tutor_messages_inbox';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_messages_sent(){
	   
			$student_id=$this->session->userdata('user_id');
			$page_data['messages']  = $this->Student_model->student_sent_messages('student_messages',$student_id);
			$page_data['page_name']  = 'tutor_messages_sent';
			$page_data['page_title'] = 'Messages';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_payments(){
			if($this->input->post()){
				print_r($_POST);
				if(!empty($this->input->post('last_payment'))){
					$amount=$this->input->post('last_payment');
				}else{
					$amount=$this->input->post('convenient_payment');
				}
				$data=array('amount'=>$amount,);
				print_r($data);die;
			}			
			$page_data['page_name']  = 'tutor_payments';
			$page_data['page_title'] = 'Payments';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_payments_referrals(){
		
	   
			
			$page_data['page_name']  = 'tutor_payments_referrals';
			$page_data['page_title'] = 'Payments';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_referrals(){
		if($this->input->post()){
			
			$data=array(
			'student_id'=>$this->input->post('user_id'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'mobile'=>$this->input->post('mobile'),
			'country_id'=>$this->input->post('country_id'),
			'subject_course_id'=>$this->input->post('subject_course_id'),
			'parent_name'=>$this->input->post('parent_name'),
			'parent_email'=>$this->input->post('parent_email'),
			'parent_mobile'=>$this->input->post('parent_mobile'),
			'class_status'=>0,
			'created_at'=>time()			
			);
			
			$result=$this->Student_model->insert('student_referred',$data);
			if($result){
							//here send email
						$this->session->set_flashdata('page_success', "Thankyou ! For Referring Student to Eduzyte");
						redirect('student_referrals');
						
					}
			
		}   
			$page_data['country']  = $this->Student_model->get_data('country');
			//$page_data['course']  = $this->Student_model->get_active_data('course');
            $page_data['subjects']  = $this->Student_model->get_active_data('subjects');
			$page_data['page_name']  = 'tutor_referrals';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_view_reffered(){
	   
			$student_id=$this->session->userdata('user_id');
			$page_data['referrs']  = $this->Student_model->student_subject_data('student_referred',$student_id);
			$page_data['page_name']  = 'tutor_view_reffered';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function student_view_schemes(){
	   
			$page_data['scheme']  = $this->Student_model->get_active_data('scheme');
			$page_data['page_name']  = 'tutor_view_schemes';
			$page_data['page_title'] = 'Referrals';
			$this->load->view('frontend/index1', $page_data);
	}
	function rate_your_tutor(){
			if($this->input->post()){
				if(empty($this->input->post('rating'))){
					$rating=1;
					}else{
						$rating=$this->input->post('rating');
					}
				
				  $data=array(
				  'student_id'=>$this->session->userdata('user_id'),
				  'tutor_id'=>$this->input->post('send_id'),				  
				  'rating'=>$rating,
				  'message'=>$this->input->post('testimonial')
				  );
				  //print_r($data);die;
				  $result=$this->Student_model->insert('student_ratings',$data);
				  if($result){
					$this->session->set_flashdata('page_success', "Your rating Posted");
					redirect('rate_your_tutor');
				  }
        }
	   
			$page_data['users_list']  = $this->Student_model->get_users_list();
			$page_data['page_name']  = 'rate_your_student';
			$page_data['page_title'] = 'Ratings';
			$this->load->view('frontend/index1', $page_data);
	}
	function ratings_by_tutor(){
	   
			$student_id=$this->session->userdata('user_id');
			$page_data['rating_data']  = $this->Student_model->student_ratings('student_ratings',$student_id);
			$page_data['page_name']  = 'ratings_by_student';
			$page_data['page_title'] = 'Ratings';
			$this->load->view('frontend/index1', $page_data);
	}
	function check_email(){	   
			
			if(isset($_POST['email'])) {
        $where['email'] = $_POST['email'];
        $result=$this->Student_model->get_id_data('student',$where);
        
        if($result=="success"){
            echo 'false';
        } else {
            echo 'true';
        }
    }
	}
	function check_mobile(){	   
			
			if(isset($_POST['mobile'])) {
        $where['mobile'] = $_POST['mobile'];
        $result=$this->Student_model->get_id_data('student',$where);
        
        if($result=="success"){
            echo 'false';
        } else {
            echo 'true';
        }
    }
	}
	
	function qualification_delete(){
           
					
					$where['id']=$this->input->post_get('id');;
					$result=$this->Student_model->delete_data('student_personal_qualification',$where);
						if($result){
							echo "Deleted Successfully";
						}else{
							echo "Something went wrong try again !";
						}
						
				
        }
	

    }
?>