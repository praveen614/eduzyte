          <?php
			defined('BASEPATH') OR exit('No direct script access allowed');

			header('Access-Control-Allow-Origin: *');
			header('Content-type: application/json; charset=utf-8');


			class Salesman extends CI_Controller {

				function __construct()
			  	{
			  		parent::__construct();
			  		$this->load->model("api/Salesman_model");
			        
			      }
		         /*function index(){		     
		               
		              $page_data['data']=$this->Questions_model->get_data('questions');
		              foreach ($page_data['data'] as $item) {
		                $item->answers=$this->Questions_model->get_options('options',$item->id);
		              } 

		                 if(!empty($page_data['data'])) {
			    		$arr = array('status' => "valid", 'message' => "data found", "feedback" => $page_data['data']);
			    	}else {
			    		$arr = array('status' => "invalid", 'message' => "data not found");
			    	}	

			           echo json_encode($arr, JSON_PRETTY_PRINT);

			    
		        
		             
		    }*/

		    function get_employee()   
		    {
		    	$id=$this->input->get_post('employee_id');

		    	
		    	$data['employee']= $this->Salesman_model->get_where('employee',$id); 
		    	if(!empty($data['employee'])) {
		    		$arr = array('status' => "valid", 'message' => "data found", "data" => $data['employee']);
		    	}else {
		    		$arr = array('status' => "invalid", 'message' => "data not found");
		    	}

		           echo json_encode($arr, JSON_PRETTY_PRINT);

		    }
				
				
			}
