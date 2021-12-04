<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class State_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getStateData(){
		$this->db->select("*");
            $this->db->from("states");
			$this->db->order_by('name','ASC');
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleStateData($id){
		$this->db->select("*");
		$this->db->from("states");
		$this->db->where("id",$id);
		$query = $this->db->get();
		return $query->result_array();
}
public function addState($name){
		
	return $this->db->insert('states', $name);
	}
	public function update_State($id)
	{
	
		$data = array(
			'sortname' => $this->input->post('Shortname'),
			'name' => $this->input->post('example-text-input'),
		);
		$query = $this->db->update('states',$data,['id'=>$id]);
		return $this->db->affected_rows();
	}
	public function delete_State($id)
	{
		$this -> db -> where('id', $id);
    	$this -> db -> delete('states');
		return $this->db->affected_rows();
	}
	public function update_states($id)
	{
	
		$data = array(
			'name' => $this->input->post('Statename'),
			'country_id' => $this->input->post('countryid'),
		);
		$query = $this->db->update('states',$data,['id'=>$id]);
		return $this->db->affected_rows();
	}
	
}