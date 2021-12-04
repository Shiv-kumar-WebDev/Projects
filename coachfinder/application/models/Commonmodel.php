<?php

Class Commonmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
	}
	public function getsub() 
	{
		$this->db->select("*");
		$this->db->from("subject");
		$this->db->where("subject.status", 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function register_user()
	{
		$this->load->helper('url');
		$this->load->helper('date');
		date_default_timezone_set("asia/kolkata");
		$now = $this->input->post('password');
		$password=sha1($now);
		// print_r($password);die();
		$data = array(
			'name'        => $this->input->post('name'),
			'number'  => $this->input->post('number'),
			'email'       => $this->input->post('email'),
			'password'    => $password,
			'type'        => $this->input->post('type'),
			'status'      => 1,
			'created'     => time(),
			'updated'     => time()
		);
		// print_r( $data);die();
		return $this->db->insert('user', $data);
	}
	public function register_coachuser()
	{
		$this->load->helper('url');
		$this->load->helper('date');
		date_default_timezone_set("asia/kolkata");
		$now = $this->input->post('password');
		$password=sha1($now);
		// print_r($password);die();
		$data = array(
			'name'        => $this->input->post('name'),
			'number'  => $this->input->post('number'),
			'email'       => $this->input->post('email'),
			'password'    => $password,
			'type'        => $this->input->post('type'),
			'subject_id'     => $this->input->post('subject'),
			'status'      => 1,
			'created'     => time(),
			'updated'     => time()
		);
		// print_r($data);die();
		return $this->db->insert('user', $data);
	}
	
	public function login_compare($email,$pass)
	{
		$password=sha1($pass);
		$query = $this->db->get_where('user',array('email' => $email,'password' => $password,'status' => 1	));
		// print_r($query->result_array());die();
		return $query->result_array();
	}

	public function email_compare($email)
	{
		$query = $this->db->get_where('user',array('email' => $email));
		//  print_r($query->result_array());die();
		return $query->result_array();
	}

	public function id_compare($id)
	{
		$query = $this->db->get_where('user',array('id' => $id));
		//  print_r($query->result_array());die();
		return $query->result_array();
	}
	
	public function update_userpass($id)
	{
		$this->load->helper('url');
		$now = $this->input->post('newpassword');
		$password=sha1($now);
		$data = array(
			'password' => $password				
		);
		// print_r($id);die();
		$query = $this->db->update('user',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
    // public function update_user($id)
    //     {
    //         $this->load->helper('url');
    //         $data = array(
	// 			'name' => $this->input->post('name'),
	// 			'number' => $this->input->post('number'),
	// 			'email' => $this->input->post('email')
	// 		);
	// 		// print_r($data);die();
	// 		$query = $this->db->update('user',$data,['id'=>$id]);
	// 		// print_r($this->db->affected_rows());die();
    //         return $this->db->affected_rows();
	//     }
	// public function user_interest($coach_id,$user_id)
	// {
	// 	$this->load->helper('url');
	// 	$data = array(
	// 		'coach_id'      => $coach_id,
	// 		'student_id'    => $user_id,
	// 		'status'      => 0
	// 	);
	// 	return $this->db->insert('interest', $data);
	// }
    
	
}