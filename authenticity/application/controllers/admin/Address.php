<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Address extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Address_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function addressView() 
	{
		$data = array();
        $data['address'] = $this->Address_model->getaddress();
        $this->load->view('blocks/header');
        $this->load->view('address/address-view',$data);
        $this->load->view('blocks/footer');
    }
	
}
