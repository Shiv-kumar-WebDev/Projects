<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Attr_Optn extends CI_Controller {

    public function __construct() {

        parent::__construct();



        $this->load->library("form_validation");

        $this->load->model("admin/Attr_Optn_model");



        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        header("Cache-Control: no-store,no-cache, must-revalidate");



        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function Attr_OptnView(){
        $data = array();

        $data['attr_optn'] = $this->Attr_Optn_model->getattr_optn();
        
        $this->load->view('blocks/header');

        $this->load->view('attr_optn/attr_optn_view', $data);

        $this->load->view('blocks/footer');
    }
    
     public function AddAttr_Optn(){
        $data = $this->session->flashdata("cform");
        $data['attribute'] = $this->Attr_Optn_model->getattr();
        $this->load->view('blocks/header');

        $this->load->view('attr_optn/add_attr_optn',$data);

        $this->load->view('blocks/footer');
     }
     
     public function doAddAttr_Optn(){
        $data = array();

        $config = array(
            array(
                'field' => 'attr_id',
                'label' => 'Attribute Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'optn_name',
                'label' => 'Option Name',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("attr_id","optn_name");
        
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('AddAttr_Optn');
        } else {
            $datanew['attribute_id'] = $data['attr_id'];
            $datanew['optn_name'] = $data['optn_name'];
            $result = $this->Attr_Optn_model->DoAddAttr_Optn($datanew);
            if ($result > 0) {
                $this->session->set_flashdata('success', "Attr option Add Successfully");
                redirect('AddAttr_Optn');
            } else {
                $this->session->set_flashdata('errors', "Attr option Not Add Successfully");
                redirect('AddAttr_Optn');
            }
        }
    
     }
     
     public function EditAttr_Optn($id){
        $data = array();
        $data = $this->session->flashdata("cform");
        $data['edit_attr_optn'] = $this->Attr_Optn_model->edit_attr_optn($id);
        $data['attribute'] = $this->Attr_Optn_model->getattr();
        $this->load->view('blocks/header');
        $this->load->view('attr_optn/edit_attr_optn', $data);
        $this->load->view('blocks/footer');
     }
     
     public function doUpdateAttr_Optn($id) {

          

        $data = array();

       $config = array(
            array(
                'field' => 'attr_id',
                'label' => 'Attribute Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'optn_name',
                'label' => 'Option Name',
                'rules' => 'trim|required'
            )
			
        );

        $this->form_validation->set_rules($config);

        $fields = array("attr_id","optn_name");
        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('EditAttr_Optn/' . $id);
        } else {

            $datanew['attribute_id'] = $data['attr_id'];
            $datanew['optn_name'] = $data['optn_name'];
			 $result = $this->Attr_Optn_model->DoUpdateAttr_optn($datanew, $id);

            if ($result > 0) {
                $this->session->set_flashdata('success', "Attr option edit Successfully");
                redirect('Attr_Optn');
            } else {
                $this->session->set_flashdata('errors', "Attr option Not Edit ");
                redirect('Attr_Optn');
            }
        }
    }
    
    public function DeleteAttr_Optn($id){
     
    $result = $this->Attr_Optn_model->DeleteAttr_Optn($id);
    if ($result > 0) {
            $this->session->set_flashdata('success', "Attr option deleted Successfully");
            redirect('Attr_Optn');
        } else {
            $this->session->set_flashdata('errors', "Attr option Not deleted ");
            redirect('Attr_Optn');
        }
    }   

    public function Attr_OptnStatus($id,$status)
    {
          
        $datacode['optn_status'] = $status; 
        $codeupdate = $this->Attr_Optn_model->status_active_deactive($id,$datacode);  
        redirect('Attr_Optn');
    }
}