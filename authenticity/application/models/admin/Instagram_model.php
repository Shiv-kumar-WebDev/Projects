<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Instagram_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();	
	}

	public function getinstapost() {

        $this->db->select("*");

        $this->db->from("instagram");
        
        $this->db->order_by("instagram_id", "DESC");

        $query = $this->db->get();

        return $query->result_array();

    }

	public function DoAddPost($datanew) 
	{ 
        return $this->db->insert('instagram', $datanew);
	}

	
	public function DogetStatus($id) {

        $this->db->select("*");

        $this->db->from("instagram");

        $this->db->where("instagram_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditStatus($datanew, $id) {

        $this->db->where("instagram_id", $id);

        return $this->db->update("instagram", $datanew);

    }

    public function DoDeleteStatus($id) {

        $this->db->where("instagram_id", $id);

        return $this->db->delete("instagram");

    }

}