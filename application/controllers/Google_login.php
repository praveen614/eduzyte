<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google_login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('Google_login_model');
    }
	
    
    public function index(){
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/apiClient.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/apiOauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '642330300745-s8vmkmaq6vrd3lrj8m28mfj8qepa65ki.apps.googleusercontent.com';
        $clientSecret = 'WxBSyEABBmBnm1BLG_kCzEsK';
        $redirectUrl = base_url() . 'frontend/check_login';
        
        // Google Client Configuration
        $gClient = new apiClient();
        $gClient->setApplicationName('Login to Perfect Mentors');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new apiOauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $this->upload_profile_image($userProfile['picture']);
            // Insert or update user data
            $userID = $this->google_login_model->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('user_id',$userID);
				redirect('login');
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
		redirect($data['authUrl']);
        //$this->load->view('user/google_login',$data);
    }
	
	public function upload_profile_image($url){
		/* Extract the filename */
		$filename = time().'_'.substr($url, strrpos($url, '/') + 1);
		/* Save file wherever you want */
		file_put_contents('web_assets/uploads/'.$filename, file_get_contents($url));
		if(isset($filename)){
			return 'web_assets/uploads/'.$filename;
		}else{
			return null;
		}
	}
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/google_login');
    }
}