<?php
    class Coach_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function update_user($id)
        {
            $this->load->helper('url');
            $data = array(
				'name' => $this->input->post('name'),
				'number' => $this->input->post('number'),
				'email' => $this->input->post('email'),
				'subject_id' => $this->input->post('sub_id'),
                'updated'     => time()
			);
			//  print_r($data);die();
			$query = $this->db->update('user',$data,['id'=>$id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
        
        public function getprofile($id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('user',array('id' => $id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        public function getsub() 
        {
            $this->db->select("*");
            $this->db->from("subject");
            $this->db->where("subject.status", 1);
            $query = $this->db->get();
            return $query->result_array();
        }
        public function getreq($id) 
        {
            $this->db->select("*");
            $this->db->from("interest");
            $this->db->where("interest.coach_id", $id);
            $this->db->join("user", "interest.student_id=user.id");
            $query = $this->db->get();
            
            return $query->result_array();
        }
        public function getreqdata($id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('interest',array('coach_id' => $id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        public function update_strjct($st_id,$co_id)
        {
            
            $this->load->helper('url');
            $data = array(
				'status' => 2
			);
			//  print_r($co_id);die();
			$query = $this->db->update('interest',$data,['student_id'=>$st_id,'coach_id'=>$co_id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
        public function update_stacpt($st_id,$co_id)
        {
            $this->load->helper('url');
            $data = array(
				'status' => 1
			);
			// print_r($data);die();
			$query = $this->db->update('interest',$data,['student_id'=>$st_id,'coach_id'=>$co_id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
        public function stview($st_id,$co_id)
        {
            // print_r($id);
            $this->load->helper('url');
            $query = $this->db->get_where('comments',array('student_id' => $st_id,'coach_id' => $co_id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        public function getstprofile($st_id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('user',array('id' => $st_id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        public function addtime($co_id)
        {
            $this->load->helper('url');
            $this->load->helper('date');
            // print_r($this->input->post('student_id'));die();
            $data = array(
                'hours'    => $this->input->post('hours'),
                'daydate'  => $this->input->post('daydate'),
                'student_id'  => $this->input->post('student_id'),
                'coach_id'  => $co_id,
                'costatus'   => 0
            );
            // print_r($this->db->insert('user', $data));die();
            return $this->db->insert('comments', $data);
        }
	
        
    }
        
?>