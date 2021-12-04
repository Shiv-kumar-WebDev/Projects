<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
	}
	
	public function getBlogData(){
		$this->db->select("*");
            $this->db->from("blogdata");
		$this->db->join("category", "category.category_id=blogdata.category_id");
		$q=$this->db->get();
		return $q->result_array();
	}
	public function getBlogData1($id){
		$this->db->select("*");
            $this->db->from("blogdata");
		$this->db->join("category", "category.category_id=blogdata.category_id");
		$this->db->where("id",$id);
		$q=$this->db->get();
		return $q->result_array();
	}
	public function getPopularPostData(){
		$this->db->select("*");
            $this->db->from("blogdata");
		$this->db->join("category", "category.category_id=blogdata.category_id");
		// $this->db->where("id",$id);
		$this->db->where("popular_post",1);
		$q=$this->db->get();
		return $q->result_array();
	}
	public function getSliderAllData(){
		$q=$this->db->get('slider');
		return $q->result_array();

		// $this->db->select("*");
        //     $this->db->from("slider");
        //     $this->db->where("slider_id",$id);
		// 	// $this->db->join("category", "category.category_id=id");
		// 	// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
        //     $query = $this->db->get();
        //     return $query->result_array();
	}
	public function getSliderData1(){
		$this->db->select("*");
            $this->db->from("slider");
            // $this->db->where("slider_id",$id);
			$this->db->join("category", "category.category_id=slider.category_id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSliderData($id){
		$this->db->select("*");
            $this->db->from("slider");
            $this->db->where("slider_id",$id);
			// $this->db->join("category", "category.category_id=id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCategoryData(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->order_by('category_name','ASC');
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	
	public function fetch_subcategory($category_id){
		$this->db->where('category_id',$category_id);
		$this->db->order_by('name','ASC');
		$query=$this->db->get('subcategory');
		$output='<option value="">Select subcategory</option>';
		foreach($query->result() as $row){
			$output.='<option value="'.$row->subcategory_id.'">'.$row->name.'</option>';
		}
		return $output;
	}

	public function getCategoryData1(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->where("category.status",1);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCommentData($id){
		$this->db->select("*");
            $this->db->from("comment");
			$this->db->where("comment_status",1);
			$this->db->where("blog_id",$id);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getAllCommentData(){
		$this->db->select("*");
            $this->db->from("comment");
			// $this->db->where("comment_status",1);
			// $this->db->join("subcategory", "category.blog_id=subcategory.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getCategoryDatainBlog(){
		$this->db->select("*");
            $this->db->from("category");
			$this->db->join("subcategory", "subcategory.category_id=category.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}

	public function getSubcategoryData(){
		$this->db->select("subcategory.*,category.category_name,category.category_id");
            $this->db->from("subcategory");
			$this->db->join("category", "category.category_id=subcategory.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	


	public function addcategory($name){
		
		return $this->db->insert('category', $name);
	}
	public function addcomment($name){

		// print_r($name);die();
		
		return $this->db->insert('comment', $name);
	}
	public function addblog($name){
		
		return $this->db->insert('blogdata', $name);
	}
	public function addslider($name){
		
		return $this->db->insert('slider', $name);
	}
	public function addsubcategory($name){
		// print_r($name);die();
		return $this->db->insert('subcategory', $name);
	}
	public function getSingleCategoryData($id){
			$this->db->select("*");
            $this->db->from("category");
            $this->db->where("category_id",$id);
			// $this->db->join("blogdata", "category.blog_id=blogdata.id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleBlogData($id){
			$this->db->select("*");
            $this->db->from("blogdata");
            $this->db->where("id",$id);
			// $this->db->join("category", "category.category_id=id");
			// $this->db->join("subcategory", "subcategory.subcategory_id=category.category_id");
            $query = $this->db->get();
            return $query->result_array();
	}
	public function getSingleSubCategoryData($id){
			// echo $id;die();
			$this->db->select("*");
            $this->db->from("subcategory");
            $this->db->where("subcategory_id",$id);
			// $this->db->join("blogdata", "category.blog_id=blogdata.id");
            $query = $this->db->get();
            return $query->result_array();
	}


	public function update_category($id)
	{
	
		$data = array(
			'category_name' => $this->input->post('Categoryname'),
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('category',$data,['category_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_blog($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_blog($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_comment($id)
	{
	
		$data = array(
			'comment_status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('comment',$data,['comment_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_comment($id)
	{
	
		$data = array(
			'comment_status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('comment',$data,['comment_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_slider($id)
	{
	
		$data = array(
			'slider_status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_slider($id)
	{
	
		$data = array(
			'slider_status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_inactive_blog_post($id)
	{
	
		$data = array(
			'popular_post' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_status_active_blog_post($id)
	{
	
		$data = array(
			'popular_post' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcat_status_inactive($id)
	{
	
		$data = array(
			'status' => 0,
		);
		// print_r($id);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcat_status_active($id)
	{
	
		$data = array(
			'status' => 1,
		);
		// print_r($id);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_blog($id)
	{
	
		$data = array(
			'imgSrc' => $this->input->post('Imgname'),
			'title' => $this->input->post('title'),
			'date' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_blog_data($id)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'title' => $this->input->post('title'),
			'blog_description' => $this->input->post('Description'),
			'popular_post' => $this->input->post('popular_post'),
			'created_at' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_blog_data1($id, $new_name)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'title' => $this->input->post('title'),
			'blog_description' => $this->input->post('Description'),
			'popular_post' => $this->input->post('popular_post'),
			'created_at' => $this->input->post('date'),
			// 'imgSrc' => $new_name;
		);
		// print_r($id);die();
		$query = $this->db->update('blogdata',$data,['id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_slider_data($id)
	{
	
		$data = array(
			'category_id' => $this->input->post('Categoryid'),
			'subcategory_id' => $this->input->post('SubCategoryid'),
			'slider_title' => $this->input->post('title'),
			'created_at' => $this->input->post('date'),
		);
		// print_r($id);die();
		$query = $this->db->update('slider',$data,['slider_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function update_subcategory($id)
	{
	
		$data = array(
			'name' => $this->input->post('SubCategoryname'),
			'category_id' => $this->input->post('Categoryid'),
		);
		// print_r($id);die();
		// print_r($data);die();
		$query = $this->db->update('subcategory',$data,['subcategory_id'=>$id]);
		// print_r($this->db->affected_rows());die();
		return $this->db->affected_rows();
	}
	public function delete_category($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('category_id', $id);
    	$this -> db -> delete('category');
		$this -> db -> where('category_id', $id);
    	$this -> db -> delete('subcategory');
		return $this->db->affected_rows();
	}
	public function delete_blog($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('id', $id);
    	$this -> db -> delete('blogdata');
		return $this->db->affected_rows();
	}
	public function delete_slider($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('slider_id', $id);
    	$this -> db -> delete('slider');
		return $this->db->affected_rows();
	}
	public function delete_subcategory($id)
	{
	
		// $data = array(
		// 	'category_name' => $this->input->post('Categoryname'),
		// );
		// print_r($id);die();
		// print_r($data);die();
		// print_r($this->db->affected_rows());die();
		$this -> db -> where('subcategory_id', $id);
    	$this -> db -> delete('subcategory');
		return $this->db->affected_rows();
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
		public function getprofile($id)
	{
		$this->db->select("*");
		$this->db->from("create_admin");
		$this->db->where("id",$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function DoChangeProfile($datanew,$id)
	{
		$this->db->where("id",$id);
		return $this->db->update('create_admin',$datanew);
	}
	public function Checkoldpass($id,$data)
	{
		$this->db->select("*");
		$this->db->from("create_admin");
		$this->db->where("id",$id);
		$this->db->where("password",$data['opass']);

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
	public function DoChangePassword($datanew,$aid)
	{
		$this->db->where("id",$aid);
		return $this->db->update('create_admin',$datanew);
	}
}