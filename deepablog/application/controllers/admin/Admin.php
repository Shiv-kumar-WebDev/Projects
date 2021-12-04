<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
        $this->load->library("form_validation");

        
    }


	public function dashboard()
	{
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/blocks/footer');
	}
	
	public function index1()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');   
                $this->load->view('admin/blocks/header',$data);
                $this->load->view('admin/blocks/left_sidebar',$data);
                $this->load->view('admin/index',$data);
                $this->load->view('admin/blocks/footer');
            }else{
                redirect('admin/Admin/index1');          
            }
        }
        public function login()
        { 
            if ($this->session->userdata('logged_in')) {
                redirect(base_url('admin/Admin/index1'));
            }
            else{
                $this->load->view('admin/blocks/header');
                // $this->load->view('admin/blocks/left_sidebar');
                $this->load->view('admin/login');
                $this->load->view('admin/blocks/footer');           
            }
        }
        public function login_compare()
        { 
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $data = $this->User_model->login_compare($email,$password);
            if(!empty($data)){
                $newdata = array(
                    'id'  =>  $data[0]['id'],
                    'name' => $data[0]['name'],
                    'email' => $data[0]['email'],
                    'password' => $data[0]['password']
                );
                $this->session->set_userdata('logged_in',$newdata);
                redirect(base_url('admin/Admin/index1'));
            }
            else{
                $this->session->set_flashdata('error', 'Invalid email or password!');
                redirect(base_url('admin/Admin/login'));
            }
        }

        public function log_out()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $this->session->unset_userdata('logged_in',$data);
                $this->session->sess_destroy();
                redirect('admin/Admin/login');
            }else{
                redirect('admin/Admin/index1');            
            }
        }
        public function doaddsub()
        { 
            if ($this->User_model->doaddsub()) { 
                $this->session->set_flashdata('success', 'Your data has been added Successfully');
                redirect('Admin/Subjects');
            }else{
                $this->session->set_flashdata('success', 'SORRY! Try Again');
                redirect('Admin/Addsub');            
            }
        }

        public function forgot_pass()
        { 
            if ($this->session->userdata('logged_in')) {
                redirect(base_url('admin/index1'));
                
            }else{
				$this->load->view('admin/blocks/header');
                // $this->load->view('admin/blocks/left_sidebar');
                $this->load->view('admin/forgot_password');
                $this->load->view('admin/blocks/footer');
            }
        }
        
        public function update_pass()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $email = $this->input->post('email');
            //print_r($email); die();
            if ($this->form_validation->run() === TRUE)
            {
                if($this->User_model->update_pass($email)){
                    $this->session->set_flashdata('success', 'Your password has been changed Successfully'); 
                    redirect(base_url('admin/Admin/index1'));
                }else{
                    $this->session->set_flashdata('warning', 'You entered wrong email address! '); 
                    redirect(base_url('admin/Admin/forgot_pass'));
                }
            }else{
                $this->session->set_flashdata('error', ' OOPS! something Went Wrong TRY AGAIN!'); 
                redirect(base_url('admin/Admin/forgot_pass'));
            }
        }

        public function change_password()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');
                $this->load->view('admin/admin_header');
                $this->load->view('admin/change_password',$data);
                
            }else{
                redirect('Admin');            
            }
        }

        public function Profile($id)
	{
        // $id = $this->session->userdata['user_id'];
        // echo $id;die();
        $data['user'] = $this->session->userdata('logged_in');  
		$data['profile'] = $this->User_model->getprofile($id);
		$this->session->set_userdata($data['profile']);
		$this->load->view('admin/blocks/header',$data);
        $this->load->view('admin/blocks/left_sidebar',$data);
        $this->load->view('admin/profile',$data);
        $this->load->view('admin/blocks/footer');
		// $this->load->view('admin/blocks/footer');
	}
	public function doProfile()
	{
		  
      	$data=array();
      	$config=array(
				array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'trim|required'
	            ),
	          	array(
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'trim|required'
	            ),
	            array(
	                'label' => 'Phone No',
	                'rules' => 'trim|required'
	            )
			);
        
    	$this->form_validation->set_rules($config);              
    	$fields   = array("email","username");

      	foreach($fields as $field)
      	{
          	$data[$field] = $this->input->post($field);
      	}
      	if($this->form_validation->run() == FALSE)
      	{
          	$this->session->set_flashdata("errors", validation_errors());
          	$this->session->set_flashdata('profileform',$data);
          	redirect('admin/Admin/Profile/1');
      	}
  		else
  		{
  			
      		$datanew['email']         = $data['email'];
            $datanew['name']      = $data['username'];

      		$id     = 1;
      		$result = $this->User_model->DoChangeProfile($datanew,$id);
                	
  			if($result > 0)
  			{
  				$this->session->set_flashdata('success',"Profile change successfully");
  				redirect('admin/Admin/Profile/1');
  			}
  			else
  			{   

          		$this->session->set_flashdata('errors',"Profile change eny error");
          		redirect('admin/Admin/Profile/1');
  			}
  			
  		}
     
	}

        public function update_password()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('newpassword', 'Newpassword', 'required');
            $id = $this->input->post('id');
            $password = $this->input->post('password');
             //print_r($password); die();
            if($this->User_model->update_password($id,$password)){
                    $this->session->set_flashdata('success', 'Your password has been changed Successfully'); 
                    redirect(base_url('Admin/Dashboard'));
            }else{
                    $this->session->set_flashdata('warning', ' Please Enter valid old password'); 
                    redirect(base_url('Admin/Change_password'));
            }
        }
        public function codetails()
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['couser_details'] = $this->User_model->fetchco();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/codetails',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function Editsubject($id)
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['subject'] = $this->User_model->fetchsubyid($id);
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/editsub',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function addsub()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['stuser_details'] = $this->User_model->fetchst();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/addsub',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function stdetails()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['stuser_details'] = $this->User_model->fetchst();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/stdetails',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function subjects()
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['sub_details'] = $this->User_model->fetchsub();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/subjects',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function doeditsub()
        { 
            if ($this->User_model->doeditsub()) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/Subjects');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/Subjects');
            }
        }
        public function costatus($id)
        {   
            $getstatus = $this->User_model->cogetstatus($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->User_model->costatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->User_model->costatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/CoDetails');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/CoDetails');
            }

        }
        public function ststatus($id)
        {   
            $getstatus = $this->User_model->cogetstatus($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->User_model->ststatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->User_model->ststatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/StDetails');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/StDetails');
            }

        }
        public function substatus($id)
        {   
            $getstatus = $this->User_model->getsub($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->User_model->substatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->User_model->substatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/Subjects');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/Subjects');
            }

        }
        public function ChangePassword()
	{
		
		redirect('admin/Admin/doChangepassword');
	}
        public function doChangepassword()
	{
		
        $data=array();
        $config=array(
						array(
                                'field' => 'opass',
                                'label' => 'Old Password',
                                'rules' => 'trim|required'
                             ),
						array(
                                'field' => 'npass',
                                'label' => 'New Password',
                                'rules' => 'trim|required'
                             ),
						array(
                                'field' => 'cpass',
                                'label' => 'Confirm Password',
                                'rules' => 'trim|matches[npass]'
                             )
						  );
          
          	$this->form_validation->set_rules($config);              
          	$fields   = array("opass","npass");

        
        
        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
       
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata( "errors", validation_errors());
            $this->session->set_flashdata('cform',$data);
            redirect('admin/Admin/Profile/1');
        }
		else
		{
			$id=1;
			$result1=$this->User_model->Checkoldpass($id,$data);
			if( $result1 )
			{
				$aid=1;
				$datanew['password']=$data['npass'];
				$result=$this->User_model->DoChangePassword($datanew,$aid);
              
				if($result > 0)
				{
					$this->session->set_flashdata('success',"Change Password Successfully");
					redirect('admin/Admin/Profile/1');
				}
				else
				{   

                    $this->session->set_flashdata('errors',"Change Password Not Successfully");
                    redirect('admin/Admin/Profile/1');
				}
			}
			else
			{
					$this->session->set_flashdata('errors',"Wrong Old Password");
                    redirect('admin/Admin/Profile/1');
			}
					
		}
	}
}
