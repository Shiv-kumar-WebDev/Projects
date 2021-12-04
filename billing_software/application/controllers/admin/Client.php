<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
        $this->load->helper('client_validation_helper');
		$this->load->model("admin/Client_model");
		$this->load->model("admin/Country_model");
		
	}
	public function index()
	{		
        $data['clients'] = $this->Client_model->getclients();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/client/view_client',$data);
		$this->load->view('admin/blocks/footer');		
	}
	
	public function add_client()
	{		
        $data['country'] = $this->Country_model->getCountryData();
        $data['gst'] = $this->Client_model->getGstData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/client/add_client',$data);
		$this->load->view('admin/blocks/footer');		
	}
	public function doadd_client() {
        add_client_validation();
        $data = array();
        $fields = array("company_name","phone","email","gst_treatment","gstin","pan","tin","billing_add","billing_contry","billing_state","billing_city","billing_pin","shipping_add","shipping_contry","shipping_state","shipping_city","shipping_pin");
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

        $client_id = $this->Client_model->insert($datanew,'clients');
        if ($client_id > 0) {
            #### insert client data
            $data1['address']    = $data['billing_add'];
            $data1['country']    = $data['billing_contry'];
            $data1['state']      = $data['billing_state'];
            $data1['city']       = $data['billing_city'];
            $data1['pincode']    = $data['billing_pin'];
            $data1['address_type'] = 1;
            $data1['user_type']    = 1;
            $data1['user_id']      = $client_id;
            $this->Client_model->insert($data1,'addresses');

            #### insert vendor data
            $data2['address']    = $data['shipping_add'];
            $data2['country']    = $data['shipping_contry'];
            $data2['state']      = $data['shipping_state'];
            $data2['city']       = $data['shipping_city'];
            $data2['pincode']    = $data['shipping_pin'];
            $data2['address_type'] = 2;
            $data2['user_type']    = 2;
            $data2['user_id']      = $client_id;
            $this->Client_model->insert($data2,'addresses');
            $this->session->set_flashdata('success', "Clients Add Successfully");
            redirect('Clients');
        } else {
            $this->session->set_flashdata('errors', "Client Not Added");
            redirect('Clients');
        }     
    }
    public function status($id,$status)
    {       
        $datacode['status'] = $status;    
        $codeupdate = $this->Client_model->update($id,$datacode,'clients','id');  
        $this->session->set_flashdata('success', "Clients Status Updated Successfully");  
        redirect('Clients');
    }
	
    public function delete($id)
    {   
        $this->Client_model->delete($id,'clients','id'); 
        $this->session->set_flashdata('success', "Client Deleted");   
        redirect('Clients');
    }
    public function edit_client($id)
    {       
        $data['country'] = $this->Country_model->getCountryData();
        $data['gst'] = $this->Client_model->getGstData();
        $data['client_data'] = $this->Client_model->getClientData($id);
        $billing_address = $this->Client_model->getclientaddress($id,1);
        $shipping_address = $this->Client_model->getclientaddress($id,2);
        $data['billing_address'] = $billing_address;
        $data['shipping_address'] = $shipping_address;
        $data['b_state'] = $this->Client_model->getstate($billing_address[0]['country']);
        $data['s_state'] = $this->Client_model->getstate($shipping_address[0]['country']);
        $data['b_city'] = $this->Client_model->getcity($billing_address[0]['state']);
        $data['s_city'] = $this->Client_model->getcity($shipping_address[0]['state']);
        $this->load->view('admin/blocks/header');
        $this->load->view('admin/client/edit_client',$data);
        $this->load->view('admin/blocks/footer');       
    }
    public function doupdate_client($id) {
        add_client_validation();
        $data = array();
        $fields = array("company_name","phone","email","gst_treatment","gstin","pan","tin","billing_add","billing_contry","billing_state","billing_city","billing_pin","shipping_add","shipping_contry","shipping_state","shipping_city","shipping_pin");
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

        $client_id = $this->Client_model->update($id,$datanew,'clients','id');
        if ($client_id > 0) {
            #### insert client data
            $data1['address']    = $data['billing_add'];
            $data1['country']    = $data['billing_contry'];
            $data1['state']      = $data['billing_state'];
            $data1['city']       = $data['billing_city'];
            $data1['pincode']    = $data['billing_pin'];
            $data1['address_type'] = 1;
            $data1['user_type']    = 1;
            $this->Client_model->update1($id,$data1,'addresses','user_id',1);

            #### insert vendor data
            $data2['address']    = $data['shipping_add'];
            $data2['country']    = $data['shipping_contry'];
            $data2['state']      = $data['shipping_state'];
            $data2['city']       = $data['shipping_city'];
            $data2['pincode']    = $data['shipping_pin'];
            $data2['address_type'] = 2;
            $data2['user_type']    = 2;
            $this->Client_model->update1($id,$data2,'addresses','user_id',2);
            $this->session->set_flashdata('success', "Clients Updated Successfully");
            redirect('Clients');
        } else {
            $this->session->set_flashdata('errors', "Client Not Updated");
            redirect('Clients');
        }     
    }
    
}
