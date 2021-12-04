<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{	

	function __construct() 
	{
		parent::__construct();
	}
	
	public function loadContaint($page='',$customData=''){
		$userdata1 = $this->session->userdata("session_info");
		if(!empty($userdata1)){
			//$loginUserData['roleId']	=$userdata1['role_id'];
			$loginUserData['id']		=$userdata1['user_id'];
			$loginUserData['email']		=$userdata1['email'];
		}else{
			$loginUserData['roleId']	='';
			$loginUserData['id']		='';
			$loginUserData['id']		='';
		}
		
		$this->load->view('website/layout/header',$loginUserData);
		if(!empty($customData)){
			$this->load->view('website/'.$page,$customData);
		}else{
			$this->load->view('website/'.$page);
		}
		//$data['footer']=$this->Commonmodel->getRow("containt_management","page_id='4'");
		$this->load->view('website/layout/footer');
	}
}
