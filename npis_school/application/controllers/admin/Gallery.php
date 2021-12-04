<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("admin/Gallery_model");
		$this->load->library("form_validation");
        $this->load->library('File_uploader');
    }


	public function index()
	{	
		$data['gallery']=$this->Gallery_model ->getGalleryAllData();
        
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/gallery',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addGallery(){
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addGallery');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
		
		$this->file_uploader->set_default_upload_path("./assets/admin_assets/images/gallery/");
        $image = $this->file_uploader->upload_image('image');
		if ($image['status'] != 200) {
			$this->session->set_flashdata('errors', $image['data']);
			redirect('admin/Gallery/addGallery'); 
		} 
		else {
        	$data = array(
			    'gallery_title' => $this->input->post('title'),
			    'img_type' => $this->input->post('img_type'),
			    'gallery_img' => $image['data'],
				);
         	$result=$this->Gallery_model->addgallery($data);
			$this->session->set_flashdata('success', "Gallery Added Successfully");
            redirect('admin/Gallery');
        }
		
	}
	
	
	public function editGallery($id){

		$data['gallery']=$this->Gallery_model->getGalleryData($id);
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editGalleryData',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_gallery(){
		$id=$this->uri->segment('4');
		$upData = array(
			'gallery_title' => $this->input->post('title'),
		);
		if(!empty($_FILES['image']['name'])){
			$this->file_uploader->set_default_upload_path("./assets/admin_assets/images/gallery/");
			$image = $this->file_uploader->upload_image('image');
			if ($image['status'] != 200) {
				$this->session->set_flashdata('errors', $image['data']);
				redirect('admin/Gallery/editGallery/'.$id); 

			}else{
				$upData['gallery_img'] = $image['data'];
			} 
		}
		$data['gallery']=$this->Gallery_model->update_gallery_data($id,$upData);
		$this->session->set_flashdata('success', "Gallery Updated Successfully");
		redirect('admin/Gallery');
	}

	public function deleteGallery(){
		$id=$this->uri->segment('4');
		$data['gallery']=$this->Gallery_model->delete_gallery($id);
		$this->session->set_flashdata('success', "Gallery Delete Successfully");
		redirect('admin/Gallery');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		$data['gallery']=$this->Gallery_model->update_status_inactive_gallery($id);
		redirect('admin/Gallery');
	}
	public function active(){
		$id=$this->uri->segment('4');
		$data['gallery']=$this->Gallery_model->update_status_active_gallery($id);
		redirect('admin/Gallery');
	}
	
	
}
