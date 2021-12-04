<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Dashboard_model extends CI_Model
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
	public function DoChangePassword($datanew,$aid)
	{
		$this->db->where("admin_id",$aid);
		return $this->db->update('admin_login',$datanew);
	}
	public function Getuser()
	{
		$this->db->select("*");
		$this->db->from("user");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function getslider()
	{
		$this->db->select("slider_id");
		$this->db->from("slider");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function getevents()
	{
		$this->db->select("news_events-id");
		$this->db->from("news_events");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function getgallery()
	{
		$this->db->select("gallery_id");
		$this->db->from("gallery");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function gettopper()
	{
		$this->db->select("toppers_id");
		$this->db->from("toppers");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getorder()
	{
		$this->db->select("*");
		$this->db->from("orders");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getcategory()
	{
		$this->db->select("*");
		$this->db->from("category");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getproduct()
	{
		$this->db->select("*");
		$this->db->from("product");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	
	public function gettodayorder($todaydate)
	{
		$this->db->select("*");
		$this->db->from("orders");
		$this->db->where("order_date",$todaydate);
		$this->db->join("user", "orders.userid=user.user_id");
		$query =  $this->db->get();
		
	    return $query->result_array();
	}

	//profile get
	public function getprofile($id)
	{
		$this->db->select("*");
		$this->db->from("admin_login");
		$this->db->where("admin_id",$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	//profile change
	public function DoChangeProfile($datanew,$id)
	{
		$this->db->where("admin_id",$id);
		return $this->db->update('admin_login',$datanew);
	}

	


	

}
