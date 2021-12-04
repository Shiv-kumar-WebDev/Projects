<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("User_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
        
    }


	public function index()
	{	
		$data['comments']=$this->User_model->getAllCommentData();
		$data['user'] = $this->session->userdata('logged_in');               

		// print_r($data);die();
		
		$this->load->view('admin/blocks/header',$data);
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/comment',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function inactive(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['comments']=$this->User_model->update_status_inactive_comment($id);
		redirect('admin/blog/Comment');
	}
	public function active(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['comments']=$this->User_model->update_status_active_comment($id);
		redirect('admin/blog/Comment');
	}
	
}
