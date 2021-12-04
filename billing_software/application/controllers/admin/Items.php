<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
		header("Cache-Control: no-store,no-cache, must-revalidate");
        if($this->session->userdata("admin_id") == '')
			redirect("Login");
		$this->load->library("form_validation");
        $this->load->helper('item_validation_helper');
		$this->load->model("admin/Item_model");
		
	}
	public function index()
	{		
		$data['items']=$this->Item_model->getitems();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/items/view_Items',$data);
		$this->load->view('admin/blocks/footer');		
	}
	
	public function add_Items()
	{		
		$data['tax']=$this->Item_model->getGstData();
		$data['unit']=$this->Item_model->getunit();
		$data['currency']=$this->Item_model->getcurrency();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/items/add_Items',$data);
		$this->load->view('admin/blocks/footer');		
	}
	
	public function doadd_items() {
        add_item_validation();
        $data = array();
        $fields = array("name","description","qty","unit","tax","hsn","sku","tin","unit_price","currency","chess_per","chess","punit_price","pcurrency","pchess_per","pchess","type");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $datanew['name']         = $data['name'];
        $datanew['description']  = $data['description'];
        $datanew['qty']          = $data['qty'];
        $datanew['type']         = $data['type'];
        $datanew['unit']   		 = $data['unit'];
        $datanew['hsn']          = $data['hsn'];
        $datanew['sku']          = $data['sku'];
        $datanew['tin']          = $data['tin'];
        $datanew['tax']   		 = $data['tax'];

        $item_id = $this->Item_model->insert($datanew,'items');
        if ($item_id > 0) {
            #### insert sale data
            $data1['unit_price']    = $data['unit_price'];
            $data1['currency']    = $data['currency'];
            $data1['chess_per']      = $data['chess_per'];
            $data1['chess']       = $data['chess'];
            $data1['item_id']      = $item_id;
            $this->Item_model->insert($data1,'sale');

            #### insert purchase data
            $data2['unit_price']    = $data['punit_price'];
            $data2['currency']    = $data['pcurrency'];
            $data2['chess_per']      = $data['pchess_per'];
            $data2['chess']       = $data['pchess'];
            $data2['item_id']      = $item_id;
            $this->Item_model->insert($data2,'purchase');
            $this->session->set_flashdata('success', "Items Add Successfully");
            redirect('Items');
        } else {
            $this->session->set_flashdata('errors', "Client Not Added");
            redirect('Items');
        }     
    }
    public function status($id,$status)
    {       
        $datacode['status'] = $status;    
        $codeupdate = $this->Item_model->update($id,$datacode,'items','id');  
        $this->session->set_flashdata('success', "Item Status Updated Successfully");  
        redirect('Items');
    }
	
    public function delete($id)
    {   
        $this->Item_model->delete($id,'items','id'); 
        $this->session->set_flashdata('success', "Item Deleted");   
        redirect('Items');
    }
    public function edit_item($id)
    {  
		$data['item']=$this->Item_model->getItemData($id);
		$data['sale']=$this->Item_model->getsale($id);
		$data['purchase']=$this->Item_model->getpurchase($id);
		$data['tax']=$this->Item_model->getGstData();
		$data['unit']=$this->Item_model->getunit();
		$data['currency']=$this->Item_model->getcurrency();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/items/edit_item',$data);
		$this->load->view('admin/blocks/footer');
    }
	
	public function doupdate_item($id) {
        add_item_validation();
        $data = array();
        $fields = array("name","description","qty","unit","tax","hsn","sku","tin","unit_price","currency","chess_per","chess","punit_price","pcurrency","pchess_per","pchess","type");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $datanew['name']         = $data['name'];
        $datanew['description']  = $data['description'];
        $datanew['qty']          = $data['qty'];
        $datanew['type']         = $data['type'];
        $datanew['unit']   		 = $data['unit'];
        $datanew['hsn']          = $data['hsn'];
        $datanew['sku']          = $data['sku'];
        $datanew['tin']          = $data['tin'];
        $datanew['tax']   		 = $data['tax'];

        $item_id = $this->Item_model->update($id,$datanew,'items','id');
        if ($item_id > 0) {
            #### insert sale data
            $data1['unit_price']  = $data['unit_price'];
            $data1['currency']    = $data['currency'];
            $data1['chess_per']   = $data['chess_per'];
            $data1['chess']       = $data['chess'];
            $this->Item_model->update($id,$data1,'sale','item_id');

            #### insert purchase data
            $data2['unit_price']  = $data['punit_price'];
            $data2['currency']    = $data['pcurrency'];
            $data2['chess_per']   = $data['pchess_per'];
            $data2['chess']       = $data['pchess'];
            $this->Item_model->update($id,$data2,'purchase','item_id');

            $this->session->set_flashdata('success', "Items Updated Successfully");
            redirect('Items');
        } else {
            $this->session->set_flashdata('errors', "Client Not Updated");
            redirect('Items');
        }     
    }
}
