<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Testimonial_model extends CI_Model
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
	
	public function gettestimonialAllData(){
		$q=$this->db->get('testimonial');
		return $q->result_array();

		
	}

	public function addtestimonial($name){
		
		return $this->db->insert('testimonial', $name);
	}

	public function update_status_inactive_testimonial($id)
	{
	
		$data = array(
			'testimonial_status' => 0,
		);
		$query = $this->db->update('testimonial',$data,['testimonial_id'=>$id]);
		return $this->db->affected_rows();
	}
	public function update_status_active_testimonial($id)
	{
	
		$data = array(
			'testimonial_status' => 1,
		);
		$query = $this->db->update('testimonial',$data,['testimonial_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function getTestimonialData($id){
		$this->db->select("*");
            $this->db->from("testimonial");
            $this->db->where("testimonial_id",$id);
            $query = $this->db->get();
            return $query->result_array();
	}

	public function update_testimonial_data($id)
	{
	
		$data = array(

			'testimonial_title' => $this->input->post('title'),
			'testimonial_description' => $this->input->post('testimonial_description'),
			'testimonial_rating' => $this->input->post('testimonial_rating'),
			'created_at' => $this->input->post('date'),
		);
		$query = $this->db->update('testimonial',$data,['testimonial_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_testimonial($id)
	{
		$this -> db -> where('testimonial_id', $id);
    	$this -> db -> delete('testimonial');
		return $this->db->affected_rows();
	}
}
