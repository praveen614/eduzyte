<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		//echo "hi";die;
        $page_data['page_name']  = 'home';
        $page_data['page_title'] = 'Home';
        $this->load->view('index', $page_data);
		
	}
	public function menu($id,$name)
	{
	    
		$page_data['id']  = $id;
        $page_data['page_name']  = 'menus';
        $page_data['page_title'] = $name;
        
        $this->load->view('index', $page_data);
		
	}
	public function login()
	{
		
        $page_data['page_name']  = 'login';
        $page_data['page_title'] = 'Login';
        $this->load->view('member/login', $page_data);
		
	}
	/*public function dashboard()
	{
		
        $page_data['page_name']  = 'login';
        $page_data['page_title'] = 'Login';
        $this->load->view('member/login', $page_data);
		
	}*/
}
