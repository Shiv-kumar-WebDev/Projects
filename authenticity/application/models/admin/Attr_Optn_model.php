<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');

class Attr_Optn_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
        
        public function getattr_optn()
        {
            $this->db->select('*');
            $this->db->from('attr_optn');
            $this->db->join('attr', 'attr.attr_id = attr_optn.attribute_id');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function getattr(){
            $this->db->select('*');
            $this->db->from('attr');
            $this->db->where('attr_status',1);
            $query = $this->db->get();
           
            return $query->result_array(); 
        }
        
        public function DoAddAttr_Optn($postData){
            
            $result=$this->db->insert('attr_optn',$postData);
            return $result;
        }
        public function edit_attr_optn($id){
            $this->db->select("*");

            $this->db->from("attr_optn");

            $this->db->where("optn_id", $id);

            $query = $this->db->get();
            
            return $query->row_array();
        }
    
        public function DoUpdateAttr_optn($datanew, $id){
            
            $this->db->where("optn_id", $id);
            return $this->db->update("attr_optn", $datanew);
        }  
        
        public function DeleteAttr_Optn($id){
            
            $this->db->where("optn_id", $id);
            return $this->db->delete("attr_optn");
           
        } 
        public function status_active_deactive($id,$datacode)
        {
            $this->db->where("optn_id", $id);
            return $this->db->update("attr_optn", $datacode);
        }
}

