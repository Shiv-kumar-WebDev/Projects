<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
		 $this->load->model("admin/Client_model");
		 $this->load->model("admin/Country_model");
         $this->load->model("admin/Vendor_model");
		
	}
	public function index()
	{	
        $data['vendors'] = $this->Vendor_model->getvendors();
       // print_r($data);die;
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/vendors/view_vendor',$data);
		$this->load->view('admin/blocks/footer');		
	}
	
	public function add_vendor()
	{	
		$data['gst'] = $this->Client_model->getGstData();
		//$data['currency'] = $this->Client_model->getCurrencyData();	
		$data['country'] = $this->Country_model->getCountryData();	
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/vendors/add_vendor',$data);
		$this->load->view('admin/blocks/footer');		
	}


	public function doadd_vendor() {
        //add_vendor_validation();
        $data = array();
        $fields = array("company_name","phone","email","gst_treatment","gstin","pan","tin","billing_add","billing_contry","billing_state","billing_city","billing_pin");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $datanew['company_name']    = $data['company_name'];
        $datanew['phone']           = $data['phone'];
        $datanew['email']           = $data['email'];
        $datanew['gst_treatment']   = $data['gst_treatment'];
        $datanew['gstin']           = $data['gstin'];
        $datanew['pan']             = $data['pan'];
        $datanew['tin']             = $data['tin'];

        $vendor_id = $this->Vendor_model->insert($datanew,'vendors');
        if ($vendor_id > 0) {
            #### insert vendor data
            $data1['address']    = $data['billing_add'];
            $data1['country']    = $data['billing_contry'];
            $data1['state']      = $data['billing_state'];
            $data1['city']       = $data['billing_city'];
            $data1['pincode']    = $data['billing_pin'];
            $data1['address_type'] = 1;
            $data1['user_type']    = 1;
            $data1['user_id']      = $vendor_id;
            $this->Vendor_model->insert($data1,'addresses');

            // #### insert vendor data
            // $data2['address']    = $data['shipping_add'];
            // $data2['country']    = $data['shipping_contry'];
            // $data2['state']      = $data['shipping_state'];
            // $data2['city']       = $data['shipping_city'];
            // $data2['pincode']    = $data['shipping_pin'];
            // $data2['address_type'] = 2;
            // $data2['user_type']    = 2;
            // $data2['user_id']      = $client_id;
            // $this->Client_model->insert($data2,'addresses');
            $this->session->set_flashdata('success', "Vendors Add Successfully");
            redirect('Vendor');
        } else {
            $this->session->set_flashdata('errors', "Vendors Not Added");
            redirect('Vendor');
        }     
    }
	
}
