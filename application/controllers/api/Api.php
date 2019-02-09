	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json; charset=utf-8');


	class Api extends CI_Controller {

		function __construct()
	  	{
	  		parent::__construct();
	  		
	        
	      }

	      function cities()   
	    {

	    	 
	    	$data['city']= $this->Api_model->get('city');   	
	    	

	    	$arr = array('status' => "valid", 'message' => "data found", "data" => $data['city']);

	           echo json_encode($arr, JSON_PRETTY_PRINT);

	    }
	     function city_view()   
	    {
	    	$id=$this->input->get_post('city_id');

	    	
	    	$data['city']= $this->Api_model->get_where('city',$id); 
	    	if(!empty($data['city'])) {
	    		$arr = array('status' => "valid", 'message' => "data found", "data" => $data['city']);
	    	}else {
	    		$arr = array('status' => "invalid", 'message' => "data not found");
	    	}

	    	

	    	

	           echo json_encode($arr, JSON_PRETTY_PRINT);

	    }

		
		
	}
