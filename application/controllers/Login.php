<?php

  if (!defined('BASEPATH'))
      exit('No direct script access allowed');

  /*  
   *  @author   :
   *  date    : 
   *  Grepthor Software Solutions
   */

  class Login extends CI_Controller {

      function __construct() {
          parent::__construct();
         
          
         
          
          /* cache control */
          /*$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
          $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
          $this->output->set_header('Pragma: no-cache');
          $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");*/
      }

      //Default function, redirects to logged in user area
      public function index() {

          if ($this->session->userdata('admin_login') == 1)
              redirect(base_url() . 'admin/admin/dashboard', 'refresh');

          

          $this->load->view('backend/login');
      }

      //Validating login from ajax request
      function validate_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $credential = array('email' => $email, 'password' => sha1($password));
        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {

            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');


            $ip_address=$_SERVER['REMOTE_ADDR'];

  /*Get user ip address details with geoplugin.net*/
  $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
  //$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

   // $ch = curl_open();
   // $URL .= http_build_query($post_fields);

           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $geopluginURL);
           //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
           $curl_result= curl_exec($ch);
           
           $curl_result = unserialize($curl_result);
           
         // echo "<pre>"; print_r($curl_result);die;
    
  /*Get City name by return array*/
  $city = $curl_result['geoplugin_city']; 

  /*Get Country name by return array*/
  $country = $curl_result['geoplugin_countryName'];

  /*Comment out these line to see all the posible details*/
  /*echo '<pre>';
  print_r($addrDetailsArr);
  die();*/

  if(!$city){
     $city='Not Define';
  }if(!$country){
     $country='Not Define';
  }
  $data=array(
      'login_type'=>"admin",
      'ip_address'=>$ip_address,
      'city'=>$city,
      'country'=>$country
  );
  //print_r($data);die;
  $this->Home_model->insert('admin_logins',$data);



            redirect(base_url() . 'admin/admin/dashboard', 'refresh');
        }

       
        $this->session->set_flashdata('login_error', 'Invalid_login');
        redirect(base_url() . 'login', 'refresh');
      }

      /*     * *DEFAULT NOR FOUND PAGE**** */

      function four_zero_four() {
          $this->load->view('four_zero_four');
      }

      // PASSWORD RESET BY EMAIL
      function forgot_password()
      {
          $this->load->view('backend/forgot_password');
      }

      function reset_password()
      {
          $email = $this->input->post('email');
          $reset_account_type     = '';
          //resetting user password here
          $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);
      
          // Checking credential for admin
          $query = $this->db->get_where('admin' , array('email' => $email));
          
          if ($query->num_rows() > 0)
          {
               
              $reset_account_type     =   'admin';
              $this->db->where('email' , $email);
              $this->db->update('admin' , array('password' => sha1($new_password)));
              //echo $new_password;
             
              // send new password to user email
              $d=$this->email_model->password_reset_email($new_password , $reset_account_type , $email);
               
              if($d){
              $this->session->set_flashdata('reset_success', 'Please_check_your_email_for_new_password');
              }else{
                  $this->session->set_flashdata('reset_success', 'Pleas');
              }
              redirect(base_url() . 'login/forgot_password', 'refresh');
          }
          
          $this->session->set_flashdata('reset_error', 'Password_reset_was_failed');
          redirect(base_url() . 'login/forgot_password', 'refresh');
      }

      /*     * *****LOGOUT FUNCTION ****** */

      function logout() {
          $this->session->sess_destroy();
          $this->session->set_flashdata('logout_notification', 'logged_out');
          redirect(base_url().'login', 'refresh');
      }

  }
