<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Product_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();	
	}

	 

	public function DoAddProduct($datanew) 
	{ 
        $this->db->insert('product', $datanew);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
    public function doAddcategories($datanew) 
    { 
        $this->db->insert('product_categories', $datanew);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function doAddstock($datanew) 
    { 
        $this->db->insert('qty_stock', $datanew);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function checkcategories($product_id,$maincatid,$catid,$subcatid)
    {
        $this->db->select("*");
        $this->db->from("product_categories");
        $this->db->where("product_id", $product_id);
        $this->db->where("maincatid", $maincatid);
        $this->db->where("catid", $catid);
        $this->db->where("subcatid", $subcatid);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function getproductout1()
    {
        $this->db->select("*");
        $this->db->from("qty_stock");
        $this->db->join("variant", "variant.variant_id=qty_stock.variant_id",'LEFT');
        $this->db->join("product", "product.product_id=qty_stock.product_id",'LEFT');
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();        
        return $query->result_array();
    }
    public function getproductout()
    {
        $this->db->select("qty_stock.*,product.proname_en,product.product_id,product.promain_image,variant.variant_id,variant.size,variant.color");
        $this->db->from("product");
        $this->db->join("variant", "variant.product_id=product.product_id",'LEFT');
        $this->db->join("qty_stock", "variant.product_id=qty_stock.product_id and variant.variant_id=qty_stock.variant_id",'LEFT');
        $this->db->order_by('qty_stock.stock_qty',"desc");
        $query = $this->db->get();        
        return $query->result_array();
    }
	public function getproduct_count($product_name_search='')
	{
	    if (isset($_POST['catname']) && $_POST['catname'] != '') {
            $this->db->where('product.catid', $_POST['catname']);
			//$category_serch_id=$_POST['catname'];
        }
        if(!empty($product_name_search))
        {
            
             $this->db->LIKE('product.proname_en', $product_name_search);
        }
		   $this->db->select("*");
            $this->db->from("product");
            $this->db->join("category", "product.catid=category.category_id");
            $this->db->join("subcategory", "product.subcatid=subcategory.subcategory_id",'LEFT');
			$this->db->order_by("product.updated",'desc');
            $query = $this->db->get();
            
            return $query->result_array();
	}
	public function getproduct($product_name_search='')
	{
	    if (isset($_POST['catname']) && $_POST['catname'] != '') {
            $this->db->where('product.catid', $_POST['catname']);
			//$category_serch_id=$_POST['catname'];
        }
        if(!empty($product_name_search))
        {
              $this->db->LIKE('product.proname_en', $product_name_search);
        }
            $this->db->select("*");
            $this->db->from("product");
            $this->db->join("maincategory", "product.maincatid=maincategory.maincategory_id");
            $this->db->join("category", "product.catid=category.category_id");
            $this->db->join("subcategory", "product.subcatid=subcategory.subcategory_id",'LEFT');
            $this->db->where("product.prostatus!=",2);
			$this->db->order_by("product.updated",'desc');

            $query = $this->db->get();
            
            return $query->result_array();
	}
    public function getbycat($cat)
    {
        if (isset($_POST['catname']) && $_POST['catname'] != '') {
            $this->db->where('product.catid', $_POST['catname']);
            //$category_serch_id=$_POST['catname'];
        }
        if(!empty($product_name_search))
        {
              $this->db->LIKE('product.proname_en', $product_name_search);
        }
            $this->db->select("*");
            $this->db->from("product");
            $this->db->join("category", "product.catid=category.category_id");
            $this->db->join("subcategory", "product.subcatid=subcategory.subcategory_id",'LEFT');
            $this->db->where("product.prostatus!=",2);
            $this->db->where("product.catid=",$cat);
            $this->db->order_by("product.updated",'desc');
            //   if ($_POST['length'] != -1){
            // $this->db->limit($_POST['length'], $_POST['start']);
            //   }
            $query = $this->db->get();
            
            return $query->result_array();
    }

    public function get_oos_product_count($product_name_search='')
    {
        if (isset($_POST['catname']) && $_POST['catname'] != '') {
            $this->db->where('product.catid', $_POST['catname']);
            //$category_serch_id=$_POST['catname'];
        }
        if(!empty($product_name_search))
        {
              $this->db->LIKE('product.proname_en', $product_name_search);
        }
            $this->db->select("*");
            $this->db->from("variant");
            $this->db->join("product", "product.product_id=variant.product_id");
            $this->db->join("category", "product.catid=category.category_id");
            $this->db->join("subcategory", "product.subcatid=subcategory.subcategory_id",'LEFT');
            $this->db->where("product.prostatus!=",2);
            $this->db->where("variant.total_qty<=",0);
            $query = $this->db->get();
            
            return $query->result_array();
    }

    public function get_oos_product($product_name_search='')
    {
        if (isset($_POST['catname']) && $_POST['catname'] != '') {
            $this->db->where('product.catid', $_POST['catname']);
            //$category_serch_id=$_POST['catname'];
        }
        if(!empty($product_name_search))
        {
              $this->db->LIKE('product.proname_en', $product_name_search);
        }
            $this->db->select("*");
            $this->db->from("variant");
            $this->db->join("product", "product.product_id=variant.product_id");
            $this->db->join("category", "product.catid=category.category_id");
            $this->db->join("subcategory", "product.subcatid=subcategory.subcategory_id",'LEFT');
            $this->db->where("product.prostatus!=",2);
            $this->db->where("variant.total_qty<=",0);
            $this->db->order_by("product.updated",'desc');
            //   if ($_POST['length'] != -1){
            // $this->db->limit($_POST['length'], $_POST['start']);
            //   }
            $query = $this->db->get();
            
            return $query->result_array();
    }
	



 public function insert_Product_Image($uploadData) 
    {

        if(!empty($uploadData)){ 
            
            // Insert gallery data 
            $insert = $this->db->insert_batch('product_slider_image', $uploadData); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }


 public function insert_Product_Images($uploadData) 
    {

        if(!empty($uploadData)){ 
            
            // Insert gallery data 
            $insert = $this->db->insert_batch('product_images', $uploadData); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
    public function update_Product_Image($uploadData,$id)
    {
        $data = array(
            'product_image_name' => $uploadData[0]['product_image_name'],
            'update_date_time' => $uploadData[0]['create_date_time']
        );
        $query = $this->db->update('product_slider_image',$data,['product_id'=>$id]);
        return $this->db->affected_rows();
        
    }

    // get product images
    public function get_product_image($id){
        $this->db->select("*");

        $this->db->from("product_images");

        $this->db->where("product_id", $id);
        
        $query = $this->db->get();

        return $query->result_array();
    }


	public function edit_product($id) {

        $this->db->select("*");

        $this->db->from("product");

        $this->db->where("product_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }
	public function DoUpdateProduct($datanew,$id) 

	{

        $this->db->where("product_id", $id);

        return $this->db->update("product", $datanew);

    }

	public function DogetStatus($id) {

        $this->db->select("*");

        $this->db->from("product");

        $this->db->where("product_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }
    public function DogetnewStatus($id) {

        $this->db->select("*");

        $this->db->from("product");

        $this->db->where("product_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditStatus($datanew, $id) {

        $this->db->where("product_id", $id);

        return $this->db->update("product", $datanew);

    }

    public function DoDeleteStatus($id) {

        $this->db->where("product_id", $id);

        return $this->db->delete("product");

    }

	public function getcategory() 

	{

        $this->db->select("*");

        $this->db->from("category");

        $this->db->where("status", 1);

        $query = $this->db->get();

        return $query->result_array();

	}

    public function getColors() 
    {
        $this->db->select("*");
        $this->db->from("colors");
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getmaincategory() 

    {

        $this->db->select("*");

        $this->db->from("maincategory");

        $this->db->where("maincatstatus", 1);
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->result_array();

    }

    public function getpro($id) 
    {
        $this->db->select("product.product_id,product.proname_en");
        $this->db->from("product");
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getproductcategories($id) 
    {

        $this->db->select("*");
        $this->db->from("product_categories");
        $this->db->join("product", "product_categories.product_id=product.product_id");
        $this->db->join("maincategory", "product_categories.maincatid=maincategory.maincategory_id","left");
        $this->db->join("category", "product_categories.catid=category.category_id","left");
        $this->db->join("subcategory", "product_categories.subcatid=subcategory.subcategory_id","left");
        $this->db->where("product_categories.product_id", $id);
        $query = $this->db->get();
        return $query->result_array();

    }
	//unit start
	public function getunit() 
	{

        $this->db->select("*");

        $this->db->from("unit_types");

        $query = $this->db->get();

        return $query->result_array();

    }
	//unit add
	public function DoAddunit($datanew) 
	{
		return $this->db->insert('unit_types', $datanew);
	}
	//subunit start
	public function getsubunit($id) 
	{

        $this->db->select("*");

        $this->db->from("subunit_types");
		$this->db->where("unit_id", $id);
		$this->db->join("unit_types", "subunit_types.unit_id=unit_types.id");
        $query = $this->db->get();

        return $query->result_array();

    }
	//getunit start
	public function getunitdata($id) 
	{

        $this->db->select("*");
		$this->db->from("unit_types");
		$this->db->where("id", $id);
        $query = $this->db->get();
		return $query->result_array();

    }
	//subunit add
	public function DoAddsubunit($datanew) 
	{
		return $this->db->insert('subunit_types', $datanew);
	}
	public function DogetsubunitStatus($id) {

        $this->db->select("*");

        $this->db->from("subunit_types");

        $this->db->where("subunit_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditsubunitStatus($datanew, $id) {

        $this->db->where("subunit_id", $id);

        return $this->db->update("subunit_types", $datanew);

    }
    public function getsubcategory($id){
        // print_r($id);die();
        $this->db->select("*");

        $this->db->from("subcategory");

        $this->db->where("category_id", $id);

        $this->db->where("subcatstatus", 1);
		$this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->result_array();
    }
	public function getproductvariant($id) {

        $this->db->select("*");

        $this->db->from("variant");

        $this->db->where("variant.product_id", $id);
		$this->db->join("product", "variant.product_id=product.product_id");
		$this->db->join("unit_types", "variant.unit=unit_types.id");
		//$this->db->join("subunit_types", "variant.subunit=subunit_types.subunit_id");
        $query = $this->db->get();  

        return $query->result_array();

    }
	
    public function getvariant($id) 
    {
        $this->db->select("*");
        $this->db->from("variant");
        // $this->db->join("attr_optn as a", "variant.size=a.optn_id");
        // $this->db->join("attr_optn as b", "variant.color=b.optn_id");
        $this->db->where("product_id", $id);
        $this->db->order_by("variant_id", "DESC");
        $query = $this->db->get();
        
        return $query->result_array();
    }
	
	public function getvariant_out_of_stock($id)
	{
		$this->db->select("*");
		$this->db->from("variant");
		$this->db->where("product_id", $id);
		$this->db->where("total_qty", 0);
		$this->db->join("unit_types", "variant.unit=unit_types.id");
		//$this->db->join("subunit_types", "variant.subunit=subunit_types.subunit_id");
		$this->db->order_by("variant_id", "DESC");
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
    public function getproductname($id) {

        $this->db->select("*");

        $this->db->from("product");

        $this->db->where("product_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }
    public function getattroptn() 
    {

        $this->db->select("*");

        $this->db->from("attr_optn");

        $this->db->where("optn_status", 1);

        $query = $this->db->get();

        return $query->result_array();

    }
	public function DoAddvarint($datanew) 
	{
        $this->db->insert('variant', $datanew);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function DogetvariantStatus($id) {

        $this->db->select("*");

        $this->db->from("variant");

        $this->db->where("variant_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditvariantStatus($datanew, $id) {

        $this->db->where("variant_id", $id);

        return $this->db->update("variant", $datanew);

    }
	public function edit_variant($id) {

        $this->db->select("*");

        $this->db->from("variant");

        $this->db->where("variant_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }
	public function DoUpdatevariant($datanew,$id) 

	{

        $this->db->where("variant_id", $id);

        return $this->db->update("variant", $datanew);

    }
	public function getsubunitlist($id) {

        $this->db->select("*");

        $this->db->from("subunit_types");

        $this->db->where("unit_id", $id);

        $query = $this->db->get();

        return $query->result_array();

    }
	public function getImageidvariant($id) {

        $this->db->select("*");

        $this->db->from("variant");

        $this->db->where("variant_id", $id);

        $query = $this->db->get();

        return $query->result_array();

    }

    function delete($table,$id,$col)
    {
        $this->db->where($col, $id);
        $this->db->delete($table);
        return true;
    }
}