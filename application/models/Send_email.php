<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_email extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->library('email');

    }


	function contact_message_email($email_from, $email_to, $email_message) {
	//echo $email_from.$email_to.$email_message;die;
		$email_sub = "Message from VK Health care Website";
		$this->do_email($email_message, $email_sub, $email_to, $email_from);
	}

	function otp_email($data='',$to_email='')
	{
		$message=$this->load->view('otp_email',$data,TRUE);
		$sub="Otp Number by Eduzyte";
		$config                     = array();
        $config['useragent']        = "CodeIgniter";
        $config['protocol']         = "smtp";
        $config['smtp_host']        = "ssl://mail.eduzyte.com";
        $config['smtp_user']        = "otp@eduzyte.com";
        $config['smtp_pass']        = "eduzyte@123456";
        $config['smtp_port']        = "465";
        $config['mailtype']         = 'html';
        $config['charset']          = 'utf-8';
        $config['newline']          = "\r\n";
        $config['wordwrap']         = true;
        $this->email->initialize($config);


               
       

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
        $from="otp@eduzyte.com";
		$this->email->from($from, $system_name);
		
		$this->email->to($to_email);
		$this->email->subject($sub);

	
		$this->email->message($message);

	$send=	$this->email->send();
		
		return $send;



	echo $this->email->print_debugger();
	}
	
	function reset_password($data='',$to_email='')
	{
		$message=$this->load->view('password_email',$data,TRUE);
		$sub="New demo Password by Eduzyte";
		$config                     = array();
        $config['useragent']        = "CodeIgniter";
        $config['protocol']         = "smtp";
        $config['smtp_host']        = "ssl://mail.eduzyte.com";
        $config['smtp_user']        = "password@eduzyte.com";
        $config['smtp_pass']        = "eduzyte@123456";
        $config['smtp_port']        = "465";
        $config['mailtype']         = 'html';
        $config['charset']          = 'utf-8';
        $config['newline']          = "\r\n";
        $config['wordwrap']         = true;
        $this->email->initialize($config);
       

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
        $from="otp@eduzyte.com";
		$this->email->from($from, $system_name);
		
		$this->email->to($to_email);
		$this->email->subject($sub);

	
		$this->email->message($message);

	$send=	$this->email->send();
		
		return $send;



	echo $this->email->print_debugger();
	}

	/***custom email sender****/
	function do_email($data=NULL,$to_email='')
	{
		$message=$this->load->view('contact_email',$data,TRUE);
		$sub="User sent request";
		$config                     = array();
        $config['useragent']        = "CodeIgniter";
        $config['protocol']         = "smtp";
        $config['smtp_host']        = "localhost";
        $config['smtp_user']        = "colourmoonhyd@demoworks.in";
        $config['smtp_pass']        = "colourmoonhyd123456789";
        $config['smtp_port']        = "25";
        $config['mailtype']         = 'html';
        $config['charset']          = 'utf-8';
        $config['newline']          = "\r\n";
        $config['wordwrap']         = true;
        $this->email->initialize($config);


               
       

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
        $from="horseclub@demoworks.in";
		$this->email->from($from, $system_name);
		
		$this->email->to('praveen6mg@gmail.com');
		$this->email->subject($sub);

	
		$this->email->message($message);

	$send=	$this->email->send();
		
		return $send;



	//	echo $this->email->print_debugger();
	}
}
