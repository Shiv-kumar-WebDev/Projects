<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Topper_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function Checkoldpass($id,$data)
	{
		$this->db->select("*");
		$this->db->from("admin_login");
		$this->db->where("admin_id",$id);
		$this->db->where("password",md5($data['opass']));

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
	
	public function getToppersAllData(){
		$q=$this->db->get('toppers');
		return $q->result_array();

	
		
	}
	public function getToppers10thData(){

		$this->db->select("*");
            $this->db->from("toppers");
            $this->db->where("toppers_class",10);
            $query = $this->db->get();
            return $query->result_array();

	
		
	}
	public function getToppers12thData(){

		$this->db->select("*");
            $this->db->from("toppers");
            $this->db->where("toppers_class",12);
            $query = $this->db->get();
            return $query->result_array();

	
		
	}

	


	public function addtopper($name){
		
		return $this->db->insert('toppers', $name);
	}

	public function update_status_inactive_topper($id)
	{
	
		$data = array(
			'toppers_status' => 0,
		);
		$query = $this->db->update('toppers',$data,['toppers_id'=>$id]);
		return $this->db->affected_rows();
	}
	public function update_status_active_topper($id)
	{
	
		$data = array(
			'toppers_status' => 1,
		);
		$query = $this->db->update('toppers',$data,['toppers_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function getTopperData($id){
		$this->db->select("*");
            $this->db->from("toppers");
            $this->db->where("toppers_id",$id);
            $query = $this->db->get();
            return $query->result_array();
	}

	public function update_toppers_data($id,$data)
	{
		$query = $this->db->update('toppers',$data,['toppers_id'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_topper($id)
	{
		$this -> db -> where('toppers_id', $id);
    	$this -> db -> delete('toppers');
		return $this->db->affected_rows();
	}
}
