<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function doregister($datanew) 
	{
         return $this->db->insert('user', $datanew);
	}
    public function login_compare($email,$pass)
    {
        $password=sha1($pass);
        $query = $this->db->get_where('user',array('user_email' => $email,'user_password' => $password,'user_status' => 1 ));
        return $query->result_array();
    }
    public function getuser($id) {
        
        $this->db->select("*");
        $this->db->from('user');  
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function checkdata($email,$num) {
        
        $this->db->select("*");
        $this->db->from('user');  
        $this->db->where('user_phone',$num);
        $this->db->where('user_email',$email);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_password($email,$pass)
    {   
        $password=sha1($pass);
        $this->load->helper('url');
        $data = array(
            'user_password' => $password
        );
        $query = $this->db->update('user',$data,['user_email'=>$email]);
        return $this->db->affected_rows();
    }
    public function updateRow($table,$data,$condition) {
        $this->db->where($condition);
        $this->db->update($table,$data);
         if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
    }
    public function comparepass($current_password,$user_id) {  
        
        $this->db->select("*");
        $this->db->from('user');  
        $this->db->where('user_id',$user_id);
        $this->db->where('user_password',$current_password);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function doaddress($datanew) 
    {
         return $this->db->insert('address', $datanew);
    }
    public function getaddress($id) {
        
        $this->db->select("*");
        $this->db->from('address');  
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
	public function AddressList($user_id,$address_id){
    
        $this->db->select("*");
        $this->db->from('address');  
        $this->db->where('user_id',$user_id);
        $this->db->where('address_id',$address_id);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    public function doupdateadd($datanew,$user_id,$address_id)
    {   
        $query = $this->db->update('address',$datanew,['user_id'=>$user_id,'address_id'=>$address_id]);
        return $this->db->affected_rows();
    }
}