<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
       
		$this->load->library("form_validation");
		$this->load->model("admin/Login_model");
		
	}
	public function index()
	{
		if($this->session->userdata("admin_id")!='')
		{
			redirect("Dashboard");
		}
		else
		{
			$data 					=	array();
			$data 					=	$this->session->flashdata("loginForm");

			$this->load->view('admin/index');
		}
		
	}
	
	public function doLogin()
	{
		
		$data	= array();
        $config	= array(
                    array(
                            'field' => 'email',
                            'label' => 'Email',
                            'rules'	=> 'trim|required'
                        ),
                    array(
                            'field' => 'password',
                            'label' => 'password',
                            'rules'	=> 'trim|required'
                    	)
                    );
		$this->form_validation->set_rules($config);
        $fields	= array("email","password");

       

        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
		
		if($this->form_validation->run() == false)
        {
                $this->session->set_flashdata("errors", validation_errors());
                unset($data['password']);
                $this->session->set_flashdata('loginForm',$data);
                redirect('Login');
				
        }
        else
        {

        	$email = $data['email'];
        	$checkmail     = $this->Login_model->checkmail($email);
        	if(!empty($checkmail['email']))
        	{
				$row = $this->Login_model->loginData($data);

				if( $row ) // Data is in row set session
				{
					$this->session->set_userdata($row);
					
                    redirect('Dashboard');
				}
				else
				{
                
					$this->session->set_flashdata( "errors", 'Invalid Password...!');
					unset($data['password']);
					$this->session->set_flashdata('loginForm',$data);
                    redirect('Login');
				}
			}
			else
			{
            
				$this->session->set_flashdata( "errors", 'Invalid Email Id...!');
				$this->session->set_flashdata('loginForm',$data);
                redirect('Login');
			}
		}
	}
	public function logout()
    {

    		//$this->session->sess_destroy();
    		$this->session->unset_userdata("admin_id");
			$this->session->unset_userdata("email");
			$this->session->unset_userdata("username");
			$this->session->unset_userdata("admin_phoneno");
			$this->session->unset_userdata("set_default_scheme");
    		redirect('Login');
    }
	
}
