<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
		$this->load->model("admin/Country_model");
		
	}
	public function index()
	{	
		$data['countries']=$this->Country_model->getCountryData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/country/view_country',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function addCountry()
	{		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/country/add_Country');
		$this->load->view('admin/blocks/footer');		
	}
	public function editCountry()
	{		
		$id=$this->uri->segment('3');
		// echo $id;die();
		$data['countries']=$this->Country_model->getSingleCountryData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/country/edit_country',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function insert(){
		
		$data = array(
			    'sortname' => $this->input->post('Shortname'),
			    'name' => $this->input->post('example-text-input'),
			    
				);
		// print_r($data);die();
		$result=$this->Country_model->addCountry($data);
  		redirect('Country');

	}
	public function update(){
		$id=$this->uri->segment('3');
		$data['countries']=$this->Country_model->update_Country($id);
		redirect('Country');
	}
	public function deleteCountry(){
		$id=$this->uri->segment('3');
		// echo $id;die();
		$data['countries']=$this->Country_model->delete_country($id);
		redirect('Country');
		
	}
}
