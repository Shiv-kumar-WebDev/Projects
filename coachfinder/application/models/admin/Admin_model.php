<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function login_compare($email,$password)
        {
            $query = $this->db->get_where('create_admin',array('email' => $email, 'password' => $password));
            return $query->result_array();

        }
        public function update_pass($email)
        {
            $this->load->helper('url');
            $data = array(
                'password' => $this->input->post('password')
            );
            $query = $this->db->update('create_admin',$data,['email'=>$email]);
            return $this->db->affected_rows();
        }
        
        public function update_password($id,$password)
        {
            $this->load->helper('url');
            $data = array(
                'password' => $this->input->post('newpassword')
            );
            //print_r($data); die();
            $query = $this->db->update('create_admin',$data,['id'=>$id, 'password' =>$password]);
            // $row=$this->db->affected_rows();print_r($row); die();
            return $this->db->affected_rows();
        }
        public function fetchst()
        {
            $query = $this->db->get_where('user',array('type' => 3));
            // print_r($query->result_array());die();
            return $query->result_array();
        }
        public function fetchco()
        {
            $query = $this->db->get_where('user',array('type' => 2));
            // print_r($query->result_array());die();
            return $query->result_array();
        }
        public function fetchsub()
        {
            $query = $this->db->get('subject');
            // print_r($query->result_array());die();
            return $query->result_array();
        }
        public function cogetstatus($id)
        {
            $query = $this->db->get_where('user',array('id' => $id));
            // print_r($query->result_array());die;
            return $query->result_array();
        }
        public function costatus($data,$id)
        {   
            // print_r($data);die;
            $query = $this->db->update('user',$data,['id'=>$id]);
            return $this->db->affected_rows();
        }
        public function ststatus($data,$id)
        {   
            // print_r($data);die;
            $query = $this->db->update('user',$data,['id'=>$id]);
            return $this->db->affected_rows();
        }
        public function getsub($id)
        {
            $query = $this->db->get_where('subject',array('sub_id' => $id));
            // print_r($query->result_array());die;
            return $query->result_array();
        }
        public function substatus($data,$id)
        {   
            // print_r($data);die;
            $query = $this->db->update('subject',$data,['sub_id'=>$id]);
            return $this->db->affected_rows();
        }
        public function doaddsub()
        {
            $data = array(
                'sub_name'        => $this->input->post('sub_name'),
                'status'      => 1,
                'created'     => time(),
                'updated'     => time()
            );
            // print_r($data);die();
            return $this->db->insert('subject', $data);
        }
        public function fetchsubyid($id)
        {
            $query = $this->db->get_where('subject',array('sub_id' => $id));
            // print_r($query->result_array());die;
            return $query->result_array();
        }
        public function doeditsub()
        {   
            $sub_id =$this->input->post('sub_id');
            $data = array(
                'sub_name'        => $this->input->post('sub_name'),
                'updated'     => time()
            );
            $query = $this->db->update('subject',$data,['sub_id'=>$sub_id]);
            return $this->db->affected_rows();
        }
	
}
        
?>