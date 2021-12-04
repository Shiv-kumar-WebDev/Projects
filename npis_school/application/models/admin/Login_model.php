<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	//check email 
	public function checkmail($email) 
	{
	    $this->db->select("email");
	    $this->db->from("admin_login");
	    $this->db->where("email",$email);
	    $query = $this->db->get();
	    return $query->row_array();
	}
	public function loginData($data)
	{
		$this->db->select("*");
		$this->db->from("admin_login");
		$this->db->where("email",$data['email']);
		$this->db->where("password",md5($data['password']));

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
}