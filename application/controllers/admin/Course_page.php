<?php
          if (!defined('BASEPATH'))
              exit('No direct script access allowed');
          class Course_page extends CI_Controller
          {
          	function __construct()
          	{
          		parent::__construct();
				$this->load->helper('common');
          		
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
	
	
	
	function study_level($param1 = '', $param2 = '', $param3 = ''){

     $table="study_level";

     if ($param1 == 'add')
      {

       $page_data['page_name']="study_level_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { //print_r($_POST);die;
            $data=array(
              'study_level'=>trim($this->input->post('study_level')),               
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/study_level/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/study_level/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="study_level_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
            
            $data=array(
               'study_level'=>trim($this->input->post('study_level')),                
               'status'=> $this->input->post('status')
             
            );
            

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/study_level/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/study_level/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/study_level/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="study_level_list";
              $page_data['page_title']="study_level";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	
	
		function from_level($param1 = '', $param2 = '', $param3 = ''){

     $table="from_level";

     if ($param1 == 'add')
      {
       $page_data['study_level']=$this->Course_model->get_data('study_level');      
       $page_data['page_name']="from_level_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
       // print_r($_POST);die;
            $data=array(
              'study_level_id'=>trim($this->input->post('study_level_id')),              
              'from_level'=>trim($this->input->post('from_level')),
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/from_level/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/from_level/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['study_level']=$this->Course_model->get_data('study_level');
              $page_data['level_heading']=$this->Course_model->get_data('level_heading');
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="from_level_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
				// print_r($_POST);die;
              $where['id'] = $param2;            
            $data=array(
              'study_level_id'=>trim($this->input->post('study_level_id')),              
              'from_level'=>trim($this->input->post('from_level')),
              'status'=> $this->input->post('status') 
             
            );
            

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/from_level/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/from_level/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/from_level/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="from_level_list";
              $page_data['page_title']="from_level";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function get_level_id($level_heading_id)
    {
        $levels = $this->db->get_where('levels' , array(
            'level_heading_id' => $level_heading_id
        ))->result();
        //echo '<option value="">--Select Levels--</option>';
        foreach ($levels as $row) {
            echo '<option value="' . $row->id . '">' . $row->levels . '</option>';
        }
    }
	
	
	function get_from_level($study_level_id)
    {
        $levels = $this->db->get_where('from_level' , array(
            'study_level_id' => $study_level_id
        ))->result();       
        foreach ($levels as $row) {
            echo '<option value="' . $row->id . '">' . $row->from_level . '</option>';
        }
    }
/*	
function course($param1 = '', $param2 = '', $param3 = ''){

     $table="course";

     if ($param1 == 'add')
      {		
		$page_data['study_level']=$this->Course_model->get_data('study_level');      
       $page_data['page_name']="course_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {   
   
			
			     $title = strip_tags($this->input->post('course'));
                 $titleURL = strtolower(url_title($title));
                if(isUrlExists('course',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
				                
				
			$token="c";
			$query1=$this->db->get('course');		           
			if($query1->num_rows()>0){
				$last_record=$this->db->order_by('id','DESC')->get('course')->row()->course_generate_id;												
				$random_number= substr($last_record,1)+1;													
				$course_id = $token.''.$random_number;
			   }else{						
			   $course_id = $token.''.'1';
			}			
            $data=array(
			  'study_level_id'=>$this->input->post('study_level_id'),
              'from_level_id'=>$this->input->post('from_level_id'),
			  'to_level_id'=>$this->input->post('to_level_id'),
              'course'=>strip_tags($this->input->post('course')),
			  'url_slug'=>$titleURL,
			  'course_generate_id'=>$course_id,
              'status'=> $this->input->post('status')            
              
            );
			
                     
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/course/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/course/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
			  $page_data['study_level']=$this->Course_model->get_data('study_level');              
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="course_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
				 
				$title = strip_tags($this->input->post('course'));
                 $titleURL = strtolower(url_title($title));
                if(isUrlExists('course',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
              $where['id'] = $param2;            
            $data=array(
              'study_level_id'=>$this->input->post('study_level_id'),
              'from_level_id'=>$this->input->post('from_level_id'),
			  'to_level_id'=>$this->input->post('to_level_id'),
              'course'=>strip_tags($this->input->post('course')),
			  'url_slug'=>$titleURL,
              'status'=> $this->input->post('status') 
             
            );           

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/course/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/course/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/course/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="course_list";
              $page_data['page_title']="course";
             $this->load->view('backend/index', $page_data);
            }
    }*/
	
		function subject($param1 = '', $param2 = '', $param3 = ''){
			
     $table="subjects";		
     if ($param1 == 'add')
      {
		$page_data['study_level']=$this->Course_model->get_data('study_level');
       //$page_data['course_data']=$this->Course_model->get_data('course');
       $page_data['page_name']="subject_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       { 
				//print_r($_POST);die;
				
				$title = strip_tags($this->input->post('subject'));
                 $titleURL = strtolower(url_title($title));
                if(issubUrlExists('subjects',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
				
			$token="s";
			$query1=$this->db->get('subjects');		           
			if($query1->num_rows()>0){
				$last_record=$this->db->order_by('id','DESC')->get('subjects')->row()->subject_generate_id;												
				$random_number= substr($last_record,1)+1;													
				$subject_id = $token.''.$random_number;
			   }else{						
			   $subject_id = $token.''.'1';
			}
			
            $data=array( 
			  'study_level_id'=>$this->input->post('study_level_id'),
			  'from_level_id'=>$this->input->post('from_level_id'),
              'subject'=>strip_tags($this->input->post('subject')),
			  'subject_url_slug'=>$titleURL,
			  'subject_generate_id'=>$subject_id,
              'status'=> $this->input->post('status')            
              
            );			                   
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/subject/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/subject/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['study_level']=$this->Course_model->get_data('study_level');
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="subject_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
				
					$title = strip_tags($this->input->post('subject'));
                 $titleURL = strtolower(url_title($title));
                if(issubUrlExists('subjects',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
              $where['id'] = $param2;            
            $data=array(              
			  'study_level_id'=>$this->input->post('study_level_id'),
			  'from_level_id'=>$this->input->post('from_level_id'),
              'subject'=>strip_tags($this->input->post('subject')),
			  'subject_url_slug'=>$titleURL,			  
              'status'=> $this->input->post('status')            
              
            );          
				 //print_r($data);die;       	
                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/subject/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/subject/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/subject/view');
                }            

             }
             
             if ($param1 == 'view')
              {
				
              $page_data['data']=$this->Course_model->get_data($table);
			  
              $page_data['page_name']="subject_list";
              $page_data['page_title']="subject";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	function degree($param1 = '', $param2 = '', $param3 = ''){

     $table="degree";

     if ($param1 == 'add')
      {
       
       $page_data['page_name']="degree_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {   
			$title = strip_tags($this->input->post('degree'));
                 $titleURL = strtolower(url_title($title));
                if(isUrlExists('degree',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
				
   
      $token="d";
      $query1=$this->db->get('degree');              
      if($query1->num_rows()>0){
        $last_record=$this->db->order_by('id','DESC')->get('degree')->row()->degree_generate_id;                        
        $random_number= substr($last_record,1)+1;                         
        $degree_id = $token.''.$random_number;
         }else{           
         $degree_id = $token.''.'1';
      }     
            $data=array(
              
              'degree'=>strip_tags($this->input->post('degree')),
			  'url_slug'=>$titleURL,
              'degree_generate_id'=>$degree_id,
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/degree/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/degree/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="degree_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
        // print_r($_POST);die;\
					$title = strip_tags($this->input->post('degree'));
                 $titleURL = strtolower(url_title($title));
                if(isUrlExists('degree',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
              $where['id'] = $param2;            
            $data=array(
              'degree'=>strip_tags($this->input->post('degree')),
			  'url_slug'=>$titleURL,             
              'status'=> $this->input->post('status') 
             
            );
            

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/degree/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/degree/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/degree/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="degree_list";
              $page_data['page_title']="degree";
             $this->load->view('backend/index', $page_data);
            }
    }
    
    function days($param1 = '', $param2 = '', $param3 = ''){

     $table="days_list";

     if ($param1 == 'add')
      {
       
       $page_data['page_name']="days_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {   
            $data=array(
             'title'=>$this->input->post('title'),              
              'days'=>$this->input->post('days'),			  
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/days/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/days/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="days_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
        
              $where['id'] = $param2;            
           $data=array(
             'title'=>$this->input->post('title'),              
              'days'=>$this->input->post('days'),			  
              'status'=> $this->input->post('status')            
              
            );          

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/days/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/days/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/days/view');
                }             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="days_list";
              $page_data['page_title']="days";
             $this->load->view('backend/index', $page_data);
            }
    }
	function medium($param1 = '', $param2 = '', $param3 = ''){

     $table="medium";

     if ($param1 == 'add')
      {
       
       $page_data['page_name']="medium_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {   
   
        
            $data=array(
              
              'medium'=>ucfirst(trim($this->input->post('medium'))),            
              'status'=> $this->input->post('status')            
              
            );
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/medium/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/medium/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="medium_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {        
              $where['id'] = $param2;            
              $data=array(               
              'medium'=>trim($this->input->post('medium')),
              'status'=> $this->input->post('status')             
            );           

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/medium/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/medium/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/medium/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="medium_list";
              $page_data['page_title']="medium";
             $this->load->view('backend/index', $page_data);
            }
    }
	
	public function add_tutor_subject(){
		//print_r($_POST);die;
		$title = strip_tags($this->input->post('subject'));
                 $titleURL = strtolower(url_title($title));
                if(issubUrlExists('subjects',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
				
			$token="s";
			$query1=$this->db->get('subjects');		           
			if($query1->num_rows()>0){
				$last_record=$this->db->order_by('id','DESC')->get('subjects')->row()->subject_generate_id;												
				$random_number= substr($last_record,1)+1;													
				$subject_id = $token.''.$random_number;
			   }else{						
			   $subject_id = $token.''.'1';
			}
			
            $data=array( 
			  'study_level_id'=>$this->input->post('study_level_id'),
			  'from_level_id'=>$this->input->post('from_level_id'),
              'subject'=>strip_tags($this->input->post('subject')),
			  'subject_url_slug'=>$titleURL,
			  'subject_generate_id'=>$subject_id,
              'status'=> $this->input->post('status')            
              
            );	
			
            $result=$this->Course_model->insert('subjects',$data);       
            if($result="success"){
                $where['id'] = $this->input->post('request_id');
				$delete=$this->Course_model->delete('tutor_request_subject',$where);
                $this->session->set_flashdata('flash_message',"Subject Added");
                redirect('admin/course_page/tutor_request');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/tutor_request');
                }
                  
		}
		public function add_student_subject(){
    
    $title = strip_tags($this->input->post('subject'));
                 $titleURL = strtolower(url_title($title));
                if(issubUrlExists('subjects',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
        
      $token="s";
      $query1=$this->db->get('subjects');              
      if($query1->num_rows()>0){
        $last_record=$this->db->order_by('id','DESC')->get('subjects')->row()->subject_generate_id;                       
        $random_number= substr($last_record,1)+1;                         
        $subject_id = $token.''.$random_number;
         }else{           
         $subject_id = $token.''.'1';
      }
      
            $data=array( 
				'study_level_id'=>$this->input->post('study_level_id'),
				'from_level_id'=>$this->input->post('from_level_id'),
				'subject'=>strip_tags($this->input->post('subject')),
				'subject_url_slug'=>$titleURL,
				'subject_generate_id'=>$subject_id,
				'status'=> $this->input->post('status')            
              
            );  
      
            $result=$this->Course_model->insert('subjects',$data);       
            if($result="success"){
				$where['id'] = $this->input->post('request_id');
				$delete=$this->Course_model->delete('student_request_subject',$where);
                $this->session->set_flashdata('flash_message',"Subject Added");
                redirect('admin/course_page/student_request');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/student_request');
                }
                  
    }
              
	

    
    public function tutor_request($param1 = '', $param2 = '', $param3 = '')
              {
			   
                  if($param1 == 'update') {
                      $where['id']=$param2;
                      $data=array('subject_course'=>$this->input->post('subject_course'));
                       $result=$this->Course_model->update('tutor_request_subject',$data,$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/tutor_request/');
                }
                  }
                  
                  if($param1 == 'active') {
                      $where['id']=$param2;
                     
                      $edit_data = $this->Course_model->edit_operation('tutor_request_subject',$where);
                       $table=$edit_data->table_type;                      
                       if($table=='subjects'){
                           
                           $token="s";
                			$query1=$this->db->get('subjects');		           
                			if($query1->num_rows()>0){
                				$last_record=$this->db->order_by('id','DESC')->get('subjects')->row()->subject_generate_id;												
                				$random_number= substr($last_record,1)+1;													
                				$subject_id = $token.''.$random_number;
                			   }else{						
                			   $subject_id = $token.''.'1';
                			}
                			$data=array(              
                              'subject'=>trim($edit_data->subject_course),
                			  'subject_generate_id'=>$subject_id,
                              'status'=> 1   
                            );
                            
                            $result=$this->Course_model->insert($table,$data);       
                        if($result="success"){
                            $last_id=$this->db->insert_id();
                            $sg_id = $this->db->where('id',$last_id)->get('subjects')->row()->subject_generate_id;
                            $tutor_subject_data=array(
                                'tutor_id'=>$edit_data->tutor_id,
                                'study_level_id'=>$edit_data->study_level_id,
                                'from_level'=>$edit_data->from_level,
                                'to_level'=>$edit_data->to_level,
                                'subject_course_id'=>$sg_id
                                
                                );
                                $result1=$this->Course_model->insert('tutor_subjects',$tutor_subject_data);
                                if($result1="success"){
                                    $where['id']=$edit_data->id;
                                    $page_data['data']=$this->Course_model->delete('tutor_request_subject',$where);
                                           if($result="success"){
                                         $this->session->set_flashdata('flash_message',"Subject is added");
                                        redirect('admin/course_page/tutor_request/');
                                    }
                                }
                        }
                       }
                     
                  }
                  if($param1 == 'delete') {
                      $where['id']=$param2;
                      
                       $page_data['data']=$this->Course_model->delete('tutor_request_subject',$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/tutor_request/');
                }
                  }
                  
			  $page_data['data']=$this->Course_model->get_data('tutor_request_subject');
              $page_data['page_name']="tutor_request_subject";
              $page_data['page_title']="Tutor subjects";
              $this->load->view('backend/index', $page_data);
                      
              }
			  
			  public function tutor_request_degree($param1 = '', $param2 = '', $param3 = '')
              {
                  if($param1 == 'update') {
                      $where['id']=$param2;
                      $data=array('degree_id'=>$this->input->post('degree_id'));
                       $result=$this->Course_model->update('tutor_request_degree',$data,$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/tutor_request_degree/');
                }
                  }
                  
                  if($param1 == 'active') {
                      $where['id']=$param2;
                     
                      $edit_data = $this->Course_model->edit_operation('tutor_request_degree',$where);                      
                          $token="d";
                          $query1=$this->db->get('degree');              
						  if($query1->num_rows()>0){
							$last_record=$this->db->order_by('id','DESC')->get('degree')->row()->degree_generate_id;                        
							$random_number= substr($last_record,1)+1;                         
							$degree_id = $token.''.$random_number;
							 }else{           
							 $degree_id = $token.''.'1';
						  }     
                        
                        $data=array(
                          'degree'=>trim($edit_data->degree_id),
						  'degree_generate_id'=>$degree_id,
                          'status'=> 1
                        );
                       // print_r($data);die;
                        $result=$this->Course_model->insert('degree',$data);       
                        if($result="success"){
                            $last_id=$this->db->insert_id();
                            $dg_id = $this->db->where('id',$last_id)->get('degree')->row()->degree_generate_id;
                            $tutor_degree_data=array(
                                'tutor_id'=>$edit_data->tutor_id,
                                'institution'=>$edit_data->institution,
                                'degree_id'=>$dg_id,
                                'specialization'=>$edit_data->specialization,
                                
                                
                                );
                                $result1=$this->Course_model->insert('tutor_degree',$tutor_degree_data);
                                if($result1="success"){
                                    $where['id']=$edit_data->id;
                                    $page_data['data']=$this->Course_model->delete('tutor_request_degree',$where);
                                           if($result="success"){
                                         $this->session->set_flashdata('flash_message',"Degree is added");
                                        redirect('admin/course_page/tutor_request_degree/');
                                    }
                                }
                            
                        }
                        
                          
                     
                  }
                  if($param1 == 'delete') {
                      $where['id']=$param2;
                      
                       $page_data['data']=$this->Course_model->delete('tutor_request_degree',$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/tutor_request_degree/');
                }
                  }
                  
              $page_data['data']=$this->Course_model->get_data('tutor_request_degree');
              $page_data['page_name']="tutor_request_degree";
              $page_data['page_title']="Tutor Degree";
              $this->load->view('backend/index', $page_data);
                      
              }
			  
			  public function tutor_request_medium($param1 = '', $param2 = '', $param3 = '')
              {
                  if($param1 == 'update') {
                      $where['id']=$param2;
                      $data=array('medium'=>$this->input->post('medium'));
                       $result=$this->Course_model->update('tutor_request_medium',$data,$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/tutor_request_medium/');
                }
                  }
                  
                  if($param1 == 'active') {
                     $where['id']=$param2;
                     
                      $edit_data = $this->Course_model->edit_operation('tutor_request_medium',$where);  
                        $data=array(
                           'medium'=>ucfirst(trim($edit_data->medium)),						              
                           'status'=> 1
                        );
                        $result=$this->Course_model->insert('medium',$data);       
                      if($result="success"){
						$where['id']=$edit_data->id;
						$page_data['data']=$this->Course_model->delete('tutor_request_medium',$where);
                        $this->session->set_flashdata('flash_message',"Data uploaded");
                        redirect('admin/course_page/tutor_request_medium/');
                        }
                      
                  }
                  if($param1 == 'delete') {
                      $where['id']=$param2;
                      
                       $page_data['data']=$this->Course_model->delete('tutor_request_medium',$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/tutor_request_medium/');
                }
                  }
                  
              $page_data['data']=$this->Course_model->get_data('tutor_request_medium');
              $page_data['page_name']="tutor_request_medium";
              $page_data['page_title']="Tutor Medium";
              $this->load->view('backend/index', $page_data);
                      
              }
			  
			  
	 public function student_request($param1 = '', $param2 = '', $param3 = '')
              {
                  if($param1 == 'update') {
                      $where['id']=$param2;
                      $data=array('subject_course'=>$this->input->post('subject_course'));
                       $result=$this->Course_model->update('student_request_subject',$data,$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/student_request/');
                }
                  }
                  
                  if($param1 == 'active') {
					  
                      $where['id']=$param2;                     
                      $edit_data = $this->Course_model->edit_operation('student_request_subject',$where);					  
                        $table=$edit_data->table_type;
					  
                       if($table=='course'){
                          $token="c";
            			   $query1=$this->db->get('course');		           
            			 if($query1->num_rows()>0){
            				$last_record=$this->db->order_by('id','DESC')->get('course')->row()->course_generate_id;												
            				$random_number= substr($last_record,1)+1;													
            				$course_id = $token.''.$random_number;
            			   }else{						
            			   $course_id = $token.''.'1';
            			}
            			
            			$data=array(
                          'course'=>trim($edit_data->subject_course),
            			  'course_generate_id'=>$course_id,
                          'status'=> 1
                        );
                        
                        $result=$this->Course_model->insert($table,$data);       
                        if($result="success"){                         
                               
                                    $where['id']=$edit_data->id;
                                   $delete=$this->Course_model->delete('student_request_subject',$where);
                                           
                                         $this->session->set_flashdata('flash_message',"Course is added");
                                        redirect('admin/course_page/student_request/');
                                    
                                
                            
                        }
                        
                          
                       }
                       if($table=='subjects'){
                           
                           $token="s";
                			$query1=$this->db->get('subjects');		           
                			if($query1->num_rows()>0){
                				$last_record=$this->db->order_by('id','DESC')->get('subjects')->row()->subject_generate_id;												
                				$random_number= substr($last_record,1)+1;													
                				$subject_id = $token.''.$random_number;
                			   }else{						
                			   $subject_id = $token.''.'1';
                			}
                			$data=array(              
                              'subject'=>trim($edit_data->subject_course),
                			    'subject_generate_id'=>$subject_id,
                              'status'=> 1   
                            );
                            
                            $result=$this->Course_model->insert($table,$data);       
                        if($result="success"){                          
                                
                                
                                    $where['id']=$edit_data->id;
                                    $delete=$this->Course_model->delete('student_request_subject',$where);
                                          
                                         $this->session->set_flashdata('flash_message',"Subject is added");
                                        redirect('admin/course_page/student_request/');
                                
                        }
                       }
                     
                  }
                  if($param1 == 'delete') {
                      $where['id']=$param2;                      
                       $page_data['data']=$this->Course_model->delete('student_request_subject',$where);
                       if($result="success"){
                     $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/student_request/');
                }
                  }
                                    
			        $page_data['data']=$this->Course_model->get_data('student_request_subject');
              $page_data['page_name']="student_request_subject";
              $page_data['page_title']="student subjects";
              $this->load->view('backend/index', $page_data);
                      
              }
			  
			  
			  /*Dashboard pages*/
			  
			  function scheme($param1 = '', $param2 = '', $param3 = ''){

     $table="scheme";

     if ($param1 == 'add')
      {
       
       $page_data['page_name']="scheme_add";
       $page_data['page_title']="ADD";
       $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {   

       		$token="SCH-";
			$query1=$this->db->get('scheme');	
		           
					if($query1->num_rows()>0){
						$last_record=$this->db->order_by('id','DESC')->get('scheme')->row()->scheme_id;
												
						$random_number= substr($last_record,2,4)+1;
						if($random_number<10) {
							$random_number = "0". $random_number;
						}else {
							$random_number=$random_number;
							}							
						$scheme_id = $token.''.$random_number;
					}else{
						
					   $scheme_id=$token.''.'01';
					}   
        
            $data=array(
			   'scheme_id'=> $scheme_id,
               'valid_from'=> $this->input->post('valid_from'),
               'valid_to'=> $this->input->post('valid_to'),
               'reward_amount'=> $this->input->post('reward_amount'),
               'reward_content'=> $this->input->post('reward_content'),           
               'status'=> $this->input->post('status')            
              
            );           
                        
            $result=$this->Course_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/course_page/scheme/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/scheme/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              
              $page_data['data']=$this->Course_model->edit_operation($table,$where);
              $page_data['page_name']="scheme_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {        
              $where['id'] = $param2;            
              $data=array(               
              'valid_from'=> $this->input->post('valid_from'),
               'valid_to'=> $this->input->post('valid_to'),
               'reward_amount'=> $this->input->post('reward_amount'),
               'reward_content'=> $this->input->post('reward_content'),           
               'status'=> $this->input->post('status')          
            );           

                $result=$this->Course_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/course_page/scheme/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/course_page/scheme/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Course_model->delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/scheme/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Course_model->get_data($table);
              $page_data['page_name']="scheme_list";
              $page_data['page_title']="scheme";
             $this->load->view('backend/index', $page_data);
            }
    }
		
			function tutor_message()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                    $page_data['data']=$this->Course_model->get_data('tutor_messages'); 
                    $page_data['page_name']  = 'tutor_message_list';
                    $page_data['page_title'] = 'Tutor Message';
                    $this->load->view('backend/index', $page_data);
                }
				function active_tutor_message($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  $admin_status = $this->db->where('id',$id)->get('tutor_messages')->row()->admin_status;
      			  if($admin_status == 1){
      				$data['admin_status'] = 0;
      				$this->session->set_flashdata('error_message',"Inactive");	
      			   }else{
      				 $data['admin_status'] = 1;
      				 $this->session->set_flashdata('flash_message',"Activated");
					}            
      			  
      			  $where['id']=$id;
      			  $result=$this->Course_model->update('tutor_messages',$data,$where);			 
                      redirect('admin/course_page/tutor_message');
                }
				function tutor_message_update($id="")
				{        
				  $where['id'] = $id;            
				  $data=array(
					   'subject'=> $this->input->post('subject'),
					   'message'=> $this->input->post('message')
					   );
					$result=$this->Course_model->update('tutor_messages',$data,$where);       
					if($result="success"){
					  $this->session->set_flashdata('flash_message',"Data Updated");
						redirect('admin/course_page/tutor_message');
					}
						
					else{
					  $this->session->set_flashdata('error_message',"Not uploaded");
						redirect('admin/course_page/tutor_message');
					}
                  
                    }
				function tutor_message_delete($id="")
				{
              $where['id'] = $id;
              $page_data['data']=$this->Course_model->delete('tutor_messages',$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/course_page/tutor_message');
                }
             }
				function student_message()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
      			  
                    $page_data['data']=$this->Course_model->get_data('student_messages'); 
                    $page_data['page_name']  = 'student_message_list';
                    $page_data['page_title'] = 'Student Message';
                    $this->load->view('backend/index', $page_data);
                }
				function active_student_message($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
						  $admin_status = $this->db->where('id',$id)->get('student_messages')->row()->admin_status;
						  if($admin_status == 1){
						  $data['admin_status'] = 0;
						  $this->session->set_flashdata('error_message',"Inactive");  
						   }else{
						   $data['admin_status'] = 1;
						   $this->session->set_flashdata('flash_message',"Activated");
							} 
						  $where['id']=$id;
						  $result=$this->Course_model->update('student_messages',$data,$where);      
								  redirect('admin/course_page/student_message');
                }
				function student_message_update($id="")
                {        
                  $where['id'] = $id;            
                  $data=array(
                       'subject'=> $this->input->post('subject'),
                       'message'=> $this->input->post('message')
                       );
                    $result=$this->Course_model->update('student_messages',$data,$where);       
                    if($result="success"){
                      $this->session->set_flashdata('flash_message',"Data Updated");
                        redirect('admin/course_page/student_message');
                    }
                        
                    else{
                      $this->session->set_flashdata('error_message',"Not uploaded");
                        redirect('admin/course_page/student_message');
                    }
                  
                    }
				function student_message_delete($id="")
				{
				  $where['id'] = $id;
				  $page_data['data']=$this->Course_model->delete('student_messages',$where);
				  if($result="success"){
						$this->session->set_flashdata('flash_message',"Data Deleted");
						redirect('admin/course_page/tutor_message');
					}
				 }
				 
				 function tutor_rating()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
              
                    $page_data['data']=$this->Course_model->get_data('tutor_ratings'); 
                    $page_data['page_name']  = 'tutor_rating_list';
                    $page_data['page_title'] = 'Tutor Rating';
                    $this->load->view('backend/index', $page_data);
                }
				function active_tutor_rating($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
						  $admin_status = $this->db->where('id',$id)->get('tutor_ratings')->row()->admin_status;
						  if($admin_status == 1){
							  $data['admin_status'] = 0;
							  $this->session->set_flashdata('error_message',"Inactive");  
						   }else{
							   $data['admin_status'] = 1;
							   $this->session->set_flashdata('flash_message',"Activated");
							}
							  $where['id']=$id;
							  $result=$this->Course_model->update('tutor_ratings',$data,$where);      
							  redirect('admin/course_page/tutor_rating');
                }
				function tutor_rating_delete($id="")
				{
				  $where['id'] = $id;
				  $page_data['data']=$this->Course_model->delete('tutor_ratings',$where);
				  if($result="success"){
					  $this->session->set_flashdata('error_message',"Data Deleted");
						redirect('admin/course_page/tutor_rating');
					}
              }
			function tutor_rating_update($id="")
					{        
					  $where['id'] = $id;            
					  $data=array(
						 'message'=> $this->input->post('testimonial'),
						 'rating'=> $this->input->post('rating')
						 );
						 
					  $result=$this->Course_model->update('tutor_ratings',$data,$where);       
					  if($result="success"){
						$this->session->set_flashdata('flash_message',"Data Updated");
						redirect('admin/course_page/tutor_rating');
					  }
						
					  else{
						$this->session->set_flashdata('error_message',"Not uploaded");
						redirect('admin/course_page/tutor_rating');
					  }
                  
                    }
					
					function student_rating()
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
              
                    $page_data['data']=$this->Course_model->get_data('student_ratings'); 
                    $page_data['page_name']  = 'student_rating_list';
                    $page_data['page_title'] = 'student Rating';
                    $this->load->view('backend/index', $page_data);
                }

                function active_student_rating($id="")
                {
                    if ($this->session->userdata('admin_login') != 1)
                        redirect(base_url(), 'refresh');
              $admin_status = $this->db->where('id',$id)->get('student_ratings')->row()->admin_status;
              if($admin_status == 1){
                $data['admin_status'] = 0;
                $this->session->set_flashdata('error_message',"Inactive");  
               }else{
                 $data['admin_status'] = 1;
                 $this->session->set_flashdata('flash_message',"Activated");
              }
                $where['id']=$id;
                $result=$this->Course_model->update('student_ratings',$data,$where);      
                redirect('admin/course_page/student_rating');
                }

                function student_rating_delete($id="")
        {
              $where['id'] = $id;
              $page_data['data']=$this->Course_model->delete('student_ratings',$where);
              if($result="success"){
                  $this->session->set_flashdata('error_message',"Data Deleted");
                    redirect('admin/course_page/student_rating');
                }
             }
             function student_rating_update($id="")
          {        
            $where['id'] = $id;            
            $data=array(
             'message'=> $this->input->post('testimonial'),
             'rating'=> $this->input->post('rating')
             );
             
            $result=$this->Course_model->update('student_ratings',$data,$where);       
            if($result="success"){
            $this->session->set_flashdata('flash_message',"Data Updated");
            redirect('admin/course_page/student_rating');
            }
            
            else{
            $this->session->set_flashdata('error_message',"Not uploaded");
            redirect('admin/course_page/student_rating');
            }
                  
                    }
				

	
         


          }

          ?>