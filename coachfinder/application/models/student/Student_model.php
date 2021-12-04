<?php
    class Student_model extends CI_Model {

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
                'updated'     => time()
			);
			// print_r($id);die();
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
        public function getinterest($id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('interest',array('student_id' => $id));
		   return $query->result_array();
        }
        public function getcoach()
        {
            $this->db->select("*");
            $this->db->from("user");
            $this->db->where("user.type", 2);
            $this->db->where("user.status", 1);
            $this->db->join("subject", "user.subject_id=subject.sub_id");
            $query = $this->db->get();
            // print_r($query->result_array());die();
            return $query->result_array();
        }
        public function user_interest($coach_id,$user_id)
        {
            $this->load->helper('url');
            $data = array(
                'coach_id'      => $coach_id,
                'student_id'    => $user_id,
                'status'      => 1
            );
            return $this->db->insert('interest', $data);
        }
        public function getcoprofile($co_id)
        {
            $this->db->select("*");
            $this->db->from("user");
            $this->db->where("user.id", $co_id);
            $this->db->join("subject", "user.subject_id=subject.sub_id");
            $query = $this->db->get();
            // print_r($query->result_array());die();
            return $query->result_array();
        }
        public function getcomment($id) 
        {
            $this->db->select("*");
            $this->db->from("comments");
            $this->db->where("comments.student_id", $id);
            $this->db->join("user", "comments.coach_id=user.id");
            $query = $this->db->get();
            // print_r($query->result_array());die();
            // $this->db->select("comments.comment_id,comments.coach_id,comments.student_id,comments.hours,comments.daydate,comments.costatus");
            
            return $query->result_array();
        }
        public function get_comment($id,$co_id) 
        {
            $this->db->select("*");
            $this->db->from("comments");
            $this->db->where("comments.student_id", $id);
            $this->db->where("comments.coach_id", $co_id);
            $this->db->join("user", "comments.coach_id=user.id");
            $query = $this->db->get();
            // print_r($query->result_array());die();
            // $this->db->select("comments.comment_id,comments.coach_id,comments.student_id,comments.hours,comments.daydate,comments.costatus");
            
            return $query->result_array();
        }
        public function getcomdata($id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('comments',array('student_id' => $id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        
        public function update_corjct($st_id,$co_id,$com_id)
        {
            
            $this->load->helper('url');
            $data = array(
				'costatus' => 2
			);
			//  print_r($co_id);die();
			$query = $this->db->update('comments',$data,['student_id'=>$st_id,'coach_id'=>$co_id,'comment_id'=>$com_id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
        public function update_coacpt($st_id,$co_id,$com_id)
        {
            $this->load->helper('url');
            $data = array(
				'costatus' => 1
			);
			// print_r($data);die();
			$query = $this->db->update('comments',$data,['student_id'=>$st_id,'coach_id'=>$co_id,'comment_id'=>$com_id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
        public function getuser($id)
        {
            $this->load->helper('url');
            $query = $this->db->get_where('user',array('id' => $id));
		    // print_r($query->result_array());die();
		   return $query->result_array();
        }
        public function addrating($user_id)
        {
            $this->load->helper('url');
            $co_id = $this->input->post('co_id');
            $ratedIndex = $this->input->post('ratedIndex')+1;
            $data = array(
                'coach_id'      => $co_id,
                'student_id'    => $user_id,
                'rating'      => $ratedIndex
            );
            // print_r($data);die();
            return $this->db->insert('rating', $data);
        }
    }
        
?>