<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Country_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getCountryData(){
		$this->db->select("*");
            $this->db->from("countries");
			$this->db->order_by('name','ASC');
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleCountryData($id){
		$this->db->select("*");
		$this->db->from("countries");
		$this->db->where("id",$id);
		$query = $this->db->get();
		return $query->result_array();
}
public function addCountry($name){
		
	return $this->db->insert('countries', $name);
	}
	public function update_Country($id)
	{	
		$data = array(
			'sortname' => $this->input->post('Shortname'),
			'name' => $this->input->post('example-text-input'),
		);
		$query = $this->db->update('countries',$data,['id'=>$id]);
		return $this->db->affected_rows();
	}
	public function delete_country($id)
	{
		$this ->db-> where('id', $id);
    	$this ->db-> delete('countries');
		return $this->db->affected_rows();
	}
}