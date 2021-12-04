<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		header("Cache-Control: no-store,no-cache, must-revalidate");

		if($this->session->userdata("admin_id") == '')
		redirect("Login");
       
       	$this->load->library("form_validation");
        $this->load->model("admin/Dashboard_model");
		
	}
	
	public function index()
	{
	    $data['slider']  	= $this->Dashboard_model->getslider();
	    $data['events']  	= $this->Dashboard_model->getevents();
	    $data['gallery']  	= $this->Dashboard_model->getgallery();
	    $data['topper']  	= $this->Dashboard_model->gettopper();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/blocks/footer');
	}

	public function ChangePassword()
	{
		
		$this->load->view('blocks/header');
		$this->load->view('change_password');
		$this->load->view('blocks/footer');
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
            redirect('admin/Dashboard/ChangePassword');
        }
		else
		{
			$id=$this->session->userdata('admin_id');
			$result1=$this->Dashboard_model->Checkoldpass($id,$data);
			if( $result1 )
			{
				$aid=$this->session->userdata('admin_id');
				$datanew['password']=md5($data['npass']);
				$result=$this->Dashboard_model->DoChangePassword($datanew,$aid);
              
				if($result > 0)
				{
					$this->session->set_flashdata('success',"Change Password Successfully");
					redirect('admin/Dashboard');
				}
				else
				{   

                    $this->session->set_flashdata('errors',"Change Password Not Successfully");
                    redirect('admin/Dashboard');
				}
			}
			else
			{
					$this->session->set_flashdata('errors',"Wrong Old Password");
                    redirect('admin/Dashboard');
			}
					
		}
	}
	public function Profile()
	{
        $id = $this->session->userdata['admin_id'];
		$data['profile'] = $this->Dashboard_model->getprofile($id);
		$this->session->set_userdata($data['profile']);
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/profile',$data);
		
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
	                'field' => 'admin_phoneno',
	                'label' => 'Phone No',
	                'rules' => 'trim|required'
	            )
			);
        
    	$this->form_validation->set_rules($config);              
    	$fields   = array("email","username","admin_phoneno");

      	foreach($fields as $field)
      	{
          	$data[$field] = $this->input->post($field);
      	}
      	if($this->form_validation->run() == FALSE)
      	{
          	$this->session->set_flashdata("errors", validation_errors());
          	$this->session->set_flashdata('profileform',$data);
          	redirect('profile');
      	}
  		else
  		{
  			
      		$datanew['email']         = $data['email'];
            $datanew['username']      = $data['username'];
            $datanew['admin_phoneno'] = $data['admin_phoneno'];

      		$id     = $this->session->userdata['admin_id'];
      		$result = $this->Dashboard_model->DoChangeProfile($datanew,$id);
                	
  			if($result > 0)
  			{
  				$this->session->set_flashdata('success',"Profile change successfully");
  				redirect('admin/Dashboard/profile');
  			}
  			else
  			{   

          		$this->session->set_flashdata('errors',"Profile change eny error");
          		redirect('admin/Dashboard/profile');
  			}
  			
  		}
     
	}
}
