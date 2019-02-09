<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

	function account_opening_email($account_type = '' , $email = '', $pwd = '')
	{
		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;

		$email_msg		=	"Welcome to ".$system_name."<br />";
		$email_msg		.=	"Your account type : ".$account_type."<br />";
		$email_msg		.=	"Your login password : ". $pwd ."<br />";
		$email_msg		.=	"Login Here : ".base_url()."<br />";

		$email_sub		=	"Account opening email";
		$email_to		=	$email;
	
		$this->do_email($email_msg , $email_sub , $email_to);
	}

	function password_reset_email($new_password = '' , $account_type = '' , $email = '')
	{
	
		$query			=	$this->db->get_where($account_type , array('email' => $email));
		if($query->num_rows() > 0)
		{

			$email_msg	=	"Your account type is : ".$account_type."<br />";
			$email_msg	.=	"Your password is : ".$new_password."<br />";

			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{
			return false;
		}
	}

	function contact_message_email($email_from, $email_to, $email_message) {
	//echo $email_from.$email_to.$email_message;die;
		$email_sub = "Enquire from User";
		$this->do_email($email_message, $email_sub, $email_to, $email_from);
	}

	/***custom email sender****/
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
	   

		$config = array();
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'bh-in-32.webhostbox.net';
        $config['smtp_timeout'] = '20';
        $config['smtp_user'] = 'info@vkhealthcare.com';
        $config['smtp_pass'] = 'VKhealthcare@123';
        $config['smtp_port'] = 25;
        $config['mailtype']  = 'html';
        
        $config['charset']   = 'iso-8859-1';

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;

		$this->email->from($from, $system_name);		
		$this->email->to($from);
		$this->email->subject($sub);

		$msg	=	$msg."";
		$this->email->message($msg);

		$this->email->send();

	//	echo $this->email->print_debugger();
	}
}