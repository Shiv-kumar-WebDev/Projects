<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();

		
        $this->load->model("User_model");
    }


	public function index()
	{	
		$data['users_data'] = $this->User_model->get_users();
		//print_r($data['users_data']); die;
		$this->load->view('users/list',$data);
	}
	
	public function create(){
		$this->load->view('users/create');
	}
	
	public function insert(){
		$data = array(
				'name' => $this->input->post('name'),
			    'email' => $this->input->post('email'),
			    'address' => $this->input->post('address')

				);
			
		$result=$this->User_model->add_user($data);
  		redirect('Users');
	}
}
