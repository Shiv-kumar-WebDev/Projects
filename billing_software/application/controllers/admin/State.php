<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
		$this->load->model("admin/State_model");
		$this->load->model("admin/Country_model");
		
	}
	public function index()
	{		
		$data['states']=$this->State_model->getStateData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/state/view_state',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function addState()
	{		
		$data['countries']=$this->Country_model->getCountryData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/state/add_state',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function insert(){
		
		$data = array(
			    'name' => $this->input->post('statename'),
			    'country_id' => $this->input->post('example-select2'),
				);
		// print_r($data);die();
		$result=$this->State_model->addState($data);
  		redirect('State');

	}
	public function editState($id){

		$data['states']=$this->State_model->getSingleStateData($id);
		$data['countries']=$this->Country_model->getCountryData();
		 

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/state/edit_state',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function update(){
		$id=$this->uri->segment('3');
		// echo $id; die();
		$data['states']=$this->State_model->update_states($id);
		redirect('State');
	}
	public function deleteState(){
		$id=$this->uri->segment('3');
		// echo $id;die();
		$data['states']=$this->State_model->delete_State($id);
		redirect('State');
	}
	
}
