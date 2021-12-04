<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

    public function __construct() {

        parent::__construct();



        $this->load->library("form_validation");

        $this->load->model("admin/Subcategory_model");



        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        header("Cache-Control: no-store,no-cache, must-revalidate");



        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function subcategoryView(){
        $data = array();

        $data['subcategory'] = $this->Subcategory_model->getsubcategroy();
        // print_r($data);die();
        $this->load->view('blocks/header');

        $this->load->view('subcategory/sub-category-view', $data);

        $this->load->view('blocks/footer');
    }
    
     public function AddSubCategory(){
        $data = $this->session->flashdata("cform");
        $data['maincategory'] = $this->Subcategory_model->getmaincategroy();
        // print_r($data);die();
        $this->load->view('blocks/header');

        $this->load->view('subcategory/add-sub-category',$data);

        $this->load->view('blocks/footer');
     }

     public function copied_subcat($id){
        $data = $this->session->flashdata("cform");
        $data['subcategory'] = $this->Subcategory_model->copied_subcat($id);
        $data['subcatid'] = $id;
        $this->load->view('blocks/header');
        $this->load->view('subcategory/copied-sub-category',$data);
        $this->load->view('blocks/footer');
     }
     public function copy_subcat($id){
        $data = $this->session->flashdata("cform");
        $data['maincategory'] = $this->Subcategory_model->getmaincategroy();
        $data['subcatid'] = $id;
        $this->load->view('blocks/header');
        $this->load->view('subcategory/copy-sub-category',$data);
        $this->load->view('blocks/footer');
     }
     
     public function doaddcopiedsubcat(){
        $data = array();

        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("maincatid","catid","subcatid");
        
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $subcatid = $data['subcatid'];
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('Copy_Subcat/'.$subcatid);
        } else {
                $maincatid = $data['maincatid'];
                $catid = $data['catid'];
                $check = $this->Subcategory_model->checksubcat($maincatid,$catid,$subcatid);
                if (empty($check)) {
                    $datanew['subcategory_id'] = $subcatid;
                    $datanew['maincatid'] = $maincatid;
                    $datanew['catid'] = $catid;
                    $result = $this->Subcategory_model->doaddcopiedsubcat($datanew);
                    $this->session->set_flashdata('success', "Category Add Successfully");
                    redirect('Copied_Subcat/'.$subcatid);
                }else {
                $this->session->set_flashdata('errors', "Category Already Exist!!!");
                redirect('Copy_Subcat/'.$subcatid);
            }
        }
    
     }
     public function getcategory(){
        if($this->input->post()){
            $id=$this->input->post('id');
            $result=  $this->Subcategory_model->getcat($id);
            echo json_encode($result);
            exit;
        }
    }
    public function getscategory(){
        if($this->input->post()){
            $id=$this->input->post('id');
            $result=  $this->Subcategory_model->getscat($id);
            // print_r($result);die;
            echo json_encode($result);
            exit;
        }
    }
     
     public function doAddSubCategory(){
        $data = array();

        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'name_en',
                'label' => 'Sub Category Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("maincatid","catid","name_en","name_ar");
        $cat_image = ($_FILES['subcatimage']['name'] != '') ? $_FILES['subcatimage']['name'] : '';
        
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('AddSubCategory');
        } else {
            $this->file_uploader->set_default_upload_path("./assets/images/subcategory/");

            $this->file_uploader->set_no_of_files_on_folder(25);

            $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

            $cat_image = $this->file_uploader->upload_image('subcatimage');
            $datanew['maincategory_id'] = $data['maincatid'];
            $datanew['category_id'] = $data['catid'];
            $datanew['subcategory_name_en'] = $data['name_en'];
			 if ($cat_image['status'] == 200) {

                $string = $cat_image['data'];

                $cat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                $datanew['subcategory_image'] = $cat_image;
            } /*else {

                $this->session->set_flashdata("cform", $data);

                $this->session->set_flashdata("errors", $cat_image['status']);

                redirect("AddSubCategory");
            }*/
            $result = $this->Subcategory_model->DoAddcategory($datanew);

            $newdata['subcategory_id']        = $result;
            $newdata['maincatid']        = $data['maincatid'];
            $newdata['catid']        =$data['catid'];

            $this->Subcategory_model->doaddcopiedsubcat($newdata);
            if ($result > 0) {
                $this->session->set_flashdata('success', "Category Add Successfully");
                redirect('Subcategory');
            } else {
                $this->session->set_flashdata('errors', "Category Not Add Successfully");
                redirect('Subcategory');
            }
        }
    
     }
     
     public function EditSubCategory($id){
        $data = array();
        
       
        $data = $this->session->flashdata("cform");

        $this->load->view('blocks/header');

        $data['editcategory'] = $this->Subcategory_model->edit_subcategory($id);
        $data['maincategory'] = $this->Subcategory_model->getmaincategroy();
        $this->load->view('subcategory/edit-sub-category', $data);

        $this->load->view('blocks/footer');
     }
     
     public function doUpdateSubCategory($id) {

          

        $data = array();

       $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'name_en',
                'label' => 'Sub Category Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("maincatid","catid","name_en","name_ar");
        $cat_image = ($_FILES['subcatimage']['name'] != '') ? $_FILES['subcatimage']['name'] : '';

        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('EditSubCategory/' . $id);
        } else {

            if ($cat_image != '') {

                $this->file_uploader->set_default_upload_path("./assets/images/subcategory/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $cat_image = $this->file_uploader->upload_image('subcatimage');



                if ($cat_image['status'] == 200) {

                    $string = $cat_image['data'];

                    $cat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['subcategory_image'] = $cat_image;

                    $userdata = $this->Subcategory_model->getImageidCategory($id);
                    
                    if ($userdata[0]['subcategory_image']) {

                        $path = FCPATH . 'assets/images/subcategory/' . $userdata[0]['subcategory_image'];

                        unlink($path);
                    }
                } /*else {

                    $this->session->set_flashdata("cform", $data);

                    $this->session->set_flashdata("errors", $cat_image['status']);

                    redirect('EditSubCategory/' . $id);
                }*/
            }
            $datanew['maincategory_id'] = $data['maincatid'];
            $datanew['category_id'] = $data['catid'];
            $datanew['subcategory_name_en'] = $data['name_en'];
			 $result = $this->Subcategory_model->DoUpdatesubcategory($datanew, $id);

            if ($result > 0) {
                $this->session->set_flashdata('success', "Sub Category edit Successfully");
                redirect('Subcategory');
            } else {
                $this->session->set_flashdata('errors', "Sub Category Not Edit Successfully");
                redirect('Subcategory');
            }
        }
    }
    
     public function DeleteSubCategory($id){
         $userdata = $this->Subcategory_model->getImageidCategory($id);
        if ($userdata[0]['subcategory_image']) {

            $path = FCPATH . 'assets/images/subcategory/' . $userdata[0]['subcategory_image'];

            unlink($path);
        }
        $result = $this->Subcategory_model->Dodeletesubcategory($id);
        if ($result > 0) {
                $this->session->set_flashdata('success', "Sub Category deleted Successfully");
                redirect('Subcategory');
            } else {
                $this->session->set_flashdata('errors', "Sub Category Not deleted Successfully");
                redirect('Subcategory');
            }
     }   

    public function SubCategoryStatus($id,$status)
    {
          // print_r($status);die();
        $datacode['subcatstatus'] = $status; 
        $codeupdate = $this->Subcategory_model->status_active_deactive($id,$datacode);  
        redirect('Subcategory');
    }
}