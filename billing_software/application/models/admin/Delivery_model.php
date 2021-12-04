<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Delivery_model extends CI_Model
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
    public function getclients() 
    {
        $this->db->select("*");
        $this->db->from("clients");
        $this->db->where('status', 1);
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
	
}