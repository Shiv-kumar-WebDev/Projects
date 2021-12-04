<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/admin_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('session');                
        }
        public function dashboard()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/dashboard');
            }else{
                redirect('Admin');          
            }
        }
        public function login()
        { 
            if ($this->session->userdata('logged_in')) {
                redirect(base_url('Admin/Dashboard'));
            }
            else{
                $this->load->view('admin/admin_header');
                $this->load->view('admin/login');            
            }
        }
        public function login_compare()
        { 
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $data = $this->admin_model->login_compare($email,$password);
            if(!empty($data)){
                $newdata = array(
                    'id'  =>  $data[0]['id'],
                    'name' => $data[0]['name'],
                    'email' => $data[0]['email'],
                    'password' => $data[0]['password']
                );
                $this->session->set_userdata('logged_in',$newdata);
                redirect(base_url('Admin/Dashboard'));
            }
            else{
                $this->session->set_flashdata('error', 'Invalid email or password!');
                redirect(base_url('Admin'));
            }
        }

        public function log_out()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $this->session->unset_userdata('logged_in',$data);
                $this->session->sess_destroy();
                redirect('Admin');
            }else{
                redirect('Admin/Dashboard');            
            }
        }
        public function doaddsub()
        { 
            if ($this->admin_model->doaddsub()) { 
                $this->session->set_flashdata('success', 'Your data has been added Successfully');
                redirect('Admin/Subjects');
            }else{
                $this->session->set_flashdata('success', 'SORRY! Try Again');
                redirect('Admin/Addsub');            
            }
        }

        public function forgot_pass()
        { 
            if ($this->session->userdata('logged_in')) {
                redirect(base_url('admin/dashboard/'));
                
            }else{
                $this->load->view('admin/admin_header');
                $this->load->view('admin/forgot_password');         
            }
        }
        
        public function update_pass()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $email = $this->input->post('email');
            //print_r($email); die();
            if ($this->form_validation->run() === TRUE)
            {
                if($this->admin_model->update_pass($email)){
                    $this->session->set_flashdata('success', 'Your password has been changed Successfully'); 
                    redirect(base_url('Admin'));
                }else{
                    $this->session->set_flashdata('warning', 'You entered wrong email address! '); 
                    redirect(base_url('Admin/ForgotPassword'));
                }
            }else{
                $this->session->set_flashdata('error', ' OOPS! something Went Wrong TRY AGAIN!'); 
                redirect(base_url('Admin/ForgotPassword'));
            }
        }

        public function change_password()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');
                $this->load->view('admin/admin_header');
                $this->load->view('admin/change_password',$data);
                
            }else{
                redirect('Admin');            
            }
        }

        public function update_password()
        { 
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('newpassword', 'Newpassword', 'required');
            $id = $this->input->post('id');
            $password = $this->input->post('password');
             //print_r($password); die();
            if($this->admin_model->update_password($id,$password)){
                    $this->session->set_flashdata('success', 'Your password has been changed Successfully'); 
                    redirect(base_url('Admin/Dashboard'));
            }else{
                    $this->session->set_flashdata('warning', ' Please Enter valid old password'); 
                    redirect(base_url('Admin/Change_password'));
            }
        }
        public function codetails()
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['couser_details'] = $this->admin_model->fetchco();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/codetails',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function Editsubject($id)
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['subject'] = $this->admin_model->fetchsubyid($id);
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/editsub',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function addsub()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                // $info['stuser_details'] = $this->admin_model->fetchst();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/addsub',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function stdetails()
        { 
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['stuser_details'] = $this->admin_model->fetchst();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/stdetails',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function subjects()
        { 
            
            if ($this->session->userdata('logged_in')) {
                $data['user'] = $this->session->userdata('logged_in');               
                $info['sub_details'] = $this->admin_model->fetchsub();
                $this->load->view('admin/admin_header');
                $this->load->view('admin/admin_info',$data);
                $this->load->view('admin/aside',$data);
                $this->load->view('admin/subjects',$info);
            }else{
                redirect('Admin');          
            }
        }
        public function doeditsub()
        { 
            if ($this->admin_model->doeditsub()) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/Subjects');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/Subjects');
            }
        }
        public function costatus($id)
        {   
            $getstatus = $this->admin_model->cogetstatus($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->admin_model->costatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->admin_model->costatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/CoDetails');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/CoDetails');
            }

        }
        public function ststatus($id)
        {   
            $getstatus = $this->admin_model->cogetstatus($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->admin_model->ststatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->admin_model->ststatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/StDetails');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/StDetails');
            }

        }
        public function substatus($id)
        {   
            $getstatus = $this->admin_model->getsub($id);
            $status = $getstatus[0]['status'];
            // print_r($getstatus['status']);die();
            if ($status == 1) {
                $data['status'] = '0';
                $result = $this->admin_model->substatus($data, $id);
            } else{
            $data['status'] = '1';
            $result = $this->admin_model->substatus($data, $id);
            } 
                       
            if ($result) {
                $this->session->set_flashdata('success', 'Your data has been updated Successfully');
                redirect('Admin/Subjects');
            }else {
                $this->session->set_flashdata('error', 'Your data not updated');
                redirect('Admin/Subjects');
            }

        }
    }
?>