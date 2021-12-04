<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');

class Waste_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function get_waste() 
	{
        $this->db->select("*");
        $this->db->from("waste");
        $this->db->order_by('waste_id',"desc");
        $query = $this->db->get();
        return $query->result_array();
	}
	public function fetch($table,$cond='',$select='*', $limit = NULL, $offset = NULL)
	{
		if($cond)
		{
			$where = '1 '.$cond;
			$this->db->where($where, null, false);
		}
		$this->db->select($select);
		if($limit>=0)
		{
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get($table);
		//echo  $this->db->last_query();
		return $query->result();
	}
	public function insert($table,$data)
    {
        $this->db->insert($table, $data);
        $insetid = $this->db->insert_id();
        return $insetid;
    }
	
	/** Insert batch data in table*/


	public function insertbatch($table,$data)
    {
        $this->db->insert_batch($table, $data);
        $insetid = $this->db->insert_id();
        return $insetid;
    }
    public function updateStock($id,$variant_id,$qty)
	{
		
		$this->db->set('stock_qty', 'stock_qty-'.$qty,FALSE);
		$this->db->where('product_id', $id);
		$this->db->where('variant_id', $variant_id);
		return $this->db->update('qty_stock');

	}	

	public function getorderproduct($id) 
	{
        $this->db->select("*");
        $this->db->from("waste_products");
		$this->db->where("waste_products.waste_id", $id);
		$this->db->join("product", "waste_products.product_id=product.product_id");
		$this->db->join("variant", "waste_products.variantid=variant.variant_id","left");
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result_array();
	}

    public function getwaste_details($id) 
    {
        $this->db->select("*");
        $this->db->from("waste");
        $this->db->where("waste_id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    	
	public function all_products() 
	{
        $this->db->select("product.product_id,product.proname_en,variant.variant_id,variant.size,variant.color");
        $this->db->from("product");
		$this->db->join("variant", "product.product_id=variant.product_id",'left');
		$this->db->where('product.prostatus', 1);
        $query = $this->db->get();
        return $query->result_array();
	}	
	public function fetchpro($name,$variant_id) 
	{
        $this->db->select("product.product_id,product.price,product.proname_en,variant.variant_id,variant.size,variant.color");
        $this->db->from("product");
		$this->db->join("variant", "product.product_id=variant.product_id",'left');
		$this->db->where('proname_en', $name);
		$this->db->where('variant.variant_id', $variant_id);
		$this->db->where('product.prostatus', 1);
        $query = $this->db->get();
        return $query->result_array();
	}

}