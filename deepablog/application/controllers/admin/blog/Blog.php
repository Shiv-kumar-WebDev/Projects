<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("User_model");
		$this->load->helper('url', 'form');
        
    }


	public function index()
	{	
		$data['blogs']=$this->User_model->getBlogData();
		$data['user'] = $this->session->userdata('logged_in');               

		// print_r($data);die();
		
		$this->load->view('admin/blocks/header',$data);
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/index',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function addCategory(){
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/category/addcategory');
		$this->load->view('admin/blocks/footer');
		
	}
	public function addBlog(){
		$this->load->model("User_model");
		$data['categories']=$this->User_model->getCategoryData();
		$data['subcategories']=$this->User_model->getSubcategoryData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/addBlog',$data);
		$this->load->view('admin/blocks/footer');
		
	}
	public function fetch_subcategory(){
		if($this->input->post('category_id')){
			echo $this->User_model->fetch_subcategory($this->input->post('category_id'));
		}
	}

	public function insert(){
		
		// $data = array(
		// 	    'title' => $this->input->post('title'),
		// 	    'date' => $this->input->post('date'),
		// 	    'imgSrc' => $this->input->post('imgSrc'),
		// 		);
		// print_r($data);die();
		// $result=$this->User_model->addblog($data);
  		// redirect('admin/blog/Blog');

		  $config['upload_path'] = './assets/admin/images/blogs/';
		  $config['allowed_types'] = 'gif|jpg|png';
		  $config['max_size'] = 8000;
		  // $config['max_width'] = 1500;
		  // $config['max_height'] = 1500;
		  $new_name = time() . '-' . $_FILES["image"]['name'];
		  // echo $new_name;die();
		  $config['file_name'] = $new_name;
		  $this->load->library('upload', $config);
		  $this->upload->initialize($config);
  
		  if (!$this->upload->do_upload('image')) {
			  $error = array('error' => $this->upload->display_errors());
			  // print_r($error);die();
			  redirect('admin/blog/Blog/addBlog'); //error
  
		  } else {
			$data = array(
			    'category_id' => $this->input->post('Categoryid'),
			    'subcategory_id' => $this->input->post('subcategoryid'),
			    'title' => $this->input->post('title'),
			    'blog_description' => $this->input->post('Description'),
			    'popular_post' => $this->input->post('popular_post'),
			    // 'date' => $this->input->post('date'),
			    'imgSrc' => $new_name,
				);
			  // $data = array('imgSrc' => $this->upload->data());
  
			  $result=$this->User_model->addblog($data);
			  redirect('admin/blog/Blog');
		  }
		  // $result=$this->User_model->addblog($data);
			// redirect('admin/blog/Blog');

	}
	public function editBlog(){

		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['categories']=$this->User_model->getCategoryData();
		$data['subcategories']=$this->User_model->getSubcategoryData();
		$data['blogs']=$this->User_model->getSingleBlogData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/left_sidebar');
		$this->load->view('admin/blog/editBlogData',$data);
		$this->load->view('admin/blocks/footer');
	}
	public function update(){
		$id=$this->uri->segment('5');
		$data['categories']=$this->User_model->update_blog($id);
		redirect('admin/blog/Blog');
	}
	public function update_blog(){
		$id=$this->uri->segment('5');
		$data['categories']=$this->User_model->update_blog_data($id);
		redirect('admin/blog/Blog');
	}
	public function deleteBlog(){
		$id=$this->uri->segment('5');
		// echo $id;die();
		$data['blogs']=$this->User_model->delete_blog($id);
		redirect('admin/blog/Blog');
		
	}
	public function inactive(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_inactive_blog($id);
		redirect('admin/blog/Blog');
	}
	public function active(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_active_blog($id);
		redirect('admin/blog/Blog');
	}
	public function inactivePost(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_inactive_blog_post($id);
		redirect('admin/blog/Blog');
	}
	public function activePost(){
		$id=$this->uri->segment('5');
		// echo $id; die();
		$data['blogs']=$this->User_model->update_status_active_blog_post($id);
		redirect('admin/blog/Blog');
	}
	
	
}
