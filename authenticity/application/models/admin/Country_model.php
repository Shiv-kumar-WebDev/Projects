<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Country_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();	
	}

	public function getcountrylist() {

        $this->db->select("*");

        $this->db->from("country");
        
        $this->db->order_by("country_id", "DESC");

        $query = $this->db->get();

        return $query->result_array();

    }
	public function doAddCountry($datanew) 
	{ 
        return $this->db->insert('country', $datanew);
	}

	
	public function DogetStatus($id) {

        $this->db->select("*");

        $this->db->from("country");

        $this->db->where("country_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

	public function DoEditStatus($datanew, $id) {

        $this->db->where("country_id", $id);

        return $this->db->update("country", $datanew);

    }

    public function DoDeleteStatus($id) {

        $this->db->where("country_id", $id);

        return $this->db->delete("country");

    }




    ## country weight
    public function getcountry() {

        $this->db->select("*");

        $this->db->from("country");
        $this->db->where("country_status",1);     

        $query = $this->db->get();

        return $query->result_array();

    }

    public function doAddCountryWeight($datanew) 
    { 
        return $this->db->insert('country_weight', $datanew);
    }

    public function getweightlist() {

        $this->db->select("*");
        $this->db->from("country_weight");
        $this->db->join("country", "country_weight.country_id = country.country_id","left");        
        $this->db->order_by("c_weight_id", "DESC");
        $query = $this->db->get();
        return $query->result_array();

    }

    public function DeleteWeightStatus($id) {

        $this->db->where("c_weight_id", $id);

        return $this->db->delete("country_weight");

    }

    
    public function GetWeightStatus($id) {

        $this->db->select("*");

        $this->db->from("country_weight");

        $this->db->where("c_weight_id", $id);

        $query = $this->db->get();

        return $query->row_array();

    }

    public function WeightEditStatus($datanew, $id) {

        $this->db->where("c_weight_id", $id);

        return $this->db->update("country_weight", $datanew);

    }
    public function getweight($id) {

        $this->db->select("*");
        $this->db->from("country_weight");
        $this->db->join("country", "country_weight.country_id = country.country_id","left");    
        $this->db->where("c_weight_id", $id);
        $query = $this->db->get();
        return $query->row_array();

    }

    public function doUpdateCountryWeight($datanew, $id) {

        $this->db->where("c_weight_id", $id);

        return $this->db->update("country_weight", $datanew);

    }
}