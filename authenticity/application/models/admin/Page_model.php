<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Page_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function DoAddPage($datanew) 
	{
        return $this->db->insert('page', $datanew);
    }
	public function getpage() 
	{
        $this->db->select("*");
        $this->db->from("page");
        $query = $this->db->get();
        return $query->result_array();
	}
	public function edit_page($id) {
        $this->db->select("*");
        $this->db->from("page");
        $this->db->where("page_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
	public function DoUpdatePage($datanew,$id) 
	{
        $this->db->where("page_id", $id);
        return $this->db->update("page", $datanew);
    }
	
}