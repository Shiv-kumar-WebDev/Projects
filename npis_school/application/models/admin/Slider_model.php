<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Slider_model extends CI_Model
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
	
	public function getSliderAllData(){
		$q=$this->db->get('slider');
		return $q->result_array();

		
	}

	public function addslider($name){
		
		return $this->db->insert('slider', $name);
	}

	public function update_status_inactive_slider($id)
	{
	
		$data = array(
			'slider_status' => 0,
		);
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		return $this->db->affected_rows();
	}
	public function update_status_active_slider($id)
	{
	
		$data = array(
			'slider_status' => 1,
		);
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function getSliderData($id){
		$this->db->select("*");
            $this->db->from("slider");
            $this->db->where("slider_id",$id);
            $query = $this->db->get();
            return $query->result_array();
	}

	public function update_slider_data($id)
	{
	
		$data = array(

			'slider_title' => $this->input->post('title'),
			'created_at' => $this->input->post('date'),
		);
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_slider($id)
	{
		$this -> db -> where('slider_id', $id);
    	$this -> db -> delete('slider');
		return $this->db->affected_rows();
	}
}
