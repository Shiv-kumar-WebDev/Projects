<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("admin/Video_model");
		$this->load->library("form_validation");
        $this->load->library('File_uploader');
    }


	public function index()
	{	
		$data['videos']=$this->Video_model ->getvideoAllData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/video',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addVideo(){
        $this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addVideo');
		$this->load->view('admin/blocks/footer');		
	}

	public function insert(){		
		$data = array(
			    'video_link' => $this->input->post('video_link'),
				);
		$result=$this->Video_model->addvideo($data);
		$this->session->set_flashdata('success', "Video Add Successfully");

  		redirect('admin/Video');
	}

	public function editVideo(){

		$id=$this->uri->segment('4');
		$data['videos']=$this->Video_model->getVideoData($id);
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editVideo',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_video(){
		$id=$this->uri->segment('4');
		$data['videos']=$this->Video_model->update_video_data($id);
		$this->session->set_flashdata('success', "Video Update Successfully");
		redirect('admin/Video');
	}
	public function deleteVideo(){
		$id=$this->uri->segment('4');
		$data['videos']=$this->Video_model->delete_video($id);
		$this->session->set_flashdata('success', "Video Delete Successfully");
		redirect('admin/Video');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		$data['videos']=$this->Video_model->update_status_inactive_video($id);
		redirect('admin/Video');
	}
	public function active(){
		$id=$this->uri->segment('4');
		$data['videos']=$this->Video_model->update_status_active_video($id);
		redirect('admin/Video');
	}
	
	public function allvideos()
	{	
		$data['videos']=$this->Video_model ->getvideosData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/videos',$data);
		$this->load->view('admin/blocks/footer');
	}	
	public function addvideos()
	{	
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/add_videos');
		$this->load->view('admin/blocks/footer');
	}
	
    public function doaddvideos() {
        $data = array();
        $fields = array("video_cat","video_title","video");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $this->file_uploader->set_default_upload_path("./assets/admin_assets/images/videos/");
        $this->file_uploader->set_no_of_files_on_folder(25);
        $video = $this->file_uploader->upload_other_file('video');
        $datanew['video_cat'] = $data['video_cat'];
        $datanew['videos_title'] = $data['video_title'];
		if ($video['status'] == 200) {
			$string = $video['data'];
			$video = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);
			$datanew['video'] = $video;
		}
        $result = $this->Video_model->doaddvideos($datanew);

        if ($result > 0) {
            $this->session->set_flashdata('success', "Video Added Successfully");
            redirect('Videos');
        } else {
            $this->session->set_flashdata('errors', "Video Not Added");
            redirect('AddVideos');
        }      
    }
	public function DeleteVideos($vid_id){
		$result=$this->Video_model->DeleteVideos($vid_id);
		if ($result) {
			$this->session->set_flashdata('success', "Video Deleted Successfully");
        } else {
            $this->session->set_flashdata('errors', "Video Not Deleted");
        }   
        redirect('Videos');   
	}
	public function status($vid_id){
		$status=$this->Video_model->checkstatus($vid_id);
		if ($status[0]['vid_status']==0) {
			$datanew['vid_status'] = 1;
		}else{
			$datanew['vid_status'] = 0;
		}
		$result=$this->Video_model->updatestatus($datanew,$vid_id);
		if ($result) {
			$this->session->set_flashdata('success', "Video Deleted Successfully");
        } else {
            $this->session->set_flashdata('errors', "Video Not Deleted");
        }   
        redirect('Videos');   
	}

}
