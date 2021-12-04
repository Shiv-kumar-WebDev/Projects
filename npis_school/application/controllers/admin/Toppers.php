<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toppers extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("admin/Topper_model");
		$this->load->library("form_validation");
        $this->load->library('File_uploader');
       }


	public function index()
	{	
		$data['toppers']=$this->Topper_model ->getToppersAllData();
       
		
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/toppers',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addToppers(){
		
		
		
        $this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addToppers');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){
			
		$this->file_uploader->set_default_upload_path("./assets/admin_assets/images/toppers/");
        $image = $this->file_uploader->upload_image('image');
		if ($image['status'] != 200) {
			$this->session->set_flashdata('errors', $image['data']);
			redirect('admin/Toppers/addToppers'); 

		} 
		else {
        	$data = array(
			    'toppers_title' => $this->input->post('title'),
				'toppers_class' => $this->input->post('toppers_class'),
				'toppers_percentage' => $this->input->post('toppers_percentage'),
			    'toppers_img' => $image['data'],
			);
        	$result=$this->Topper_model->addtopper($data);
			$this->session->set_flashdata('success', "Topper Added Successfully");
            redirect('admin/Toppers');
        }
		
	}
	

	
	 

	public function editToppers($id){

		$data['toppers']=$this->Topper_model->getTopperData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editToppersData',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_toppers(){
		$id=$this->uri->segment('4');
		$upData = array(
			'toppers_title' => $this->input->post('title'),
			'toppers_class' => $this->input->post('toppers_class'),
			'toppers_percentage' => $this->input->post('toppers_percentage'),
		);
		if(!empty($_FILES['image']['name'])){
			$this->file_uploader->set_default_upload_path("./assets/admin_assets/images/toppers/");
			$image = $this->file_uploader->upload_image('image');
			if ($image['status'] != 200) {
				$this->session->set_flashdata('errors', $image['data']);
				redirect('admin/Toppers/editToppers/'.$id); 

			}else{
				$upData['toppers_img'] = $image['data'];
			} 
		}
		$data['toppers']=$this->Topper_model->update_toppers_data($id,$upData);
		$this->session->set_flashdata('success', "Topper Updated Successfully");
		redirect('admin/Toppers');
	}
	public function deleteToppers(){
		$id=$this->uri->segment('4');
		
		$data['toppers']=$this->Topper_model->delete_topper($id);
		$this->session->set_flashdata('success', "Topper Delete Successfully");

		redirect('admin/Toppers');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		
		$data['toppers']=$this->Topper_model->update_status_inactive_topper($id);
		redirect('admin/Toppers');
	}
	public function active(){
		$id=$this->uri->segment('4');
		
		$data['toppers']=$this->Topper_model->update_status_active_topper($id);
		redirect('admin/Toppers');
	}
	
	
}
