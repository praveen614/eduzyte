<?php
            if (!defined('BASEPATH'))
                exit('No direct script access allowed');
            class Live_classes extends CI_Controller
            {
            	function __construct()
            	{
            		parent::__construct();
            		
                    date_default_timezone_set('Asia/Kolkata');

                   /*cache control*/
            		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            		$this->output->set_header('Pragma: no-cache');
                if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url() . 'index.php/login', 'refresh');
            		 //error_reporting(0);
                }

                /***default functin, redirects to login page if no admin logged in yet***/
                public function index()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url() . 'login', 'refresh');
                    if ($this->session->userdata('admin_login') == 1)
                        redirect(base_url() . 'admin/question_list', 'refresh');
                        
                        
                }
				function class_recording($id="") {
				 
				 $data['classId']=$id;
				 $data_string = http_build_query($data);
				 //echo $data_string ;die;
				 $url="https://api.braincert.com/v2/getclassrecording?apikey=0M1zj8t4kOZodQ0rqiON";	

				 $ch = curl_init();
				 if (!$ch) {
					 die("Couldn't initialize a cURL handle");
				 }

				 $ret = curl_setopt($ch, CURLOPT_URL, $url);

				 curl_setopt($ch, CURLOPT_POST, 1);

				 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

				 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

					// curl_setopt($ch, CURLOPT_POSTFIELDS, "title=$title&timezone=$timezone&date=$from_date&start_time=$start_time&end_time=$end_time&end_date=$end_date&seat_attendees=$seat_attendees");
					curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
					$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$curlresponse = curl_exec($ch); // execute      	   
					$data=json_decode($curlresponse);
					//return $data;
					 echo"<pre>";print_r($data);
					 //echo count($data);
					 die;
								
             if (curl_errno($ch))             
                 if (empty($ret)) {                     
                     curl_close($ch); // close cURL handler
					} else {                     
                     print_r($info);
                     curl_close($ch); // close cURL handler
                 }
			}
				
				 private function class_report1($id="") {
				 
				 $data['classId']=$id;
				 $data_string = http_build_query($data);
							 //echo $data_string ;die;
							 $url="https://api.braincert.com/v2/getclassreport?apikey=0M1zj8t4kOZodQ0rqiON";	

				 $ch = curl_init();
				 if (!$ch) {
					 die("Couldn't initialize a cURL handle");
				 }

				 $ret = curl_setopt($ch, CURLOPT_URL, $url);

				 curl_setopt($ch, CURLOPT_POST, 1);

				 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

				 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

				// curl_setopt($ch, CURLOPT_POSTFIELDS, "title=$title&timezone=$timezone&date=$from_date&start_time=$start_time&end_time=$end_time&end_date=$end_date&seat_attendees=$seat_attendees");
				curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
				$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$curlresponse = curl_exec($ch); // execute      	   
				$data=json_decode($curlresponse);
				return $data;
				 //echo"<pre>";print_r($data);
				 //echo count($data);die;
							
             if (curl_errno($ch))             
                 if (empty($ret)) {                     
                     curl_close($ch); // close cURL handler
					} else {                     
                     print_r($info);
                     curl_close($ch); // close cURL handler
                 }
      }
				 private function list_class1($data="") {
				 
				//echo count($data);die;
				 $data_string = http_build_query($data);
							 
							 $url="https://api.braincert.com/v2/listclass?apikey=0M1zj8t4kOZodQ0rqiON";	

             $ch = curl_init();

             if (!$ch) {

                 die("Couldn't initialize a cURL handle");

             }

             $ret = curl_setopt($ch, CURLOPT_URL, $url);

             curl_setopt($ch, CURLOPT_POST, 1);

             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

            // curl_setopt($ch, CURLOPT_POSTFIELDS, "title=$title&timezone=$timezone&date=$from_date&start_time=$start_time&end_time=$end_time&end_date=$end_date&seat_attendees=$seat_attendees");
      		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
            $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $curlresponse = curl_exec($ch); // execute      	   
			 return $data=json_decode($curlresponse);      	   
			     		
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
       private function remove_class1($class_id="") {
	  
	        
	        $data=array('cid'=>$class_id);
	        $data_string = http_build_query($data);
				 $url="https://api.braincert.com/v2/removeclass?apikey=0M1zj8t4kOZodQ0rqiON";	

             $ch = curl_init();

             if (!$ch) {

                 die("Couldn't initialize a cURL handle");

             }

             $ret = curl_setopt($ch, CURLOPT_URL, $url);

             curl_setopt($ch, CURLOPT_POST, 1);

             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
           
      		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
			
            $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
            $curlresponse = curl_exec($ch); // execute
			
			return $data=json_decode($curlresponse);
			 
			 
      		
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
	  private function cancel_class1($data) {
	        $data_string = http_build_query($data);
			//echo $data_string;die;
				 $url="https://api.braincert.com/v2/cancelclass?apikey=0M1zj8t4kOZodQ0rqiON";	

             $ch = curl_init();

             if (!$ch) {

                 die("Couldn't initialize a cURL handle");

             }

             $ret = curl_setopt($ch, CURLOPT_URL, $url);

             curl_setopt($ch, CURLOPT_POST, 1);

             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
           
      		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
			
            $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
            $curlresponse = curl_exec($ch); // execute
			
			return $data=json_decode($curlresponse);
			// print_r($data);
			// die;
      		
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
	  
	  public function class_report($id="") {
	  
					$data=$this->class_report1($id);
					$count = count($data);
					if($count == 1){
					 $data1=array();
						}else{
						$data1=$data;
						}
					$page_data['data']=$data1;
					$page_data['page_name']="demo_class_report";
                    $page_data['page_title']="Classes Report";
                    $this->load->view('backend/index', $page_data);
		  }	  
	  
	  public function list_class() {					
					$page_data['data']=$this->list_class1();
					$page_data['page_name']="live_class_list";
                    $page_data['page_title']="Classes List";
                    $this->load->view('backend/index', $page_data);
		  }
		  public function remove_demo_class($class_id) {
		      $result=$this->remove_class1($class_id);
		      if($result->status == "ok"){
					$where['class_id'] = $class_id;
                    $page_data['data']=$this->Course_model->delete('create_demo_class_id_table',$where);
					$delete_class_link=$this->delete_class_link($class_id);
					$delete_class_student=$this->delete_class_student($class_id);
					$this->session->set_flashdata('flash_message',"class removed successfully");
								redirect('admin/live_classes/demo_class_id_list');						
						}else{				
							$this->session->set_flashdata('error_message',"$result->error");
									redirect('admin/live_classes/demo_class_id_list');
						} 
					
		  }
		  function delete_class_link($class_id)
			{
				if (!empty($class_id)) {
					$this->db->where_in('class_id', $class_id);
					$this->db->delete('demo_class_table');
				}
			}
			function delete_class_student($class_id)
			{
				if (!empty($class_id)) {
					$this->db->where_in('class_id', $class_id);
					$this->db->delete('demo_student_link');
				}
			}
		  public function cancel_demo_class($class_id) {
		  
				$cancel_data=array(
				'class_id'=>$this->input->post('class_id'),
				'isCancel'=>$this->input->post('iscancel')
				);
		      $result=$this->cancel_class1($cancel_data);
		      if($result->status == "ok"){
		          $this->session->set_flashdata('flash_message',"class status Updated successfully");
								redirect('admin/live_classes/demo_class_id_list');						
						}else{				
							$this->session->set_flashdata('error_message',"$result->error");
									redirect('admin/live_classes/demo_class_id_list');
						} 
					
		  }
	 public function remove_main_class($class_id) {
	     
          $result=$this->remove_class1($class_id);
          if($result->status == "ok"){
          $where['class_id'] = $class_id;
                    $page_data['data']=$this->Course_model->delete('create_main_class_id_table',$where);
          $this->session->set_flashdata('flash_message',"class removed successfully");
                redirect('admin/live_classes/main_class_id_list');            
            }else{        
              $this->session->set_flashdata('error_message',"$result->error");
                  redirect('admin/live_classes/main_class_id_list');
            } 
          
      }
      public function cancel_main_class($class_id) {
      
        $cancel_data=array(
        'class_id'=>$this->input->post('class_id'),
        'isCancel'=>$this->input->post('iscancel')
        );
          $result=$this->cancel_class1($cancel_data);
          if($result->status == "ok"){
              $this->session->set_flashdata('flash_message',"class status Updated successfully");
                redirect('admin/live_classes/main_class_id_list');            
            }else{        
              $this->session->set_flashdata('error_message',"$result->error");
                  redirect('admin/live_classes/main_class_id_list');
            } 
          
      }	
		//private function schedule_live_class($title='',$timezone='',$start_time='',$end_time='',$from_date='',$end_date='',$seat_attendees='') {
      	   private function schedule_live_class($data) {
		   //$url = "https://eduzyte.com/v2/schedule?apikey=0M1zj8t4kOZodQ0rqiON ";	   
      		//api key=0M1zj8t4kOZodQ0rqiON	
			
      		 $data_string = http_build_query($data);
			//echo $data_string; die;
			$url="https://api.braincert.com/v2/schedule?apikey=0M1zj8t4kOZodQ0rqiON";
			
			$ch = curl_init();
			if (!$ch) {
			die("Couldn't initialize a cURL handle");
			}

             $ret = curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_POST, 1);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      		 curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
             $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             $curlresponse = curl_exec($ch); // execute      	   
			 return $data=json_decode($curlresponse);      	   
			//print_r($data);die;      		
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
	  
	  /*GET CLASS LAUNCH URL*/
	  
      private function lanch_live_class($data) {
             // $url = "https://eduzyte.com/v2/getclasslaunch?apikey=0M1zj8t4kOZodQ0rqiON ";       	   
      		//api key=0M1zj8t4kOZodQ0rqiON      	   
      		$url=  "https://api.braincert.com/v2/getclasslaunch?apikey=0M1zj8t4kOZodQ0rqiON"; 
      		$data_string = http_build_query($data);      		
             $ch = curl_init();
             if (!$ch) {
                 die("Couldn't initialize a cURL handle");
             }
             $ret = curl_setopt($ch, CURLOPT_URL, $url);

             curl_setopt($ch, CURLOPT_POST, 1);

             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

             curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

             $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

             $curlresponse = curl_exec($ch); // execute
			 return $data=json_decode($curlresponse);
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
			
	function demo_class_id_list(){
			if($this->input->post()){			
			$data=$_POST;	
			$data1=array();
			foreach ($data as $key => $value) {
						$value = trim($value);
						if (!empty($value)){
							$data1[$key]=$value;
					}
			}
			}else{
			$data1 = array();
			}
			 $page_data['demo_data']=$page_data['data']=$this->Home_model->get_data('create_demo_class_id_table');
			 $page_data['data']=$this->list_class1($data1);
			 $page_data['page_name']="demo_class_id_list";
             $page_data['page_title']="Demo class list";
             $this->load->view('backend/index', $page_data);
        }
        function demo_class_id(){	  
			 $page_data['page_name']="create_demo_class_id";
             $page_data['page_title']="Demo class id";
             $this->load->view('backend/index', $page_data);
        }
        
        function create_demo_class_id(){		
					$demo_data=array();
      				$demo_data['title']=$this->input->post('title');
      				$demo_data['timezone']=$this->input->post('timezone');
      				$demo_data['start_time']= $this->input->post('from_time');
      				$demo_data['end_time']= $this->input->post('to_time');
      				$demo_data['date']=$this->input->post('from_date');
      				$demo_data['end_date']=$this->input->post('to_date');
      				$demo_data['seat_attendees']=$this->input->post('seat_attendees');
					if(isset($_POST['record'])){
					$demo_data['record']=$this->input->post('record');
						}
						if(isset($_POST['ispaid'])){
					$demo_data['ispaid']=$this->input->post('ispaid');
						}
						if(isset($_POST['is_recurring'])){
					$demo_data['is_recurring']=$this->input->post('is_recurring');
						}
						if(!empty($_POST['repeat'])){
					$demo_data['repeat']=$this->input->post('repeat');
						}
					if(isset($_POST['weekdays'])){
								$weakdays="";
							$wd=$_POST['weekdays'];
							count($wd);
							for($i=0;$i<count($wd);$i++){
							if($i == count($wd)-1){
							$weakdays.= $wd[$i];
								}else{
								$weakdays.= $wd[$i].',';
								}					
								}
						$demo_data['weekdays'] = $weakdays;
						}
					
					//echo"<pre>";print_r($demo_data);die;					
      				//$result=$this->schedule_live_class($title,$timezone,$start_time,$end_time,$from_date,$end_date,$seat_attendees,);      				
      				  $result=$this->schedule_live_class($demo_data);
						if($result->status == 'ok'){
						$class_id=$result->class_id;
						if(isset($_POST['is_recurring'])){
						    if($_POST['is_recurring']===1){
						        $date=$this->input->post('to_date');
						    }else{
						       $date=$this->input->post('from_date'); 
						    }
						}else{
						  $date=$this->input->post('from_date');  
						}
						$data=array(
								'title'=>$this->input->post('title'),
								'timezone'=>$this->input->post('timezone'),
								'start_time'=>$this->input->post('from_time'),
								'end_time'=>$this->input->post('to_time'),
								'date'=>$this->input->post('from_date'),
								'end_date'=>$date,
								'seat_attendees'=>$this->input->post('seat_attendees'),
								'class_id'=>$class_id	
								);						
								$insert=$this->Course_model->insert('create_demo_class_id_table',$data);
								$this->session->set_flashdata('flash_message',"Class generated");
								redirect('admin/live_classes/demo_class_id_list');						
								}else{				
									$this->session->set_flashdata('error_message',"$result->error");
											redirect('admin/live_classes/demo_class_id');
								}     				
					}
	function demo_class($param1 = '', $param2 = '', $param3 = ''){

           $table="demo_class_table";

		if ($param1 == 'add')
            {
      		 $page_data['course_data']=$this->Home_model->get_group_subject();	
             $page_data['tutor_data']=$this->Home_model->get_active_data('tutor');
             $page_data['student_data']=$this->Home_model->get_active_data('student');
             $page_data['page_name']="demo_class_add";
             $page_data['page_title']="Get Class Url";
             $this->load->view('backend/index', $page_data);

           }
            if ($param1 == 'insert')
             {     		    
      				 $class_id=$this->input->post('class_id');			 
      				 $isTeacher=$this->input->post('isTeacher');				 
      				 $lessonName=$this->input->post('lession');
      				 $courseName=$this->input->post('course');
					 $class_time = $this->db->where('class_id',$class_id)->get('create_demo_class_id_table')->row();
					 $start_time=$class_time->start_time;
					 $end_time=$class_time->end_time;
      				 if($isTeacher == 1){
      						$user_id = $this->input->post('user_id');
      						$user_name = $this->db->where('generated_id',$user_id)->get('tutor')->row()->name;
      						$url_data=array(
      							 'class_id'=>$class_id,
      							 'userId'=>$user_id,
      							 'userName'=>$user_name,
      							 'isTeacher'=>$isTeacher,
      							 'lessonName'=>$lessonName,
      							 'courseName'=>$courseName				 
      							 );
						
      				    
      				 
      				 $tutor_class=$this->lanch_live_class($url_data);
      				 if($tutor_class->status == 'ok'){ 
      					 $tutor_link = $tutor_class->launchurl; 
						 $fee_hour=$this->input->post('fee_hour'); 
      					 $requested_hour=$this->input->post('requested_hour');
      					 $total_fee=  $fee_hour*$requested_hour;
      					 $total_mins= $requested_hour*(60);
      					 $fee_per_min = $fee_hour/(60); 
      					 $meeting_id=$class_id;

      					$data=array(              
      					  'tutor_id'=>$user_id,
      					  'tutor_name'=>$user_name,					  
      					  'fee_hour'=>$this->input->post('fee_hour'),
      					  'requested_hour'=>$this->input->post('requested_hour'),
      					  'no_of_days'=>$this->input->post('no_of_days'),
      					  'from_time'=>$start_time,
      					  'to_time'=>$end_time,
      					  'from_date'=>$this->input->post('from_date'),
      					  'to_date'=>$this->input->post('to_date'),
      					  'mins_per_class'=>'',
      					  'fee_per_mins'=>$fee_per_min,
      					  'requested_mins'=>$total_mins,
      					  'total_fee'=>$total_fee,
      					  'class_id'=>$meeting_id,
      					  'class_link'=>$tutor_link,					  
      					  'created_date'=>date('Y-m-d'),
      					  'expire_date'=>$this->input->post('to_date')             
      					);
						
      								 
      					$result1=$this->Course_model->insert($table,$data);       
      					if($result1="success"){
      					  /*SEND EMAIL*/						  
      					  //tutor_email=$this->Home_model->get_email_gen_id('tutor',$tutor_id);
      					  
      									$this->session->set_flashdata('flash_message',"Classes url generated successfully");
      									redirect('admin/live_classes/demo_class/view');
      					
      					}else{
      						  $this->session->set_flashdata('error_message',"Not uploaded");
      							redirect('admin/live_classes/demo_class/view');
      						}
      				 }else{
      					$this->session->set_flashdata('error_message',"$tutor_class->error");
                           redirect('admin/live_classes/demo_class/view');					
      				}
      					 }else{
      					 /*=====STUDENT CLASS=============*/
      					 	
      							$student=$this->input->post('user_id'); 
      							
      							 $count= count($_POST['user_id']);
      							$url=  "https://api.braincert.com/v2/getclasslaunch?apikey=0M1zj8t4kOZodQ0rqiON";
      							for($i=0;$i<$count;$i++){
									$ch = curl_init();
									$student_id=$student[$i];
									$student_name = $this->db->where('generated_id',$student_id)->get('student')->row()->name;			
      							
      								   if (!$ch) {
      									   die("Couldn't initialize a cURL handle");
      								   }

      								   $ret = curl_setopt($ch, CURLOPT_URL, $url);

      								   curl_setopt($ch, CURLOPT_POST, 1);

      								   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      								   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

      								   curl_setopt($ch, CURLOPT_POSTFIELDS, "class_id=$class_id&userId=$student_id&userName=$student_name&isTeacher=$isTeacher&lessonName=$lessonName&courseName=$courseName");

      								   $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      								   $curlresponse = curl_exec($ch); // execute
									   
									   curl_close($ch);
      								   
      								   $student_class =json_decode($curlresponse);									   
									   
      								    if($student_class->status == 'ok'){
      											$student_link=$student_class->launchurl;
      												$data1= array(
													'class_id'=>$class_id,
      												'student_id'=>$student_id,
      												'student_name'=>$student_name,
													'from_time'=>$start_time,
												    'to_time'=>$end_time,
												    'from_date'=>$this->input->post('from_date'),
												    'to_date'=>$this->input->post('to_date'),
      												'class_link'=>$student_link
      												);
      												$result=$this->Course_model->insert('demo_student_link',$data1); 
      																					
      									
      										}else{
      											$this->session->set_flashdata('error_message',"$student_class->error");
      											redirect('admin/live_classes/demo_class/view');				
      										}									
      									
      						}
							if($result="success"){
							  /*SEND EMAIL*/
							  //tutor_email=$this->Home_model->get_email_gen_id('tutor',$tutor_id);
							  //student_email=$this->Home_model->get_email_gen_id('student',$student_id);
							  
								$this->session->set_flashdata('flash_message',"Data uploaded");
								redirect('admin/live_classes/demo_class/view');
							}else{
								  $this->session->set_flashdata('error_message',"Not uploaded");
									redirect('admin/live_classes/demo_class/view');
								}
      					 }
      				 
      			     
						}
                       
                
                   if ($param1 == 'view')
                    {
                    $page_data['data']=$this->Home_model->get_data($table);
                    $page_data['page_name']="demo_class_list";
                    $page_data['page_title']="Demo Classes List";
                    $this->load->view('backend/index', $page_data);
                  }
          }
		  function demo_class_student($class_id=""){
            $table="demo_student_link";
                    $page_data['data']=$this->Home_model->class_student_list($table,$class_id);
                    $page_data['page_name']="demo_student_list";
                    $page_data['page_title']="Demo class student List";
                   $this->load->view('backend/index', $page_data);
          }
		  function main_class_student($class_id=""){
            $table="main_student_link";
                    $page_data['data']=$this->Home_model->class_student_list($table,$class_id);
                    $page_data['page_name']="main_student_list";
                    $page_data['page_title']="Main class student List";
                   $this->load->view('backend/index', $page_data);
          }

          function tobe_exipred_demo(){
            $table="create_demo_class_id_table";
                    $page_data['data']=$this->Home_model->get_to_expire($table);
                    $page_data['page_name']="demo_tobe_expire";
                    $page_data['page_title']="Demo to be Expired";
                   $this->load->view('backend/index', $page_data);
          } 

          function exipred_demo(){
            $table="create_demo_class_id_table";
                    $page_data['data']=$this->Home_model->get_expired($table);
                    $page_data['page_name']="demo_expired";
                    $page_data['page_title']="Expired Demo classes";
                   $this->load->view('backend/index', $page_data);
          }
		  
		  /*======MAIN CLASS=============*/
		  
		  function main_class_id_list(){
         if($this->input->post()){     
			  $data=$_POST; 
			  $data1=array();
			  foreach ($data as $key => $value) {
					$value = trim($value);
					if (!empty($value)){
					  $data1[$key]=$value;
				  }
			  }
			  }else{
			  $data1 = array();
			  }
			   $page_data['demo_data']=$page_data['data']=$this->Home_model->get_data('create_main_class_id_table');
			   $page_data['data']=$this->list_class1($data1);
			   $page_data['page_name']="main_class_id_list";
			   $page_data['page_title']="main class list";
			   $this->load->view('backend/index', $page_data);
        }
        function main_class_id(){   
           $page_data['page_name']="create_main_class_id";
             $page_data['page_title']="main class id";
             $this->load->view('backend/index', $page_data);
        }
        function create_main_class_id(){
          
          
              $title=$this->input->post('title');
              $timezone=$this->input->post('timezone');
              $start_time= $this->input->post('from_time');
              $end_time= $this->input->post('to_time');
              $from_date=$this->input->post('from_date');
              $end_date=$this->input->post('to_date');
              $seat_attendees=$this->input->post('seat_attendees');
              $record=$this->input->post('record');
              $ispaid=$this->input->post('ispaid');
              
              $demo_data=array(
              'title'=>$title,
              'timezone'=>$timezone,
              'start_time'=>$start_time,
              'end_time'=>$end_time,
              'date'=>$from_date,
              'end_date'=>$end_date,
              'seat_attendees'=>$seat_attendees,
              'record'=>$record,
              'ispaid'=>$ispaid
              );
              //$result=$this->schedule_live_class($title,$timezone,$start_time,$end_time,$from_date,$end_date,$seat_attendees,);             
                $result=$this->schedule_live_class($demo_data);
            if($result->status == 'ok'){
            $class_id=$result->class_id;
            if(isset($_POST['is_recurring'])){
						    if($_POST['is_recurring']===1){
						        $date=$this->input->post('to_date');
						    }else{
						       $date=$this->input->post('from_date'); 
						    }
						}else{
						  $date=$this->input->post('from_date');  
						}
            $data=array(
                'title'=>$this->input->post('title'),
                'timezone'=>$this->input->post('timezone'),
                'start_time'=>$start_time,
                'end_time'=>$end_time,
                'date'=>$this->input->post('from_date'),
                'end_date'=>$date,
                'seat_attendees'=>$this->input->post('seat_attendees'),
                'class_id'=>$class_id 
                );            
                $insert=$this->Course_model->insert('create_main_class_id_table',$data);
                $this->session->set_flashdata('flash_message',"Class generated");
                redirect('admin/live_classes/main_class_id_list');            
                }else{        
                  $this->session->set_flashdata('error_message',"$result->error");
                      redirect('admin/live_classes/main_class_id_list');
                }             
          
              
        }
		
		function main_class($param1 = '', $param2 = '', $param3 = ''){

           $table="main_class_table";

    if ($param1 == 'add')
            {
			 $page_data['course_data']=$this->Home_model->get_data('course'); 
             $page_data['tutor_data']=$this->Home_model->get_active_data('tutor');
             $page_data['student_data']=$this->Home_model->get_active_data('student');
             $page_data['page_name']="main_class_add";
             $page_data['page_title']="Get Class Url";
             $this->load->view('backend/index', $page_data);

           }
            if ($param1 == 'insert')
             {            
            
             /*$ft= date("H:i", strtotime($this->input->post('from_time')));
             $tt= date("H:i", strtotime($this->input->post('to_time')));   
             
             $new_ft =  substr($ft,0,5);
             $new_ft = str_replace(':','',$new_ft);
             
             $new_tt =  substr($tt,0,5);
              $new_tt = str_replace(':','',$new_tt);
              echo $d= $new_tt-$new_ft;*/
              
            /*  $date1 = date("Y-m-d",strtotime($_POST['from_date']));
              $date2 = date("Y-m-d",strtotime($_POST['to_date']));

              $diff = abs(strtotime($date2) - strtotime($date1));

              $years = floor($diff / (365*60*60*24));
              $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
              $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); */
             
              /*launch class*/
              
              
               $class_id=$this->input->post('class_id');       
               $isTeacher=$this->input->post('isTeacher');         
               $lessonName=$this->input->post('lession');
               $courseName=$this->input->post('course');
               if($isTeacher == 1){
                  $user_id = $this->input->post('user_id');
                  $user_name = $this->db->where('generated_id',$user_id)->get('tutor')->row()->name;
                  $url_data=array(
                     'class_id'=>$class_id,
                     'userId'=>$user_id,
                     'userName'=>$user_name,
                     'isTeacher'=>$isTeacher,
                     'lessonName'=>$lessonName,
                     'courseName'=>$courseName         
                     );
               //print_r($url_data);die;   
               
               $tutor_class=$this->lanch_live_class($url_data);
               if($tutor_class->status == 'ok'){       
                 
                $tutor_link = $tutor_class->launchurl;
                
                  $fee_hour=$this->input->post('fee_hour');
                  
                  $requested_hour=$this->input->post('requested_hour');

                  $total_fee=  $fee_hour*$requested_hour;

                  $total_mins= $requested_hour*(60);

                  $fee_per_min = $fee_hour/(60);
                  
                 $meeting_id=$class_id;

                $data=array(              
                  'tutor_id'=>$user_id,
                  'tutor_name'=>$user_name,            
                  'fee_hour'=>$this->input->post('fee_hour'),
                  'requested_hour'=>$this->input->post('requested_hour'),
                  'no_of_days'=>$this->input->post('no_of_days'),
                  'from_time'=>$this->input->post('from_time'),
                  'to_time'=>$this->input->post('to_time'),
                  'from_date'=>$this->input->post('from_date'),
                  'to_date'=>$this->input->post('to_date'),
                  'mins_per_class'=>'',
                  'fee_per_mins'=>$fee_per_min,
                  'requested_mins'=>$total_mins,
                  'total_fee'=>$total_fee,
                  'class_id'=>$meeting_id,
                  'tutor_link'=>$tutor_link,            
                  'created_date'=>date('Y-m-d'),
                  'expire_date'=>$this->input->post('to_date')             
                );
                         
                $result1=$this->Course_model->insert($table,$data);       
                if($result1="success"){
                  /*SEND EMAIL*/              
                  //tutor_email=$this->Home_model->get_email_gen_id('tutor',$tutor_id);
                  
                        $this->session->set_flashdata('flash_message',"Classes url generated successfully");
                        redirect('admin/live_classes/main_class/view');
                
                }else{
                    $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/live_classes/main_class/view');
                  }
               }else{
                $this->session->set_flashdata('error_message',"$tutor_class->error");
                           redirect('admin/live_classes/main_class/view');          
              }
                 }else{
                 /*=====STUDENT CLASS=============*/
                  
                    $student=$this->input->post('user_id'); 
                    //echo"<pre>";print_r($student);
                    $count= count($_POST['user_id']);
					 
                    $url=  "https://api.braincert.com/v2/getclasslaunch?apikey=0M1zj8t4kOZodQ0rqiON";              
                     
                    for($i=0;$i<$count;$i++){
                  $ch = curl_init();
                  $student_id=$student[$i];
                  $student_name = $this->db->where('generated_id',$student_id)->get('student')->row()->name;      
                    
                         if (!$ch) {
                           die("Couldn't initialize a cURL handle");
                         }

                         $ret = curl_setopt($ch, CURLOPT_URL, $url);

                         curl_setopt($ch, CURLOPT_POST, 1);

                         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

                         curl_setopt($ch, CURLOPT_POSTFIELDS, "class_id=$class_id&userId=$student_id&userName=$student_name&isTeacher=$isTeacher&lessonName=$lessonName&courseName=$courseName");

                         $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                         $curlresponse = curl_exec($ch); // execute
                     
                     curl_close($ch);
                         
                         $student_class =json_decode($curlresponse);                     
                     
                          if($student_class->status == 'ok'){
                            $student_link=$student_class->launchurl;              
                    
                              $data1= array(          
                              'class_id'=>$class_id,
                              'student_id'=>$student_id,
                              'student_name'=>$student_name,
                              'class_link'=>$student_link
                              );
                              $result=$this->Course_model->insert('main_student_link',$data1); 
                                                
                        
                          }else{
                            $this->session->set_flashdata('error_message',"$student_class->error");
                            redirect('admin/live_classes/main_class/view');       
                          }                 
                        
                  }
              if($result="success"){
                /*SEND EMAIL*/
                //tutor_email=$this->Home_model->get_email_gen_id('tutor',$tutor_id);
                //student_email=$this->Home_model->get_email_gen_id('student',$student_id);
                
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/live_classes/main_class/view');
              }else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                  redirect('admin/live_classes/main_class/view');
                }
                 }
               
                 
           }
                       if ($param1 == 'edit')
                    {
                    $where['id'] = $param2;
                    $page_data['tutor_data']=$this->Home_model->get_active_data('tutor');
                    $page_data['student_data']=$this->Home_model->get_active_data('student');
                    $page_data['data']=$this->Course_model->edit_operation($table,$where);
                    $page_data['page_name']="main_class_edit";
                    $page_data['page_title']="EDIT";
                   $this->load->view('backend/index', $page_data);

      }
                   if($param1 == 'update')
                   {
                    
                    $fee_hour=$this->input->post('fee_hour');
                    $requested_hour=$this->input->post('requested_hour');

                     $total_fee=  $fee_hour*$requested_hour;

                     $total_mins= $requested_hour*(60);

                     $fee_per_min = $fee_hour/(60);         

                    $where['id'] = $param2;            
                   $data=array(              
                    'tutor_id'=>$this->input->post('tutor_id'),
                    'student_id'=>$this->input->post('student_id'),
                    'fee_hour'=>$this->input->post('fee_hour'),
                    'requested_hour'=>$this->input->post('requested_hour'),
                    'no_of_days'=>$this->input->post('no_of_days'),
                    'from_time'=>$this->input->post('from_time'),
                    'to_time'=>$this->input->post('to_time'),
                    'from_date'=>$this->input->post('from_date'),
                    'to_date'=>$this->input->post('to_date'),
                    'mins_per_class'=>$this->input->post('mins_per_class'),
                    'fee_per_mins'=>$fee_per_min,
                    'requested_mins'=>$total_mins,
                    'total_fee'=>$total_fee,              
                    'meeting_link'=>$this->input->post('meeting_link'),              
                    'expire_date'=>$this->input->post('to_date')             
                  );
                  

                      $result=$this->Course_model->update($table,$data,$where);       
                      if($result="success"){
                        $this->session->set_flashdata('flash_message',"Data Updated");
                          redirect('admin/live_classes/main_class/view');
                      }
                          
                      else{
                        $this->session->set_flashdata('error_message',"Not uploaded");
                          redirect('admin/live_classes/main_class/view');
                      }
                        
                          }

                          if ($param1 == 'delete')
                    {
                    $where['id'] = $param2;
                    $page_data['data']=$this->Course_model->delete($table,$where);
                    if($result="success"){
                        $this->session->set_flashdata('flash_message',"Data Deleted");
                          redirect('admin/live_classes/main_class/view');
                      }
                   

                   }
                   
                   if ($param1 == 'view')
                    {
                    $page_data['data']=$this->Home_model->get_data($table);
                    $page_data['page_name']="main_class_list";
                    $page_data['page_title']="main Classes List";
                   $this->load->view('backend/index', $page_data);
                  }
          }
		  function tobe_exipred_main(){
            $table="create_main_class_id_table";
                    $page_data['data']=$this->Home_model->get_to_expire_main($table);
                    $page_data['page_name']="main_tobe_expire";
                    $page_data['page_title']="main to be exipred";
                   $this->load->view('backend/index', $page_data);
          } 

          function exipred_main(){
            $table="create_main_class_id_table";
                    $page_data['data']=$this->Home_model->get_expired_main($table);
                    $page_data['page_name']="main_expired";
                    $page_data['page_title']="main exipred";
                   $this->load->view('backend/index', $page_data);
          }


  		
					
					
					
					
				
				
			}		
?>