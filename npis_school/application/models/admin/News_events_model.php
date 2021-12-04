<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class News_events_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function Checkoldpass($id,$data)
	{
		$this->db->select("*");
		$this->db->from("admin_login");
		$this->db->where("admin_id",$id);
		$this->db->where("password",md5($data['opass']));

			$query = $this->db->get();

			if($query->num_rows() > 0)
				{
					return $query->row_array();
				}
				else
				{
					return false;
				}
		
	}
	
	public function getnewsAllData(){
		$q=$this->db->get('news_events');
		return $q->result_array();

		
	}

	public function addnews($name){
		
		return $this->db->insert('news_events', $name);
	}

	public function update_status_inactive_news($id)
	{
	
		$data = array(
			'news_events_status' => 0,
		);
		
		$query = $this->db->update('news_events',$data,['news_events-id'=>$id]);
		
		return $this->db->affected_rows();
	}
	public function update_status_active_news($id)
	{
	
		$data = array(
			'news_events_status' => 1,
		);
		
		$query = $this->db->update('news_events',$data,['news_events-id'=>$id]);
		return $this->db->affected_rows();
	}

	public function getNewsData($id){
		$this->db->select("*");
            $this->db->from("news_events");
            $this->db->where("news_events-id",$id);
            $query = $this->db->get();
            return $query->result_array();
	}

	public function update_news_data($id)
	{
	
		$data = array(

			'news_events_title' => $this->input->post('title'),
			'created_at' => $this->input->post('date'),
		);
		
		$query = $this->db->update('news_events',$data,['news_events-id'=>$id]);
		
		return $this->db->affected_rows();
	}

	public function delete_news($id)
	{
		$this -> db -> where('news_events-id', $id);
    	$this -> db -> delete('news_events');
		return $this->db->affected_rows();
	}
}
