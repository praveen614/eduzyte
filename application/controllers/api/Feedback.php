		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json; charset=utf-8');


		class Feedback extends CI_Controller {

			function __construct()
		  	{
		  		parent::__construct();
		  		$this->load->model("api/Feedback_model");
		        
		      }

		      function index()   
		    {
		    	$data['customerdata']=$this->input->get_post('customerdata');
		    	$data['ques_ans_first']=$this->input->get_post('ques_ans_first');	    	
		    	$data['ques_ans_two']=$this->input->get_post('ques_ans_first');
		    	$data['suggestion']=$this->input->get_post('suggestion');
		    	//print_r($data);    	
		    	 
		    	 $customerdata =json_decode($data['customerdata'], JSON_PRETTY_PRINT); 
		    	// print_r($customerdata);
		    	 $ques_ans_first =json_decode($data['ques_ans_first'], JSON_PRETTY_PRINT); 
		    	// print_r($ques_ans_first);
		    	 $ques_ans_two =json_decode($data['ques_ans_two'], JSON_PRETTY_PRINT); 
		    	// print_r($ques_ans_two);
		    	function generate_token() {
		    		return $token="SBM".rand(0,999);
		    	}	
		    	$customerdata['token']=generate_token();
		    	$query=$this->db->where('token',$customerdata['token'])->get('users_data');
		    	if($query->num_rows()>0){
		    		$customerdata['token']=generate_token();
		    	}
		    	$customerdata['created_at']=time();
		    	//print_r($customerdata);	    	

		    	$add= $this->Feedback_model->insert('users_data',$customerdata);
		    	if($add) {
		    		 $id= $this->db->insert_id();
		    		 $count=count($ques_ans_first);
			    	$questions=array_keys($ques_ans_first);
			    	$answers=array_values($ques_ans_first);

		            for($i=0; $i<$count; $i++){

		              $feedback_data['users_id'] = $id;
		              $feedback_data['question'] = $questions[$i];
		              $feedback_data['option'] = $answers[$i];
		              $feedback_data['created_at'] = time();  
		              $result=$this->Home_model->insert('feedback',$feedback_data);    

		             } 
		             $count=count($ques_ans_two);
			    	 $questions=array_keys($ques_ans_two);
			    	 $answers=array_values($ques_ans_two);

		            for($i=0; $i<$count; $i++){

		              $feedback_data['users_id'] = $id;
		              $feedback_data['question'] = $questions[$i];
		              $feedback_data['option'] = $answers[$i];
		              $feedback_data['created_at'] = time();  
		              $result=$this->Home_model->insert('feedback',$feedback_data);    

		             }   

			    	}   	
		    	

		    	if($add) {
		    		$arr = array('status' => "valid", 'message' => "data inserted successfully",);
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not inserted");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }



		      /*function insert()   
		    {
		    	$data['rate']=$this->input->get_post('rate');
		    	$data['cause']=$this->input->get_post('cause');
		    	
		    	$data['created_at']=time();
		    	 
		    	$add= $this->Feedback_model->insert('feedback',$data);   	
		    	

		    	if($add) {
		    		$arr = array('status' => "valid", 'message' => "data inserted successfully",);
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not inserted");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }
		     function get_feedback()   
		    {
		    		    	
		    	$data['feedback']= $this->Feedback_model->get('feedback');
		    	 
		    	if(!empty($data['feedback'])) {
		    		$arr = array('status' => "valid", 'message' => "data found", "data" => $data['feedback']);
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not found");
		    	}	

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }

		    function get_single_feedback()   
		    {
		    	$id=$this->input->get_post('feedback_id');

		    	
		    	$data['feedback']= $this->Feedback_model->get_where('feedback',$id); 
		    	if(!empty($data['feedback'])) {
		    		$arr = array('status' => "valid", 'message' => "data found", "data" => $data['feedback']);
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not found");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }
		    
		    function update_feedback()   
		    {
		    	$id=$this->input->get_post('id');

		    	$data['rate']=$this->input->get_post('rate');
		    	$data['cause']=$this->input->get_post('cause');
		    	
		    	$data['created_at']=time();

		    	
		    	$update= $this->Feedback_model->update('feedback',$id,$data); 

		    	if($update) {
		    		$arr = array('status' => "valid", 'message' => "data updated successfully");
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not updated");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }
		    
		    function delete_feedback()   
		    {
		    	$id=$this->input->get_post('id');	    
		    	
		    	$delete= $this->Feedback_model->delete('feedback',$id); 

		    	if($delete) {
		    		$arr = array('status' => "valid", 'message' => "data deleted successfully");
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not deleted");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }*/



			
			
		}
