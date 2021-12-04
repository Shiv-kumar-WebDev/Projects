<?php


Class Commonmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    

	function userAuth($args) {
		
        $this->db->select("*")->from('user');
        $this->db->where("email", $args['email']);
        $this->db->where('password',encryptor($args['password']));
        $query = $this->db->get();
        //return $this->db->last_query(); exit;
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function updateStock($id,$variant_id,$qty)
    {
        
        $this->db->set('stock_qty', 'stock_qty-'.$qty,FALSE);
        $this->db->where('product_id', $id);
        $this->db->where('variant_id', $variant_id);
        return $this->db->update('qty_stock');

    }   
    public function check_coupon($coupon,$currdate) 
    {
        $this->db->select("*");
        $this->db->from("coupons");
        $this->db->where("coupon_code", $coupon);
        $this->db->where("expiry_date>=", $currdate);
        // $this->db->where("start_date<=", $currdate);
        $this->db->where("status", 1);
        $this->db->where("deleted !=", 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_coupon_limit($coupon,$uid) 
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("coupon_code", $coupon);
        $query = $this->db->get();
        $total_used =  $query->num_rows();

        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("coupon_code", $coupon);
        $this->db->where("userid", $uid);
        $query = $this->db->get();
        $total_used_by_user =  $query->num_rows();
        //print_r($total_used_by_user); die;
        return ['total_used'=>$total_used,'total_used_by_user'=>$total_used_by_user];
    }

    public function getuser($id) {
		
		$this->db->select("*");
        $this->db->from('user');  
        $this->db->where('user_id',$id);
		$query = $this->db->get();
        return $query->result_array();
    }
    
    public function getcat() {
        
        $this->db->select("*");
        $this->db->from('category');  
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getweight_data($id,$c_weight) {
        // print_r($c_weight);die();
        $this->db->select("*");
        $this->db->from('country_weight');  
        $this->db->where('country_id',$id);
        $this->db->where('c_weight_from<=',$c_weight);
        $this->db->where('c_weight_to>=',$c_weight);
        // $this->db->order_by("c_weight","desc");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    #****** getting orders where status not in checkout  
    public function getorders($id) {
		
		$this->db->select("*");
        $this->db->from('orders');  
        $this->db->where('userid',$id);
        $this->db->where_not_in('order_status',[4]);

		$this->db->order_by("order_id", "desc");
		$query = $this->db->get();
        return $query->result_array();
    }

    public function getprodata($product_id) 
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where_in("product_id", $product_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getvardata($variant_id) 
    {
        $this->db->select("*");
        $this->db->from("variant");
        $this->db->where_in("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getvar_data($product_id,$size_id,$color_id) 
    {
        $this->db->select("*");
        $this->db->from("variant");
        $this->db->where("variant_status", 1);
        $this->db->where("product_id", $product_id);
        $this->db->where("size", $size_id);
        $this->db->where("color", $color_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getorderdata($order_id) {
		
		$this->db->select("*");
        $this->db->from('orders');  
        $this->db->where('order_id',$order_id);
		$this->db->join("address", "address.address_id=orders.address_id");
		$query = $this->db->get();
		// print_r($query->result_array());die();
        return $query->result_array();
    }

    public function getprorderdata($order_id) {		
		$this->db->select("*");
        $this->db->from('product_orders');  
        $this->db->where('order_id',$order_id);
		$this->db->join("product", "product.product_id=product_orders.productid");
		$query = $this->db->get();
        return $query->result_array();
    }
    public function comparepass($current_password,$user_id) {	
		
		$this->db->select("*");
        $this->db->from('user');  
        $this->db->where('user_id',$user_id);
        $this->db->where('password',$current_password);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function getaddress($id) {
		
		$this->db->select("*");
        $this->db->from('address');  
        $this->db->where('user_id',$id);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function doregister($pass='') {
		if(empty($pass)){
		    $pass = $this->input->post('password');
        }
		$password=sha1($pass);
		$data = array(
			'username'   => $this->input->post('name'),
			'email'  => $this->input->post('email'),
			'user_phone'  => $this->input->post('contact_number'),
			'password'      => $password
		);
		$this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    public function login_compare($email,$pass)
	{
		$password=sha1($pass);
		// print_r($email);die();
		$query = $this->db->get_where('user',array('email' => $email,'password' => $password,'user_status' => 1	));
		// print_r($query->result_array());die();
		return $query->result_array();
	}
	public function update_password($email,$pass)
    {   $password=sha1($pass);
        $this->load->helper('url');
        $data = array(
            'password' => $password
        );
        // print_r($data); die();
        $query = $this->db->update('user',$data,['email'=>$email]);
        // $row=$this->db->affected_rows();print_r($row); die();
        return $this->db->affected_rows();
    }
    public function insert_review() {
  		$this->load->helper('url');
		$this->load->helper('date');
		date_default_timezone_set("asia/kolkata");
		$rating = $this->input->post('rating')+1;
		// print_r($rating);die();
		$data = array(
			'user_name'   => $this->input->post('name'),
			'user_email'  => $this->input->post('email'),
			'product_id'  => $this->input->post('product_id'),
			'user_rating'      => $rating,
			'user_review'      => $this->input->post('review'),
			'review_status'      => 0,
			'submitted_date'   => mdate('%Y-%m-%d',now())
		);
		// print_r($data);die();
		return $this->db->insert('user_review', $data);
   }

	public function getreview($productid)
    {
        // $query = $this->db->get('user_review');
        // print_r($query->result_array());die();
        $this->db->select("*");
        $this->db->from('user_review');
        $this->db->where("product_id", $productid);
        $this->db->where("review_status", 1);
        $this->db->order_by('user_rating');
		$query = $this->db->get();
        // print_r($query->result_array());die();
        return $query->result_array();
    }
	public function getslider()
    {
        // $query = $this->db->get('user_review');
        // print_r($query->result_array());die();
        $this->db->select("*");
        $this->db->from('slider');
		$query = $this->db->get();
        // print_r($query->result_array());die();
        return $query->result_array();
    }

    public function getproduct()
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where("new_arr", 1);
        $this->db->where("prostatus", 1);
        $this->db->order_by('updated',"desc");
        $this->db->limit('10');
		$query = $this->db->get();
        return $query->result_array();
    }

    public function getOfferProduct()
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where("offer_month", 1);
        $this->db->where("prostatus", 1);
        $this->db->order_by('updated',"desc");
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function getinstagram()
    {
        $this->db->select("*");
        $this->db->from('instagram');
        $this->db->where("poststatus", 1);
		$this->db->order_by("instagram_id", "DESC");
		$query = $this->db->get();
        return $query->result_array();
    }
    public function getproductdata($id)
    {
        $this->db->select("*,product.product_id");
        $this->db->from('product');
        $this->db->join("variant","product.product_id=variant.product_id","left");
        $this->db->where("product.product_id", $id);
        $this->db->where("prostatus", 1);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function getcolor_data($product_id,$size) 
    {
        $this->db->select("variant.color,variant.size,variant.product_id");
        $this->db->from("variant");
        $this->db->where("variant.product_id", $product_id);
        $this->db->where("variant.size", $size);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getsizeoptn($id) 
    {
        $this->db->select("variant.size,variant.color");
        $this->db->from("variant");
        $this->db->where("variant.product_id", $id);
        $this->db->group_by('size');
        $this->db->order_by("variant_id", "DESC");
        $query = $this->db->get();
        
        return $query->result_array();
    }
    public function getproductimg($id)
    {
        $this->db->select("*");
        $this->db->from('product_images');
        $this->db->where("product_id", $id);
        $this->db->where("pro_image_status", 1);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function getcatdata($id)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where("catid", $id);
        $this->db->where("prostatus", 1);
		$query = $this->db->get();
        return $query->result_array();
    }

    function ord_data()
	{   
		$ord_id = $this->input->post('ord_id');
		return $query->result_array();
	}
	function quick_page($args) {
	
    $this->db->select("*")->from('page');
    $this->db->where("page_slug", $args);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
    }

   public function savedata($table,$args) {
  
	
       $this->db->insert($table, $args);
        $insert_id = $this->db->insert_id();
        // print_r($insert_id);die();
		return $insert_id;
		//return $this->db->last_query(); 
		// return $this->db->insert($table, $args);
    } 
    
	public function getRow($table,$condition="",$orderby="",$limit='', $start='') {
		//echo $start; exit;
		if(empty($condition)){
			 $this->db->select("*")->from($table)->order_by($orderby);
			 if($limit){
			 	$this->db->limit($limit,$start);
			 }
			$query = $this->db->get();
			
		//return $this->db->last_query();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return 0;
			}
		}else{
			$this->db->select("*")->from($table)->where($condition)->order_by($orderby);
			if($limit){
			 	$this->db->limit($limit,$start);
			 }
			$query = $this->db->get();
		//return $this->db->last_query();
		
		if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return 0;
			} 
		}	
    }
	
	public function countResult($table,$condition=""){
		$this->db->select("*")->from($table)->where($condition);
		$query = $this->db->get();
	  	if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		} 
	
	}
		public function ordercancel($id)
        {
        	// print_r($id);die();
        	$data = array(
        		'order_status' =>1 
        	);
            $query = $this->db->update('orders',$data,['order_id'=>$id]);
            return $this->db->affected_rows();
        }
	
 	public function updateRow($table,$data,$condition) {
        $this->db->where($condition);
        $this->db->update($table,$data);
//	echo  $this->db->last_query();
         if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
        //die;
    }
	
	public function do_proupdate($id,$data)
        {
            $this->load->helper('url');
			// print_r($data);die();
			$query = $this->db->update('user',$data,['user_id'=>$id]);
			// print_r($this->db->affected_rows());die();
            return $this->db->affected_rows();
        }
	
	function search_data($id,$pro) {
		
		if($pro==1)
		{
			$this->db->where("product.product_id", $id);
		}
		else{
			$this->db->where("product.catid", $id);
		}
		
        $this->db->select("product.*,product_slider_image.product_image_name")->from('product');
	    $this->db->join("product_slider_image", "product_slider_image.product_id=product.product_id");
        $query = $this->db->get();
       // echo $this->db->last_query(); exit;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
	
	
	
	 public function search_field($keyword){
 
		$sql="SELECT DISTINCT proname_en as search,product_id as pro_id,promain_image as pro_image,discount_price as dis_price,usd_discount_price as dis_usdprice,'1' as pro FROM product WHERE prostatus =1 AND  proname_en LIKE  '$keyword%' order by proname_en  ";
		$query = $this->db->query($sql);

		$data= $query->result();
		//print_r($data);
		return $data;
	}

	
	public function deleteRecord($table,$cond) {
        $this->db->where($cond);
        $this->db->delete($table);
       // echo $this->db->last_query();
        return True;
    }

    public function changeDeleteStatus($table,$cond) {
        $sql = "update $table set is_deleted = not is_deleted where $cond";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
	  	 if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
    }
	
	public function changeStatus($table,$cond) {
        $sql = "update $table set status = not status where $cond";
        //echo $sql; exit;
		$query = $this->db->query($sql);
	  	 if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
    }

    public function changeActiveToInactive($table,$cond) {
        $sql = "update $table set is_active = not is_active where $cond";
		$query = $this->db->query($sql);
	  	 if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
    }

    public function calculateRating($condition) {
    	$sql = "SELECT sum(rating.rate) as total,count(rating.rating_id) as totalrow,AVG(rating.rate)as result FROM rating INNER JOIN apartment_room ON rating.property_id=apartment_room.prop_apart_id WHERE $condition";
    	//echo $sql; exit;
		$query = $this->db->query($sql);
	  	 if ($this->db->affected_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        } 
    }

    public function changeAcStatus($table,$cond) {

    	$sql = "update $table set status ='0'";
        $sql1 = "update $table set status = not status where $cond";
        //echo $sql; exit;
		$query = $this->db->query($sql);
		$query1 = $this->db->query($sql1);
	
	  	 if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        } 
    }

 public function user_list(){
     $userdata1 = $this->session->userdata("session_info");
     $user_id= $userdata1['user_id'];
		$this->db->select("user.*");
        $this->db->from("user");
		$this->db->where('user.user_id',$user_id);
		$this->db->order_by("user.user_id", "DESC");
		
        $query = $this->db->get();
	//	echo $this->db->last_query();
        return $query->row_array();
		
	}


 public function address_list(){
     $userdata1 = $this->session->userdata("session_info");
     $user_id= $userdata1['user_id'];
		$this->db->select("user.user_id,address.*");
        $this->db->from("user");
		$this->db->join("address", "address.userid=user.user_id",'left');
		$this->db->where('user.user_id',$user_id);
		$this->db->order_by("user.user_id", "DESC");
		
        $query = $this->db->get();
	//	echo $this->db->last_query();
        return $query->row_array();
		
	}

 public function oder_list(){
     $userdata1 = $this->session->userdata("session_info");
                       $user_id= $userdata1['user_id'];
		$this->db->select("orders.order_id,orders.order_date,orders.order_status,orders.total_price");
        $this->db->from("orders");
		$this->db->join("user", "orders.userid=user.user_id");
		$this->db->where('orders.userid',$user_id);
		$this->db->order_by("order_id", "DESC");
		
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();
		
	}
	public function variant_id($variant_id)
	{
		// $password=sha1($pass);
		$query = $this->db->get_where('product_orders',array('variant_id' => $variant_id));
		// print_r($query->result_array());die();
		return $query->result_array();
	}
	public function getvarpro($order_id)
	{
		$this->db->select("product_orders.variant_id");
        $this->db->from("product_orders");
    $this->db->where("order_id", $order_id);
        $query = $this->db->get();
    //echo $this->db->last_query();
        // return $query->result_array();
		// print_r($query->result_array());die();
		return $query->result_array();
	}
    
	 public function wellet_list(){
	     $userdata1 = $this->session->userdata("session_info");
                       $user_id= $userdata1['user_id'];
		$this->db->select("my_wallet.id,my_wallet.amount,my_wallet.tr_type,my_wallet.date_time,my_wallet.resource_details");
        $this->db->from("my_wallet");
		$this->db->join("user", "my_wallet.user_id=user.user_id");
		$this->db->where('my_wallet.user_id',$user_id);
		$this->db->order_by("my_wallet.id", "DESC");
		
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();
		
	}
	
	 public function user_details(){
		$this->db->select("*");
        $this->db->from("user");
		//$this->db->join("user", "orders.userid=user.user_id");
		//$this->db->where('orders.userid','2');
		$this->db->order_by("user_id", "DESC");
		
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->row_array();
		
	}


	public function productList($conditions='',$limits=''){
		// print_r($conditions);die;
		$sql = "SELECT * FROM `product`";
		if(!empty($conditions)){
			$sql .=" where ".$conditions. "  order by updated desc";
		}
        if(!empty($limits)){
			$sql .=" ".$limits;	
		}
//	echo $sql;exit;

        
		$query = $this->db->query($sql);
		// print_r( $query->result_array());die;
	  	if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		} 
	}



	public function productListForCart($conditions='',$limits=''){
		
		$sql =" select t1.*,t2.unit_option_en,t3.proname_en,t3.description_en,t3.description_ar from variant t1 
		join unit_types t2 on t1.unit=t2.id
		join product t3 on t3.product_id=t1.product_id";

		if(!empty($conditions)){
			$sql .=" where ".$conditions;
		}
		if(!empty($limits)){
			$sql .=" ".$limits;	
		}
	//	echo $sql;exit;
		$query = $this->db->query($sql);
	  	if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		} 
	}

	public function productListForCartes($conditions='',$limits=''){
		
	// print_r($conditions);die();
 	$sql = "SELECT * FROM `product`";
		if(!empty($conditions)){
			$sql .=" where ".$conditions;
		}
		if(!empty($limits)){
			$sql .=" ".$limits;	
		}
	//	echo $sql;exit;
		$query = $this->db->query($sql);
		// print_r($query->result_array());die();
	  	if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		} 
	}

	public function getvardetail($variant_id){
	
		$query = $this->db->get_where('variant',array('variant_id' => $variant_id));
		// print_r($query->result_array());die();
	   return $query->result_array();
	}


	public function variantList($conditions='',$limits=''){
	
		$sql = "SELECT variant.*,(select unit_option_en FROM unit_types WHERE id=variant.unit limit 1) as unitname FROM variant ";
		if(!empty($conditions)){
			$sql .=" where ".$conditions;
		}
		$sql .=" order by total_qty desc ";

		if(!empty($limits)){
			$sql .=" ".$limits;	
		}
		//echo $sql;exit;
		$query = $this->db->query($sql);
	  	if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		} 
	}

	public function AddressList($conditions='',$limits=''){
	
		$sql = "SELECT address.*,(select city_name FROM city WHERE city_id=address.city)as cityName,(select society_name FROM society WHERE society_id=address.state)as societyName FROM address ";
		if(!empty($conditions)){
			$sql .=" where ".$conditions;
		}
		$sql .=" order by address_id desc ";

		if(!empty($limits)){
			$sql .=" ".$limits;	
		}
		//return $sql;exit;
		$query = $this->db->query($sql);
	  	if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		} 
	}
	
	
	public function getorderproduct($id) 
	{
        $this->db->select("product_orders.*,user.*,product.*,orders.order_date,orders.delivery_date,orders.address,orders.city,orders.state,orders.country,orders.pincode,orders.total_price,orders.delivery_charge,orders.sub_total,orders.coupon_discount,coupon.coupon_code,unit_types.unit_option_en,variant.subunit");
        $this->db->from("product_orders");
		$this->db->where("product_orders.order_id", $id);
		$this->db->join("user", "product_orders.user_id=user.user_id");
		$this->db->join("product", "product_orders.productid=product.product_id");
		$this->db->join("orders", "product_orders.order_id=orders.order_id");
		$this->db->join("coupon", "orders.coupon_id=coupon.coupon_id",'left');
        $this->db->join("unit_types", "product_orders.unit_types_id=unit_types.id");
        $this->db->join("variant", "product_orders.variant_id=variant.variant_id");
        $query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();
	}
    
    
    
	
}