<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');

class Category_model extends CI_Model

{

	public function __construct()
        {
		parent::__construct();	
	}

	

	public function DoAddCategory($datanew) 
	{
            return $this->db->insert('category', $datanew);
        }

    public function getmaincategroy(){
            $this->db->select('*');
            $this->db->from('maincategory');
            $this->db->where('maincatstatus',1);
            $this->db->order_by('updated',"desc");
            $query = $this->db->get();
            return $query->result_array(); 
    }
        
	public function getcategory() 

	{

        $this->db->select("*");

        $this->db->from("category");
        $this->db->join("maincategory", "category.maincategory_id = maincategory.maincategory_id","left");
        $this->db->order_by('category.updated',"desc");
        $query = $this->db->get();
        return $query->result_array();

	}

	public function edit_category($id) {

        $this->db->select("*");

        $this->db->from("category");

        $this->db->where("category_id", $id);
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->row_array();

    }

	public function getImageidCategory($id) {

        $this->db->select("*");

        $this->db->from("category");

        $this->db->where("category_id", $id);
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->result_array();

    }

	public function DoUpdateCategory($datanew,$id) 

	{

        $this->db->where("category_id", $id);

        return $this->db->update("category", $datanew);

    }

	public function DogetStatus($id) {

        $this->db->select("*");

        $this->db->from("category");

        $this->db->where("category_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditStatus($datanew, $id) {

        $this->db->where("category_id", $id);

        return $this->db->update("category", $datanew);

    }

    public function DeleteStatus($id) {

        $this->db->where("category_id", $id);
        return $this->db->delete("category");

    }

	//slider query start
	
	public function getImageilogo($id) {

        $this->db->select("*");

        $this->db->from("tbl_logo");

        $this->db->where("id", $id);

        $query = $this->db->get();

        return $query->result_array();

    }
	
	public function DoUpdatelogo($datanew,$id) 

	{
// echo $id;die;
        $this->db->where("id", $id);

        return $this->db->update("tbl_logo", $datanew);

    }


public function edit_logo($id) {

        $this->db->select("*");

        $this->db->from("tbl_logo");

        $this->db->where("id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }
	
		public function getlogo() 

	{

        $this->db->select("*");
        $this->db->from("tbl_logo");
		
        $query = $this->db->get();

        return $query->row_array();

	}

	public function DoAddSlider($datanew) 

	{

        return $this->db->insert('slider', $datanew);

    }

	public function getslider() 

	{

        $this->db->select("slider.*,maincategory.maincategory_name_en,category.name_en,subcategory.subcategory_name_en");
        $this->db->from("slider");
        $this->db->join('maincategory', 'maincategory.maincategory_id = slider.maincat_id','left');
		$this->db->join('category', 'category.category_id = slider.cat_id','left');
        $this->db->join('subcategory', 'subcategory.subcategory_id = slider.sub_cat_id','left');
       $this->db->order_by("slider.slider_id", "desc");
        $query = $this->db->get();

        return $query->result_array();

	}

	public function edit_slider($id) {

        $this->db->select("*");

        $this->db->from("slider");

        $this->db->where("slider_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function getImageidSlider($id) {

        $this->db->select("*");

        $this->db->from("slider");

        $this->db->where("slider_id", $id);

        $query = $this->db->get();

        return $query->result_array();

    }

	public function DoUpdateSlider($datanew,$id) 

	{

        $this->db->where("slider_id", $id);

        return $this->db->update("slider", $datanew);

    }


    public function getsubcatgrory($id){
        $this->db->select("*");

        $this->db->from("subcategory");

        $this->db->where("categroy_id", $id);
        $this->db->order_by('updated',"desc");

        $query = $this->db->get();

        return $query->result_array();
    }
    public function getImageidsliderdata($id) 
    {
        $this->db->select("*");
        $this->db->from("slider");
        $this->db->where("slider_id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function Dodeleteslider($id)
    {
        $this->db->where("slider_id", $id);
        return $this->db->delete("slider");
    } 
    

}