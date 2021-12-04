<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Gallery_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function Checkoldpass($id,$data)
	{
		$this->db->select("*");
		$this->db->from("admin_login");
		$this->db->where("admin_id",$id);
		$this->db->where("password",md5($data['opass']));

			$query = $this->db->get();

			if($query->num_rows() > 0)
				{
					return $query->row_array();
				}
				else
				{
					return false;
				}
		
	}
	
	public function getGalleryAllData(){
		$q=$this->db->get('gallery');
		return $q->result_array();

		
	}

	public function addgallery($name){
		
		return $this->db->insert('gallery', $name);
	}

	public function update_status_inactive_gallery($id)
	{
	
		$data = array(
			'gallery_status' => 0,
		);
		
		$query = $this->db->update('gallery',$data,['gallery_id'=>$id]);
		
		return $this->db->affected_rows();
	}
	public function update_status_active_gallery($id)
	{
	
		$data = array(
			'gallery_status' => 1,
		);
		
		$query = $this->db->update('gallery',$data,['gallery_id'=>$id]);
		
		return $this->db->affected_rows();
	}

	public function getGalleryData($id){
		$this->db->select("*");
            $this->db->from("gallery");
            $this->db->where("gallery_id",$id);
            $query = $this->db->get();
            return $query->result_array();
	}

	public function update_gallery_data($id,$data)
	{
		$query = $this->db->update('gallery',$data,['gallery_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_gallery($id)
	{
		$this -> db -> where('gallery_id', $id);
    	$this -> db -> delete('gallery');
		return $this->db->affected_rows();
	}
}
