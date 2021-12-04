<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

	public function __construct() {
        parent::__construct();

        
    }


	public function index()
	{	
		$this->load->model("User_model");
		$data['sub_categories']=$this->User_model->getSubcategoryData();
		$data['user'] = $this->session->userdata('logged_in');               

		// print_r($data);die();

		$this->load->view('admin/blocks/header',$data);
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/subcategory',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function addSubCategory(){

		$this->load->model("User_model");
		$data['categories']=$this->User_model->getCategoryData1();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/addsubcategory',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function insert(){
		
		$data = array(
			    'name' => $this->input->post('SubCategoryname'),
			    'category_id' => $this->input->post('Categoryid'),
				);
		// print_r($data);die();
		$this->load->model("User_model");
		$result=$this->User_model->addsubcategory($data);
  		redirect('admin/category/Subcategory');

	}
	public function editSubCategory(){

		$id=$this->uri->segment('5');
		// echo $id;die();
		$this->load->model("User_model");
		$data['subcategories']=$this->User_model->getSingleSubCategoryData($id);
		$data['categories']=$this->User_model->getCategoryData();
		// print_r($data);die();

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/editSubCategory',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function update(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$this->load->model("User_model");
		$data['subcategories']=$this->User_model->update_subcategory($id);
		redirect('admin/category/Subcategory');
	}
	public function inactive(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$this->load->model("User_model");
		$data['categories']=$this->User_model->update_subcat_status_inactive($id);
		redirect('admin/category/Subcategory');
	}
	public function active(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$this->load->model("User_model");
		$data['categories']=$this->User_model->update_subcat_status_active($id);
		redirect('admin/category/Subcategory');
	}
	public function deleteSubCategory(){
		$id=$this->uri->segment('5');
		// echo $id;die();
		$this->load->model("User_model");
		$data['subcategories']=$this->User_model->delete_subcategory($id);
		redirect('admin/category/Subcategory');
	}
	
}
