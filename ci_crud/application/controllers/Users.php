<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();

		// $this->load->library("form_validation");
        
		$this->load->database();
        $this->load->model("User_model");
        // $this->load->library('upload');
		// $this->upload->initialize($config);
		
    }


	public function index()
	{
		$this->load->view('users/list');
	}
	public function create(){
		// echo 'hi';
		$this->load->view('users/create');
	}
	public function insert(){
		$data = array(
			'name' => $this->input->post('name'),
			   'email' => $this->input->post('email'),
			   'address' => $this->input->post('address')

				);
			
		// print_r($data);die();
		$result=$this->User_model->add_user($data);
  
		if($result > 0)
		{
			// $this->session->set_flashdata('success',"user Add Successfully");
			redirect('Users/create');
		}
		else
		{   

		  // $this->session->set_flashdata('errors',"something went wrong please try again");
		  redirect('Users/create');
		}
	}
}
