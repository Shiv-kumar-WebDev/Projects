<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Student extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
             $this->load->model('student/student_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('session');                
        }
	
        public function profile(){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->student_model->getprofile($id);
                $this->load->view('student/profile',$data);
            }else{
                redirect('Signin');          
            }
        }
        public function codetails(){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['codetails'] = $this->student_model->getcoach();
                $data['profile'] = $this->student_model->getprofile($id);
                $data['interestdata'] = $this->student_model->getinterest($id);
                $this->load->view('student/codetails',$data);
            }else{
                redirect('Signin');          
            }
        }
        public function st_doupdate()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('number', 'Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $id = $this->input->post('id');
            //print_r($id);die();
            
            if ($this->form_validation->run() === TRUE)
            {
                // $data=$this->coach_model->update_user($id);
                if($this->student_model->update_user($id)){
                    $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                    redirect(base_url('StProfile'));
                }else{
                    $this->session->set_flashdata('warning', ' Data Not Updated'); 
                    redirect(base_url('StProfile'));
                }
            }else{
                $this->session->set_flashdata('error', ' OOPS! something Went Wrong TRY AGAIN!'); 
                redirect(base_url('StProfile'));
            }
            
        }
        public function interest($coach_id){
		
            $userdata1 = $this->session->userdata("logged_in");
            $user_id = $userdata1['id'];
            if ($this->student_model->user_interest($coach_id,$user_id)) {
                redirect(base_url('Codetails'));
            }else {
                redirect(base_url('Codetails'));
            }
        }
        public function codata($co_id){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->student_model->getprofile($id);
                $data['coprofile'] = $this->student_model->getcoprofile($co_id);
                $data['comments'] = $this->student_model->get_comment($id,$co_id);
                $this->load->view('student/coprofile',$data);
            }else{
                redirect('Signin');          
            }
        }
        public function comments(){
            
            if ($this->session->userdata('logged_in')) {
                $id = $this->session->logged_in['id'];
                $data['user'] = $this->session->userdata('logged_in');
                $data['profile'] = $this->student_model->getprofile($id);
                $data['comments'] = $this->student_model->getcomment($id);
                // print_r($data['comments']);die();
                // $data['requestco'] = $this->student_model->getcomdata($id);
                // print_r($data['requestco']);die();
                $this->load->view('student/comments',$data);
            }else{
                redirect('StProfile');          
            }
        }
        public function corjct(){
            $co_id=$this->uri->segment(4);
            $com_id=$this->uri->segment(5);
            // print_r($co_id);die;
            $st_id=$this->session->logged_in['id'];
            $data= $this->student_model->getuser($co_id);
            $email=$data[0]['email'];
            if($this->student_model->update_corjct($st_id,$co_id,$com_id)){
                // $this->email->from('vikrammehra68@gmail.com', 'CoachFinder');
                // $this->email->to($email);
                // $this->email->subject('timing Comment');
                // $this->email->message('your comment has been rejected');
                // $this->email->send();
                $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                redirect(base_url('Cocomments'));
            }else{
                $this->session->set_flashdata('warning', ' Data Not Updated'); 
                redirect(base_url('Cocomments'));
            }
        }
        public function coacpt(){
            $co_id=$this->uri->segment(4);
            $com_id=$this->uri->segment(5);
            // print_r($com_id);die;
            $st_id=$this->session->logged_in['id']; 
            $data= $this->student_model->getuser($co_id);
            $email=$data[0]['email'];
            if($this->student_model->update_coacpt($st_id,$co_id,$com_id)){
                // $this->email->from('vikrammehra68@gmail.com', 'CoachFinder');
                // $this->email->to($email);
                // $this->email->subject('timing Comment');
                // $this->email->message('your comment has been confirmed');
                // $this->email->send();
                $this->session->set_flashdata('success', 'Data Updated Successfully'); 
                redirect(base_url('Cocomments'));
            }else{
                $this->session->set_flashdata('warning', ' Data Not Updated'); 
                redirect(base_url('Cocomments'));
            }
        }
        public function addrating(){
            $st_id=$this->session->logged_in['id']; 
            $response= $this->student_model->addrating($st_id);
            echo json_encode($response); exit;
        }
    }
?>