<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Facebook_login extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');
		
		//Load user model
		$this->load->model('facebook_login_model');
    }
    
    public function index(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $this->upload_profile_image($userProfile['picture']['data']['url']);
			
            // Insert or update user data
            $userID = $this->facebook_login_model->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('user_id',$userID);
				redirect('login');
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		redirect($data['authUrl']);
		// Load login & profile view
        //$this->load->view('user_authentication/index',$data);
    }
	
	public function upload_profile_image($url){
		/* Extract the filename */
		$filename = time().'.png';
		/* Save file wherever you want */
		file_put_contents('web_assets/uploads/'.$filename, file_get_contents($url));
		if(isset($filename)){
			return 'web_assets/uploads/'.$filename;
		}else{
			return null;
		}
	}
    
	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        redirect('existing_user');
    }
}
