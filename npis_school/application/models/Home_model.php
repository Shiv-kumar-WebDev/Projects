<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getimg($cond,$limit=null) 
	{
                $this->db->select("*");
                $this->db->from("gallery");
                $this->db->where("img_type", $cond);
                $this->db->where("gallery_status", 1);
                if($limit != null){
                    $this->db->limit($limit);
                }
                $query = $this->db->get();
                return $query->result_array();
	}

	public function getvideos($cond) 
	{
        $this->db->select("*");
        $this->db->from("videos");
        $this->db->where("video_cat", $cond);
        $this->db->where("vid_status", 1);
        $query = $this->db->get();
        return $query->result_array();
	}
}
