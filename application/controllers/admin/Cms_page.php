<?php
          if (!defined('BASEPATH'))
              exit('No direct script access allowed');
          class Cms_page extends CI_Controller
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


              private function upload_svg($file_name)
              {
                //ini_set('upload_max_filesize', '30480000');
                      $upload_path1 = "uploads/eduzyte/";
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

           private function make_seo_url($title) {
		return preg_replace('/[^a-z0-9_-]/i', '', strtolower(str_replace(' ', '-', trim($title))));
	}
          
          function about_us($param1 = '', $param2 = '', $param3 = '') {

           $table="about_us";
          
            
                       if ($param1 == 'view')
                    {
                    $where['id'] = 1;
                    $page_data['data']=$this->Home_model->edit_operation($table,$where);
                    $page_data['page_name']="about_us";
                    $page_data['page_title']="About us";
                   $this->load->view('backend/index', $page_data);

                   }
                   if($param1 == 'update')
                   {
                    
              $where['id'] = 1;
             
             
            $data=array('title_content'=>$this->input->post('title_content'),'about_us'=>$this->input->post('about_us'));
                        
                

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/about_us/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/about_us/view');
                }
                          }

                          
                   
          }

          function our_values($param1 = '', $param2 = '', $param3 = ''){

				$table="our_values";
           if($param1 == 'update'){
           // print_r($_POST);die;
                         $count=count($_POST['content']);
                          
                          $content_id=$_POST['content_id'];  
                          $content=$_POST['content'];

                          for($i=0;$i<$count;$i++) {                       
                               $content_id[$i];
                               $content[$i];
                             
                                $where['id']=$content_id[$i];
                                 $content_data=array(
                                'content'=>$content[$i],                              
                                  );   

                            $result=$this->Home_model->update($table,$content_data,$where);
                        }

                        $this->session->set_flashdata('flash_message',"Data Updated");
                          redirect('admin/cms_page/our_values/view');
                      }
          
           
           if ($param1 == 'view')
            {
            $page_data['data']=$this->Home_model->get_data($table);
            $page_data['page_name']="our_values_edit";
            $page_data['page_title']="our_values";
           $this->load->view('backend/index', $page_data);
          }
  }

   function terms_conditions($param1 = '', $param2 = '', $param3 = '') {

           $table="terms_conditions";
          
            
                       if ($param1 == 'view')
                    {
                    $where['id'] = 1;
                    $page_data['data']=$this->Home_model->edit_operation($table,$where);
                    $page_data['page_name']="terms_conditions";
                    $page_data['page_title']="Terms & Conditions";
                   $this->load->view('backend/index', $page_data);

                   }
                   if($param1 == 'update')
                   {
                    
              $where['id'] = 1;
             
             
            $data=array('content'=>$this->input->post('content'));
                        
                

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/terms_conditions/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/terms_conditions/view');
                }
                          }

                          
                   
          }

          function privacy_policy($param1 = '', $param2 = '', $param3 = '') {

           $table="terms_conditions";
          
            
                       if ($param1 == 'view')
                    {
                    $where['id'] = 2;
                    $page_data['data']=$this->Home_model->edit_operation($table,$where);
                    $page_data['page_name']="privacy_policy";
                    $page_data['page_title']="Terms & Conditions";
                   $this->load->view('backend/index', $page_data);

                   }
                   if($param1 == 'update')
                   {
                    
              $where['id'] = 2;
             
             
            $data=array('content'=>$this->input->post('content'));
                        
                

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/privacy_policy/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/privacy_policy/view');
                }
                          }

                          
                   
          }

          function cancellation_refund($param1 = '', $param2 = '', $param3 = '') {

           $table="terms_conditions";
          
            
                       if ($param1 == 'view')
                    {
                    $where['id'] = 3;
                    $page_data['data']=$this->Home_model->edit_operation($table,$where);
                    $page_data['page_name']="cancellation_refund";
                    $page_data['page_title']="Cancellation & Refund";
                   $this->load->view('backend/index', $page_data);

                   }
                   if($param1 == 'update')
                   {
                    
              $where['id'] = 3;
             
             
            $data=array('content'=>$this->input->post('content'));
                        
                

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/cancellation_refund/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/cancellation_refund/view');
                }
                          }

                          
                   
          }

           function feedback($param1 = '', $param2 = '', $param3 = '') {

           $table="terms_conditions";
          
            
                       if ($param1 == 'view')
                    {
                    $where['id'] = 4;
                    $page_data['data']=$this->Home_model->edit_operation($table,$where);
                    $page_data['page_name']="feedback";
                    $page_data['page_title']="Feedback";
                   $this->load->view('backend/index', $page_data);

                   }
                   if($param1 == 'update')
                   {
                    
              $where['id'] = 4;
             
             
            $data=array('content'=>$this->input->post('content'));
                        
                

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/feedback/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/feedback/view');
                }
                          }

                          
                   
          }

          function feedback_questions($param1 = '', $param2 = '', $param3 = ''){

     $table="feedback_questions";

     if ($param1 == 'add')
      {

       $page_data['page_name']="feedback_questions_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
            $data=array(
              'question'=>trim($this->input->post('question')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/feedback_questions/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/feedback_questions/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="feedback_questions_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'question'=>trim($this->input->post('question')),
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/feedback_questions/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/feedback_questions/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/feedback_questions/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="feedback_questions_list";
              $page_data['page_title']="feedback_questions";
             $this->load->view('backend/index', $page_data);
            }
    }

    function subscribe(){

     $table="subscribe_list";    
             
            
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="subscribe_list";
              $page_data['page_title']="Subscribers";
             $this->load->view('backend/index', $page_data);
            
          }

    function feedback_report(){

     $table="user_feedback";    
             
            
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="users_feedback";
              $page_data['page_title']="Users Feedback";
             $this->load->view('backend/index', $page_data);
            
          }

          function report_view($id=''){

     $table="users_feedback_report";    
             
            
              $page_data['data']=$this->Home_model->get_feedback_report($table,$id);
              $page_data['page_name']="feedback_report";
              $page_data['page_title']="Users Feedback";
             $this->load->view('backend/index', $page_data);
            
          }


    function faq($param1 = '', $param2 = '', $param3 = ''){

     $table="faq";

     if ($param1 == 'add')
      {

       $page_data['page_name']="faq_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
			if($this->input->post('tutor_status')=='') {
				$tutor_status=0;
			}else{
				$tutor_status=$this->input->post('tutor_status');
			}
			if($this->input->post('student_status')=='') {
				$student_status=0;
			}else{
				$student_status=$this->input->post('student_status');
			}
				
            $data=array(
              'faq'=>trim($this->input->post('faq')),
			  'priority'=>trim($this->input->post('priority')),
               'tutor_status'=> $tutor_status,
              'student_status'=> $student_status,
              'status'=> $this->input->post('status')            
              
            );      
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/faq/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/faq/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="faq_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             if($this->input->post('tutor_status')=='') {
				$tutor_status=0;
			}else{
				$tutor_status=$this->input->post('tutor_status');
			}
			if($this->input->post('student_status')=='') {
				$student_status=0;
			}else{
				$student_status=$this->input->post('student_status');
			}
             
            
            $data=array(
               'faq'=>trim($this->input->post('faq')),
			   'priority'=>trim($this->input->post('priority')),
                'tutor_status'=> $tutor_status,
               'student_status'=> $student_status,
               'status'=> $this->input->post('status')
             
            );
            
				//print_r($data);die;
                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/faq/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/faq/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/faq/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="faq_list";
              $page_data['page_title']="faq";
             $this->load->view('backend/index', $page_data);
            }
    }

    function sub_faq($param1 = '', $param2 = '', $param3 = ''){

     $table="sub_faq";

     if ($param1 == 'add')
      {
       $page_data['faq']=$this->Home_model->get_data('faq');
       $page_data['page_name']="sub_faq_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
			if($this->input->post('tutor_status')=='') {
				$tutor_status=0;
			}else{
				$tutor_status=$this->input->post('tutor_status');
			}
			if($this->input->post('student_status')=='') {
				$student_status=0;
			}else{
				$student_status=$this->input->post('student_status');
			}
			if($this->input->post('home_status')=='') {
				$home_status=0;
			}else{
				$home_status=$this->input->post('home_status');
			}
            $data=array(
              'faq_id'=>trim($this->input->post('faq_id')),
              'question'=>trim($this->input->post('question')),
              'answer'=>trim($this->input->post('answer')),
			  'priority'=>trim($this->input->post('priority')),
              'tutor_status'=> $tutor_status,
              'student_status'=> $student_status,
               'home_status'=> $home_status,
              'status'=> $this->input->post('status')            
              
            );
               //print_r($data);die;        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/sub_faq/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/sub_faq/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['faq']=$this->Home_model->get_data('faq');
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="sub_faq_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             if($this->input->post('tutor_status')=='') {
				$tutor_status=0;
			}else{
				$tutor_status=$this->input->post('tutor_status');
			}
			if($this->input->post('student_status')=='') {
				$student_status=0;
			}else{
				$student_status=$this->input->post('student_status');
			}
			if($this->input->post('home_status')=='') {
				$home_status=0;
			}else{
				$home_status=$this->input->post('home_status');
			}
             
            
            $data=array(
               'faq_id'=>trim($this->input->post('faq_id')),
              'question'=>trim($this->input->post('question')),
              'answer'=>trim($this->input->post('answer')),
			  'priority'=>trim($this->input->post('priority')),
               'tutor_status'=> $tutor_status,
              'student_status'=> $student_status,
               'home_status'=> $home_status,
              'status'=> $this->input->post('status') 
             
            );
            
				 
                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/sub_faq/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/sub_faq/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/sub_faq/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="sub_faq_list";
              $page_data['page_title']="sub_faq";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function career($param1 = '', $param2 = '', $param3 = ''){

     $table="careers";

     if ($param1 == 'add')
      {

       $page_data['page_name']="career_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
   //print_r($_POST);
   
          $type= implode(',',$this->input->post('type'));
          $title=trim($this->input->post('job_title'));
          $seo_url=$this->make_seo_url($title);
   
            $data=array(
               'job_title'=>$title,
               'seo_url'=>$seo_url,
               'department'=> $this->input->post('department'),
               'location'=> $this->input->post('location'),
               'description'=> $this->input->post('desc'),
               'type'=> $type,
               'created_at'=> time()            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/career/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/career/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="career_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
            // print_r($_POST);die;
            $type= implode(',',$this->input->post('type')); 
			$title=trim($this->input->post('job_title'));
            $seo_url=$this->make_seo_url($title);
            $data=array(
               'job_title'=>$title,
               'seo_url'=>$seo_url,
               'department'=> $this->input->post('department'),
               'location'=> $this->input->post('location'),
               'description'=> $this->input->post('desc'),
               'type'=> $type             
            );
			// echo $param2;
             //print_r($data);die;

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/career/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/career/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/career/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="career_list";
              $page_data['page_title']="career";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function country($param1 = '', $param2 = '', $param3 = ''){

     $table="country";

     if ($param1 == 'add')
      {

       $page_data['page_name']="country_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
            $data=array(
              'country'=>trim($this->input->post('country')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/country/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/country/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="country_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'country'=>trim($this->input->post('country')),
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/country/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/country/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/country/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="country_list";
              $page_data['page_title']="Countries List";
             $this->load->view('backend/index', $page_data);
            }
    }

		function currency($param1 = '', $param2 = '', $param3 = ''){

     $table="currency";

     if ($param1 == 'add')
      {

       $page_data['page_name']="currency_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
            $data=array(
              'currency'=>trim($this->input->post('currency')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/currency/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/currency/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="currency_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'currency'=>trim($this->input->post('currency')),
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/currency/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/currency/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/currency/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="currency_list";
              $page_data['page_title']="Countries List";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function government_id_prof($param1 = '', $param2 = '', $param3 = ''){

     $table="govt_id_prof";

     if ($param1 == 'add')
      {

       $page_data['page_name']="govt_id_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
            $data=array(
              'govt_id'=>trim($this->input->post('govt_id')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/government_id_prof/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/government_id_prof/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="govt_id_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'govt_id'=>trim($this->input->post('govt_id')),
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/government_id_prof/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/government_id_prof/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/government_id_prof/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="govt_id_list";
              $page_data['page_title']="Government Id proof List";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function address_prof($param1 = '', $param2 = '', $param3 = ''){

     $table="address_prof";

     if ($param1 == 'add')
      {

       $page_data['page_name']="address_prof_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
            $data=array(
              'address_prof'=>trim($this->input->post('address_prof')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/cms_page/address_prof/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/address_prof/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="address_prof_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'address_prof'=>trim($this->input->post('address_prof')),
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/cms_page/address_prof/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/cms_page/address_prof/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/cms_page/address_prof/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="address_prof_list";
              $page_data['page_title']="Government Id proof List";
             $this->load->view('backend/index', $page_data);
            }
    }







         


          }

          ?>