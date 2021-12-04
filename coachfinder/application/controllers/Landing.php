<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Landing extends MY_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('commonmodel');
		//ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
		date_default_timezone_set('Asia/Calcutta');
	}

	public function index(){
		if ($this->session->userdata('logged_in')) {
			$data['user'] = $this->session->userdata('logged_in');
			$this->load->view('website/index',$data);
		}else{
			$this->load->view('website/index');         
		}
	}
	public function signin(){
		if ($this->session->userdata('logged_in')) {
			redirect(base_url('Home'));
		}else{
			$this->load->view('website/login');       
		}
	}

	public function signup(){
		if ($this->session->userdata('logged_in')) {
			redirect(base_url('Home'));
		}else{
			$data['subject'] = $this->commonmodel->getsub();
			$this->load->view('website/register',$data);           
		}
	}
	
	public function doregister()
	{ 
		if ($this->input->post('type')==3) {
			if($this->commonmodel->register_user()){
				$this->session->set_flashdata('success', 'Your data has been registerd Successfully! Now LogIn'); 
				redirect(base_url('Signin'));
			}else{
				$this->session->set_flashdata('warning', 'Something Went Wrong'); 
				redirect(base_url('Signup'));
			}
		}else {
			
			if($this->commonmodel->register_coachuser()){
				$this->session->set_flashdata('success', 'Your data has been registerd Successfully! Now LogIn'); 
				redirect(base_url('Signin'));
			}else{
				$this->session->set_flashdata('warning', 'Something Went Wrong'); 
				redirect(base_url('Signup'));
			}
		}
		
	}

	public function userlogin_compare()
	{ 
		$email     = $this->input->post('email');
		$password = $this->input->post('password');
		$data     = $this->commonmodel->login_compare($email,$password);
		if(!empty($data)){
			
			$newdata = array(
				'id'       =>  $data[0]['id'],
				'name'     => $data[0]['name'],
				'number'   => $data[0]['number'],
				'email'    => $data[0]['email'],
				'type'     => $data[0]['type']
			);
			$this->session->set_userdata('logged_in',$newdata); 
			if ($data[0]['type']==2) {
				$this->session->set_flashdata('success', 'Successfully Logged In !');
				redirect(base_url('CoProfile'));
			}
			if ($data[0]['type']==3) {
				$this->session->set_flashdata('success', 'Successfully Logged In !');
				redirect(base_url('StProfile'));
			}

		}else{
			$this->session->set_flashdata('error', 'Invalid username or password!');
			redirect(base_url('Signin'));
		}
				   
	}
	
	public function logout()
	{ 
		
		if ($this->session->userdata('logged_in')) {
			$data['user'] = $this->session->userdata('logged_in');               
			$this->session->unset_userdata('logged_in',$data);
			$this->session->sess_destroy();
			redirect('Signin');
		}else{
			redirect('Home');            
		}
	}
	
	public function verification(){
		if ($this->session->userdata('logged_in')) {
			redirect(base_url('Home'));
		}else{
			$this->load->view('website/verification');       
		}
	}
	public function forgot_password(){
		$email = $this->input->post('email');
		// print_r($email);die;
		$this->load->library('email');
		$data     = $this->commonmodel->email_compare($email);
		$id=$data[0]['id'];
		if(!empty($data)){
			
		$this->email->from('vikrammehra68@gmail.com', 'CoachFinder');
		$this->email->to($email);
		$this->email->subject('Forgot Password');
		$this->email->message('https://holygrain.in/coachfinder/Update?id='.$id);
		$this->email->send();
		$this->session->set_flashdata('success', 'Please Check Your Email '.$email);
			redirect(base_url('Verification'));

		}else{
			$this->session->set_flashdata('error', 'Please Enter Valid Email Address !');
			redirect(base_url('Verification'));
		}
	}
	public function changepass(){
	    $id= $_GET['id'];
		if (!empty($id)) {
			$data['details']  = $this->commonmodel->id_compare($id);
			$this->load->view('website/changepass',$data);    
		}else{
			redirect(base_url('Signin'));       
		}
	}
	public function updatepass(){
		
		$id = $this->input->post('id');
		//print_r($id);die();
		if($this->commonmodel->update_userpass($id)){
				$this->session->set_flashdata('success', 'Your Password Updated Successfully'); 
				redirect(base_url('Signin'));
			}else{
				$this->session->set_flashdata('warning', ' Password Not Updated'); 
				redirect(base_url('Signin'));
			}
	}
}
