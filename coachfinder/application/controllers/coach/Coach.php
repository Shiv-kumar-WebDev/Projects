<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coach extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
             $this->load->model('coach/coach_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('session');                
        }
	
        public function profile(){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->coach_model->getprofile($id);
                $data['subject'] = $this->coach_model->getsub();
                $this->load->view('coach/profile',$data);
            }else{
                redirect('Signin');          
            }
        }
        public function request(){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->coach_model->getprofile($id);
                $data['request'] = $this->coach_model->getreq($id);
                $data['requestst'] = $this->coach_model->getreqdata($id);
                $this->load->view('coach/request',$data);
            }else{
                redirect('Signin');          
            }
        }
        public function strjct($st_id){
            // print_r($st_id);die;
            $co_id=$this->session->logged_in['id'];
            if($this->coach_model->update_strjct($st_id,$co_id)){
                $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                redirect(base_url('Request'));
            }else{
                $this->session->set_flashdata('warning', ' Data Not Updated'); 
                redirect(base_url('Request'));
            }
        }
        public function stacpt($st_id){
            $co_id=$this->session->logged_in['id']; 
            if($this->coach_model->update_stacpt($st_id,$co_id)){
                $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                redirect(base_url('Request'));
            }else{
                $this->session->set_flashdata('warning', ' Data Not Updated'); 
                redirect(base_url('Request'));
            }
        }
        public function stview($st_id){
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['st_id']=$st_id;
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->coach_model->getprofile($id);
                $data['student'] = $this->coach_model->stview($st_id,$id);
                $data['stprofile'] = $this->coach_model->getstprofile($st_id);
                //  print_r($data['student']);die();
                $this->load->view('coach/student_view',$data,$st_id);
            }else{
                redirect('Request');          
            }
        }
        public function addtime()
        {   
            $co_id = $this->session->logged_in['id'];
            if($this->coach_model->addtime($co_id)){
                $this->session->set_flashdata('success', 'Your data has been submitted Successfully!'); 
                redirect('Request');      
            }else{
                $this->session->set_flashdata('warning', 'Something Went Wrong'); 
                redirect('Request');      
            }
        }
        
        public function co_doupdate()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('number', 'Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('sub_id', 'Sub_id', 'required');
            $id = $this->input->post('id');
            //print_r($id);die();
            
            if ($this->form_validation->run() === TRUE)
            {
                // $data=$this->coach_model->update_user($id);
                if($this->coach_model->update_user($id)){
                    $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                    redirect(base_url('CoProfile'));
                }else{
                    $this->session->set_flashdata('warning', ' Data Not Updated'); 
                    redirect(base_url('CoProfile'));
                }
            }else{
                $this->session->set_flashdata('error', ' OOPS! something Went Wrong TRY AGAIN!'); 
                redirect(base_url('CoProfile'));
            }
            
        }
    }
?>