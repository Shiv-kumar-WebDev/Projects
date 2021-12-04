<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Video_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getvideoAllData(){
		$q=$this->db->get('video');
		return $q->result_array();		
	}
	public function getvideosData(){
		$query=$this->db->get('videos');
		return $query->result_array();		
	}

	public function addvideo($name){
		
		return $this->db->insert('video', $name);
	}
	public function doaddvideos($name){
		
		return $this->db->insert('videos', $name);
	}

	public function update_status_inactive_video($id)
	{
		$data = array(
			'video_status' => 0,
		);
		$query = $this->db->update('video',$data,['video_id'=>$id]);
		return $this->db->affected_rows();
	}
	public function update_status_active_video($id)
	{
		$data = array(
			'video_status' => 1,
		);
		$query = $this->db->update('video',$data,['video_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function getVideoData($id){
		$this->db->select("*");
        $this->db->from("video");
        $this->db->where("video_id",$id);
        $query = $this->db->get();
        return $query->result_array();
	}

	public function update_video_data($id)
	{
	
		$data = array(
			'video_link' => $this->input->post('video_link'),
			'created_at' => $this->input->post('date'),
		);
		$query = $this->db->update('video',$data,['video_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_video($id)
	{
		$this ->db-> where('video_id', $id);
    	$this ->db-> delete('video');
		return $this->db->affected_rows();
	}
	public function DeleteVideos($id)
	{
		$this ->db->where('videos_id', $id);
    	$this ->db->delete('videos');
		return $this->db->affected_rows();
	}
	public function checkstatus($id){
		$this->db->select("vid_status");
        $this->db->from("videos");
        $this->db->where("videos_id",$id);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function updatestatus($datanew,$id)
	{
		$query = $this->db->update('videos',$datanew,['videos_id'=>$id]);
		return $this->db->affected_rows();
	}
}
