<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("admin/Country_model");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");
        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function countrylist() {
        $data = array();
        $data['countrylist'] = $this->Country_model->getcountrylist();
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('country/country_list',$data);
        $this->load->view('blocks/footer');
    }
    public function addcountry() {
        $data = $this->session->flashdata("pform");
        $this->load->view('blocks/header');
        $this->load->view('country/add_country', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddCountry() {
         $data = array();
        $config = array(
            array(
                'field' => 'country_name',
                'label' => 'Country Name',
                'rules' => 'trim|required'
            ),
        );
        $this->form_validation->set_rules($config);
        $fields = array("country_name");
		foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddCountry');
        }else{

            $datanew['country_name']        = $data['country_name'];

            $this->Country_model->doAddCountry($datanew);
            $this->session->set_flashdata('success', "Country uploaded Successfully !");
            redirect('Country');
            
        }
    }
    public function deletecountry() 
    {
        $id = $this->uri->segment(2);

        if ($this->Country_model->DoDeleteStatus($id)) {  
            $this->session->set_flashdata('success', "country Delete Successfully");
            redirect('Country');
        } else {
            $this->session->set_flashdata('error', "country Not Deleted");
            redirect('Country');
        }
    }
    public function countrystatus($id) 
    {
        // $id = $this->uri->segment(2);
        $getstatus = $this->Country_model->DogetStatus($id);
        $status = $getstatus['country_status'];
        // print_r($status);die();

        if ($status == 0) {
            $datanew['country_status'] = '1';
            $result = $this->Country_model->DoEditStatus($datanew, $id);
            redirect('Country');
        } else {
            $datanew['country_status'] = '0';
            $result = $this->Country_model->DoEditStatus($datanew, $id);
            redirect('Country');
        }
    }




    // country weight system




    public function country_weightlist() {
        $data = array();
        $data['weightlist'] = $this->Country_model->getweightlist();
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('country/country_weight_list',$data);
        $this->load->view('blocks/footer');
    }
    public function addcountry_weight() {
        $data['country'] = $this->Country_model->getcountry();
        $this->load->view('blocks/header');
        $this->load->view('country/add_country_weight', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddCountryWeight() {
         $data = array();
        $config = array(
            array(
                'field' => 'country_id',
                'label' => 'Country',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_from',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_to',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_price',
                'label' => 'Country weight price',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $fields = array("country_id","c_weight_to","c_weight_from","c_weight_price");
		foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddCountry_Weight');
        }else{

            $datanew['country_id']        = $data['country_id'];
            $datanew['c_weight_from']        = $data['c_weight_from'];
            $datanew['c_weight_to']        = $data['c_weight_to'];
            $datanew['c_weight_price']        = $data['c_weight_price'];

            $this->Country_model->doAddCountryWeight($datanew);
            $this->session->set_flashdata('success', "Country Weight uploaded Successfully !");
            redirect('Country_Weight');
            
        }
    }

    public function doUpdateCountryWeight($weight_id) {
         $data = array();
        $config = array(
            array(
                'field' => 'country_id',
                'label' => 'Country',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_from',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_to',
                'rules' => 'trim|required'
            ),array(
                'field' => 'c_weight_price',
                'label' => 'Country weight price',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $fields = array("country_id","c_weight_from","c_weight_to","c_weight_price");
		foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddCountry_Weight');
        }else{

            $datanew['country_id']        = $data['country_id'];
            $datanew['c_weight_from']        = $data['c_weight_from'];
            $datanew['c_weight_to']        = $data['c_weight_to'];
            $datanew['c_weight_price']        = $data['c_weight_price'];
            // print_r($datanew);die();
            $this->Country_model->doUpdateCountryWeight($datanew,$weight_id);
            $this->session->set_flashdata('success', "Country Weight updated Successfully !");
            redirect('Country_Weight');
            
        }
    }
    public function editcountry_weight($id) {
        $data['country'] = $this->Country_model->getcountry($id);
        $data['weight'] = $this->Country_model->getweight($id);
		// print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('country/edit_country_weight', $data);
        $this->load->view('blocks/footer');
    }
    public function deletecountry_weight() 
    {
        $id = $this->uri->segment(2);

        if ($this->Country_model->DeleteWeightStatus($id)) {  
            $this->session->set_flashdata('success', "country Weight Delete Successfully");
            redirect('Country_Weight');
        } else {
            $this->session->set_flashdata('error', "country Weight Not Deleted");
            redirect('Country_Weight');
        }
    }
    public function country_weightstatus($id) 
    {
        // $id = $this->uri->segment(2);
        $getstatus = $this->Country_model->GetWeightStatus($id);
        $status = $getstatus['c_weight_status'];
        // print_r($status);die();

        if ($status == 0) {
            $datanew['c_weight_status'] = '1';
            $result = $this->Country_model->WeightEditStatus($datanew, $id);
            redirect('Country_Weight');
        } else {
            $datanew['c_weight_status'] = '0';
            $result = $this->Country_model->WeightEditStatus($datanew, $id);
            redirect('Country_Weight');
        }
    }










}
