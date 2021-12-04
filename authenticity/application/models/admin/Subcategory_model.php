<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');

class Subcategory_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
        
        public function getsubcategroy()
        {
            $this->db->select('*');
            $this->db->from('subcategory');
            $this->db->join('category', 'category.category_id = subcategory.category_id');
            $this->db->join('maincategory', 'maincategory.maincategory_id = subcategory.maincategory_id');
            $this->db->order_by('subcategory.updated',"desc");
            $query = $this->db->get();
            return $query->result_array();
        }
        public function copied_subcat($id)
        {
            $this->db->select('*');
            $this->db->from('copied_subcategory');
            $this->db->join('category', 'category.category_id = copied_subcategory.catid');
            $this->db->join('maincategory', 'maincategory.maincategory_id = copied_subcategory.maincatid');
            $this->db->join('subcategory', 'subcategory.subcategory_id = copied_subcategory.subcategory_id');
            $this->db->where('copied_subcategory.subcategory_id',$id);
            $this->db->order_by('copied_subcategory.copied_subcatid',"desc");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function getcategroy(){
            $this->db->select('*');
            $this->db->from('category');
            $this->db->where('status','=',1);
            $this->db->order_by('updated',"desc");
            $query = $this->db->get();
           
            return $query->result_array(); 
        }
         public function getmaincategroy(){
            $this->db->select('*');
            $this->db->from('maincategory');
            $this->db->where('maincatstatus',1);
            $this->db->order_by('updated',"desc");
            $query = $this->db->get();
           // print_r($query->result_array());die();
            return $query->result_array(); 
        }
        public function getcat($id){
            $this->db->select("*");

            $this->db->from("category");

            $this->db->where("maincategory_id ", $id);

            $this->db->where("status", 1);
            
            $query = $this->db->get();
    // print_r($query->result_array());die();
            return $query->result_array();
        }

        public function getscat($id){
            $this->db->select("*");

            $this->db->from("subcategory");

            $this->db->where("category_id ", $id);

            $this->db->where("subcatstatus", 1);
            $this->db->order_by('updated',"desc");
            $query = $this->db->get();
    // print_r($query->result_array());die();
            return $query->result_array();
        }

        public function DoAddcategory($postData){
            
            $this->db->insert('subcategory',$postData);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        public function doaddcopiedsubcat($postData){
            
            $this->db->insert('copied_subcategory',$postData);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        public function checksubcat($mainid,$catid,$subcatid){
            $this->db->select("*");
            $this->db->from("copied_subcategory");
            $this->db->where("subcategory_id", $subcatid);
            $this->db->where("maincatid", $mainid);
            $this->db->where("catid", $catid);
            $query = $this->db->get();            
            return $query->row_array();
        }
        public function edit_subcategory($id){
            $this->db->select("*");

            $this->db->from("subcategory");

            $this->db->where("subcategory_id", $id);
            $this->db->order_by('updated',"desc");
            $query = $this->db->get();
            
            return $query->row_array();
        }
        
        public function getImageidCategory($id) {

        $this->db->select("*");

        $this->db->from("subcategory");

        $this->db->where("subcategory_id", $id);
        $this->db->order_by('updated',"desc");
        $query = $this->db->get();

        return $query->result_array();

    }
    
    public function DoUpdatesubcategory($datanew, $id){
        
        $this->db->where("subcategory_id", $id);
        return $this->db->update("subcategory", $datanew);
    }  
    
    public function Dodeletesubcategory($id){
        
        $this->db->where("subcategory_id", $id);
        return $this->db->delete("subcategory");
       
    } 
    public function status_active_deactive($id,$datacode)
    {
        $this->db->where("subcategory_id", $id);
        return $this->db->update("subcategory", $datacode);
    }
}

