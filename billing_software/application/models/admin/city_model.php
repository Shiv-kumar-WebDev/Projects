<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class city_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function getCityData(){
		$this->db->select("*");
            $this->db->from("Cities");
			$this->db->order_by('name','ASC');
			// $this->db->join("countries", "Citys.id=countries.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleCityData($id){
		$this->db->select("*");
		$this->db->from("Cities");
		$this->db->where("id",$id);
		// $this->db->join("countries", "country_id=Citys.id");
		$query = $this->db->get();
		return $query->result_array();
}
public function addCity($name){
		
	return $this->db->insert('Cities', $name);
	}
	public function update_City($id)
	{
	
		$data = array(
			'sortname' => $this->input->post('Shortname'),
			'name' => $this->input->post('example-text-input'),
		);
		// print_r($id);die();
		$query = $this->db->update('Citys',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function delete_City($id)
	{
		$this -> db -> where('id', $id);
    	$this -> db -> delete('Cities');
		return $this->db->affected_rows();
	}
	public function update_Citys($id)
	{
	
		$data = array(
			'name' => $this->input->post('Cityname'),
			'country_id' => $this->input->post('countryid'),
		);
		// print_r($id);die();
		// print_r($data);die();
		$query = $this->db->update('Cities',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function getStateData($id){
		$this->db->select("*");
		$this->db->from("states");
		$this->db->where("country_id",$id);
		// $this->db->join("countries", "country_id=states.id");
		$query = $this->db->get();
		return $query->result_array();
}
public function getSingleCountryData($id){
	$this->db->select("*");
	$this->db->from("countries");
	$this->db->where("id",$id);
	// $this->db->join("blogdata", "category.blog_id=blogdata.id");
	$query = $this->db->get();
	return $query->result_array();
}
public function getCountryData(){
	$this->db->select("*");
		$this->db->from("countries");
		$this->db->order_by('name','ASC');
		// $this->db->join("subcategory", "category.blog_id=subcategory.id");
		$query = $this->db->get();
		return $query->result_array();
}
}