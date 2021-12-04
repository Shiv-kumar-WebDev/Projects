<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
        $this->load->helper('note_validation_helper');
		$this->load->model("admin/Delivery_model");
		
	}
	public function index()
	{		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/delivery_Notes/view_delivery_notes');
		$this->load->view('admin/blocks/footer');		
	}
	
	public function add_delivery_note()
	{		
		$data['clients']=$this->Delivery_model->getclients();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/delivery_Notes/add_delivery_notes',$data);
		$this->load->view('admin/blocks/footer');		
	}
	
	public function doadd_note() {
        add_note_validation();
        $data = array();
        $fields = array("client_id","proforma_no","proforma_date","enquiry_no","valid_unit","term_con","p_notes","item_id","item_name","item_unit","item_hsn","item_qty","item_price","item_dis","item_cgst","item_sgst","item_igst","item_cess","item_total");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $datanew['client_id']        = $data['client_id'];
        $datanew['proforma_no'] 	 = $data['proforma_no'];
        $datanew['proforma_date']    = $data['proforma_date'];
        $datanew['enquiry_no']       = $data['enquiry_no'];
        $datanew['valid_unit']   	 = $data['valid_unit'];
        $datanew['term_con']         = $data['term_con'];
        $datanew['p_notes']          = $data['p_notes'];
        $item_price =@$_POST['item_price'];
        print_r($item_price);die();
        $note_id = $this->Delivery_model->insert($datanew,'delivery_notes');
        if ($note_id > 0) {

            #### insert item data

            $data1['note_id']      = $note_id;
            $data1['type']    	   = 'delivery_note';
            $data1['item_id']      = $data['item_id'];
            $data1['item_unit']    = $data['item_unit'];
            $data1['item_hsn']     = $data['item_hsn'];
            $data1['item_qty']     = $data['item_qty'];
            $data1['item_price']   = $data['item_price'];
            $data1['item_dis']     = $data['item_dis'];
            $data1['item_cgst']    = $data['item_cgst'];
            $data1['item_sgst']    = $data['item_sgst'];
            $data1['item_igst']    = $data['item_igst'];
            $data1['item_cess']    = $data['item_cess'];
            $data1['item_total']   = $data['item_total'];

            $this->Delivery_model->insert($data1,'item_data');

            $this->session->set_flashdata('success', "Notes Add Successfully");
            redirect('AddDelivery_notes');
        } else {
            $this->session->set_flashdata('errors', "Notes Not Added");
            redirect('AddDelivery_notes');
        }     
    }
}
