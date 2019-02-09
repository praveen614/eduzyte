<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

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
        $this->load->model('users');
        $this->load->library('pagination');
        $this->load->library('email');
        $this->load->helper('captcha_helper');


    // error_reporting(0);
   // header("Access-Control-Allow-Origin: *");
    }
	
	function auto_search(){	   
				$key=$_GET['key'];				
				$array = array();
				//$sql="SELECT  subject FROM subjects WHERE subjects LIKE '%$key%' OR subject LIKE '%$key%'";
				$sql="SELECT  subject,from_level_id FROM subjects WHERE subject LIKE '%$key%'";
				$query=$this->db->query($sql);
				//$this->db->last_query();die;
				foreach ($query->result() as $row)
				{
						$from_level=$this->db->where('id',$row->from_level_id)->get('from_level')->result();
						foreach($from_level as $row1){
						$array[] = $row->subject.' for '. $row1->from_level;
						}
				}
				$sql="SELECT  id,from_level FROM from_level WHERE from_level LIKE '%$key%'";
				$query=$this->db->query($sql);
				//$this->db->last_query();die;
				foreach ($query->result() as $row)
				{
						$subject=$this->db->where('from_level_id',$row->id)->get('subjects')->result();
						foreach($subject as $row1){

						$array[] = $row1->subject.' for '.$row->from_level;
						}
				}
				echo json_encode($array);		
	}

	private  function generate_auto_password()
 {
	 $password = str_shuffle("abcdefghijklmnopqrestuv123456789*@#$");
	 return $password = substr($password,0,6);

  }

	private  function generate_tutor_id()
 {
	 $query1=$this->db->get('tutor');
		if($query1->num_rows()>0){
			$last_record=$this->db->order_by('id','DESC')->get('tutor')->row()->generated_id;
			$number= $last_record+1;
		}else{
			$number=15555555;
		}
	return $number;
  }

  private  function generate_student_id()
 {
	$query1=$this->db->get('student');
		if($query1->num_rows()>0){
			$last_record=$this->db->order_by('id','DESC')->get('student')->row()->generated_id;
			$number= $last_record+1;
		}else{
			$number=55555555;
		}
	return $number;

  }

  private  function get_days($seconds)
 {
  $dt1 = new DateTime("@0");
  $dt2 = new DateTime("@$seconds");
  return $dt1->diff($dt2)->format('%a');
  }

  private function send_sms($num, $msg = '') {

       $mobilenumbers = $num; //enter Mobile numbers comma seperated

       $message = $msg; //enter Your Message


       $url = "http://login.smsmoon.com/API/sms.php";

       $message = urlencode($message);

       $ch = curl_init();

       if (!$ch) {

           die("Couldn't initialize a cURL handle");

       }

       $ret = curl_setopt($ch, CURLOPT_URL, $url);

       curl_setopt($ch, CURLOPT_POST, 1);

       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

       curl_setopt($ch, CURLOPT_POSTFIELDS, "username=Eduzyte&password=vizag@123&from=EDUZYT&to=$mobilenumbers&msg=$message&type=1&dnd_check=0");

       $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       $curlresponse = curl_exec($ch); // execute

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

    private function resume_file($file_name)
    {
      //ini_set('upload_max_filesize', '30480000');
            $upload_path1 = "uploads/resumes/";
            $config1['upload_path'] = $upload_path1;
            $config1['allowed_types'] = "docx|pdf|doc";
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

	public function index()
    {
	
		$page_data['f_search']=$this->Front_end_model->get_f_search();	
        $page_data['home_content']=$this->Front_end_model->get_data('home_content');
        $page_data['five_steps']=$this->Front_end_model->get_data('five_easy_steps');
        $page_data['advantages']=$this->Front_end_model->get_data('advantages');
        $page_data['sub_faq']=$this->Front_end_model->get_home_faq('sub_faq');
        $page_data['how_works']=$this->Front_end_model->get_single_data('how_does_it_works');
        $page_data['about_us']=$this->Front_end_model->get_single_data('about_us');
        $page_data['testimonial']=$this->Front_end_model->get_testimonial('testimonial');

        $page_data['page_name']  = 'home';
        $page_data['page_title'] = 'Home';
        $this->load->view('frontend/index', $page_data);

    }

    public function tutor_faq_page()
    {
        if($this->input->post()) {

          $question=$this->input->post('search');
          $result=$this->Front_end_model->search_tutor_faq('sub_faq',$question);
          if(count($result)<1) {
            $result=$this->Front_end_model->get_tutor_subfaq('sub_faq');
          }
          $page_data['searched_subfaq']=$result;

        }else {
           $page_data['tutor_faq']=$this->Front_end_model->get_tutor_faq('faq');
           $page_data['tutor_subfaq']=$this->Front_end_model->get_tutor_subfaq('sub_faq');
        }

        $page_data['page_name']  = 'faqs';
        $page_data['page_title'] = '';
        $this->load->view('frontend/index', $page_data);

    }

    public function student_faq_page()
    {
        if($this->input->post()) {

          $question=$this->input->post('search');
          $result=$this->Front_end_model->search_student_faq('sub_faq',$question);
          if(count($result)<1) {
            $result=$this->Front_end_model->get_student_subfaq('sub_faq');
          }
          $page_data['searched_subfaq']=$result;

        }else {
           $page_data['student_faq']=$this->Front_end_model->get_student_faq('faq');
           $page_data['student_subfaq']=$this->Front_end_model->get_student_subfaq('sub_faq');
        }

        $page_data['page_name']  = 'faqs_student';
        $page_data['page_title'] = '';
        $this->load->view('frontend/index', $page_data);

    }

    public function about_us()
    {
        $page_data['about_us']=$this->Front_end_model->get_single_data('about_us');
        $page_data['our_values']=$this->Front_end_model->get_data('our_values');

        $page_data['page_name']  = 'about_us';
        $page_data['page_title'] = 'about us';
        $this->load->view('frontend/index', $page_data);

    }

    public function terms_and_conditions()
    {
        $id=1;
        $page_data['terms']=$this->Front_end_model->get_terms_data('terms_conditions',$id);

        $page_data['page_name']  = 'terms_and_conditions';
        $page_data['page_title'] = 'terms and conditions';
        $this->load->view('frontend/index', $page_data);

    }

    public function privacy_policy()
    {
        $id=2;
        $page_data['policy']=$this->Front_end_model->get_terms_data('terms_conditions',$id);

        $page_data['page_name']  = 'privacy_policy';
        $page_data['page_title'] = 'privacy policy';
        $this->load->view('frontend/index', $page_data);

    }

    public function cancellation_refund()
    {
        $id=3;
        $page_data['cancellation_refund']=$this->Front_end_model->get_terms_data('terms_conditions',$id);

        $page_data['page_name']  = 'cancellation_refund';
        $page_data['page_title'] = 'Cancellation & Refund';
        $this->load->view('frontend/index', $page_data);

    }

    public function feedback()
    {
        $id=4;
        $page_data['feedback']=$this->Front_end_model->get_terms_data('terms_conditions',$id);
        $page_data['feedback_questions']=$this->Front_end_model->get_data('feedback_questions');


        $page_data['page_name']  = 'feedback';
        $page_data['page_title'] = 'Feedback';
        $this->load->view('frontend/index', $page_data);

    }

    public function feedback_report()
    {


        $user_data=array(
          'name'=>$this->input->post('name'),
          'email'=>$this->input->post('email'),
          'created_at'=>time()
        );
        $result=$this->Front_end_model->user_insert('user_feedback',$user_data);
        if($result) {
        $id= $this->db->insert_id();
       // print_r($user_data);
         $questions=$_POST['question_id'];
         $answers=$_POST['answer'];
        $count=count($questions);
       for($i=0;$i<$count;$i++) {

       $feedback_report=array(
        'users_feedback_id'=>$id,
        'question_id'=>$questions[$i],
        'answer'=>$answers[$i]
       );
       $result=$this->Front_end_model->user_insert('users_feedback_report',$feedback_report);

                           }
                           redirect('frontend/feedback');
                           }


    }


   /* public function subscribe($email)
    {


            $query=$this->db->where('email',$email)->get('subscribe_list');

            if($query->num_rows() > 0)
            {

              echo "<span  style='color:red; font-size:14px;' >Email Already Subscribed</span>";

            }


    }
    */

    public  function sub_insert($email)

    {
        $query=$this->db->where('email',$email)->get('subscribe_list');

            if($query->num_rows() > 0)
            {

              echo "<span id='fade_1' style='color:red; font-size:14px;' >Email Already Subscribed</span>";

            }
            else {
                $data= array('email'=>$email,'created_at'=>time());
              $result=$this->Front_end_model->user_insert('subscribe_list',$data);
               echo  "<span id='fade_1'  style='color:white; font-size:14px; '>Subscribed Successfully</span>";
            }


    }


    public function career_page()
    {

       $page_data['career']=$this->Front_end_model->get_data('careers');

        $page_data['page_name']  = 'careers';
        $page_data['page_title'] = 'Careers';
        $this->load->view('frontend/index', $page_data);

    }

    public function career_page_view($url="")
    {

       $page_data['data']=$this->Front_end_model->get_url_data('careers',$url);

        $page_data['page_name']  = 'careers_view';
        $page_data['page_title'] = 'Careers';
        $this->load->view('frontend/index', $page_data);

    }

    public function apply_post($url="")
    {

       $page_data['post_id']=$this->Front_end_model->get_post_id('careers',$url);

        $page_data['page_name']  = 'apply_post';
        $page_data['page_title'] = 'Apply post';
        $this->load->view('frontend/index', $page_data);

    }
    public function insert_post()
    {
       // print_r($_FILES);die;
        //print_r($_POST);die;

        /*if (empty($_FILES['user_file']['name']))
        {
        $this->form_validation->set_rules('user_file', 'Document', 'required');
        }
        $this->form_validation->set_rules('full_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required|numeric|exact_length[10]');
        if ($this->form_validation->run() == FALSE) {

              $url=$this->Front_end_model->get_post_url('careers',$_POST['post_id']);
              redirect('apply_post/'.$url);

              }*/

              $resume = $this->resume_file('user_file');

              $data=array(
                  'post_id'=>$this->input->post('post_id'),
                  'resume'=>$resume,
                  'full_name'=>$this->input->post('full_name'),
                  'email'=>$this->input->post('email'),
                  'phone'=>$this->input->post('phone'),
                  'current_company'=>$this->input->post('current_company'),
                  'linkedin_url'=>$this->input->post('linkedin_url'),
                  'twitter_url'=>$this->input->post('twitter_url'),
                  'github_url'=>$this->input->post('github_url'),
                  'portfolio_url'=>$this->input->post('portfolio_url'),
                  'other_website'=>$this->input->post('other_website'),
                  'additional_information'=>$this->input->post('additional_information'),
                  'created_at'=>time(),
                  );
                //print_r($data);die;
              $result=$this->Front_end_model->user_insert('apply_post',$data);
              if($result)
              {
                  $url=$this->Front_end_model->get_post_url('careers',$_POST['post_id']);
                  redirect('apply_post/'.$url);
              }
    }

	function get_from_level($study_level_id="")
    {
    
      echo  '<option value="">--Select Level--</option>'; 
            
      $levels= $this->Front_end_model->get_levels($study_level_id);
      foreach ($levels as $row1) {        
        
            echo '<option value="' . $row1->id . '" >' . $row1->from_level . '</option>';
      }
	  
    }
	function get_subject()
    {
    
    $course_id = $this->input->get_post('course_id');
    $subject= $this->Front_end_model->get_subject($course_id);
        echo  '<option value="">--Select Subjects--</option>';
      foreach ($subject as $row) {
            echo '<option value="' . $row->subject_generate_id . '">' . $row->subject . '</option>';
      }     
    
    } 
	function get_to_level($study_level_id="")
    {

			echo  '<option value="">--Select To Level--</option>';

			$levels= $this->Front_end_model->get_levels($study_level_id);
			foreach ($levels as $row1) {
            echo '<option value="' . $row1->id . '">' . $row1->from_level . '</option>';
			}


    }
	 function get_course()
    {
		$study_level_id= $this->input->get_post('study_level_id');
		$from_level = $this->input->get_post('from_level');
		$to_level = $this->input->get_post('to_level');
		$course= $this->Front_end_model->get_course($study_level_id,$from_level,$to_level);
			if(count($course)>0){
			foreach ($course as $row) {
            echo '<option value="' . $row->course_generate_id . '">' . $row->course . '</option>';
			}
			}else{
				echo '<option value="">--No Courses--</option>';
			}

    }
	public function filter_subject($url="")
	{
		echo $this->input->post('typeahead');
		}

	public function filter_search()
	{

		$page_data = $this->Front_end_model->get_filter_tutor();
		$data = '';
		if(count($page_data) == 0){
			$data='<div class="tutorshoftprofilebox cat1 text-center">NO Tutor Found<div>';
		}else{
		foreach($page_data as $row){
			if(!empty($row->profile_image)){
							   $image_url=base_url()."uploads/tutor_profile/".$row->profile_image;
						   }else{
								   $image_url=base_url()."front_assets/img/tutor1.jpg";
							   }
				if($this->session->userdata('user_status') == 1){
					$message='<div class="col-md-4 col-sm-3"><a href="'.base_url().'tutor_view/'.$row->generated_id.'" class="grebtn res-mt-10">Message <i class="fa fa-angle-right"></i></a></div>';
					$load_more='<div align="center"><a role="button" onclick="loaddata()" id="loadmore" class="btn btn-default"><i class="fa fa-spinner fa-spin fa-fw"></i> LOAD MORE</a></div>';
					if($this->session->userdata('user_type') =='student'){
						$admin_status = $this->db->where('id',$this->session->userdata('user_id'))->get('student')->row()->admin_status;
						if($admin_status == 0){
							$request='<a  role="button" onclick="inactive_student()"  class="blubtn">Request Class<i class="fa fa-angle-right"></i></a>';
							$sld='<a  role="button" onclick="inactive_student()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
						}else{
							$request='<div class="col-md-4 col-sm-3"><a role="button" onclick=fade_form("'.$row->id.'") class="grebtn res-mt-10">Request Class <i class="fa fa-angle-right"></i></a></div>';
						$sld='<a id="tutor_'.$row->id.'" role="button" onclick=shortlist_tutor(this.id,"'.$row->id.'","'.$row->generated_id.'","'.$row->first_name.'","'.$image_url.'") class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
						}
					}else{
						$request="";
						$sld = $sld='<a  role="button" onclick="login_type()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
					}
				}else{
					$message='<div class="col-md-4 col-sm-3"><a role="button" onclick="login_status()" class="grebtn res-mt-10">Message <i class="fa fa-angle-right"></i></a></div>';
					$load_more='<div align="center"><a role="button" onclick="login_status()" id="loadmore" class="btn btn-default"><i class="fa fa-spinner fa-spin fa-fw"></i> LOAD MORE</a></div>';
					$request="";
					$sld='<a  role="button" onclick="login_status()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';

				}
				$time ='';
				  for($i=0;$i<24;$i++){
						$time .= '<option value="'.$i.':00">'.$i.':00</option>';
							$time .=	'<option value="'.$i.':30">'.$i.':30</option>';
							 }
				$course_list=$this->db->where('tutor_id',$row->id)->get('tutor_subjects')->result();
					$courses="";
				 foreach($course_list as $course_list1){
							$courses .=	'<option value="'.$course_list1->subject_id.'">'.$this->Front_end_model->get_subject_name($course_list1->subject_id).'</option>';
							}

			$data .= '<div class="tutorshoftprofilebox cat1">
                        <div class="row">
                          <div class="col-md-3 col-sm-3 col-xs-12" align="center"><img src="'.$image_url.'" class="img-responsive img-thumbnail res-mb-10" width="170" height="170"></div>
                          <div class="col-md-9 col-sm-9 col-xs-12">
						  <div class="change_star">
                            '.$sld.'
                            </div>
							<strong>'.$row->generated_id.'</strong><small>(On Eduzyte since July 27, 2014)</small>  <br>
                            <small>
                              <i class="fa fa-book"></i> <strong>Education :</strong> '.$row->degree.' from '.$row->institution.' <br>
                              <i class="fa fa-clock-o"></i> <strong>Tutoring Experience :</strong> 9 Years 9 Months
                              <span class="pull-right"><i class="fa fa-clock-o"></i> <strong>Total Hours Taught on eduzyte :</strong> 1044 Hours</span><br>
                              <i class="fa  fa-hourglass-2"></i> <strong>Tutor Expertise :</strong> QuantitativeGMATCAT & 12 others
                            </small>
                             <div class="row">
                              <div class="col-md-8 col-sm-9">
                                <span>
                          <form method="get">
                            <fieldset class="rating">
                              <input type="radio" id="star5" name="rating" value="5" />
                              <label class = "full" for="star5" title="Awesome - 5 stars">
                              </label>
                              <input type="radio" id="star4half" name="rating" value="4.5" />
                              <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                              </label>
                              <input type="radio" id="star4" name="rating" value="4" />
                              <label class = "full" for="star4" title="Pretty good - 4 stars">
                              </label>
                              <input type="radio" id="star3half" name="rating" value="3.5" />
                              <label class="half" for="star3half" title="Meh - 3.5 stars">
                              </label>
                              <input type="radio" id="star3" name="rating" value="3" />
                              <label class = "full" for="star3" title="Meh - 3 stars">
                              </label>
                              <input type="radio" id="star2half" name="rating" value="2.5" />
                              <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                              </label>
                              <input type="radio" id="star2" name="rating" value="2" />
                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                              </label>
                              <input type="radio" id="star1half" name="rating" value="1.5" />
                              <label class="half" for="star1half" title="Meh - 1.5 stars">
                              </label>
                              <input type="radio" id="star1" name="rating" value="1" />
                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                              </label>
                              <input type="radio" id="starhalf" name="rating" value="0.5" />
                              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                              </label>
                            </fieldset>
                          </form>
                          <span class="tutrating">
                            4.5 Rating from 681 Classes
                          </span>
                        </span>
                              </div>
							  '.$request.'
							  '.$message.'
                            </div>
                          </div>
                        </div>

					<div style="display:none" class="col-md-9 col-sm-9 col-xs-12 request_form"  id="request_'.$row->id.'">
					<form  id="request_form_'.$row->id.'" class="form-horizontal">
					  <div class="form-group">
					  <input type="hidden" name="request_tutor_id" value="'.$row->id.'" />
						<label for="inputEmail3" class="col-sm-2 control-label">Date</label>
						<div class="col-sm-10">
						  <input type="date" class="form-control date1" name="date" min="'.date('Y-m-d',time() + 86400).'" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Class Timing</label>
						<div class="col-sm-4">
						  <select class="form-control" name="from_time" onchange="get_to_time(this.value,'.$row->id.')" required>
								<option value="">--From--</option>
							'.$time.'
							</select>
						</div>
						<div class="col-sm-4">
						 <select name="to_time" id="to_time'.$row->id.'" class="form-control" required>
								<option value="">--To--</option>

							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Course</label>
						<div class="col-sm-10">
						  <select class="form-control" name="course" required>
								<option value="">--select course--</option>
									'.$courses.'
							</select>
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hour price</label>
						<div class="col-sm-10">
						<div class="col-md-3">
						<select name="currency_type" class="form-control date1">
						<option value="dollar">$</option>
						<option value="inr">₹</option>
						</select>
						</div>
						<div class="col-md-9">
						  <input type="tel" name="hour_price" class="form-control date1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-lg" placeholder="expertise price per hour" max="5" requiredzz>
						</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="button" onclick=request_tutor("request_form_'.$row->id.'") class="btn btn-default">Save</button>
						</div>
					  </div>
					</form>
				</div>
                    </div>';

		}
		$data .= $load_more;

		}
		echo $data;


	}
	public function search_by_course($course="",$url="")
    {	
		//echo $url;die;
		$id = $this->db->where('subject_url_slug',$url)->get('subjects')->row()->subject_generate_id;		
		$page_data['tutors_list']  = $this->Front_end_model->get_tutors_subject($id);		
				
		//$page_data['course_list']  = $this->Front_end_model->get_active_data('course');        
        $page_data['page_name']  = 'search_a_tutor';
        $page_data['page_title'] = 'Become a tutor';
        $this->load->view('frontend/index', $page_data);

    }
	
	
	public function search_a_tutor1($url="")
    {	
		
		$id = $this->db->where('search_url',$url)->get('frequently_searched')->row()->subject_id;		
		$page_data['tutors_list']  = $this->Front_end_model->get_tutors_subject($id);		
				
		//$page_data['course_list']  = $this->Front_end_model->get_active_data('course');        
        $page_data['page_name']  = 'search_a_tutor';
        $page_data['page_title'] = 'Become a tutor';
        $this->load->view('frontend/index', $page_data);

    }



	public function search_a_tutor()	
    {	
	
		if($_POST){			
			$search_url = str_replace(" ","-",$this->input->post('typeahead'));			
			$d = explode(" for ",$this->input->post('typeahead'));
			$subject = $d[0];
			$from_level_id=$this->db->where('from_level',$d[1])->get('from_level')->row()->id;
			$subject_id=$this->db->where('from_level_id',$from_level_id)->where('subject',$subject)->get('subjects')->row()->subject_generate_id;
			$data=array('subject_id'=>$subject_id,'show_text'=>$this->input->post('typeahead'),'search_url'=>$search_url);
			$insert = $this->Front_end_model->user_insert('frequently_searched',$data);
			
			$page_data['tutors_list']  = $this->Front_end_model->get_tutors_subject($subject_id);			
				}
		else if($this->input->get_post('level_id')){		
		$level_id = $this->$this->input->get_post('level_id');
		$page_data['tutors_list']  = $this->Front_end_model->get_tutors_course($level_id);
			}else{
			$page_data['tutors_list']  = $this->Front_end_model->get_tutors('tutor');
			}
			
		
		//$page_data['course_list']  = $this->Front_end_model->get_active_data('course');        
        $page_data['page_name']  = 'search_a_tutor';
        $page_data['page_title'] = 'Become a tutor';
        $this->load->view('frontend/index', $page_data);

    }
	public function request_tutor(){
		//print_r($_REQUEST);die;
		$student_id=$this->session->userdata('user_id');
		$request_tutor_id = $this->input->get_post('request_tutor_id');
		$from_time = $this->input->get_post('from_time');
		$to_time = $this->input->get_post('to_time');
		$course = $this->input->get_post('course');
		$currency_type = $this->input->get_post('currency_type');
		$hour_price = $this->input->get_post('hour_price');
		$data=array(
		'student_id'=>$student_id,
		'request_tutor_id'=>$request_tutor_id,
		'from_time'=>$from_time,
		'to_time'=>$to_time,
		'course'=>$course,
		'currency_type'=>$currency_type,
		'hour_price'=>$hour_price
		);
		$check_data1 = $this->Front_end_model->get_request_data($request_tutor_id);
		if($check_data1 == '0'){
			$insert = $this->Front_end_model->user_insert('student_request_class',$data);
			echo "success";
		}else{
			echo "failure";
		}



	}

	public function save_shortlist(){

		$tutor_id = $this->input->get_post('name');
		$student_id=$this->session->userdata('user_id');
		$count=count($tutor_id);
		$check = $this->Front_end_model->get_shortlist_data();
		if($check == "empty"){
			for($i=0;$i<$count;$i++){
			$data=array(
			'student_id'=>$student_id,
			'shortlist_tutor_id'=>$tutor_id[$i]
			);
			$insert = $this->Front_end_model->user_insert('student_shortlist',$data);
			}
			if($insert){
					echo "success";
				}else{
					echo "failure";
				}
		}else{
			$delete = $this->db->where('student_id',$student_id)->delete('student_shortlist');
			for($i=0;$i<$count;$i++){
			$data=array(
			'student_id'=>$student_id,
			'shortlist_tutor_id'=>$tutor_id[$i]
			);
				$insert = $this->Front_end_model->user_insert('student_shortlist',$data);
				}
				if($insert){
					echo "success";
				}else{
					echo "failure";
				}
			}

	/*	for($i=0;$i<$count;$i++){
			$data=array(
			'student_id'=>$student_id,
			'shortlist_tutor_id'=>$tutor_id[$i]
			);
			$check = $this->Front_end_model->get_shortlist_data();
			if($check == "empty"){
				$insert = $this->Front_end_model->user_insert('student_shortlist',$data);
				if($insert){
					echo "success";
				}else{
					echo "failure";
				}
			}else{
				$delete = $this->db->where('student_id',$student_id)->delete('student_shortlist');
				if($delete){
					$insert = $this->Front_end_model->user_insert('student_shortlist',$data);
				$insert=false;
				if($insert){
					echo "success";
				}else{
					echo "failure";
				}
				}
			}


		}*/

	}


	public function tutor_view($id="")
    {
        $where['generated_id']=$id;
        $page_data['tutor_data']  = $this->Front_end_model->single_tutor_data('tutor',$where);
        $page_data['page_name']  = 'tutor_view';
        $page_data['page_title'] = 'View a tutor';
        $this->load->view('frontend/index', $page_data);

    }

    public function become_a_tutor()
    {
        $page_data['page_name']  = 'become_a_tutor';
        $page_data['page_title'] = 'Become a tutor';
        $this->load->view('frontend/index', $page_data);

    }

    public function register($data='')
    {
         if($this->session->userdata('user_status') == 1)
			 redirect('');
        $page_data['page_name']  = 'register';
        $page_data['page_title'] = 'Register';
        $this->load->view('frontend/index', $page_data);

    }
    public function login()
    {

      if($this->session->userdata('user_status') == 1)
			 redirect('');

        $page_data['page_name']  = 'login';
        $page_data['page_title'] = 'login';
        $this->load->view('frontend/index', $page_data);

    }
	function otp_number(){
		return $otp=rand(000000,999999);
	}

	function register_data(){

		if($this->input->post('method_type'))
		  {
			  $table='student';
			  $generated_id=$this->generate_student_id();

			  /*$query=$this->Front_end_model->get_generate_id($table,$generated_id);
			  if($query->num_rows()>0) {
				  $generated_id=$this->generate_student_id();
			  }else{
				  $generated_id=$generated_id;
			  }*/


		  }else {
			  $table='tutor';
			  $generated_id=$this->generate_tutor_id();

			 /* $query=$this->Front_end_model->get_generate_id($table,$generated_id);
			  if($query->num_rows()>0) {
				  $generated_id=$this->generate_tutor_id();
			  }else{
				  $generated_id=$generated_id;
			  }*/

		  }

           $this->form_validation->set_rules('email', 'Email', 'required|is_unique['.$table.'.email]',array('is_unique'=>'Email has already been used'));
           $this->form_validation->set_rules('phone', 'Mobile', 'required|numeric|is_unique['.$table.'.mobile]',array('is_unique'=>'Mobile number has already been used'));
           $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]');
		   $this->form_validation->set_error_delimiters('<span style="color:red" >', '</span>');		   
            if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('login_error', validation_errors());
				$page_data['page_name']  = 'register';
				$page_data['page_title'] = 'Register';
				$this->load->view('frontend/index', $page_data);
            }else{
				$otp= $this->otp_number();

			  $data['type']=$table;
			  $data['title']=$this->input->post('title1');
			  $data['name']=$this->input->post('first_name');
			  $data['email']=$this->input->post('email');
			  $data['mobile']=$this->input->post('phone');
			  $data['password']=md5($this->input->post('password'));
			  $data['show_password']=$this->input->post('password');
			  $data['otp']=$otp;
			  $data['generated_id']=$generated_id;
			  $data['created_at']=time();

			$mobile=$this->input->post('phone');
			$result=$this->Front_end_model->insert($table,$data);
			if($result){			
			$last_id= $this->db->insert_id();
			$query=$this->db->where('email',$this->input->post('email'))->get('subscribe_list');
            if($query->num_rows() < 1){
			$sdata=array('email'=>$this->input->post('email'),'created_at'=>time());
			$res = $this->Front_end_model->insert('subscribe_list',$sdata);
			}
						$email_data1=array(
							'name'=>$this->input->post('first_name'),
							'otp'=>$otp);
					$email=$this->input->post('email');
					$send = $this->send_email->otp_email($email_data1,$email);

			$sms_message="Use ";
					$sms_message.=$otp;
					$sms_message.=" (One Time Password) for your transaction ";
					$sms_message.=" www.eduzyte.com ";
					/*sms integration*/
					$this->send_sms($mobile,$sms_message);


			$id=$last_id;
			$otp_send_update=$this->db->where('id',$id)->set('otp_send',1)->update($table);
			$table_id=$table.'-'.$id;
		    $table_id=base64_encode($table_id);
			$this->session->set_flashdata('success', 'OTP has sent to Your registerd Mobile and Email');
		redirect('otp_verification/'.$table_id);
		}

			}


	}

	 public function otp($table_id="")
    {
	     $encode_id=$table_id;
     	$table_id=base64_decode($table_id);
		$data=explode("-",$table_id);
		 $table=$data['0'];
		 $id=$data['1'];
	    $mobile=$this->db->where('id',$id)->get($table)->row()->mobile;
     	$otp=$this->Front_end_model->get_otp($table,$id);
		if($this->input->post())
		{
			$verify_otp=$this->input->post('otp_number');
			if($otp == $verify_otp) {
				$update_data=array(
				'verify_otp'=>$verify_otp,
				'otp_status'=>1
				);
				$where['id']=$id;
			 $update=$this->Front_end_model->update($table,$update_data,$where);
			 if($update) {
				 if($this->session->userdata('user_status') != 1){
					 $this->session->set_flashdata('login_message', 'Congratulations! Your OTP has verified, Please Login ');
				redirect('existing_user');
				 }else{
					redirect($this->session->userdata('user_type').'_welcome','refresh');
				 }

			 }
			}
			else{
				$this->session->set_flashdata('error_message', 'Invalid Otp number');
				redirect('otp_verification/'.$encode_id);
			}

		}

			$page_data['page_name']  = 'otp';
			$page_data['page_title'] = 'otp';
			$this->load->view('frontend/index', $page_data);


    }
	function resend_otp($table_id){
		$encode_id=$table_id;
     	$table_id=base64_decode($table_id);
		$data=explode("-",$table_id);
		  $table=$data['0'];
		 $id=$data['1'];

		 $otp_data= $this->db->where('id',$id)->get($table)->row();
		 $name=$otp_data->name;
		 $otp_send = $otp_data->otp_send;
		 $mobile_number = $otp_data->mobile;
		 $otp=$otp_data->otp;
		 $sms_message="Use ";
					$sms_message.=$otp;
					$sms_message.=" (One Time Password) for your transaction ";
					$sms_message.=" www.eduzyte.com ";
		$email_data=array(
		'name'=>$name,
		'otp'=>$otp);
		$email=$otp_data->email;
		 if($otp_send<3) {
			 if($otp_send == 1) {
				 $this->send_sms($mobile_number,$sms_message);
				 $send = $this->send_email->otp_email($email_data,$email);
				 $otp_send_update=$this->db->where('id',$id)->set('otp_send',2)->update($table);
				 $this->session->set_flashdata('success', 'OTP has sent to Your registerd Mobile and Email');
				 redirect('otp_verification/'.$encode_id);
			 }
			 if($otp_send == 2) {
				 $this->send_sms($mobile_number,$sms_message);
				 $send = $this->send_email->otp_email($email_data,$email);
				 $otp_send_update=$this->db->where('id',$id)->set('otp_send',3)->update($table);
				 $this->session->set_flashdata('success', 'OTP has sent to Your registerd Mobile and Email');
				 redirect('otp_verification/'.$encode_id);
			 }
			 /*if($otp_send == 3) {
				 $this->send_sms($mobile_number,$sms_message);
				 $send = $this->send_email->otp_email($email_data,$email);
				 $otp_send_update=$this->db->where('id',$id)->set('otp_send',4)->update($table);
				 $this->session->set_flashdata('success', 'Otp has sent to Your registerd Mobile and Email');
				 redirect('otp_verification/'.$encode_id);
			 }
			 if($otp_send == 4) {
				 $this->send_sms($mobile_number,$sms_message);
				 $send = $this->send_email->otp_email($email_data,$email);
				 $otp_send_update=$this->db->where('id',$id)->set('otp_send',5)->update($table);
				 $this->session->set_flashdata('success', 'Otp has sent to Your registerd Mobile and Email');
				 redirect('otp_verification/'.$encode_id);
			 }*/


		 }else{
			 $this->session->set_flashdata('error_message', 'Your Otp limits over, for further procedure please contact Admin');
				redirect('otp_verification/'.$encode_id);
		 }

	}

	public function check_login()
	{
		//print_r($userData);die;
		if($this->input->post('method_type'))
		  {
			  $table='student';
		  }else {
			  $table='tutor';
		  }

                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));
				$em_check=$this->Front_end_model->email_mobile_chk($table,$email);
				if($em_check){
					$query = $this->Front_end_model->login_chk($table,$email,$password);

				 if ($query->num_rows() > 0)
				   {
					   $user_details=$query->row();
					   if($user_details->block_status == 0){
						   $this->session->set_flashdata('login_error', 'Your accout has Blocked please contact admin (help@eduzyte.com)');
							redirect('existing_user','refresh');
					   }else{
					   $this->session->set_userdata('user_status','1');
					   $this->session->set_userdata('user_name',$user_details->name);
					   $this->session->set_userdata('user_type',$user_details->type);
					   $this->session->set_userdata('user_id',$user_details->id);
					   $this->session->set_userdata('g_id',$user_details->generated_id);

					  $table_id=$this->session->userdata('user_type').'-'.$this->session->userdata('user_id');
		               $table_id=base64_encode($table_id);

						 if($user_details->otp_status == 0) {
						  redirect('otp_verification/'.$table_id);
					   }else{
						   redirect($this->session->userdata('user_type').'_welcome','refresh');
					   }
					   }

				   }else{
					   $this->session->set_flashdata('login_error', 'your password is incorrect');
                    redirect('existing_user','refresh');
				   }
					
				}else{
					$this->session->set_flashdata('login_error', 'we cannot find an account with that email or mobile');
                    redirect('existing_user','refresh');					
				}

				 

	}



	public function forgot_password()
    {

            $table=$this->input->post_get('table_type');
			$email=$this->input->post_get('useremail');
            $query=$this->Front_end_model->forget_password($table,$email);
            if($query=="success") {

			  $userdata=$this->Front_end_model->get_user_email($table,$email);
			  $password=$this->generate_auto_password();
			  $mdpassword=md5($password);
			  $useremail = $userdata->email;
			  $username = $userdata->name;
			  $userid=$userdata->id;
			  $email_data = array('name'=>$username,'password'=>$password);
			  $update_data=array('password'=>$mdpassword,'show_password'=>$password);
			  $where['id']=$userid;
			  $send = $this->send_email->reset_password($email_data,$useremail);
			  $update=$this->Front_end_model->update($table,$update_data,$where);

                echo "success";
            }else{
				echo 'failure';
            }
      }
	  public function change_password()
    {
		if($this->session->userdata('user_status') != 1)			
                 redirect('existing_user');
			 
			$id=$this->session->userdata('user_id');
            $table=$this->input->post_get('table_type');
			$old_password=$this->input->post_get('old_password');
			$new_password=$this->input->post_get('new_password');
            $query=$this->Front_end_model->change_password($table,$old_password,$id);
            if($query=="success") {
					$mdpassword=md5($new_password);
				  //$email_data = array('name'=>$username,'password'=>$password);
				  $update_data=array('password'=>$mdpassword,'show_password'=>$new_password);
				  $where['id']=$id;
				  //$send = $this->send_email->reset_password($email_data,$useremail);
				  $update=$this->Front_end_model->update($table,$update_data,$where);

                echo "success";
            }else{
				echo 'failure';
            }
      }

	 public function logout()
    {

		  $this->session->sess_destroy();
          $this->session->set_flashdata('logout_notification', 'logged out successfully');
          redirect('existing_user');
    }
	
	public function contact_message()
    {
		$data=array(
		'name'=>$this->input->get_post('name'),
		'mobile'=>$this->input->get_post('mobile'),
		'mobile1'=>$this->input->get_post('mobile2'),
		'email'=>$this->input->get_post('email'),
		'subject'=>$this->input->get_post('subject'),
		'message'=>$this->input->get_post('message')
		);
		$result=$this->Front_end_model->insert('user_messages',$data);
		if($result){
		echo "success";
		
			}		  
    }
	
	














































    public function register1()
    {

        if($this->input->post()){
        //print_r($_POST);die;

           $this->form_validation->set_rules('first_name', 'first name', 'required|alpha|min_length[3]|max_length[20]');
           $this->form_validation->set_rules('last_name', 'last name', 'required|alpha|min_length[3]|max_length[20]');


           $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');

           $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
             $this->form_validation->set_rules('street_address', 'street address', 'required');
              $this->form_validation->set_rules('city', 'city','required');
              $this->form_validation->set_rules('zip_code', 'zip code','required');
         /*  $this->form_validation->set_error_delimiters('<span class="error" style="color:red" >', '</span>');*/

                if ($this->form_validation->run() == FALSE) {
           $this->session->set_flashdata('login_error', validation_errors());
           redirect('register');
           die;
            }else{

                $email_data=array(
                  'first_name'=> $this->input->post('first_name'),
                  'last_name'=>$this->input->post('last_name'),
                  'email'=> $this->input->post('email'),
                  'password'=> $this->input->post('password')
                );

             $email=$this->input->post('email');
             $data=array(
            'first_name'=>$this->input->post('first_name'),
            'last_name'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email'),
            'mobile'=>$this->input->post('mobile'),
            'password'=>md5($this->input->post('password')),
            'street_address'=>$this->input->post('street_address'),
            'city_id'=>$this->input->post('city'),
            'zip_code'=>$this->input->post('zip_code'),
            'country'=>1,
            'state'=>1,
        );
             print_r($data);die;

             $result=$this->Front_end_model->user_insert('user',$data);
             if($result)
             {

               // $send = $this->send_email->register_email($email_data,$email);
                $this->session->set_flashdata('success',"Successfully Registred please check your email for login details");
                redirect('frontend/register');

             }
           }

        }

        $page_data['city']=$this->Front_end_model->get_data('city');
        $page_data['page_name']  = 'register';
        $page_data['page_title'] = 'Register';
        $this->load->view('frontend/index', $page_data);

    }

    public function login1()
    {

        if($this->input->post())
        {

                 $data=array(
                'email'=>$this->input->post('user_name'),
                'password'=>md5($this->input->post('password'))

            );

                  $query = $this->db->get_where('user', $data);
          if ($query->num_rows() > 0)
           {

              $row = $query->row();
              $this->session->set_userdata('user_login', '1');
              $this->session->set_userdata('user_id', $row->id);
              $this->session->set_userdata('user_data', $row);
              $this->session->set_userdata('login_type', 'user');

              $date= Date('Y-m-d');
              $u_data=array('user_id'=>$row->id,'time'=>$date);
              $u_query = $this->db->get_where('user_logins', array('user_id'=>$row->id));
              if ($u_query->num_rows() > 0)
             {
              $last_login= $this->db->get_where('user_logins', array('user_id'=>$row->id))->row()->time;
              $this->session->set_userdata('last_login',$last_login);
              $update=$this->db->where('user_id',$row->id)->update('user_logins',$u_data);
             }else{
               $insert=$this->db->insert('user_logins',$u_data);
             }

              redirect('frontend/dashboard', 'refresh');
            }else{
                    $this->session->set_flashdata('login_error', 'Invalid Login');
                    redirect('frontend/login','refresh');
                  }
        }


            $page_data['page_name']  = 'login';
            $page_data['page_title'] = 'login';
            $this->load->view('frontend/index', $page_data);

    }

    public function failure()
    {

       $page_data['page_name']  = 'failure';
        $page_data['page_title'] = 'fail';
        $this->load->view('frontend/index', $page_data);
    }

      public function success()
    {

       $page_data['page_name']  = 'success';
        $page_data['page_title'] = 'success';
        $this->load->view('frontend/index', $page_data);
    }
    
    public function unsubscribe()
    {

       /*$page_data['page_name']  = 'success';
        $page_data['page_title'] = 'success';
        $this->load->view('frontend/index', $page_data);*/
        $this->load->view('unsub_email.php');
    }



   function user_message()
{

  $table="enquiry";

  if(empty($_SESSION['6_letters_code']) || strcasecmp($_SESSION['6_letters_code'], $_POST['captcha']) != 0)
    {
        //echo "<script>alert('Invalid Captcha Code')</script>";
        $this->session->set_flashdata('error'," *Invalid Captcha");
        redirect('contact_us');
    }else{

  $data=array(
    'name'=>$this->input->post('name'),
    'email'=>$this->input->post('email'),
    'phone'=>$this->input->post('phone'),
    'message'=>$this->input->post('message')
  );
  print_r($data);die;

   $result=$this->Home_model->insert($table,$data);
   $send = $this->send_email->do_email($data);
   if($send)
   {
        $this->session->set_flashdata('success',"message sent");
       redirect('contactus');
   }
   }

}


}





?>
