<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function getuser() 
	{
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("is_otp_verify",0);
        $query = $this->db->get();
        return $query->result_array();
	}
    public function getreview() 
    {
        $this->db->select("*");
        $this->db->from("user_review");
        $this->db->join("product", "user_review.product_id=product.product_id");
        $query = $this->db->get();
        // print_r($query->result_array());die();
        return $query->result_array();
    }
    public function DogetreviewStatus($id) {
        $this->db->select("*");
        $this->db->from("user_review");
        $this->db->where("review_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function DoEditreviewStatus($datanew, $id) {
        $this->db->where("review_id", $id);
        return $this->db->update("user_review", $datanew);
    }

    public function deletereviewStatus($id) {

        $this->db->where("review_id", $id);
        return $this->db->delete("user_review");

    }
    public function getorders($user_id) 
    {
        $this->db->select("orders.total_price,orders.order_id");
        $this->db->from("orders");
        $this->db->where("userid",$user_id);
        $query = $this->db->get();
        return $query->result_array();
    }    
	public function getuser_unverified() 
	{
        $this->db->select("*");
        $this->db->from("user");
		 $this->db->where("is_otp_verify",1);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function DogetStatus($id) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
	public function DoEditStatus($datanew, $id) {
        $this->db->where("user_id", $id);
        return $this->db->update("user", $datanew);
    }

    public function deleteStatus($id) {

        $this->db->where("user_id", $id);
        return $this->db->delete("user");

    }
	
	
}