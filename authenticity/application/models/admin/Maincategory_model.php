<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');

class Maincategory_model extends CI_Model

{

	public function __construct()
        {
		parent::__construct();	
	}

	

	public function DoAddmaincategory($datanew) 
	{
        // print_r($datanew);die();
            return $this->db->insert('maincategory', $datanew);
        }

	public function getmaincategory() 

	{

        $this->db->select("*");

        $this->db->from("maincategory");
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->result_array();

	}

    

	public function edit_maincategory($id) {
// print_r($id);die();
        $this->db->select("*");

        $this->db->from("maincategory");

        $this->db->where("maincategory_id", $id);

        $query = $this->db->get();
// print_r($query->row_array());die();
        return $query->row_array();

    }

	public function getImageidmaincategory($id) {

        $this->db->select("*");

        $this->db->from("maincategory");

        $this->db->where("maincategory_id", $id);

        $query = $this->db->get();

        return $query->result_array();

    }

	public function DoUpdatemaincategory($datanew,$id) 

	{

        $this->db->where("maincategory_id", $id);

        return $this->db->update("maincategory", $datanew);

    }

	public function DogetStatus($id) {

        $this->db->select("*");

        $this->db->from("maincategory");

        $this->db->where("maincategory_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditStatus($datanew, $id) {

        $this->db->where("maincategory_id", $id);

        return $this->db->update("maincategory", $datanew);

    }

    public function DeleteStatus($id) {

        $this->db->where("maincategory_id", $id);
        return $this->db->delete("maincategory");

    }

	//slider query start
	
	
	
	


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

        $this->db->select("slider.*,maincategory.maincategory_name_en,submaincategory.submaincategory_maincategory_name_en");
        $this->db->from("slider");
		$this->db->join('maincategory', 'maincategory.maincategory_id = slider.cat_id','left');
        $this->db->join('submaincategory', 'submaincategory.submaincategory_id = slider.sub_cat_id','left');
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

        $this->db->from("submaincategory");

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