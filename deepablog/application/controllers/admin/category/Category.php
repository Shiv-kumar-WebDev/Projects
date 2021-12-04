<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("User_model");
        
    }


	public function index()
	{	
		 $data['categories']=$this->User_model->getCategoryData();
		 $data['user'] = $this->session->userdata('logged_in');               

		// print_r($data);die();
		
		$this->load->view('admin/blocks/header',$data);
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/category',$data);
		$this->load->view('admin/blocks/footer');

		
	}
	public function addCategory(){
		
		// $data['blogs']=$this->User_model->getBlogData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/addcategory');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
		
		$data = array(
			    'category_name' => $this->input->post('Categoryname'),
			    
				);
		// print_r($data);die();
		$result=$this->User_model->addcategory($data);
  		redirect('admin/category/Category');

	}
	public function editCategory(){

		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['categories']=$this->User_model->getSingleCategoryData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/editCategory',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function update(){
		$id=$this->uri->segment('5');
		$data['categories']=$this->User_model->update_category($id);
		redirect('admin/category/Category');
	}
	public function inactive(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['categories']=$this->User_model->update_status_inactive($id);
		redirect('admin/category/Category');
	}
	public function active(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['categories']=$this->User_model->update_status_active($id);
		redirect('admin/category/Category');
	}
	public function deleteCategory(){
		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['categories']=$this->User_model->delete_category($id);
		redirect('admin/category/Category');
		
	}
	
}
