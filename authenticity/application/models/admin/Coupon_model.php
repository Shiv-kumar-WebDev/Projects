<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Coupon_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function getcart() 
	{
        $this->db->select("*");
        $this->db->from("cart");
		$this->db->join("user", "cart.userid=user.user_id");
		$this->db->join("product", "cart.productid=product.product_id");
		$this->db->join("variant", "cart.variant_id=variant.variant_id");
		$this->db->join("unit_types", "variant.unit=unit_types.id");

        $query = $this->db->get();
        return $query->result_array();
	}

	public function DoAddCoupon($datanew) 
	{
        return $this->db->insert('coupons', $datanew);
    }
    public function getproducts() 
    {
        $this->db->select("*");
        $this->db->from("product");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getcat() 
    {
        $this->db->select("*");
        $this->db->from("category");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getcoupon() 
	{
        $this->db->select("*");
        $this->db->from("coupons");
        $this->db->where("deleted", 0);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function edit_coupon($id) 
	{
        $this->db->select("*");
        $this->db->from("coupons");
        $this->db->where("coupon_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
	public function DoUpdatecoupon($datanew,$id) 
	{
        $this->db->where("coupon_id", $id);
        return $this->db->update("coupons", $datanew);
    }
}