<?php
            if (!defined('BASEPATH'))
                exit('No direct script access allowed');
            class Admin extends CI_Controller
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


                private function upload_file($file_name)
                {
                  //ini_set('upload_max_filesize', '30480000');
                        $upload_path1 = "uploads/addaalo/";
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

                private function multiple_file($file_name)
                {
                  //ini_set('upload_max_filesize', '30480000');
                        $upload_path1 = "uploads/multiple/";
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

                private function multiple1_file($files)
            {
                $config = array(
                    'upload_path'   => "uploads/multiple/",
                    'allowed_types' => '*',
                    'overwrite'     => 1,        
                );
                $title=time().rand(0000,8989455);
                $this->load->library('upload', $config);

                $images = array();

               
                for($i=0; $i<count($files["name"]); $i++){
             
                    $_FILES['image']['name']= $files['name'][$i];
                    $_FILES['image']['type']= $files['type'][$i];
                    $_FILES['image']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['image']['error']= $files['error'][$i];
                    $_FILES['image']['size']= $files['size'][$i];

                    $fileName = $title .'_'. $files['name'][$i];

                    $image[] = $fileName;

                    $config['file_name'] = $fileName;

                    $this->upload->initialize($config);   
                   // $pic=array();   

                    if ($this->upload->do_upload('image')) {
                   
                       return  $file = $this->upload->data('file_name');

                              
                        
                      }
                     else {
                        return false;
                    }
                }
                //print_r($this->upload->data());
              //  return $file;
            }
      	  
      	  
      	  
      	  function tutor_details($tutor_id){
      		  $pagedata['information_data']      =   $this->db->get_where('tutor_personal_profile' , array('tutor_id' => $tutor_id) )->row();
      		  $pagedata['teaching_data']      =   $this->db->get_where('tutor_teaching' , array('tutor_id' => $tutor_id) )->row();
      		  $pagedata['subject_data']		=	$this->db->get_where('tutor_subjects' , array('tutor_id' => $tutor_id) )->result();
      		  $pagedata['education_data']		=	$this->db->get_where('tutor_degree' , array('tutor_id' => $tutor_id) )->result();
      		  $pagedata['timeslot_data']		=	$this->db->get_where('tutor_timeslot' , array('tutor_id' => $tutor_id) )->result();
      		  $this->load->view('backend/admin/tutor_view',$pagedata);
      	  }
      	  function student_details($student_id){
      		  $pagedata['information_data']      =   $this->db->get_where('student_personal_profile' , array('student_id' => $student_id) )->row();		 
      		  $pagedata['subject_data']		=	$this->db->get_where('student_subject' , array('student_id' => $student_id) )->result();
      		  $pagedata['education_data']		=	$this->db->get_where('student_personal_qualification' , array('student_id' => $student_id) )->result();		  
      		  $this->load->view('backend/admin/student_view',$pagedata);
      	  }

             function dashboard()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
                     
                    $page_data['page_name']  = 'dashboard';
                    $page_data['page_title'] = 'Admin Dashboard';
                    $this->load->view('backend/index', $page_data);
                }
      		  
      		  function student()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                     $page_data['data']=$this->Home_model->get_student_data('student');
                    $page_data['page_name']  = 'student_list';
                    $page_data['page_title'] = 'Students List';
                    $this->load->view('backend/index', $page_data);
                }
      		  		  function student_incomplete()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                     $page_data['data']=$this->Home_model->incomplete_student_data('student');
                    $page_data['page_name']  = 'student_incomplete_list';
                    $page_data['page_title'] = 'Students List';
                    $this->load->view('backend/index', $page_data);
                }
      		  function student_request_data()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                     $page_data['data']=$this->Home_model->get_data('student_request_class');
                    $page_data['page_name']  = 'student_request_class';
                    $page_data['page_title'] = 'Students Request List';
                    $this->load->view('backend/index', $page_data);
                }
      		  
      		  function student_request_edit($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                     
      			   $data = array(
      			   'request_tutor_id'=>$this->input->post('request_tutor_id'),
      			   'currency_type'=>$this->input->post('currency_type'),
      			   'hour_price'=>$this->input->post('hour_price')
      			   );
      			   
      			   $where['id']=$id;
      				$result=$this->Home_model->update('student_request_class',$data,$where);
      					$this->session->set_flashdata('flash_message',"Tutor Updated");
                      redirect('admin/admin/student_request_data');
                }
      		  
      		  
      		  function tutor()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                    $page_data['data']=$this->Home_model->get_tutor_data('tutor'); 
                    $page_data['page_name']  = 'tutor_list';
                    $page_data['page_title'] = 'Completed Tutor List';
                    $this->load->view('backend/index', $page_data);
                }
      		  function incompleted_tutor()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                    $page_data['data']=$this->Home_model->incopmlete_tutor_data('tutor'); 
                    $page_data['page_name']  = 'tutor_incomplete_list';
                    $page_data['page_title'] = 'Inompleted Tutor List';
                    $this->load->view('backend/index', $page_data);
                }
      		  
      		  function active_tutor($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  $admin_status = $this->db->where('id',$id)->get('tutor')->row()->admin_status;
      			 if($admin_status == 1){
      				$data['admin_status'] = 0;
      				$this->session->set_flashdata('error_message',"Tutor Inactive");	
      			 }else{
      				 $data['admin_status'] = 1;
      				 $this->session->set_flashdata('flash_message',"Tutor Activated");
      			 }            
      			  
      			  $where['id']=$id;
      			  $result=$this->Home_model->update('tutor',$data,$where);			 
                      redirect('admin/admin/tutor');
                }
      		  function active_student($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  $admin_status = $this->db->where('id',$id)->get('student')->row()->admin_status;
      			 if($admin_status == 1){
      				$data['admin_status'] = 0;
      				$this->session->set_flashdata('error_message',"Student Inactive");	
      			 }else{
      				 $data['admin_status'] = 1;
      				 $this->session->set_flashdata('flash_message',"Student Activated");
      			 }             
      			  
      			  $where['id']=$id;
      			  $result=$this->Home_model->update('student',$data,$where);			  
                      redirect('admin/admin/student');
                }
      		  function block_tutor($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                   $block = $this->db->where('id',$id)->get('tutor')->row()->block_status;
      			 if($block == 1){
      				$data['block_status'] = 0;
      				$this->session->set_flashdata('error_message',"Tutor Blocked");	
      			 }else{
      				 $data['block_status'] = 1;
      				 $this->session->set_flashdata('flash_message',"Tutor Activated");
      			 }	 
      			  
      			  $where['id']=$id;
      			  $result=$this->Home_model->update('tutor',$data,$where);
      			  
                      redirect('admin/admin/tutor');
                }
      		  function block_student($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                   $block = $this->db->where('id',$id)->get('student')->row()->block_status;
      			 
      			 if($block == 1){
      				$data['block_status'] = 0;
      				$this->session->set_flashdata('error_message',"Student Blocked");	
      			 }else{
      				 $data['block_status'] = 1;
      				 $this->session->set_flashdata('flash_message',"Student Activated");
      			 }	 
      			 
      			  $where['id']=$id;			   
      			  $result=$this->Home_model->update('student',$data,$where);			  
                      redirect('admin/admin/student');
                }
				function delete_tutor($id="")
                {
				$where['id'] = $id;
                    $page_data['data']=$this->Course_model->delete('tutor',$where);
                    if($result="success"){
                        $this->session->set_flashdata('flash_message',"Data Deleted");
                          redirect('admin/admin/tutor');
					}
				}
				function delete_student($id="")
                {
				$where['id'] = $id;
                    $page_data['data']=$this->Course_model->delete('student',$where);
                    if($result="success"){
                        $this->session->set_flashdata('flash_message',"Data Deleted");
                          redirect('admin/admin/student');
					}
				}
      		  function shortlist_data($id="")
                {
      			  
                    $page_data['data']=$this->Home_model->get_tutor_data('tutor'); 
                    $page_data['page_name']  = 'tutor_list';
                    $page_data['page_title'] = 'Tutor List';
                    $this->load->view('backend/index', $page_data);
                }

          
      
      function create_class($param1 = '', $param2 = '', $param3 = ''){
      	
      		$page_data['tutor_data']=$this->Home_model->get_active_data('tutor');
             $page_data['student_data']=$this->Home_model->get_active_data('student');
             $page_data['page_name']="class_create";
             $page_data['page_title']="ADD";
             $this->load->view('backend/index', $page_data);
      }
      function create_class_insert($param1 = '', $param2 = '', $param3 = ''){
      	
      	//print_r($_POST);die;
      	$title=$this->input->post('title');
      	$timezone=$this->input->post('timezone');
      	$start_time= date('h:i A',strtotime($this->input->post('from_time')));
      	$end_time= date('h:i A',strtotime($this->input->post('to_time')));
      	$from_date=$this->input->post('from_date');
      	$end_date=$this->input->post('to_date');
      				print_r($result);die;
      		$result=$this->schedule_live_class($title,$timezone,$start_time,$end_time,$from_date,$end_date);
      			
      			if($result->status == 'ok'){
      				$class_id=$result->class_id;
      				$data=array(
      						'title'=>$this->input->post('title'),
      						'timezone'=>$this->input->post('timezone'),
      						'start_time'=>$start_time,
      						'end_time'=>$end_time,
      						'date'=>$this->input->post('from_date'),
      						'end_date'=>$this->input->post('to_date'),
      						'class_id'=>$class_id	
      						);						
      						$insert=$this->Course_model->insert('create_online_class_table',$data);
      						$this->session->set_flashdata('flash_message',"Class generated");
      						redirect('admin/admin/class_list');						
      			}else{				
      				$this->session->set_flashdata('error_message',"$result->error");
      						redirect('admin/admin/class_list');
      			}
      	
      }
      function class_list($param1 = '', $param2 = '', $param3 = ''){
      	
      			$page_data['data']=$this->Home_model->get_data('create_online_class_table');
      				$page_data['form_name']=$param1;
                    $page_data['page_name']="class_list";
                    $page_data['page_title']="demo";
                   $this->load->view('backend/index', $page_data); 
      }




       /*employee*/
            function employee($param1 = '', $param2 = '', $param3 = ''){

             $table="employee";

             if ($param1 == 'add')
              {

               $page_data['page_name']="employee_add";
              $page_data['page_title']="ADD";
             $this->load->view('backend/index', $page_data);

             }
              if ($param1 == 'insert')
               {        
                //print_r($_POST);die;
                   
                    $data=array(
                      'name'=>$this->input->post('name'),
                      'email'=>$this->input->post('email'),
                      'phone'=>$this->input->post('phone'),
                      'address'=>$this->input->post('address'),
                      'employee_id'=>$this->input->post('employee_id'),              
                      'status'=>$this->input->post('status'),
                    );
                    //print_r($data);die;            
                    $result=$this->Home_model->insert($table,$data);       
                    if($result="success"){
                        $this->session->set_flashdata('flash_message',"Data uploaded");
                        redirect('admin/admin/employee/view');
                    }
                            
                        else{
                          $this->session->set_flashdata('error_message',"Not uploaded");
                            redirect('admin/admin/employee/view');
                        }
                          
                            
                         }
                         if ($param1 == 'edit')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="employee_edit";
                      $page_data['page_title']="EDIT";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                      $where['id'] = $param2;
                     $data=array(
                      'name'=>$this->input->post('name'),
                      'email'=>$this->input->post('email'),
                      'phone'=>$this->input->post('phone'),
                      'address'=>$this->input->post('address'),
                      'employee_id'=>$this->input->post('employee_id'),              
                      'status'=>$this->input->post('status'),
                     );
                      

                        $result=$this->Home_model->update($table,$data,$where); 
                              
                        if($result="success"){
                          $this->session->set_flashdata('flash_message',"Data Updated");
                            redirect('admin/admin/employee/view');
                        }
                            
                        else{
                          $this->session->set_flashdata('error_message',"Not uploaded");
                            redirect('admin/admin/employee/view');
                        }
                          
                            }

                            if ($param1 == 'delete')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->delete($table,$where);
                      if($result="success"){
                          $this->session->set_flashdata('flash_message',"Data Deleted");
                            redirect('admin/admin/employee/view');
                        }
                     

                     }
                     
                     if ($param1 == 'view')
                      {
                      $page_data['data']=$this->Home_model->get_data($table);
                      $page_data['page_name']="employee_list";
                      $page_data['page_title']="employee";
                     $this->load->view('backend/index', $page_data);
                    }
            }


             
            function generate_bulk_employee_csv()
            {      
               

                $file   = fopen("uploads/bulk_employee.csv", "w");
                $line   = array('name', 'email', 'phone', 'address','employee_id');
                fputcsv($file, $line, ',');
               echo $file_path = base_url() . 'uploads/bulk_employee.csv';
            }

             function bulk_employee_add_using_csv($param1 = '') {

                
               if ($param1 == 'import') {
                 

                      move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/bulk_employee.csv');
                      $csv = array_map('str_getcsv', file('uploads/bulk_employee.csv'));
                      $count = 1;
                      $array_size = sizeof($csv);

                     foreach ($csv as $row) {
                          if ($count == 1) {
                              $count++;
                              continue;
                          }                  

                          $data['name']      = $row[0];
                          $data['email']  = $row[1];
                          $data['phone']     = $row[2];
                          $data['address']  = $row[3];
                          $data['employee_id']     = $row[4];              

                      
                      $result=$this->Home_model->insert('employee',$data);
                      }
                      if($result) {
                        $this->session->set_flashdata('flash_message', 'Data imported');
                      redirect(base_url() . 'admin/employee/view', 'refresh');
                      }
                      
                   
               
                $page_data['page_name']  = 'bulk_employee_add';
                $page_data['page_title'] = 'employee add';
                $this->load->view('backend/index', $page_data);
            }
            if ($param1 == 'view') {

            $page_data['page_name']  = 'bulk_employee_add';
                $page_data['page_title'] = 'employee add';
                $this->load->view('backend/index', $page_data);
            }

          }


            


            
           
           



            /*Social Media*/
              function social_media($param1 = '', $param2 = '', $param3 = ''){
             $table="social_media";
               
                         if ($param1 == 'edit')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="social_media_edit";
                      $page_data['page_title']="Edit";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                       
                      $where['id'] = $param2;       
                     
                            
                     $data=array(
                      'facebook'=>$this->input->post('facebook'),
                      'twitter'=>$this->input->post('twitter'),
                      'linked_in'=>$this->input->post('linked_in'),
                      'google_plus'=>$this->input->post('google_plus')
                      );
                    

                        $result=$this->Home_model->update($table,$data,$where);       
                        if($result="success"){
                          $this->session->set_flashdata('flash_message',"Data Updated");
                            redirect('admin/admin/social_media/edit/'.$param2);
                        }
                            
                        else{
                          $this->session->set_flashdata('error_message',"Not uploaded");
                            redirect('admin/admin/social_media/edit/'.$param2);
                        }
                          
                            }        
            }

                  function last_logins()
            {
              $table="admin_logins";
              $page_data['data']=$this->Home_model->get_data($table);
                      $page_data['page_name']="last_logins";
                      $page_data['page_title']="Last Logins";
                     $this->load->view('backend/index', $page_data);
            }


                
             function database_backup() {


                    $this->load->dbutil();
                    $prefs = array(
                        'format' => 'zip',
                        'filename' => 'my_db_backup.sql'
                    );
                    $backup = & $this->dbutil->backup($prefs);
                    $db_name = 'Eduzyte' . date("d-m-Y") . '.zip';
                    //$save = 'img/uploads/' . $db_name;
                    $this->load->helper('file');
                    //write_file($save, $backup);
                    $this->load->helper('download');
                    force_download($db_name, $backup);

                }




                /******MANAGE BILLING / INVOICES WITH STATUS*****/
               

                

                
               
            	
               
                /*****SITE/SYSTEM SETTINGS*********/
                function system_settings($param1 = '', $param2 = '', $param3 = '')
                {
                  
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url() . 'index.php/login', 'refresh');

                    if ($param1 == 'do_update') {

                        $data['description'] = $this->input->post('system_name');
                        $this->db->where('type' , 'system_name');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('system_title');
                        $this->db->where('type' , 'system_title');
                        $this->db->update('settings' , $data);

                        

                        $data['description'] = $this->input->post('footer_description');
                        $this->db->where('type' , 'footer_description');
                        $this->db->update('settings' , $data);
                       

                        $data['description'] = $this->input->post('meta_title');
                        $this->db->where('type' , 'meta_title');
                        $this->db->update('settings' , $data);            

                        $data['description'] = $this->input->post('meta_keywords');
                        $this->db->where('type' , 'meta_keywords');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('meta_description');
                        $this->db->where('type' , 'meta_description');
                        $this->db->update('settings' , $data);            

                        $data['description'] = $this->input->post('google_analytics_script');
                        $this->db->where('type' , 'google_analytics_script');
                        $this->db->update('settings' , $data);






                        $data['description'] = $this->input->post('currency');
                        $this->db->where('type' , 'currency');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('system_email');
                        $this->db->where('type' , 'system_email');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('system_name');
                        $this->db->where('type' , 'system_name');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('language');
                        $this->db->where('type' , 'language');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('text_align');
                        $this->db->where('type' , 'text_align');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('running_year');
                        $this->db->where('type' , 'running_year');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('purchase_code');
                        $this->db->where('type' , 'purchase_code');
                        $this->db->update('settings' , $data);

                        $this->session->set_flashdata('flash_message' , 'Data_updated');
                        redirect(base_url() . 'index.php/admin/admin/system_settings/', 'refresh');
                    }
                    if ($param1 == 'upload_logo') {
                        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
                        $this->session->set_flashdata('flash_message', 'Settings_updated');
                        redirect(base_url() . 'index.php/admin/admin/system_settings/', 'refresh');
                    }
                    if ($param1 == 'change_skin') {
                        $data['description'] = $param2;
                        $this->db->where('type' , 'skin_colour');
                        $this->db->update('settings' , $data);
                        $this->session->set_flashdata('flash_message' , 'Theme_selected');
                        redirect(base_url() . 'index.php/admin/admin/system_settings/', 'refresh');
                    }
                    $page_data['page_name']  = 'system_settings';
                    $page_data['page_title'] = 'System_settings';
                    $page_data['settings']   = $this->db->get('settings')->result_array();
                    $this->load->view('backend/index', $page_data);
                }

               
                // FRONTEND

                


                // FRONTEND


                function get_session_changer()
                {
                    $this->load->view('backend/admin/change_session');
                }

                function change_session()
                {
                    $data['description'] = $this->input->post('running_year');
                    $this->db->where('type' , 'running_year');
                    $this->db->update('settings' , $data);
                    $this->session->set_flashdata('flash_message' , 'Session_changed');
                    redirect(base_url() . 'index.php/admin/dashboard/', 'refresh');
                }

            	/***** UPDATE PRODUCT *****/

            	function update( $task = '', $purchase_code = '' ) {

                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');

                    // Create update directory.
                    $dir    = 'update';
                    if ( !is_dir($dir) )
                        mkdir($dir, 0777, true);

                    $zipped_file_name   = $_FILES["file_name"]["name"];
                    $path               = 'update/' . $zipped_file_name;

                    move_uploaded_file($_FILES["file_name"]["tmp_name"], $path);

                    // Unzip uploaded update file and remove zip file.
                    $zip = new ZipArchive;
                    $res = $zip->open($path);
                    if ($res === TRUE) {
                        $zip->extractTo('update');
                        $zip->close();
                        unlink($path);
                    }

                    $unzipped_file_name = substr($zipped_file_name, 0, -4);
                    $str                = file_get_contents('./update/' . $unzipped_file_name . '/update_config.json');
                    $json               = json_decode($str, true);



            		// Run php modifications
            		require './update/' . $unzipped_file_name . '/update_script.php';

                    // Create new directories.
                    if(!empty($json['directory'])) {
                        foreach($json['directory'] as $directory) {
                            if ( !is_dir( $directory['name']) )
                                mkdir( $directory['name'], 0777, true );
                        }
                    }

                    // Create/Replace new files.
                    if(!empty($json['files'])) {
                        foreach($json['files'] as $file)
                            copy($file['root_directory'], $file['update_directory']);
                    }

                    $this->session->set_flashdata('flash_message' , 'Product_updated_successfully');
                    redirect(base_url() . 'index.php/admin/system_settings');
                }

                /*****SMS SETTINGS*********/
                function sms_settings($param1 = '' , $param2 = '')
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url() . 'index.php/login', 'refresh');
                    if ($param1 == 'clickatell') {

                        $data['description'] = $this->input->post('clickatell_user');
                        $this->db->where('type' , 'clickatell_user');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('clickatell_password');
                        $this->db->where('type' , 'clickatell_password');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('clickatell_api_id');
                        $this->db->where('type' , 'clickatell_api_id');
                        $this->db->update('settings' , $data);

                        $this->session->set_flashdata('flash_message' , 'Data_updated');
                        redirect(base_url() . 'index.php/admin/sms_settings/', 'refresh');
                    }

                    if ($param1 == 'twilio') {

                        $data['description'] = $this->input->post('twilio_account_sid');
                        $this->db->where('type' , 'twilio_account_sid');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('twilio_auth_token');
                        $this->db->where('type' , 'twilio_auth_token');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('twilio_sender_phone_number');
                        $this->db->where('type' , 'twilio_sender_phone_number');
                        $this->db->update('settings' , $data);

                        $this->session->set_flashdata('flash_message' , 'Data_updated');
                        redirect(base_url() . 'index.php/admin/sms_settings/', 'refresh');
                    }
                    if ($param1 == 'msg91') {

                        $data['description'] = $this->input->post('authentication_key');
                        $this->db->where('type' , 'msg91_authentication_key');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('sender_ID');
                        $this->db->where('type' , 'msg91_sender_ID');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('msg91_route');
                        $this->db->where('type' , 'msg91_route');
                        $this->db->update('settings' , $data);

                        $data['description'] = $this->input->post('msg91_country_code');
                        $this->db->where('type' , 'msg91_country_code');
                        $this->db->update('settings' , $data);

                        $this->session->set_flashdata('flash_message' , 'Data_updated');
                        redirect(base_url() . 'index.php/admin/sms_settings/', 'refresh');
                    }

                    if ($param1 == 'active_service') {

                        $data['description'] = $this->input->post('active_sms_service');
                        $this->db->where('type' , 'active_sms_service');
                        $this->db->update('settings' , $data);

                        $this->session->set_flashdata('flash_message' , 'Data_updated');
                        redirect(base_url() . 'index.php/admin/sms_settings/', 'refresh');
                    }

                    $page_data['page_name']  = 'sms_settings';
                    $page_data['page_title'] = 'Sms_settings';
                    $page_data['settings']   = $this->db->get('settings')->result_array();
                    $this->load->view('backend/index', $page_data);
                }

                /*****LANGUAGE SETTINGS*********/
                function manage_language($param1 = '', $param2 = '', $param3 = '')
                {
                    if ($this->session->userdata('admin_login') != 1)
            			redirect(base_url() . 'index.php/login', 'refresh');

            		if ($param1 == 'edit_phrase') {
            			$page_data['edit_profile'] 	= $param2;
            		}
            		if ($param1 == 'update_phrase') {
            			$language	=	$param2;
            			$total_phrase	=	$this->input->post('total_phrase');
            			for($i = 1 ; $i < $total_phrase ; $i++)
            			{
            				//$data[$language]	=	$this->input->post('phrase').$i;
            				$this->db->where('phrase_id' , $i);
            				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
            			}
            			redirect(base_url() . 'index.php/admin/manage_language/edit_phrase/'.$language, 'refresh');
            		}
            		if ($param1 == 'do_update') {
            			$language        = $this->input->post('language');
            			$data[$language] = $this->input->post('phrase');
            			$this->db->where('phrase_id', $param2);
            			$this->db->update('language', $data);
            			$this->session->set_flashdata('flash_message', 'Settings_updated');
            			redirect(base_url() . 'index.php/admin/manage_language/', 'refresh');
            		}
            		if ($param1 == 'add_phrase') {
            			$data['phrase'] = $this->input->post('phrase');
            			$this->db->insert('language', $data);
            			$this->session->set_flashdata('flash_message', 'Settings_updated');
            			redirect(base_url() . 'index.php/admin/manage_language/', 'refresh');
            		}
            		if ($param1 == 'add_language') {
            			$language = $this->input->post('language');
            			$this->load->dbforge();
            			$fields = array(
            				$language => array(
            					'type' => 'LONGTEXT'
            				)
            			);
            			$this->dbforge->add_column('language', $fields);

            			$this->session->set_flashdata('flash_message', 'Settings_updated');
            			redirect(base_url() . 'index.php/admin/manage_language/', 'refresh');
            		}
            		if ($param1 == 'delete_language') {
            			$language = $param2;
            			$this->load->dbforge();
            			$this->dbforge->drop_column('language', $language);
            			$this->session->set_flashdata('flash_message', 'Settings_updated');

            			redirect(base_url() . 'index.php/admin/manage_language/', 'refresh');
            		}
            		$page_data['page_name']        = 'manage_language';
            		$page_data['page_title']       = 'Manage_language';
            		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
            		$this->load->view('backend/index', $page_data);
                }

                

                /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
                function manage_profile($param1 = '', $param2 = '', $param3 = '')
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url() . 'index.php/login', 'refresh');
                    if ($param1 == 'update_profile_info') {
                        $data['name']  = $this->input->post('name');
                        $data['email'] = $this->input->post('email');

                        $admin_id = $param2;

                        $validation = email_validation_for_edit($data['email'], $admin_id, 'admin');
                        if($validation == 1){
                          print_r($_POST);die;
                            $this->db->where('admin_id', $this->session->userdata('admin_id'));
                            $this->db->update('admin', $data);
                            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
                            $this->session->set_flashdata('flash_message', 'Account_updated');
                        }
                        else{
                          echo "else";die;                $this->session->set_flashdata('error_message', 'This_email_id_is_not_available');
                        }
                        redirect(base_url() . 'index.php/admin/manage_profile/', 'refresh');
                    }
                    if ($param1 == 'change_password') {
                        $data['password']             = sha1($this->input->post('password'));
                        $data['new_password']         = sha1($this->input->post('new_password'));
                        $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

                        $current_password = $this->db->get_where('admin', array(
                            'admin_id' => $this->session->userdata('admin_id')
                        ))->row()->password;
                        if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                            $this->db->where('admin_id', $this->session->userdata('admin_id'));
                            $this->db->update('admin', array(
                                'password' => $data['new_password']
                            ));
                            $this->session->set_flashdata('flash_message', 'Password_updated');
                        } else {
                            $this->session->set_flashdata('error_message', 'Password_mismatch');
                        }
                        redirect(base_url() . 'index.php/admin/manage_profile/', 'refresh');
                    }
                    $page_data['page_name']  = 'manage_profile';
                    $page_data['page_title'] = 'Manage_profile';
                    $page_data['edit_data']  = $this->db->get_where('admin', array(
                        'admin_id' => $this->session->userdata('admin_id')
                    ))->result_array();
                    $this->load->view('backend/index', $page_data);
                }


               

                // bulk student_add using CSV
               
               

                // Details of searched student
               
            }

?>