<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Instagram extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("admin/Instagram_model");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");
        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function postview() {
        $data = array();
        $data['instapost'] = $this->Instagram_model->getinstapost();
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('instagram/post-view',$data);
        $this->load->view('blocks/footer');
    }
    public function addpost() {
        $data = $this->session->flashdata("pform");
        $this->load->view('blocks/header');
        $this->load->view('instagram/add-post', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddInstagram() {
         $data = array();
        $config = array(
            array(
                'field' => 'post_url',
                'label' => 'Post Url',
                'rules' => 'trim|required'
            ),
        );
        $this->form_validation->set_rules($config);
        $fields = array("post_url","post_image");

        $pst_image = ($_FILES['post_image']['name'] != '') ? $_FILES['post_image']['name'] : '';
        // print_r($config);die();
		foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        // print_r($data);die();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddPost');
        }else{
            $this->file_uploader->set_default_upload_path("./assets/images/instagram/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $pst_image = $this->file_uploader->upload_image('post_image');

// print_r($pst_image);die();

            $datanew['post_url']        = $data['post_url'];
                 if ($pst_image['status'] == 200) {

                    $string = $pst_image['data'];

                    $pst_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['post_image'] = $pst_image;
                    // print_r($datanew);die();
                }

            $this->Instagram_model->DoAddPost($datanew);
            $this->session->set_flashdata('success', "Post Url and image also uploaded Successfully !");
            redirect('Instagram');
            
        }
    }
    public function deletepost() 
    {
        $id = $this->uri->segment(2);

        if ($this->Instagram_model->DoDeleteStatus($id)) {  
            $this->session->set_flashdata('success', "Instagram Delete Successfully");
            redirect('Instagram');
        } else {
            $this->session->set_flashdata('error', "Instagram Not Deleted");
            redirect('Instagram');
        }
    }
    public function poststatus($id) 
    {
        // $id = $this->uri->segment(2);
        $getstatus = $this->Instagram_model->DogetStatus($id);
        $status = $getstatus['poststatus'];
        // print_r($status);die();

        if ($status == 0) {
            $datanew['poststatus'] = '1';
            $result = $this->Instagram_model->DoEditStatus($datanew, $id);
            redirect('Instagram');
        } else {
            $datanew['poststatus'] = '0';
            $result = $this->Instagram_model->DoEditStatus($datanew, $id);
            redirect('Instagram');
        }
    }
}
