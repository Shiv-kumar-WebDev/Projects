<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
		// $this->load->database();
	}
	
	public function add_user($datanew) 
	{
		// print_r($datanew);die();
        return $this->db->insert('users', $datanew);
	}
    
}