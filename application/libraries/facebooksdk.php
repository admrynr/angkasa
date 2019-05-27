<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	
	if(!session_id()){
		session_start();
	}

	require_once("Facebook/autoload.php");

	class FacebookSDK{

		protected $fb;
		protected $helper;

		public function __construct(){

			$this->fb = new Facebook\Facebook([
				  'app_id' => '1921452951434939',
				  'app_secret' => 'f766441122cb1b4c1e3e7fd14cf6bdac',
				  'default_graph_version' => 'v2.9',
				]);
			$this->helper = $this->fb->getRedirectLoginHelper();
			
		}

		function getLoginUrl($callback_url){
			
			$permissions = ['email']; // optional
			$loginUrl = $this->helper->getLoginUrl($callback_url, $permissions);
			return $loginUrl;
		}


		function getAccessToken(){
			try {
			  $accessToken = $this->helper->getAccessToken();
			  return $accessToken;
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
		}


		function getUserData($access_token){
			$this->fb->setDefaultAccessToken($access_token);

			try {
			  $response = $this->fb->get('/me');
			  $userNode = $response->getGraphUser();
			  return $userNode;
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

		}


	}
	
	/* End of file facebooksdk.php */
	/* Location: ./application/libraries/facebooksdk.php */
	