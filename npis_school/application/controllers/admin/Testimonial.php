<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("admin/Testimonial_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library("form_validation");
        
        $this->load->helper(array('form', 'url'));
		$this->load->library('upload');
    }


	public function index()
	{	
		$data['testimonials']=$this->Testimonial_model ->gettestimonialAllData();

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/testimonial',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addTestimonial(){
		
        $this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addTestimonial');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
		
		$data = array(
			    'testimonial_title' => $this->input->post('title'),
				'testimonial_description' => $this->input->post('testimonial_description'),
				'testimonial_rating' => $this->input->post('testimonial_rating'),
			    
				);
		
		$result=$this->Testimonial_model->addtestimonial($data);
		$this->session->set_flashdata('success', "Testimonial Add Successfully");

  		redirect('admin/Testimonial');

	}
	

	
	 

	public function editTestimonial($id){
	
		$data['testimonials']=$this->Testimonial_model->getTestimonialData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editTestimonialData',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_Testimonial(){
		$id=$this->uri->segment('4');
		$data['testimonials']=$this->Testimonial_model->update_testimonial_data($id);
		$this->session->set_flashdata('success', "Testimonial Edit Successfully");

		redirect('admin/Testimonial');
	}
	public function deleteTestimonial(){
		$id=$this->uri->segment('4');
		
		$data['testimonials']=$this->Testimonial_model->delete_testimonial($id);
		$this->session->set_flashdata('success', "Testimonial Delete Successfully");
		redirect('admin/Testimonial');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		
		$data['testimonials']=$this->Testimonial_model->update_status_inactive_testimonial($id);
		redirect('admin/Testimonial');
	}
	public function active(){
		$id=$this->uri->segment('4');
		
		$data['testimonials']=$this->Testimonial_model->update_status_active_testimonial($id);
		redirect('admin/Testimonial');
	}
	
	
}
