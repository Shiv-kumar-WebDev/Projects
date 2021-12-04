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
		$this->db->order_by('updated',"desc");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getmaincategory()
	{
		$this->db->select("*");
		$this->db->from("maincategory");
		$this->db->order_by('updated',"desc");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getsubcategory()
	{
		$this->db->select("*");
		$this->db->from("subcategory");
		$this->db->order_by('updated',"desc");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function Getproduct()
	{
		$this->db->select("*");
		$this->db->from("product");
		$this->db->order_by('updated',"desc");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function gettodayorder($todaydate)
	{
		$this->db->select("*");
		$this->db->from("orders");
		$this->db->where("order_date",$todaydate);
		$this->db->join("user", "orders.userid=user.user_id");
		$query=$this->db->get();
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
	#####logs
	public function getqty_logs()
	{
		$this->db->select("*");
		$this->db->from("qty_logs");
		$this->db->join("product", "qty_logs.product_id=product.product_id");
		$this->db->join("variant", "qty_logs.variant_id=variant.variant_id","LEFT");
		$this->db->order_by("qty_logid","DESC");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	public function getqty_logbydate($star_date,$end_date)
	{
		$this->db->select("*");
		$this->db->from("qty_logs");
		$this->db->join("product", "qty_logs.product_id=product.product_id");
		$this->db->join("variant", "qty_logs.variant_id=variant.variant_id","LEFT");
		$this->db->where("created BETWEEN $star_date AND $end_date"); 		
		$this->db->order_by("qty_logid","DESC");
	    $query=$this->db->get();
	    return $query->result_array();
	}

	#####ledger
	public function get_ledger($last_month)
	{
		$this->db->select("*");
		$this->db->from("ledger");
		$this->db->join("product", "ledger.product_id=product.product_id");
		$this->db->join("variant", "ledger.variant_id=variant.variant_id","LEFT");
		$this->db->where("month",$last_month);
		$this->db->order_by("id","DESC");
	    $query=$this->db->get();
	    return $query->result_array();
	}
}