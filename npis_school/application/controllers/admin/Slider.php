<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model("admin/Slider_model");
		$this->load->library("form_validation");
		$this->load->library('File_uploader');
	}


	public function index()
	{
		$data['sliders'] = $this->Slider_model->getSliderAllData();

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/slider', $data);
		$this->load->view('admin/blocks/footer');
	}

	public function addSlider()
	{


		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addSlider');
		$this->load->view('admin/blocks/footer');
	}

	public function insert()
	{
		$this->file_uploader->set_default_upload_path("./assets/admin_assets/images/sliders/");
        $image = $this->file_uploader->upload_image('image');
		if ($image['status'] != 200) {
			$this->session->set_flashdata('errors', $image['data']);
			redirect('admin/Slider/addSlider'); 
		} else {
			$data = array(
				'slider_img' => $image['data'],
			);
			$result = $this->Slider_model->addslider($data);
			$this->session->set_flashdata('success', "Slider Add Successfully");
			redirect('admin/Slider');
		}
	}

	public function getnewsAllData()
	{
		$q = $this->db->get('news_events');
		return $q->result_array();
	}

	public function editSlider()
	{

		$id = $this->uri->segment('4');
		$data['sliders'] = $this->Slider_model->getSliderData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editSliderData', $data);
		$this->load->view('admin/blocks/footer');
	}

	public function update_slider()
	{
		$id = $this->uri->segment('4');
		$data['sliders'] = $this->Slider_model->update_slider_data($id);
		$this->session->set_flashdata('success', "Slider Updated Successfully");
		redirect('admin/Slider');
	}
	public function deleteSlider()
	{
		$id = $this->uri->segment('4');
		$data['sliders'] = $this->Slider_model->delete_slider($id);
		$this->session->set_flashdata('success', "Slider Deleted Successfully");
		redirect('admin/Slider');
	}

	public function inactive()
	{
		$id = $this->uri->segment('4');
		$data['sliders'] = $this->Slider_model->update_status_inactive_slider($id);
		$this->session->set_flashdata('success', "Slider Has Been Disabled Successfully");
		redirect('admin/Slider');
	}
	public function active()
	{
		$id = $this->uri->segment('4');
		$data['sliders'] = $this->Slider_model->update_status_active_slider($id);
		$this->session->set_flashdata('success', "Slider Has Been Enabled Successfully");
		redirect('admin/Slider');
	}
}
