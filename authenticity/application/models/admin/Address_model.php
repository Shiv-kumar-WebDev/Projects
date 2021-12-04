<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Address_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function getaddress() 
	{
        $this->db->select("*");
        $this->db->from("address");
		$this->db->join("user", "address.userid=user.user_id");
        $query = $this->db->get();
        return $query->result_array();
	}
	
}