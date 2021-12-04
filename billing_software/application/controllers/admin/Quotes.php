<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
		// $this->load->model("admin/Client_model");
		
	}
	public function index()
	{		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/quotes/view_Quotes');
		$this->load->view('admin/blocks/footer');		
	}
	
	public function add_Quote()
	{		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/quotes/add_Quotes');
		$this->load->view('admin/blocks/footer');		
	}
	public function add_Proforma()
	{		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/pages/add_Proforma');
		$this->load->view('admin/blocks/footer');		
	}
	
}
