<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Vendor_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function insert($datanew,$table) 
	{
        $this->db->insert($table, $datanew); 
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
    public function getvendors() 
    {
        $this->db->select("*");
        $this->db->from("vendors");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($id,$datanew,$table,$col){

        $this->db->where($col, $id);
        return $this->db->update($table, $datanew);
    }
    public function update1($id,$datanew,$table,$col,$type){

        $this->db->where($col, $id);
        $this->db->where('user_type', $type);
        return $this->db->update($table, $datanew);
    }public function delete($id,$table,$col){

        $this->db->where($col, $id);
        return $this->db->delete($table);
    }
    public function getClientData($id) 
    {
        $this->db->select("*");
        $this->db->from("clients");
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getclientaddress($id,$type) 
    {
        $this->db->select("*");
        $this->db->from("addresses");
        $this->db->where('user_id', $id);
        $this->db->where('address_type', $type);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getclientaddress1($id,$type)
    {
        $this->db->select("addresses.*,countries.name as country_name,states.name  as state_name,cities.name as city_name");
        $this->db->from("addresses");
        $this->db->join("countries", "addresses.country=countries.id",'LEFT');
        $this->db->join("states", "addresses.state=states.id",'LEFT');
        $this->db->join("cities", "addresses.city=cities.id",'LEFT');
        $this->db->where('user_id', $id);
        $this->db->where('address_type', $type);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getstate($country) 
    {
        $this->db->select("*");
        $this->db->from("states");
        $this->db->where('country_id', $country);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getcity($state) 
    {
        $this->db->select("*");
        $this->db->from("cities");
        $this->db->where('state_id', $state);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getGstData() 
    {
        $this->db->select("*");
        $this->db->from("gst_treatment");
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
	
}