<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    }


	public function index()
	{	
		$this->load->model("User_model");
		$data['blogs']=$this->User_model->getBlogData();
		$data['sliders']=$this->User_model->getSliderData1();
		$data['categories']=$this->User_model->getCategoryDatainBlog();
		// print_r($data);die();
		$this->load->view('blog/blocks/header',$data);
		$this->load->view('blog/index',$data);
		$this->load->view('blog/blocks/footer',$data);
	}
	
	public function blogDetails()
	{	
		$this->load->model("User_model");
		$id=$this->uri->segment('3');
		$data['comments']=$this->User_model->getCommentData($id);
		$data['popularPosts']=$this->User_model->getPopularPostData();
		$data['categories']=$this->User_model->getCategoryData();

		// echo $id;die();
		$data['blogs']=$this->User_model->getBlogData1($id);
		$data['sliders']=$this->User_model->getSliderData1();
		$data['categories']=$this->User_model->getCategoryDatainBlog();
		// print_r($data);die();

		$this->load->view('blog/blocks/header',$data);
		$this->load->view('blog/blogDetails',$data);
		$this->load->view('blog/blocks/footer',$data);
	}
	public function user_comment($id)
	{	
		// print_r($id);die();
		$this->load->model("User_model");
		// $data['blogs']=$this->User_model->getBlogData();
		// $data['sliders']=$this->User_model->getSliderData1();
		// $data['categories']=$this->User_model->getCategoryDatainBlog();
		// print_r($data);die();
        // $id=$this->uri->segment('5');
        // echo $id;die();
		$data = array(
            'blog_id' => $id,
            'comment_name' => $this->input->post('first_name'),
            'comment_email' => $this->input->post('email'),
            'comment_website' => $this->input->post('website'),
            'message' => $this->input->post('message'),
            );
    // print_r($data);die();
    $result=$this->User_model->addcomment($data);
      redirect('Blog/blogDetails/'.$id);
	}
}