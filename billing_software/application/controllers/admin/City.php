<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
		$this->load->model("admin/city_model");
		$this->load->model("admin/Country_model");
		
	}
	public function index()
	{		
		$data['cities']=$this->city_model->getCityData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/city/view_city',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function add_city()
	{		
		$data['country'] = $this->Country_model->getCountryData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/city/add_city',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function editCity(){

		$id=$this->uri->segment('3');
		// echo $id;die();
		$cities=$this->city_model->getSingleCityData($id);
		$data['cities']=$cities;
		$data['states']=$this->city_model->getStateData($cities[0]['country_id']);
		$data['countries']=$this->city_model->getCountryData();
		// print_r($cities);die();
		// print_r($data['states']);die();

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/city/edit_city',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function insert(){
		
		$data = array(
			    'state_id' => $this->input->post('billing_state'),
			    'name' => $this->input->post('city'),
			    'country_id' => $this->input->post('country_id'),
				);
		$result=$this->city_model->addCity($data);
  		redirect('City');

	}
	
}
