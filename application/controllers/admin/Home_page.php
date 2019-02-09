<?php
            if (!defined('BASEPATH'))
                exit('No direct script access allowed');
            class Home_page extends CI_Controller
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

               /*home_content*/
            function home_content($param1 = '', $param2 = '', $param3 = ''){

             $table="home_content";
            
              
                         if ($param1 == 'edit')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="home_content_edit";
                      $page_data['page_title']="EDIT";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                      
                $where['id'] = $param2;
               
                if($_FILES['user_file']['name']!="")
                  {               
                      $picture = $this->upload_svg('user_file');               
                      
                        unlink("uploads/eduzyte/".$this->input->post('old_image'));                 
                         
                
              }else{
                $picture=$this->input->post('old_image');
              }
              $data=array(
                          'title'=>$this->input->post('title'),
                          'content'=>$this->input->post('content'), 
                          'image'=>$picture);
                  

                  $result=$this->Home_model->update($table,$data,$where);       
                  if($result="success"){
                    $this->session->set_flashdata('flash_message',"Data Updated");
                      redirect('admin/home_page/home_content/view');
                  }
                      
                  else{
                    $this->session->set_flashdata('error_message',"Not uploaded");
                      redirect('admin/home_page/home_content/view');
                  }
                            }

                            
                     if ($param1 == 'view')
                      {
                      $page_data['data']=$this->Home_model->get_data($table);
                      $page_data['page_name']="home_content_list";
                      $page_data['page_title']="home_content";
                     $this->load->view('backend/index', $page_data);
                    }
            }

            function how_does_works($param1 = '', $param2 = '', $param3 = '') {

             $table="how_does_it_works";
            
              
                         if ($param1 == 'view')
                      {
                      $where['id'] = 1;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="how_does_works";
                      $page_data['page_title']="EDIT";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                      
                $where['id'] = 1;
               
               
              $data=array('content'=>$this->input->post('content'));
                          
                  

                  $result=$this->Home_model->update($table,$data,$where);       
                  if($result="success"){
                    $this->session->set_flashdata('flash_message',"Data Updated");
                      redirect('admin/home_page/how_does_works/view');
                  }
                      
                  else{
                    $this->session->set_flashdata('error_message',"Not uploaded");
                      redirect('admin/home_page/how_does_works/view');
                  }
                            }

                            
                     
            }

             function five_easy_steps($param1 = '', $param2 = '', $param3 = ''){

             $table="five_easy_steps";
            
              
                         if ($param1 == 'edit')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="five_easy_steps_edit";
                      $page_data['page_title']="EDIT";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                      
                $where['id'] = $param2;
               
               
              $data=array(
                          'title'=>$this->input->post('title'),
                          'content'=>$this->input->post('content'), 
                          );
                  

                  $result=$this->Home_model->update($table,$data,$where);       
                  if($result="success"){
                    $this->session->set_flashdata('flash_message',"Data Updated");
                      redirect('admin/home_page/five_easy_steps/view');
                  }
                      
                  else{
                    $this->session->set_flashdata('error_message',"Not uploaded");
                      redirect('admin/home_page/five_easy_steps/view');
                  }
                            }

                            
                     if ($param1 == 'view')
                      {
                      $page_data['data']=$this->Home_model->get_data($table);
                      $page_data['page_name']="five_easy_steps_list";
                      $page_data['page_title']="five_easy_steps";
                     $this->load->view('backend/index', $page_data);
                    }
            }

            function advantages($param1 = '', $param2 = '', $param3 = ''){

             $table="advantages";
            
              
                         if ($param1 == 'edit')
                      {
                      $where['id'] = $param2;
                      $page_data['data']=$this->Home_model->edit_operation($table,$where);
                      $page_data['page_name']="advantages_edit";
                      $page_data['page_title']="EDIT";
                     $this->load->view('backend/index', $page_data);

                     }
                     if($param1 == 'update')
                     {
                      
                $where['id'] = $param2;
               
                if($_FILES['user_file']['name']!="")
                  {               
                      $picture = $this->upload_svg('user_file');               
                      
                        unlink("uploads/eduzyte/".$this->input->post('old_image'));                 
                         
                
              }else{
                $picture=$this->input->post('old_image');
              }
              $data=array(
                          
                          'content'=>$this->input->post('content'), 
                          'image'=>$picture);
                  

                  $result=$this->Home_model->update($table,$data,$where);       
                  if($result="success"){
                    $this->session->set_flashdata('flash_message',"Data Updated");
                      redirect('admin/home_page/advantages/view');
                  }
                      
                  else{
                    $this->session->set_flashdata('error_message',"Not uploaded");
                      redirect('admin/home_page/advantages/view');
                  }
                            }

                            
                     if ($param1 == 'view')
                      {
                      $page_data['data']=$this->Home_model->get_data($table);
                      $page_data['page_name']="advantages_list";
                      $page_data['page_title']="advantages";
                     $this->load->view('backend/index', $page_data);
                    }
            }

            function testimonials($param1 = '', $param2 = '', $param3 = ''){

     $table="testimonial";

     if ($param1 == 'add')
      {

       $page_data['page_name']="testimonials_add";
      $page_data['page_title']="ADD";
     $this->load->view('backend/index', $page_data);

     }
      if ($param1 == 'insert')
       {        
        
            
                    
            $picture= $this->upload_svg('user_file');
             
            $data=array(
              'name'=>trim($this->input->post('name')),
              'designation'=>$this->input->post('designation'),
              'description'=>$this->input->post('description'),
              'image'=>$picture
              
            );
            //print_r($data);die;            
            $result=$this->Home_model->insert($table,$data);       
            if($result="success"){
                $this->session->set_flashdata('flash_message',"Data uploaded");
                redirect('admin/home_page/testimonials/view');
            }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/home_page/testimonials/view');
                }
                  
                    
                 }
                 if ($param1 == 'edit')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->edit_operation($table,$where);
              $page_data['page_name']="testimonials_edit";
              $page_data['page_title']="EDIT";
             $this->load->view('backend/index', $page_data);

             }
             if($param1 == 'update')
             {
              $where['id'] = $param2;
             
             
             if($_FILES['user_file']['name']!="")
                {               
                    $picture = $this->upload_svg('user_file');               
                    
                      unlink("uploads/eduzyte/".$this->input->post('old_image'));                 
                       
              
            }else{
              $picture=$this->input->post('old_image');
            }
                    
        
            $data=array(
               'name'=>trim($this->input->post('name')),
              'designation'=>$this->input->post('designation'),
              'description'=>$this->input->post('description'),
              'image'=>$picture
              
            );
            

                $result=$this->Home_model->update($table,$data,$where);       
                if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Updated");
                    redirect('admin/home_page/testimonials/view');
                }
                    
                else{
                  $this->session->set_flashdata('error_message',"Not uploaded");
                    redirect('admin/home_page/testimonials/view');
                }
                  
                    }

                    if ($param1 == 'delete')
              {
              $where['id'] = $param2;
              $page_data['data']=$this->Home_model->image_delete($table,$where);
              if($result="success"){
                  $this->session->set_flashdata('flash_message',"Data Deleted");
                    redirect('admin/home_page/testimonials/view');
                }
             

             }
             
             if ($param1 == 'view')
              {
              $page_data['data']=$this->Home_model->get_data($table);
              $page_data['page_name']="testimonials_list";
              $page_data['page_title']="testimonials";
             $this->load->view('backend/index', $page_data);
            }
    }





            

             

            }

            ?>