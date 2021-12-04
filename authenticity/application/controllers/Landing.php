<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Landing extends MY_Controller {

    public function __construct() {
        parent::__construct();
		ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
		date_default_timezone_set('Asia/Calcutta');

		$this->load->library("form_validation");
        $this->load->library('cart');
        $this->load->model("admin/Address_model");
		$this->load->database();
		$this->load->helper('common');
		$this->load->model("Commonmodel");
		$this->load->model("Api_model");

	}

	public function index(){
		
		redirect(base_url() . "landing/home"); 
	}


    public function categories() 
	{   
    	$data['categories'] = $this->Commonmodel->getcat();
    	// print_r($data);die();
		$this->load->view('website/layout/header');  
		$this->load->view('website/categories',$data);  
		$this->load->view('website/layout/footer');  
    }

 
    public function remove_address(){
    	$pdata = $this->input->post();
    	// print_r($pdata);die;
        $address_id= $pdata['address_id'];
        $table =" address";
        $condition = "address_id='".$address_id."'";
        if($this->Commonmodel->deleteRecord($table,$condition)){
            $responce['err']    = 0;
            $responce['msg']    = " Success.";
            // print_r($responce);die;
            echo json_encode($responce);
        }  
    }

    public function category_details() 
	{
			$this->load->view('website/layout/header');  
			$this->load->view('website/category_details');  
			$this->load->view('website/layout/footer');
			
    }
    public function order_success() 
	{
	    // if ($this->session->userdata('logged_in')) {

	        
	        $order_id=$this->input->post('udf1');
	        $txnid=$this->input->post('txnid');
	        // $amount=$this->input->post('amount');
	        // $coupon_discount=$this->input->post('coupon_discount');
	        // print_r($order_id);die();
	        $data['order_status']= 0 ;
	        // $data['total_price']= $amount ;
	        // $data['coupon_discount']= $coupon_discount ;
	        $data['pyment_method']= 2 ;
	        $data['transaction_id']= $txnid ;
			$condition = "order_id='".$order_id."'";
			$result = $this->Commonmodel->updateRow("orders",$data,$condition);
			if ($result) {
			// $this->load->view('website/layout/header');  
			$this->load->view('website/order-success');  
			// $this->load->view('website/layout/footer');
			} 
		// }else{
		// 	redirect(base_url('landing/login')); 

		// }
    }

    public function order_failed() 
	{
	    // if ($this->session->userdata('logged_in')) {
	  //   	$userdata = $this->session->userdata("logged_in");
	  //   	$id       = $userdata['user_id'];
			// $data['user'] = $this->Commonmodel->getuser($id);
			// $this->load->view('website/layout/header');  
			$this->load->view('website/order-fail');  
			// $this->load->view('website/order-fail/footer'); 
		// }else{
			// redirect(base_url('landing/login')); 

		// }
    }

	
	
	public function SendMessage($messageContent)
    {
		//echo "http://2factor.in/API/V1/051500eb-ac16-11ea-9fa5-0200cd936042/".$messageContent['message']."/".$messageContent['to']."/AUTOGEN";die;
		 if($messageContent['to'] != "" && $messageContent['message'] != "")
        { 
            $SMS_API_URL  = SMS_API_URL;
            $SMS_API_KEY  = SMS_API_KEY;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "$SMS_API_URL/$SMS_API_KEY/SMS/".$messageContent['to']."/". $messageContent['message'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            //print_r($response);die;
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              //echo "cURL Error #:" . $err;
              $result['status']   = '0';
              $result['msg']      = "Something went wrong";
            } else {
              //echo $response;
                $result['status']   = '1';
                $result['msg']      = "OTP Sent Successfully on your mobile ".$messageContent['to'];
            } 
            return $result;
        }	
    }
    public function wishlist() 
	{	
		$this->load->view('website/layout/header');  
		$this->load->view('website/wishlist');  
		$this->load->view('website/layout/footer');  
		
    }

    public function addtoWishlist(){
    	$pdata = $this->input->post();
    	// print_r($pdata);die;
    	 //session_start();
    	// session_destroy(); exit;
        if(!isset($_SESSION['Wishlist'])){
            $_SESSION['Wishlist'] = array();
        }
        $product_id =  (!empty($pdata['product_id'])?$pdata['product_id']:'');
        // print_r($product_id);die;
        if(empty($product_id) && count($_SESSION['Wishlist'])>0){
			$response['err']= '0';
            $response['msg']=' This item has been already added in your Wishlist.';
            $response['count']= count($_SESSION['Wishlist']);
            // print_r($response);die;
          
        }
        if(!empty($product_id)){
			if(count($_SESSION['Wishlist'])>0){
				if(in_array($product_id,array_column($_SESSION['Wishlist'],'product_id'))){
					$response['err']= '0';
	                $response['msg']=' This item has been already added in your Wishlist.';
	                $response['count']= count($_SESSION['Wishlist']);
	                
				}else{
					$node['product_id'] = $product_id;
					$node['qty'] = '1';
	                array_push($_SESSION['Wishlist'],$node);
	                $response['err'] = '0';
	                $response['msg'] = ' This item has been added to your Wishlist.';
	                $response['count'] = count($_SESSION['Wishlist']);
	                // print_r($response);die;
				}
			}else{
				$node['product_id'] = $product_id;
				$node['qty'] = '1';
	            array_push($_SESSION['Wishlist'],$node);
	            $response['err'] = '0';
	            $response['msg'] = ' This item has been added to your Wishlist.';
	            $response['count'] = '1';
			}
		}
		$varI = array_column($_SESSION['Wishlist'], 'product_id');
		// print_r(9);die();
		array_multisort($varI, SORT_ASC, $_SESSION['Wishlist']);
		if(count($_SESSION['Wishlist'])>0){
			$productId = implode(',',array_column($_SESSION['Wishlist'],'product_id'));
			// print_r($productId);die();
			$productList = $this->Commonmodel->productListForCartes("product.product_id IN($productId)");
			$qty = array_column($_SESSION['Wishlist'],'qty');
			$response['product'] = $productList;
			// print_r($productList);die();

			$amountData=array();
			for($x=0;$x<count($productList);$x++){
				$pnode=array();
				$pnode['product_id']	= $productList[$x]['product_id'];
				$pnode['discount_price']= $productList[$x]['discount_price']*$qty[$x];
				$pnode['price']			= $productList[$x]['price']*$qty[$x];;
				$pnode['discount'] 		= $productList[$x]['discount']*$qty[$x];;
				$pnode['discount_amt'] 	= ($productList[$x]['price']*$qty[$x])-($productList[$x]['discount_price']*$qty[$x]);
				array_push($amountData,$pnode);
			}

			// $response['amountData'] = $amountData;
			// $response['subtotal'] = array_sum(array_column($amountData,'price'));
			// $response['total_disc_per'] = array_sum(array_column($amountData,'discount')).' %';
			// $response['payable_amount'] = array_sum(array_column($amountData,'discount_price'));
			// $response['discount_amt'] = array_sum(array_column($amountData,'discount_amt'));
			// print_r($response);die();
			// $minimum_price = $this->Commonmodel->getRow('site_settings',"name='minimum_price'")[0]['value'];
			// $delivery_charge =$this->Commonmodel->getRow('site_settings',"name='delivery_charge'")[0]['value'];
			//print_r($minimum_price); exit;
			// if($response['payable_amount']<=$minimum_price){
			// 	$response['delivery_charge'] = $delivery_charge;
			// }else{
			// 	$response['delivery_charge'] = 0;
			// }

		}else{
			$response['product'] = 0;
		}

		$response['Wishlist'] = ((count($_SESSION['Wishlist'])>0)?$_SESSION['Wishlist']:'');
		// print_r($response);die;
		echo json_encode($response); exit;
    }
	public function getvarpro(){
		
		$pdata = $this->input->post();
		// print_r($pdata);
		$order_id=$pdata['order_id'];
    	$getvarpro['variant'] = $this->Commonmodel->getvarpro($order_id);
    	echo json_encode($getvarpro); exit;

	}
    public function removeWishlist(){
    	$pdata = $this->input->post();
    	// print_r($pdata);die;
        $product_id= $pdata['product_id'];
        $key = array_search($product_id,$_SESSION['Wishlist']);   
        if(in_array($product_id,array_column($_SESSION['Wishlist'],'product_id'))){
            foreach($_SESSION['Wishlist'] as $k=>$v){
                if($v['product_id'] == $product_id){
                    unset($_SESSION['Wishlist'][$k]);
                    $responce['err']    = 0;
                    $responce['msg']    = " Success.";
                    // print_r($responce);die;
                    echo json_encode($responce);
                }else{
                    continue;
                }
            }
        }  
    }
	public function review(){
		if ($this->Commonmodel->insert_review()) {
    		redirect('landing/home');
    	}
	}
    public function home() 
	{   
    	$data['sliders'] = $this->Commonmodel->getslider();
    	$data['products'] = $this->Commonmodel->getproduct();
    	$data['getOfferProduct'] = $this->Commonmodel->getOfferProduct();
    	$data['instagram'] = $this->Commonmodel->getinstagram();
    	// print_r($data);die();
		$this->load->view('website/layout/header');  
		$this->load->view('website/index',$data);  
		$this->load->view('website/layout/footer');  
    }

	public function productdetails(){
	    $id= $this->uri->segment(3);
    	$product_detail = $this->Commonmodel->getproductdata($id);
    	$size = $product_detail[0]['size'];
    	$data['product_data'] = $product_detail;
    	$data['product_images'] = $this->Commonmodel->getproductimg($id);
    	$data['categories'] = $this->Commonmodel->getcat(); 
        $data['color'] = $this->Commonmodel->getcolor_data($id,$size); 
        $data['size'] = $this->Commonmodel->getsizeoptn($id);
    	// print_r($data['size']);die();
        // if(!empty($attr_optn)){
        //     foreach ($attr_optn as $value) {
        //         $data['size'][$value['optn1_id']] = ["size_id"=> $value['optn1_id'],"optn_name"=> $value['optn1']];
        //     }
        // }
        // $sized = $data['size'];
        // print_r($sized);die();
		$this->load->view('website/layout/header');  
		$this->load->view('website/product_detail',$data);  
		$this->load->view('website/layout/footer');  

	}


    public function getcolor() 
    {
        $size = $this->input->post();
        $size_id= $size['size_id'];
        $product_id= $size['product_id'];
        $response = $this->Commonmodel->getcolor_data($product_id,$size_id);
        // print_r($response);die();
        echo json_encode($response); exit;
    }
	public function page(){
	    $slug= $this->uri->segment(3);//die;
	    $data['quick_page'] = $this->Commonmodel->quick_page($slug);
		$this->load->view('website/layout/header');  
		$this->load->view('website/page',$data);  
		$this->load->view('website/layout/footer');  

	}

    public function cancelpro() 
	{   $order_id= $_GET['order_id'];
		// print_r($order_id);die();
        if($this->Commonmodel->ordercancel($order_id)){
            $this->session->set_flashdata('warning', 'Your order has been canceled'); 
            redirect(base_url('landing/orders'));
        }else{
            $this->session->set_flashdata('error', 'Your order not has been canceled'); 
            redirect(base_url('landing/orders'));
        }
    }
	public function shop(){
	    $this->load->view('website/layout/header');  
		$this->load->view('website/shop'); 
		$this->load->view('website/layout/footer');  

	}
 
    public function login() 
	{
	    if ($this->session->userdata('logged_in')) {
			redirect(base_url('landing/home')); 
		}else{
			$this->load->view('website/layout/header');  
			$this->load->view('website/login');  
			$this->load->view('website/layout/footer'); 

		}
    }
 
    public function forgot() 
	{
	    if ($this->session->userdata('logged_in')) {
			redirect(base_url('landing/home')); 
		}else{
			$this->load->view('website/layout/header');  
			$this->load->view('website/forgot');  
			$this->load->view('website/layout/footer'); 

		}
    }


	public function forgot_password()
	{ 
		$email     = $this->input->post('email');
		$password = $this->input->post('password');
		// print_r($email);die();
		// $this->Commonmodel->update_password($email,$password);
		if($this->Commonmodel->update_password($email,$password)){
			$this->session->set_flashdata('success', 'Password changed Successfully !');
			redirect(base_url('landing/login'));
			
		}else{
			$this->session->set_flashdata('error', 'OOPS! TRY AGAIN');
			redirect(base_url('landing/forgot'));
		}
				   
	}

    
    public function track_order() 
	{    

        $order_id= $this->uri->segment(3);
	    $orderid=$this->input->post('order_id');
	    if ($order_id) {
		$data['orders'] = $this->Commonmodel->getorderdata($order_id);
	    }elseif ($orderid) {
		$data['orders'] = $this->Commonmodel->getorderdata($orderid);
	    }

	    if ($this->session->userdata('logged_in')) {
			// print_r($data);die();
			$this->load->view('website/layout/header'); 
			$this->load->view('website/track_order',$data);  
			$this->load->view('website/layout/footer');  
		}else{
			redirect(base_url('landing/checkout')); 
		    
		}
    }
    public function track_your_order() 
	{    
	    if ($this->session->userdata('logged_in')) {
			$this->load->view('website/layout/header'); 
			$this->load->view('website/track_your_order');  
			$this->load->view('website/layout/footer');  
		}else{
			redirect(base_url('landing/checkout')); 
		    
		}
    }
    
    public function register() 
	{
	    if ($this->session->userdata('logged_in')) {
			redirect(base_url('landing/home')); 
		}else{
		    $this->load->view('website/layout/header');  
			$this->load->view('website/register');  
			$this->load->view('website/layout/footer');  
		}
    }
    public function my_account() 
	{
	    if ($this->session->userdata('logged_in')) {
			$this->load->view('website/layout/header');  
			$this->load->view('website/my_account');  
			$this->load->view('website/layout/footer'); 
		}else{
			redirect(base_url('landing/login')); 

		}
    }
	

    public function my_profile() 
	{
	    if ($this->session->userdata('logged_in')) {
	    	$userdata = $this->session->userdata("logged_in");
	    	$id       = $userdata['user_id'];
			$data['user'] = $this->Commonmodel->getuser($id);
			$this->load->view('website/layout/header');  
			$this->load->view('website/my_profile',$data);  
			$this->load->view('website/layout/footer'); 
		}else{
			redirect(base_url('landing/login')); 

		}
    }
    

    public function orders() 
	{
	    if ($this->session->userdata('logged_in')) {
	    	$userdata = $this->session->userdata("logged_in");
	    	$id       = $userdata['user_id'];
			$data['orders'] = $this->Commonmodel->getorders($id);
			// print_r($data);die();
			$this->load->view('website/layout/header');  
			$this->load->view('website/orders',$data);  
			$this->load->view('website/layout/footer'); 
		}else{
			redirect(base_url('landing/login')); 

		}
    }
    public function addresses() 
	{
	    if ($this->session->userdata('logged_in')) {
	    	$userdata1 = $this->session->userdata("logged_in");
	    	$id = $userdata1['user_id'];
			$data['address'] = $this->Commonmodel->getaddress($id);
			// print_r($data);die();
			$this->load->view('website/layout/header');  
			$this->load->view('website/addresses',$data);  
			$this->load->view('website/layout/footer'); 
		}else{
			redirect(base_url('landing/login')); 

		}
    }
    public function savemyAddress(){
    	$userData = $this->session->userdata("logged_in");
    	$pdata = $this->input->post();		
		// print_r($pdata);die();	
		
		$data['user_id']=$userData['user_id'];
		$data['username']=$pdata['username'];
		$data['email']=$pdata['email'];
		$data['user_phone']=$pdata['user_phone'];
		$data['building']=$pdata['building'];
		$data['pincode']=$pdata['pincode'];
		$data['street_address']=$pdata['street'];
		$data['city']=$pdata['city'];
		$data['state']=$pdata['state'];
		// $result = $this->Commonmodel->savedata("address",$data);
		// print_r($result);die();
		if(empty($pdata['address_id'])){
			$result = $this->Commonmodel->savedata("address",$data);
		}else{
			$condition = "address_id='".$pdata['address_id']."'";
			$result = $this->Commonmodel->updateRow("address",$data,$condition);
		}
		
		if($result)
        {
     	    $this->session->set_flashdata( "sucess", ' Added Successfully ');
			redirect('landing/addresses');
        }else{
     	    $this->session->set_flashdata( "error", 'OOPs! Something went wrong ');
			redirect('landing/addresses');
		}
		
    }
    public function updateuser(){

    	$pdata = $this->input->post();	
    	$data['user_id']	=$pdata['user_id'];
    	$data['username']	=$pdata['username'];
		$data['email']		=$pdata['email'];
		$data['user_phone'] =$pdata['user_phone'];
		// print_r($pdata);die();			// print_r($data);die();
		$condition = "user_id='".$pdata['user_id']."'";
		$result = $this->Commonmodel->updateRow("user",$data,$condition);
		if($result)
        {
     	     $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
			//redirect(base_url() . "virify_otp");
			redirect('landing/my_profile');
        }
    }
    public function updateuserpass(){

    	$pdata = $this->input->post();	
  		$user_id=$pdata['user_id'];
  		$current_password=sha1($pdata['current_pass']);
  		$password=sha1($pdata['password']);
		$data['password'] =$password;
		// print_r($data);die();	
		$condition = "user_id='".$pdata['user_id']."'";
		if($this->Commonmodel->comparepass($current_password,$user_id))
        {
     	    if($this->Commonmodel->updateRow("user",$data,$condition))
	        {
	     	    
	     	    $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
				redirect('landing/my_profile');
	        }else{
	        	$this->session->set_flashdata( "error", 'OOPs Something went wrong! ');
				redirect('landing/my_profile');
	        }
        }else{
        	$this->session->set_flashdata( "error", 'Please Enter Valid current Password ! ');
			redirect('landing/my_profile');
        }
    }
    
    public function get_contactOtp() {
        $code           = rand(100000, 999999);
        $this->session->set_userdata('code', $code);
        $message        = $code;
        // $mobile         = $this->input->get('mobile');
        $mobile         = $this->input->get('mobile');
        $messageContent['to']=$mobile;
        $messageContent['message']=$message;
        // print_r($mobile);die();
        $result = $this->SendMessage($messageContent);
        
		echo json_encode($result);
            
        
    }

    public function verify_otp() {

		$getSession = $this->session->userdata('code');
       	$OTPcode    = $getSession;
        $get_otp    = $this->input->get('otp');
        // print_r($OTPcode);die();
        if($OTPcode == $get_otp){
            $result['status']   = '1';
            $result['msg']      = "Successfully Verify";
        } else {
            $result['status']   = '0';
            $result['msg']      = "OTP not match";
        }
// print_r($result);die();
		echo json_encode($result);
	}



    public function doregister() 
	{
		// $name= $this->input->post('name');
	 //    print_r($name);die();
	   if ($this->Commonmodel->doregister()) {
	   		$this->session->set_flashdata( "sucess", 'Registered Successfully! Now Login');
			redirect(base_url('landing/login'));
	   }else{
	   		$this->session->set_flashdata( "error", 'OOPS! Something went wrong');
			redirect(base_url('landing/register'));
	   }

    }

    public function userlogin_compare()
	{ 
		$email     = $this->input->post('email');
		$password = $this->input->post('password');
		// print_r($email);die();
		$data     = $this->Commonmodel->login_compare($email,$password);
		if(!empty($data)){
			
			$newdata = array(
				'user_id'       =>  $data[0]['user_id'],
				'username'     => $data[0]['username'],
				'user_phone'   => $data[0]['user_phone'],
				'email'    => $data[0]['email']
			);
			$this->session->set_userdata('logged_in',$newdata); 
			$this->session->set_flashdata('success', 'Successfully Logged In !');
			redirect(base_url('landing/home'));
			
		}else{
			$this->session->set_flashdata('error', 'Invalid username or password!');
			redirect(base_url('landing/login'));
		}
				   
	}
	public function check_compare()
	{ 
		$email     = $this->input->post('email');
		$password = $this->input->post('password');
		// print_r($email);die();
		$data     = $this->Commonmodel->login_compare($email,$password);
		if(!empty($data)){
			
			$newdata = array(
				'user_id'       =>  $data[0]['user_id'],
				'username'     => $data[0]['username'],
				'user_phone'   => $data[0]['user_phone'],
				'email'    => $data[0]['email']
			);
			$this->session->set_userdata('logged_in',$newdata); 
			$this->session->set_flashdata('success', 'Successfully Logged In !');
			redirect(base_url('landing/checkout'));
			
		}else{
			$this->session->set_flashdata('error', 'Invalid username or password!');
			redirect(base_url('landing/checkout'));
		}
				   
	}

	public function guest_login()
	{ 
		$email     = $this->input->post('email');
		$mobile    = $this->input->post('contact_number');
		$name 	   = $this->input->post('name');
		$pass      = '123456';
		$uid       = $this->Commonmodel->doregister($pass);
		if(!empty($uid)){
			$newdata = array(
				'user_id'      => $uid,
				'username'     => $name,
				'user_phone'   => $mobile,
				'email'    	   => $email
			);
			$this->session->set_userdata('logged_in',$newdata); 
			$this->session->set_flashdata('success', 'Successfully Logged In !');
			redirect(base_url('landing/checkout'));
			
		}else{
			$this->session->set_flashdata('error', 'Email already exsit');
			redirect(base_url('landing/checkout'));
		}
	}
	
	public function logout()
	{ 
		
		if ($this->session->userdata('logged_in')) {
			$data['user'] = $this->session->userdata('logged_in');               
			$this->session->unset_userdata('logged_in',$data);
			//$this->session->sess_destroy();
			redirect('landing/login');
		}else{
			redirect('landing/home');            
		}
	}
    public function search($id='') 
	{
	    
		$id= $this->uri->segment(3);//die;
		$pro= $this->uri->segment(4);//die;
		$data['categories'] = $this->Commonmodel->getRow("category","status='0'");
		$data['search_list'] = $this->Commonmodel->search_data($id,$pro);
		//print_r($data['search_list']);
        $this->loadContaint('search',$data);
    }
    
	public function autocompletesearch()
	{

	     $keyword = $_POST['keyword'];
	// $keyword_resutl = $this->user_panel_model->hotel_search_suggesstion($keyword);
	// print_r($_POST);
	// die();
	//$data['aa']=$this->user->search_field($keyword)
	$data=$this->output->set_content_type("application/json")->set_output(json_encode($this->Commonmodel->search_field($keyword)));
	 //header('Content-type: text/plain'); 
	  // set json non IE
	 // header('Content-type: application/json'); 

	  //echo json_encode($data);
	}



	public function catshop($catId='') 
	{
	   echo $cat_idd=$this->uri->segment(3);
		$categories = $this->Commonmodel->getRow("subcategory","categroy_id='$cat_idd' ");
        $catData = array();
        foreach($categories as $category){
        	$noda = array();
        	//$imageUrl = base_url().'assets/images/category//'.$category['image'];
        	$node['categroy_id'] = $category['categroy_id'];	
			$node['subcategory_id'] = $category['subcategory_id'];	
			$node['subcategory_name_en'] = $category['subcategory_name_en'];	
			$node['subcategory_name_ar'] = $category['subcategory_name_ar'];	
			//$node['image'] = ($imageUrl);
		//	$node['create_date'] = (convertDateFormat($category['create_date'],'d-m-Y'));
		//	$node['count']= countRow('product',"catid='".$category['category_id']."' and prostatus='0'");
			array_push($catData,$node);
        }
        $data['categories'] = $catData;
       	$data['catId'] = decryptor($catId);
        $this->loadContaint('shop',$data);
    }

    public function filter_data($data){
    	$html = '';
    	//print_r(($data['result'])); die;
		if(!empty($data['result'])){
	    	foreach($data['result'] as $val)
	        {   
	        	$price    = $val['price'];
	        	$imageUrl = base_url().'assets/images/products/'.$val['promain_image'];
	        	$link     = base_url().'landing/productdetails/'.$val['product_id'];
	            $html .= '<div class="col-6 col-sm-6 col-md-4 col-lg-4 item appendData"> 
						    <div class="product-image">
						        <a href="'.$link.'" class="product-img">
						            <img class="primary blur-up lazyloaded" data-src="'.$imageUrl.'" src="'.$imageUrl.'" alt="" title="">
						        </a>
						        <div class="button-set style1">
						            <ul>
						                <li>
						                    <form class="add" action="cart-variant1.html" method="post">
						                        <button class="btn-icon btn btn-addto-cart" data-toggle="modal" data-target="#addcart" onclick="getvar('.$val['product_id'].')" type="button" tabindex="0">
                                            <i class="icon anm anm-cart-l" ></i>
                                            <span class="tooltip-label">Add to Cart</span>
                                        </button>
						                    </form>
						                </li>
						                <li>
						                    <div class="wishlist-btn"><a class="btn-icon wishlist add-to-wishlist" onclick="addtoWishlist('. $val['product_id'] .')"><i class="icon anm anm-heart-l"></i><span class="tooltip-label">Add To Wishlist</span></a></div>
						                </li>
						            </ul>
						        </div>
						    </div>
						    <div class="product-details text-center">
						        <div class="product-name"><a href="'.$link.'">'. $val['proname_en'] .' </a>
						        </div>
						        
						        <div class="product-price">
                        <s id="ComparePrice-product-template"><span class="money list_price">₹ '. $val['price'] .' </span></s>   <span class="lprice"> &#8360; '. $val['discount_price'] .'</span> 
                        <s id="ComparePrice-product-template"><span class="money">$  '. $val['usd_price'] .' </span></s>   <span class="lprice"> &#36; '. $val['usd_discount_price'] .'</span>
                        <p class="save"> Save ₹ '. $price = $val['price']-$val['discount_price'].'<span> $  '. $price = $val['usd_price']-$val['usd_discount_price'].' </span></p>
                    </div>
						    </div>
						</div> ';
	                                
	        }
    	}
    	return $html;
    }

    public function load_product_menu(){
    	$this->load->helper('url');
		$this->load->library('pagination');
		$pdata = $this->input->post();
		$cond = '';
		if(!empty($pdata['category']) && $pdata['category']){
			$catid = implode(",",$pdata['category']);
			$cond  = "product.catid in ($catid) and product.prostatus='1' ";
		}else{
			if(!empty($pdata['maincatid']) && $pdata['maincatid']){
				$maincatid = $pdata['maincatid'];
				if(!empty($pdata['catid']) && $pdata['catid']){
					$maincatid = $pdata['maincatid'];
					$catid = $pdata['catid'];
					$sub_cat = $pdata['subcatid'];
					if(!empty($sub_cat)){
						$sub_cat = $pdata['subcatid'];
						$cond    =  "product.subcatid='$sub_cat' and product.prostatus='1'  ";
					}
					else
					{
						$cond  = "product.catid='$catid' and product.maincatid='$maincatid'  and product.prostatus='1' ";
					}
				}else{
					$cond = "product.maincatid='$maincatid'  and product.prostatus='1' ";
				}
			}else{ 
				if(!empty($pdata['catid']) && $pdata['catid']){
					$catid = $pdata['catid'];
					if(!empty($sub_cat)){
						$sub_cat = $pdata['subcatid'];
						$cond = "product.catid='$catid' and product.subcatid='$sub_cat'  and product.prostatus='1' ";
					}
					else
					{
						$cond = "product.catid='$catid'  and product.prostatus='1' ";
					}
				}else{
					$cond = "product.prostatus='1'";
				}
			}
		}
		if(!empty($pdata['color'])){
			$colorid = implode(",",$pdata['color']);
			$cond .= " and product.color_id in ($colorid) ";
		}
		// if(!empty($pdata['minPrice']) && !empty($pdata['maxPrice']) ){
		// 	$minPrice  = $pdata['minPrice'];
		// 	$maxPrice  = $pdata['maxPrice'];
		// 	$cond .= " and product.usd_price between $minPrice and $maxPrice ";
		// }
		$productList  = $this->Commonmodel->productList($cond);
		$productDatas = array(); 
		if(!empty($productList)){
			foreach($productList as $product){
				$node=array();
				$node['product_id'] 		= $product['product_id'];
				$node['product_id_en'] 		= encryptor($product['product_id']);
				$node['maincatid'] 				= $product['maincatid'];
				$node['catid'] 				= $product['catid'];
				$node['subcatid'] 			= $product['subcatid'];
				$node['proname_en'] 		= $product['proname_en'];
				$node['proname_ar'] 		= $product['proname_ar'];
				$node['brand_name_en'] 		= $product['brand_name_en'];
				$node['brand_name_ar'] 		= $product['brand_name_ar'];
				$node['price'] 		= $product['price'];
				$node['discount_price'] 		= $product['discount_price'];
				$node['usd_price'] 		= $product['usd_price'];
				$node['usd_discount_price'] 		= $product['usd_discount_price'];
				$node['promain_image'] 		= $product['promain_image'];

				$node['description_en'] 	= $product['description_en'];
				$node['description_ar'] 	= $product['description_ar'];
				$node['pro_create_date'] 	= $product['pro_create_date'];
				$node['prostatus'] 			= $product['prostatus'];
				$node['description_en'] 	= $product['description_en'];
				
				array_push($productDatas,$node);
			}
		}
		$html  = 'No Data Found';
		if(!empty($productDatas)){
			$data['result'] = $productDatas;
			$html =  $this->filter_data($data);
		}
		echo json_encode(['html'=>$html]);

    }


    public function load_product($rowno=0){
    	$this->load->helper('url');
		$this->load->library('pagination');
	    $rowno = $this->input->post('pagno');
		$rowperpage = 9;
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}else{
			$rowno = 0;
		}
		$pdata=$this->input->post();
		// print_r($pdata);die;
		$limit="limit $rowno,$rowperpage";

		if(!empty($this->input->post('catid')) && $this->input->post('catid')){
			$catid = $this->input->post('catid');
			$pro_cat = $this->input->post('pro_cat');
			//print_r($pro_cat);die;
			if($pro_cat==1)
			{
			$productList = $this->Commonmodel->productList("product.product_id='$catid' and product.prostatus='0'",$limit);
			$count       = $this->Commonmodel->productList("product.product_id='$catid' and product.prostatus='0'");
			
			}
			else if($pro_cat==2)
			{
			$productList = $this->Commonmodel->productList("product.catid='$catid' and product.prostatus='0'",$limit);
			$count=$this->Commonmodel->productList("product.catid='$catid' and product.prostatus='0'");  
			}
			else
			{
			$productList = $this->Commonmodel->productList("product.subcatid='$catid' and product.prostatus='0'",$limit);
			$count=$this->Commonmodel->productList("product.subcatid='$catid' and product.prostatus='0'");  
			}
		
		}else{
			$productList = $this->Commonmodel->productList("product.prostatus='0'",$limit);
			$count=$this->Commonmodel->productList("product.prostatus='0'");
		}
		$productDatas= array();
		foreach($productList as $product){
			$node=array();
			$node['product_id'] 		= $product['product_id'];
			$node['product_id_en'] 		= encryptor($product['product_id']);
			$node['catid'] 				= $product['catid'];
			$node['subcatid'] 			= $product['subcatid'];
			$node['proname_en'] 		= $product['proname_en'];
			$node['proname_ar'] 		= $product['proname_ar'];
			$node['brand_name_en'] 		= $product['brand_name_en'];
			$node['brand_name_ar'] 		= $product['brand_name_ar'];
			$node['description_en'] 	= $product['description_en'];
			$node['description_ar'] 	= $product['description_ar'];
			$node['pro_create_date'] 	= $product['pro_create_date'];
			$node['prostatus'] 			= $product['prostatus'];
			$node['categoryname'] 		= $product['categoryname'];
			$node['description_en'] 	= $product['description_en'];
			$node['image'] 				= $product['image'];
			$node['variant']=array();
			$variants = $this->Commonmodel->variantList("product_id='".$product['product_id']."'");
			
			foreach($variants as $variant){
				$snode['variant_id'] 	= $variant['variant_id'];
				$snode['variant_id_en'] = encryptor($variant['variant_id']);
				$snode['unit'] 			= $variant['unit'];
				$snode['subunit'] 		= $variant['subunit'];
				$snode['price'] 		= $variant['price'];
				$snode['discount'] 		= $variant['discount'];
				$snode['discount_price']= $variant['discount_price'];
				$snode['variant_image'] = $variant['variant_image'];
				$snode['variant_status']= $variant['variant_status'];
				$snode['unitname'] 		= $variant['unitname'];
				array_push($node['variant'],$snode);
			}
			//printArray($node); exit;
		array_push($productDatas,$node);
		}
		

		$allcount = count($count);
		$config['base_url'] = base_url().'landing/load_product';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		// Initialize
		$this->pagination->initialize($config);
		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $productDatas;
		$data['row'] = $rowno;
		//printArray($data['result']); exit;
		echo json_encode($data);
    }


    public function addtocart() 
    {   
        $data = $this->input->post();
        $variant_id = $data['variant_id'];
        $product_id = $data['product_id'];
        $size_name = $data['size'];
        $color_name = $data['color'];
        $qty = $data['qty'];
        $product = $this->Commonmodel->getprodata($product_id);
        // print_r($product);die();
        $product_name = $product[0]['proname_en'];
        $product_weight = $product[0]['product_weight'];
        $pro_image = $product[0]['promain_image'];
        $variant_list_price = $product[0]['price'];
        $variant_price      = $product[0]['discount_price'];
        $usd_list_price = $product[0]['usd_price'];
        $usd_variant_price      = $product[0]['usd_discount_price'];
        if(!empty($variant_id)){
            $variant = $this->Commonmodel->getvardata($variant_id);
            $variant_list_price = $variant[0]['list_price'];
            $variant_price      = $variant[0]['variant_price'];
	        $usd_list_price = $variant[0]['usd_list_price'];
	        $usd_variant_price      = $variant[0]['usd_variant_price'];
        	$product_weight = $variant[0]['variant_weight'];
        }
         $cartdata = array(
                'id'      			 => $product_id,
                'variant_id'    	 => $variant_id,
                'name'          	 => $product_name,
                'pro_image'     	 => $pro_image,
                'qty'           	 => $qty,
                'list_price'    	 => $variant_list_price,
                'product_weight'    	 => $product_weight,
                'price'         	 => $variant_price,
                'usd_list_price'     => $usd_list_price,
                'usd_variant_price'  => $usd_variant_price,
                'options'       => ['size_name' => $size_name, 'color_name'  => $color_name]                
            );
         $this->cart->insert($cartdata);
         $response['cart'] = $this->cart->contents();
        // print_r($response);die;
         echo json_encode($response); 
        // $total_item = count($this->cart->contents());
    }
    public function getcart() 
    {
		$response['cart'] = $this->cart->contents();
		$total = $this->cart->total();
		$response['total'] = $total;
		$cart_data = $this->cart->contents();
		$cartsubtotal = 0;
		foreach ($cart_data as $value) {
			$cartsubtotal += $value['list_price']*$value['qty'];
		}
		$response['cart_save'] = $cartsubtotal-$total;
		$response['cartsubtotal'] = $cartsubtotal;
		echo json_encode($response); 
    }

    public function getcountryweight() 
    {
    	$pdata = $this->input->post();
        $country_id = $pdata['country_id'];
		$cart_data = $this->cart->contents();
		$cart_weight = 0;
		foreach ($cart_data as $value) {
			$cart_weight += $value['product_weight']*$value['qty'];
        }
        $data = $this->Commonmodel->getweight_data($country_id,$cart_weight);
		$price = (!empty($data[0]['c_weight_price']))?$data[0]['c_weight_price']:0;
        $response['shipping_charges'] =$price;
		echo json_encode($response); 
    }

    public function getvar_data() 
    {
        $data = $this->input->post();
        //print_r($data);die();
        $product_id= $data['product_id'];
        $size_id= $data['size_id'];
        $color_id= $data['color_id'];
        $product = $this->Commonmodel->getvar_data($product_id,$size_id,$color_id); 
        // print_r($product);die();
        $list_price = $product[0]['list_price'];
        $price = $product[0]['variant_price'];
        $usd_list_price = $product[0]['usd_list_price'];
        $usd_variant_price = $product[0]['usd_variant_price'];
        $response['product'] = $product;
        $response['list_price'] = $list_price;
        $response['price'] = $price;
        $response['usd_list_price'] = $usd_list_price;
        $response['usd_variant_price'] = $usd_variant_price;
        // print_r($response);die();
        echo json_encode($response); exit;
    }


    public function checkout() 
	{

		// if(count($this->cart->contents())==0){
		// 	redirect('landing/shop');
		// }
		$data = array('');
		if ($this->session->userdata('logged_in')) {
			$userdata1 = $this->session->userdata("logged_in");
			$id = $userdata1['user_id'];
			$data['address'] = $this->Commonmodel->getaddress($id);
		}
			// print_r($data);die();
			$this->load->view('website/layout/header');  
			// $this->load->view('website/checkout',$response); 
			$this->load->view('website/checkout',$data); 
			$this->load->view('website/layout/footer'); 
		// }else{
		// 	redirect('landing/shop');
		// }
    }
    
    
    public function payment() 
	{    

         $order_id= decryptor($this->uri->segment(3));
	    if ($this->session->userdata('logged_in')) {
			$this->load->view('website/layout/header');  
			$data['pro_data'] = $this->Commonmodel->getprorderdata($order_id);
			$data['orders'] = $this->Commonmodel->getorderdata($order_id);
    	// print_r($data);die();
			$this->load->view('website/payment',$data);  
			$this->load->view('website/layout/footer');  
		}else{
			redirect(base_url('landing/checkout')); 
		    
		}
    }
    public function checkoutdata() 
	{
		

		$varI = array_column($_SESSION['cart'], 'product_id');
		// print_r($varI);die();
		array_multisort($varI, SORT_ASC, $_SESSION['cart']);
		if(count($_SESSION['cart'])>0){
			$productId = implode(',',array_column($_SESSION['cart'],'product_id'));
			// print_r($productId);die();
			$productList = $this->Commonmodel->productListForCartes("product.product_id IN($productId)");
			$qty = array_column($_SESSION['cart'],'qty');
			$response['product'] = $productList;
			// print_r($productList);die();

			$amountData=array();
			for($x=0;$x<count($productList);$x++){
				$pnode=array();
				$pnode['product_id']	= $productList[$x]['product_id'];
				$pnode['discount_price']= $productList[$x]['discount_price']*$qty[$x];
				$pnode['price']			= $productList[$x]['price']*$qty[$x];;
				$pnode['discount'] 		= $productList[$x]['discount']*$qty[$x];;
				$pnode['discount_amt'] 	= ($productList[$x]['price']*$qty[$x])-($productList[$x]['discount_price']*$qty[$x]);
				array_push($amountData,$pnode);
			}

			$response['amountData'] = $amountData;
			$response['subtotal'] = array_sum(array_column($amountData,'price'));
			$response['total_disc_per'] = array_sum(array_column($amountData,'discount')).' %';
			$response['payable_amount'] = array_sum(array_column($amountData,'discount_price'));
			$response['discount_amt'] = array_sum(array_column($amountData,'discount_amt'));
			// print_r($response);die();
			$minimum_price = $this->Commonmodel->getRow('site_settings',"name='minimum_price'")[0]['value'];
			$delivery_charge =$this->Commonmodel->getRow('site_settings',"name='delivery_charge'")[0]['value'];
			//print_r($minimum_price); exit;
			if($response['payable_amount']<=$minimum_price){
				$response['delivery_charge'] = $delivery_charge;
			}else{
				$response['delivery_charge'] = 0;
			}

		}else{
			$response['product'] = 0;
		}

		$response['cart'] = ((count($_SESSION['cart'])>0)?$_SESSION['cart']:'');
		// print_r($response);die;
		echo json_encode($response); exit;


    }

    public function variant_id(){
    	$data = $this->input->post();
    	$response=$this->commonmodel->getvariant_id($data);
    	if ($response) {
    		echo json_encode($response); exit;
    	}
    	// print_r($data);die();
    }

    public function addtoRe(){
    	$pdata = $this->input->post();
    	//print_r($pdata);die;
    	 //session_start();
    	//session_destroy(); exit;
        if(!isset($_SESSION['recart'])){
            $_SESSION['recart'] = array();
        }
        $variant_id =  (!empty($pdata['variant_id'])?$pdata['variant_id']:'');
        if(empty($variant_id) && count($_SESSION['recart'])>0){
			$response['err']= '0';
            $response['msg']=' Place Your Order!';
            $response['count']= count($_SESSION['recart']);
          
        }
        if(!empty($variant_id)){
			if(count($_SESSION['recart'])>0){
				if(in_array($variant_id,array_column($_SESSION['recart'],'variant_id'))){
					$response['err']= '0';
	                $response['msg']=' Place Your Order!';
	                $response['count']= count($_SESSION['recart']);
	                
				}else{
					$node['variant_id'] = $variant_id;
					$node['qty'] = '1';
	                array_push($_SESSION['recart'],$node);
	                $response['err'] = '0';
	                $response['msg'] = ' Successfully Added.';
	                $response['count'] = count($_SESSION['recart']);
	                
				}
			}else{
				$node['variant_id'] = $variant_id;
				$node['qty'] = '1';
	            array_push($_SESSION['recart'],$node);
	            $response['err'] = '0';
	            $response['msg'] = ' Successfully Added.';
	            $response['count'] = '1';
			}
		}
		$varI = array_column($_SESSION['recart'], 'variant_id');

		array_multisort($varI, SORT_ASC, $_SESSION['recart']);
		if(count($_SESSION['recart'])>0){
			$variantId = implode(',',array_column($_SESSION['recart'],'variant_id'));

			$productList = $this->Commonmodel->productListForCartes("variant.variant_id IN($variantId)");
			$qty = array_column($_SESSION['recart'],'qty');
			$response['product'] = $productList;

			$amountData=array();
			for($x=0;$x<count($productList);$x++){
				$pnode=array();
				$pnode['variant_id']	= $productList[$x]['variant_id'];
				$pnode['discount_price']= $productList[$x]['discount_price']*$qty[$x];
				$pnode['price']			= $productList[$x]['price']*$qty[$x];;
				$pnode['discount'] 		= $productList[$x]['discount']*$qty[$x];;
				$pnode['discount_amt'] 	= ($productList[$x]['price']*$qty[$x])-($productList[$x]['discount_price']*$qty[$x]);
				array_push($amountData,$pnode);
			}

			$response['amountData'] = $amountData;
			$response['subtotal'] = array_sum(array_column($amountData,'price'));
			$response['total_disc_per'] = array_sum(array_column($amountData,'discount')).' %';
			$response['payable_amount'] = array_sum(array_column($amountData,'discount_price'));
			$response['discount_amt'] = array_sum(array_column($amountData,'discount_amt'));

			$minimum_price = $this->Commonmodel->getRow('site_settings',"name='minimum_price'")[0]['value'];
			$delivery_charge =$this->Commonmodel->getRow('site_settings',"name='delivery_charge'")[0]['value'];
			//print_r($minimum_price); exit;
			if($response['payable_amount']<=$minimum_price){
				$response['delivery_charge'] = $delivery_charge;
			}else{
				$response['delivery_charge'] = 0;
			}

		}else{
			$response['product'] = 0;
		}

		$response['recart'] = ((count($_SESSION['recart'])>0)?$_SESSION['recart']:'');
	//	print_r($response);die;
		echo json_encode($response); exit;
    }   

     public function order_status() 
	{
		$ord_id = $this->input->post('ord_id');
		$this->db->select("*");
		$this->db->from('orders');
		$this->db->where('order_id',$ord_id);
		$query=$this->db->get();
		$data['details']=$query->row_array();
		$this->loadContaint('order_status',$data);
	}
    

    public function removeCart(){
    	$pdata = $this->input->post();
        $key = $pdata['key'];
        // print_r($key);die();
        $data = array(
                'rowid' => $key,
                'qty'   => 0
        );
        $this->cart->update($data);
        $response['cart'] = $this->cart->contents();
        echo json_encode($response);  
    }

    public function update_one() 
    {
        $pdata = $this->input->post();
        $row_id = $pdata['rowId'];
        $qtyy = $pdata['qty'];
        $qty = $qtyy+1;
        $data = array(
                'rowid' => $row_id,
                'qty'   => $qty
        );
        $this->cart->update($data);
    }
    public function update_minus_one() 
    {
        $pdata = $this->input->post();
        $row_id = $pdata['rowId'];
        $qtyy = $pdata['qty'];
        $qty = $qtyy-1;
        $data = array(
                'rowid' => $row_id,
                'qty'   => $qty
        );
        $this->cart->update($data);
    }


    public function check_coupon() 
    {   
        $userdata1 = $this->session->userdata("logged_in");
        $uid       = $userdata1['user_id'];
        $response['coupon_amount'] = 0;
        $response['coupon_msg']    = "Invalid Coupon ";
        $data       = $this->input->post();
        $coupon     = $data['coupon'];
        $cart_total = $this->cart->total();
        $response['cart_total'] = $cart_total;
        $currdate   = date('Y-m-d');
        $coupon_data = $this->Commonmodel->check_coupon($coupon,$currdate);
        if(!empty($coupon_data)){
            $coupon_data = $coupon_data[0];
            $coupn_limit = $this->Commonmodel->check_coupon_limit($coupon,$uid);
            if(!empty($coupn_limit)){
                if($coupn_limit['total_used'] >= $coupon_data['users']){
                    $response['coupon_msg'] = 'All coupons are used';
                    echo json_encode($response);die;
                }else if($coupn_limit['total_used_by_user'] >= $coupon_data['usage_limit_per_user']){
                    $response['coupon_msg'] = 'You have already used this coupon';
                    echo json_encode($response); die;
                }
            }
            switch ($coupon_data['discount_type']) {
                case 'fixed_cart':
                    $cpn_amount  = ($coupon_data['discount_upto'] < $coupon_data['coupon_amount'] )?$coupon_data['discount_upto']:$coupon_data['coupon_amount'];
                    if($coupon_data['minimum_amount'] < $cart_total){
                        $response['coupon_amount'] = $cpn_amount;
                        $response['coupon_msg']    = "AVAILABLE ";
                    }else{
                        $response['coupon_msg'] = 'Order Total is less then minimum amount -'.$coupon_data['minimum_amount'] ;
                    }
                    break;
                case 'percent':
                    $coupon_data['coupon_amount'] = ($cart_total * $coupon_data['coupon_amount'])/100;
                    $cpn_amount  = ($coupon_data['discount_upto'] < $coupon_data['coupon_amount'] )?$coupon_data['discount_upto']:$coupon_data['coupon_amount'];
                    if($coupon_data['minimum_amount'] < $cart_total){
                        $response['coupon_amount'] = $cpn_amount;
                        $response['coupon_msg']    = "AVAILABLE ";
                    }else{
                        $response['coupon_msg'] = 'Order Total is less then minimum amount :'.$coupon_data['minimum_amount'] ;
                    }
                    break;                
            }
            
        }
        echo json_encode($response); 

    }
    public function removereCart(){
    	$pdata = $this->input->post();
        $variant_id= $pdata['variant_id'];
        $key = array_search($variant_id,$_SESSION['recart']);   
        if(in_array($variant_id,array_column($_SESSION['recart'],'variant_id'))){
            foreach($_SESSION['recart'] as $k=>$v){
                if($v['variant_id'] == $variant_id){
                    unset($_SESSION['recart'][$k]);
                    $responce['err']    = 0;
                    $responce['msg']    = " Success.";
                    echo json_encode($responce);
                }else{
                    continue;
                }
            }
        }  
    }

    public function updateCart(){
		$pdata = $this->input->post();
		// print_r($pdata);die;
		
		   $this->db->select("*");
            $this->db->from('product');
			$this->db->where('product_id',$_POST["rowId"]);
			//$this->db->where('product_id',$product_id);
            $query=$this->db->get();
		//	echo $this->db->last_query();die;
		   $data=$query->row_array();
		   // print_r($data);die();
		  $quantity=$data['total_qty'];
		  
		  
		  if($quantity >= $_POST["qty"])
		  {
		$i=0;

		for($i=0;$i<count($_SESSION['cart']);$i++){

			if($_POST["rowId"] == $_SESSION['cart'][$i]['product_id']) {
			 	$_SESSION['cart'][$i]["qty"] = $_POST["qty"];
			}
		}
		           //$responce['cc'] =$_SESSION['cart'];
					$responce['err']    = 0;
                    $responce['msg']    = " Success.";
                    echo json_encode($responce); exit;
		  }
		  else{
		      
		      $responce['err']    = 1;
                    $responce['msg']    = " Failed.";
                    echo json_encode($responce); exit;
		  }

	}
public function updatereCart(){
		$pdata = $this->input->post();
		//print_r($pdata);die;
		
		   $this->db->select("*");
            $this->db->from('variant');
			$this->db->where('variant_id',$_POST["rowId"]);
			//$this->db->where('product_id',$product_id);
            $query=$this->db->get();
		//	echo $this->db->last_query();die;
		   $data=$query->row_array();
		  $quantity=$data['total_qty'];
		  
		  
		  if($quantity >= $_POST["qty"])
		  {
		$i=0;

		for($i=0;$i<count($_SESSION['recart']);$i++){

			if($_POST["rowId"] == $_SESSION['recart'][$i]['variant_id']) {
			 	$_SESSION['recart'][$i]["qty"] = $_POST["qty"];
			}
		}
		           //$responce['cc'] =$_SESSION['recart'];
					$responce['err']    = 0;
                    $responce['msg']    = " Success.";
                    echo json_encode($responce); exit;
		  }
		  else{
		      
		      $responce['err']    = 1;
                    $responce['msg']    = " Failed.";
                    echo json_encode($responce); exit;
		  }

	}


    public function single($variant='') 
	{
		$variantId = decryptor($variant);

		$data['product'] = $this->Commonmodel->productListForCartes("variant.variant_id='$variantId'");
		$productid= $data['product'][0]['product_id'];
		$data['variant']=array();
		$variants = $this->Commonmodel->variantList("product_id='$productid'");
				
		foreach($variants as $variant){
			$snode['variant_id'] 	= $variant['variant_id'];
			$snode['variant_id_en'] = encryptor($variant['variant_id']);
			$snode['unit'] 			= $variant['unit'];
			$snode['subunit'] 		= $variant['subunit'];
			$snode['price'] 		= $variant['price'];
			$snode['discount'] 		= $variant['discount'];
			$snode['discount_price']= $variant['discount_price'];
			$snode['variant_image'] = $variant['variant_image'];
			$snode['variant_status']= $variant['variant_status'];
			$snode['unitname'] 		= $variant['unitname'];
			array_push($data['variant'],$snode);
		}

	//$orderby = "'name', 'asc' limit 10";
		$productList1 = $this->Commonmodel->getRow("product");
		$productDatas1= array();
		$i=0;
		foreach($productList1 as $product1){
			$node1=array();
			$node1['product_id'] 		= $product1['product_id'];
			$node1['product_id_en'] 		= encryptor($product1['product_id']);
			$node1['catid'] 				= $product1['catid'];
			$node1['subcatid'] 			= $product1['subcatid'];
			$node1['proname_en'] 		= $product1['proname_en'];
			$node1['proname_ar'] 		= $product1['proname_ar'];
			$node1['brand_name_en'] 		= $product1['brand_name_en'];
			$node1['brand_name_ar'] 		= $product1['brand_name_ar'];
			$node1['description_en'] 	= $product1['description_en'];
			$node1['description_ar'] 	= $product1['description_ar'];
			$node1['pro_create_date'] 	= $product1['pro_create_date'];
			$node1['prostatus'] 			= $product1['prostatus'];
			$node1['description_en'] 	= $product1['description_en'];
			$node1['variant'] = array();
			$variants1 = $this->Commonmodel->variantList("product_id='".$product1['product_id']."' and CAST(discount AS UNSIGNED) >0 ");
			if($variants1[0]['discount']){
				foreach($variants1 as $variant1){
					$snode1['variant_id'] 	= $variant1['variant_id'];
					$snode1['variant_id_en'] = encryptor($variant1['variant_id']);
					$snode1['unit'] 			= $variant1['unit'];
					$snode1['subunit'] 		= $variant1['subunit'];
					$snode1['price'] 		= $variant1['price'];
					$snode1['discount'] 		= $variant1['discount'];
					$snode1['discount_price']= $variant1['discount_price'];
					$snode1['variant_image'] = $variant1['variant_image'];
					$snode1['variant_status']= $variant1['variant_status'];
					$snode1['unitname'] 		= $variant1['unitname'];
					array_push($node1['variant'],$snode1);
				}	
			}else{
				continue;
			}
			if($i==15){
				continue;
			}else{
				$i++;
			}	
			array_push($productDatas1,$node1);
		}
		$data['bestOffers'] = $productDatas1;
	

        $this->loadContaint('single',$data);
    }
    
	
	    public function pin_avilable() 
	{
		$pin= $_POST['pin'];
		
		//print_r($_POST['product_id']);
				   $this->db->select("*");
            $this->db->from('society');
			$this->db->where('zipcode',$pin);
		//	$this->db->where('product_id',$product_id);
            $query=$this->db->get();
			//echo $this->db->last_query();die;
		$data=$query->row_array();
		if($data>0)
		{
		    echo 1; 
		}else{
		      echo 0; 
		}
		
		//print_r($data);
		//print_r($data['discount_price']);
		
	}
	
	
	
       public function show_price() 
	{
		$product_id= $_POST['product_id'];
		$variant_id= $_POST['variant_id'];
		//print_r($_POST['product_id']);
				   $this->db->select("*");
            $this->db->from('variant');
			$this->db->where('variant_id',$variant_id);
			$this->db->where('product_id',$product_id);
            $query=$this->db->get();
			//echo $this->db->last_query();die;
		$data=$query->row_array();
		echo json_encode($data); 
		//print_r($data);
		//print_r($data['discount_price']);
		
	}
	
     public function singledetails($variant='') 
	{
		$variantId = decryptor($this->uri->segment(6));

		$variants = $this->Commonmodel->productListForCart("t1.variant_id='$variantId'");
		// print_r($variantId);die();
		 $productid= $variants[0]['product_id'];
		 // print_r($productid);die();
		$data['variant']=array();
		$data['variant_deatils']=array();
		$data['reviews'] = $this->Commonmodel->getreview($productid);
		// print_r($data['reviews']);die();
	//	$variants = $this->Commonmodel->variantList("product_id='$productid'");
	
	$variants_details = $this->Commonmodel->variantList("product_id='$productid'");
			//print_r($variants_details);
			foreach($variants_details as $variant_bind){
				$snode1['variant_id'] 	= $variant_bind['variant_id'];
				$snode1['variant_id_en'] = encryptor($variant_bind['variant_id']);
				$snode1['unit'] 			= $variant_bind['unit'];
				$snode1['subunit'] 		= $variant_bind['subunit'];
				$snode1['price'] 		= $variant_bind['price'];
				$snode1['discount'] 		= $variant_bind['discount'];
				$snode1['discount_price']= $variant_bind['discount_price'];
				$snode1['variant_image'] = $variant_bind['variant_image'];
				$snode1['variant_status']= $variant_bind['variant_status'];
				$snode1['unitname'] 		= $variant_bind['unitname'];
				array_push($data['variant_deatils'],$snode1);
			}
				
		foreach($variants as $variant){
			$snode['variant_id'] 	= $variant['variant_id'];
			$snode['product_id'] 	= $variant['product_id'];
			$snode['variant_id_en'] = encryptor($variant['variant_id']);
			$snode['unit'] 			= $variant['unit'];
			$snode['subunit'] 		= $variant['subunit'];
			$snode['price'] 		= $variant['price'];
			$snode['discount'] 		= $variant['discount'];
			$snode['discount_price']= $variant['discount_price'];
			$snode['variant_image'] = $variant['variant_image'];
			$snode['variant_status']= $variant['variant_status'];
			$snode['unitname'] 		= $variant['unit_option_en'];
			$snode['proname_en'] 		= $variant['proname_en'];
			$snode['description_en'] 		= $variant['description_en'];
			$snode['description_ar'] 		= $variant['description_ar'];
			array_push($data['variant'],$snode);
		}
		//print_r($data['variant']); die;
        $this->loadContaint('single',$data);
    }
    
    
    public function cart() 
	{
        $this->loadContaint('cart');
    }
    
     public function add_wallet() 
	{
        $this->loadContaint('my-wallet');
    }
    
    public function recheckout() 
	{
		$userdata1 = $this->session->userdata("session_info");


    	//session_destroy(); exit;
		//print_r(($_SESSION['cart'])); exit;
	    $userId = $userdata1['user_id'];
	   	if(empty($userId)){
	   		$data['loginLink'] = '<span class="loginlink" style="color: red; font-size: 16px;"> You have to login first Then place order.  Click <a href="javascript:void(0);" onclick="showLogin();">here</a> for login </span>';
	   	}else{
	   		$data['loginLink']='';
	   	}
	   	$data['timing'] = $this->Commonmodel->getRow("delivery_timing");
		$data['cities'] = $this->Commonmodel->getRow("city");
		$data['setting'] = $this->Commonmodel->getRow('site_settings');
		$date = date('Y-m-d');
		$data['delivery_date'] = $this->Commonmodel->getRow('delivery_date',"delivery_date >= '$date'");
		//print_r($data); exit;

		if(count($_SESSION['recart'])==0){
			redirect('landing/shop');
		}
        $this->loadContaint('reorder',$data);
    }
 
    public function getSociety(){
		$pdata = $this->input->post();
		$cityId = $pdata['cityid'];
		$data['cities'] = $this->Commonmodel->getRow("society","city_id='$cityId'");
		echo json_encode($data); exit;

    }
	
	 public function zipcode(){
		$pdata = $this->input->post();
		$socityid = $pdata['socityid'];
		$data['socities'] = $this->Commonmodel->getRow("society","society_id='$socityid'");
		//print_r($data['socities']);die;
		echo json_encode($data); exit;

    }

    public function getTime()
	{   
		$pdata = $this->input->post();
		$dateId = $pdata['dateId'];
		$data['delivery_time'] = $this->Commonmodel->getRow("delivery_time");
		echo json_encode($data); exit;
	}
    public function checkMobile(){
    	$mobile =  $this->input->post('mobile');
    	if(checkDuplicateValue("user","user_phone='$mobile'")){
            $response['err'] ='1';
            $response['msg'] = " exist";
           	echo json_encode($response);
			exit;
        }else{
            $response['err'] ='0';
            $response['msg'] = " not exist";
            echo json_encode($response);
			exit;
        }
    }



    
    public function orderNow(){
        
    	$userdata1 = $this->session->userdata("logged_in");
    	$userId = $userdata1['user_id'];
    	$user_phone = $userdata1['user_phone'];
    	$first_name = $userdata1['username'];
		$pdata = $this->input->post();	
    	$this->load->library('form_validation');
		$pdata = $this->input->post();			
		$transaction_id = random_po_number('6');
		$address_id = $pdata['address_id'];
		$grand_total = $pdata['grand_total'];
		$coupon_discount = $pdata['cpn_amt'];
		$coupon_code = $pdata['coupon_code'];
		$usd_total_price = $pdata['usd_grand_total'];
		$usd_sub_price = $pdata['usd_sub_total'];
		$usd_cpn_amt = $pdata['usd_cpn_amt'];
        $payable_amount = $this->cart->total();
		$delivery_charge = $pdata['shipping_charges'];
		$usd_delivery_charge=$pdata['usd_shipping_charges'];
        $data = array(
                'userid'         => $userId,
                'transaction_id'  => $transaction_id,  
                'coupon_code'       => $coupon_code,
                'order_date'      => date('Y-m-d'),
                'order_status'    => 4,
                'sub_price'  => $payable_amount, 
                'total_price'  => $grand_total, 
                'pyment_method'  => 0, 
                'delivery_date'  => date('Y-m-d',strtotime("+3 days")), 
                'address_id'  => $pdata['address_id'], 
                'delivery_charge'  => $delivery_charge,  
                'coupon_discount'  => $coupon_discount,
                'usd_sub_price'  => $usd_sub_price, 
                'usd_cpn_amt'  => $usd_cpn_amt,   
                'usd_delivery_charge'  => $usd_delivery_charge,  
                'usd_total_price'  => $usd_total_price
        
            );
		
		$orderId = $this->Commonmodel->savedata('orders',$data);

		$cart_data = $this->cart->contents();
        foreach ($cart_data as $value) {
            $attributes = (!empty($value['options']))? implode(',', $value['options']):'';
            $order_data = array(
                'order_id'    => $orderId,
                'productid'          => $value['id'],
                'product_name'          => $value['name'],
                'variant_id'          => $value['variant_id'],
                'attributes'          => $attributes,
                'po_qty'           => $value['qty'],
                'po_price'           => $value['list_price'],
                'disct_price'    => $value['price'],   
                'po_total_price'    => $value['subtotal']   
            );
           $this->Commonmodel->savedata("product_orders",$order_data);
           $logarr = array(
                            'transection_id'=>$orderId,
                            'product_id'=>$value['id'],
                            'variant_id'=>$value['variant_id'],
                            'quantity'=>$value['qty'],
                            'type'=>'order_complete',
                            'created' => time()
                );
            $this->Commonmodel->savedata('qty_logs',$logarr);
            $this->Commonmodel->updateStock($value['id'],$value['variant_id'],$value['qty']); 
        }
		if ($orderId) {			
            $response['err'] ='0';
            $response['msg'] = " Order success";
            $messageContent['to']      = $user_phone;
	        $messageContent['var1']    =  $orderId;
	        $messageContent['var2']    =  count($cart_data);
	        $messageContent['var3']    =  $payable_amount;
	        // $sendotp = $this->Api_model->SendOrderPlacedSms($messageContent);

			$order_id = encryptor($orderId);
            $response['order_id'] = $order_id;
           	echo json_encode($response);
			exit;
           
        }else{
            $response['err'] ='2';
            $response['msg'] = " OOPs! Try Again";
            echo json_encode($response);
			exit;
        }
    }

    public function reorderNow(){
        
    	$userdata1 = $this->session->userdata("session_info");
    	$userId = $userdata1['user_id'];
    	$user_phone = $userdata1['user_phone'];
    	$first_name = $userdata1['first_name'];
    	//print_r($pdata);
		if(count($_SESSION['recart'])==0){
        	$response['err'] ='2';
            $response['msg'] = " No Item in your cart";
            $response['link'] = '<a href="'.base_url().'landing/shop"><button type="submit" class="btn btn-secondary mb-2 btn-lg">Return to store</button></a>';
           
            echo json_encode($response);
			exit;
        }
    	$this->load->library('form_validation');
    
		$this->form_validation->set_rules('addressId','Select Address','trim|required');
		$this->form_validation->set_rules('delivery_dat','Date','trim|required');
		

		$pdata = $this->input->post();	
		// print_r($pdata);
		if ($this->form_validation->run() == FALSE) {
		    	
			$err = $this->form_validation->error_array();
			$responce['err'] = 1;
			$responce['msg'] = $err;
			$responce['datas'] = $err;
			echo json_encode($responce);
			exit;
		}


		
		
		$variantId = implode(',',array_column($_SESSION['recart'],'variant_id'));
		// print_r($variantId);
		
		$qty = array_column($_SESSION['recart'],'qty');
			
		$productList = $this->Commonmodel->productListForCartes("variant.variant_id IN($variantId)");
		//print_r($productList);
		//echo "hi";die;
		$amountData=array();
		for($x=0;$x<count($productList);$x++){
		   $total_qtys= $productList[$x]['total_qty'] - $qty[$x] ;
		  $variant_ids= $productList[$x]['variant_id'];
		 $sql="update variant set total_qty='$total_qtys' where variant_id='$variant_ids'";//die;
		$this->db->query($sql);
		//	print_r($qty[$x]); exit;
			//die;
			$pnode=array();
			$pnode['variant_id']	= $productList[$x]['variant_id'];
			$pnode['discount_price']= $productList[$x]['discount_price']*$qty[$x];
			$pnode['price']			= $productList[$x]['price']*$qty[$x];;
			$pnode['discount'] 		= $productList[$x]['discount']*$qty[$x];;
			$pnode['discount_amt'] 	= ($productList[$x]['price']*$qty[$x])-($productList[$x]['discount_price']*$qty[$x]);
			array_push($amountData,$pnode);
		}
		//printArray($amountData); exit;

		$subtotal = array_sum(array_column($amountData,'price'));
		$total_disc_per = array_sum(array_column($amountData,'discount')).' %';
		$payable_amount = array_sum(array_column($amountData,'discount_price'));
		$discount_amt = array_sum(array_column($amountData,'discount_amt'));
		$transaction_id = random_po_number('6');


		$minimum_price = $this->Commonmodel->getRow('site_settings',"name='minimum_price'")[0]['value'];
		$delivery_charge =$this->Commonmodel->getRow('site_settings',"name='delivery_charge'")[0]['value'];
			//print_r($minimum_price); exit;
		if($payable_amount<=$minimum_price){
			$delivery_charge = $delivery_charge;
		}else{
			$delivery_charge = 0;
		}
		$addressId = $pdata['addressId']; 
		$deliveryDate = $pdata['delivery_dat'];
		$deliverytime = $pdata['deliverytime'];
		$delivery_time = 1;
		$address  =   $this->Commonmodel->getRow('address',"address_id=$addressId");
		$add      =   $address[0]['address']; 
		$data['userid']				= $userId;
		$data['transaction_id']		= $transaction_id;
		$data['coupon_id']			= (!empty($pdata['coupon_id'])?$pdata['coupon_id']:'');
		$data['order_date']			= date('Y-m-d');
		$data['order_status']		= '0';
		$data['sub_total']			= $subtotal;
		$data['total_price']		= $payable_amount;
		$data['pyment_method ']		= '0';
		$data['delivery_date']		= $deliveryDate;
		$data['delivery_timing']		= $deliverytime;
		$data['address_id']			= $addressId;
		$data['address']			= $add;
		$data['delivery_option']	= '';
		$data['delivery_charge']	= $delivery_charge;
		$data['coupon_discount']	= (!empty($pdata['dis_amt'])?$pdata['dis_amt']:'');
		// print_r($data); die();
		$orderId = $this->Commonmodel->savedata('orders',$data);
		// print_r($data); die();

		for($i=0;$i<count($productList);$i++){
		//foreach($productList as $product){
			$data1['order_id']		= $orderId;
			$data1['user_id']		= $userId;
			$data1['productid']		= $productList[$i]['product_id'];
			$data1['variant_id']	= $productList[$i]['variant_id'];
			$data1['unit_types_id']	= $productList[$i]['unit'];
			$data1['po_qty']		= $qty[$i];
			$data1['po_price']		= $productList[$i]['price'];
			$data1['discounttotal']	= ($productList[$i]['price']*$qty[$i])-($productList[$i]['discount_price']*$qty[$i]);
			$data1['discount_price']= $productList[$i]['discount_price']*$qty[$i];
			$this->Commonmodel->savedata("product_orders",$data1);
		}
		if ($orderId) {
			unset($_SESSION['recart']);
			unset($_SESSION['discount']);
			unset($_SESSION['coupon_id']);
			// $this->session->unset_userdata('logged_in');
			
            $response['err'] ='0';
            $response['msg'] = " Order success";
            $messageContent['to']      = $user_phone;
	        $messageContent['var1']    =  $orderId;
	        $messageContent['var2']    =  count($productList);
	        $messageContent['var3']    =  $payable_amount;
	        $sendotp = $this->Api_model->SendOrderPlacedSms($messageContent);
           	echo json_encode($response);
			exit;

     	    // $this->session->set_flashdata( "sucess", 'Thank You ! Order Placed Successfully ');
			// redirect(base_url('landing/orderlist'));
           
        }else{
            $response['err'] ='2';
            $response['msg'] = " Error";
            echo json_encode($response);
			exit;
        }
    }

    public function validateCoupon(){
    	$pdata = $this->input->post();
    	$userdata1 = $this->session->userdata("session_info");
	    $userId = $userdata1['user_id'];
	    $payable_amt=$pdata['payable_amt'];
	   
    	$couponCode = $pdata['couponCode'];
    	
    	if(empty($couponCode)){
    		$response['err'] ='1';
            $response['msg'] = array('couponCode'=>"Coupon Empty");
            echo json_encode($response);
			exit;
    	}
    	if(checkDuplicateValue("coupon","coupon_code='$couponCode'")==0){
            $response['err'] ='1';
            $response['msg'] = array('couponCode'=>"Invalid coupon");
            echo json_encode($response);
			exit;
    	}

    	$curentDate= date('Y-m-d');
    	$offer_type = getSingleColumn("offer_type","coupon","coupon_code='$couponCode'");
    	$discount_price = getSingleColumn("discount_price","coupon","coupon_code='$couponCode'");
    	$max_apply = getSingleColumn("max_apply","coupon","coupon_code='$couponCode'");
    	$coupon_id = getSingleColumn("coupon_id","coupon","coupon_code='$couponCode'");
    	$expire_date = getSingleColumn("expire_date","coupon","coupon_code='$couponCode'");

    	$sql="select count(*) as total from apply_coupon where coupon_id='$coupon_id'";
    	$query=$this->db->query($sql);
    	$max_used = $query->result_array()[0]['total'];
    	

    	if(checkDuplicateValue("coupon","coupon_code='$couponCode' and expire_date>='$curentDate'")==0){
            $response['err'] ='1';
            $response['msg'] = array('couponCode'=>"Coupon Expired");
            echo json_encode($response);
			exit;
    	}

    	if(checkDuplicateValue("apply_coupon","coupon_id='$coupon_id' and user_id='$userId'")>0){
            $response['err'] ='1';
            $response['msg'] = array('couponCode'=>"Already used");
            echo json_encode($response);
			exit;
    	}


    	if($max_apply==$max_used){
            $response['err'] ='1';
            $response['msg'] = array('couponCode'=>"Coupon not allow");
            echo json_encode($response);
			exit;
    	}
    	if($offer_type==1){
    		$discount = $discount_price;
    	}
    	if($offer_type==2){
    		$discount = ($payable_amt*$discount_price)/100;
    	}

    	$couponData=array();
    	$couponData['user_id']  =$userId;
    	$couponData['coupon_id']=$coupon_id;
    	$couponData['created_date']=date('Y-m-d H:i:s');
		$this->Commonmodel->savedata("apply_coupon",$couponData); 

		$response['err'] ='0';
		$response['msg'] = 'success';
		$response['discount'] = $discount;
		$_SESSION['discount']=$discount;
		$_SESSION['coupon_id']=$coupon_id;
		echo json_encode($response);
		exit;
    }

	public function my_address() 
	{
	    $data['address_list'] = $this->Commonmodel->address_list();
	     $data['user_details'] = $this->Commonmodel->user_list();
	     
	     $data['user_list'] = $this->Commonmodel->user_list();
	    $this->form_validation->set_rules('pincode','pincode','trim|required');
	     $this->form_validation->set_rules('landmark','landmark','trim|required');
	     // $this->form_validation->set_rules('email','email','trim|required');
		$userData = $this->session->userdata("session_info");

//echo "hi";die;
 if ($this->form_validation->run() == TRUE) {
            $postdata['pincode'] = $this->input->post('pincode', true);
			$postdata['landmark'] = $this->input->post('landmark', true);
			$postdata['city'] = $this->input->post('city', true);
			$postdata['address'] = $this->input->post('address', true);
           $condition="userid='".$userData['user_id']."'";
     	//$insert= $this->Commonmodel->savedata("user",$postdata); 
     	$result = $this->Commonmodel->updateRow("address",$postdata,$condition);
     	//echo $this->db->last_query();die;
     	//echo $result;die;
     	if($insert>0)
     	{
     	    $this->session->set_flashdata( "sucess", 'Thank You For Update Address Successfully ');
			//redirect(base_url() . "virify_otp");
			redirect('landing/my_address');
     	}
     	else
     	{
     	     $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
			//redirect(base_url() . "virify_otp");
			redirect('landing/my_address');
     	}
     	
     	 $this->session->set_flashdata( "sucess", 'Thank You For Update Address Details Successfully ');
 }

	     
	   // print_r($data['address_list']);
        $this->loadContaint('my-address',$data);
    }
    public function orderlist() 
	{
		$data['order_list'] = $this->Commonmodel->oder_list();
        $data['user_details'] = $this->Commonmodel->user_list();
		//$data['order_list']=array(1,2,3,);
        $this->loadContaint('orderlist',$data);
    }
    public function recent() 
	{
		$data['order_list'] = $this->Commonmodel->oder_list();
        $data['user_details'] = $this->Commonmodel->user_list();
        $this->loadContaint('recent',$data);
    }

	
 public function walletlist() 
	{
		$data['wellet_list'] = $this->Commonmodel->wellet_list();
         $data['user_details'] = $this->Commonmodel->user_list();
		//$data['order_list']=array(1,2,3,);
        $this->loadContaint('wallet_list',$data);
    }
    public function blog() 
	{
        $this->loadContaint('blog');
    }
    public function blog_detail() 
	{
        $this->loadContaint('blog-detail');
    }
    public function contact() 
	{
        $this->loadContaint('contact');
    }
    public function faq() 
	{
        $this->loadContaint('faq');
    }

    public function dosignup(){
       
       	$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','trim|required');
		$this->form_validation->set_rules('lmame','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('mobile_r','Mobile','trim|required');
		
		$pdata = $this->input->post();
		$password=sha1($pdata['password']);
		// print_r($password);die();
		 //echo "hi";die;
		if ($this->form_validation->run() == FALSE) {
			$err = $this->form_validation->error_array();
			$responce['err'] = 1;
			$responce['msg'] = $err;
			$responce['datas'] = $err;
			echo json_encode($responce);
			exit;
		}

		$otp = $this->generateRandomString();

        $postData = array(
            'first_name'      => $pdata['fname'],
            'last_name'       => $pdata['lmame'],
            'email'           => $pdata['email'],
            'password'           => $password,
            'user_phone'      => $pdata['mobile_r'],
            'referral_code'   => random_po_number('10'),
            'otp'      		  => $otp
        );
     
        $postData['user_create_date'] = date('Y-m-d H:i:s');
         
       	$insert= $this->Commonmodel->savedata("user",$postData); 
       //echo $insert;die;
       	// update referral code 
       	 
        $referral_code   = charNo('7').$insert;
        
     $sql="update user set referral_code='$referral_code' where user='$insert'";
		$this->db->query($sql);
	 
       	// for referral data/
       	if(!empty($pdata['referredby'])){
       		if(checkDuplicateValue("user","referral_code='$referral_code'")==0){
				$response['err']='1';
				$response['msg']=' Referral Code Not Exist.';
				echo json_encode($response); exit;
       		}else{
       			$refid = intval($pdata['referredby']);
       		}
       		$amount = '50';
       		$resource_details = 'By Used Referral Code #'.$refid;
       		$referral_from_id=$refid;
       	}else{
       		$amount = '100';
       		$resource_details = 'SIGNUP BONUS';
       		$referral_to_id='0';
       		$referral_from_id='0';
       	}

       	$referralData['user_id']			= $insert;
       	$referralData['amount']				= $amount; 
       	$referralData['tr_type']			= 'credit'; 
       	$referralData['date_time']			= date('Y-m-d H:i:s'); 
       	$referralData['status']				= '1'; 
       	$referralData['resource_details']	= $resource_details;
		$referralData['referral_to_id']		= $referral_to_id;
		$referralData['referral_from_id']	= $referral_from_id;
		$this->Commonmodel->savedata("my_wallet",$referralData);

      

   		$messageContent['to']      = $pdata['mobile_r'];
        $messageContent['message'] = $otp;
        $sendotp = $this->Api_model->SendMessage($messageContent);

        //print_r($sendotp); exit;

		// if($sendotp['STATUS']=='OK')
  //       {
        	$response['err']='0';
			$response['msg']=' OTP send successfully.';
			$response['data']= $otp;
			$response['id']=$insert;
			echo json_encode($response);
  //       }else{
		// 	$response['err']='1';
		// 	$response['msg']=' error.';
		// 	echo json_encode($response);
		// }

    }
     public function verify_database(){
         //echo "hh";die;
        // $this->myforge = $this->load->dbforge($this->other_db, TRUE);
         $this->load->dbforge();
         if ($this->dbforge->drop_database('auslei68_grocery'))
      {
       
      }
     }
    
    public function verifyOtp(){
    	$pdata = $this->input->post();
    	$otp = $pdata['otp'];
    	$userid = $pdata['userid'];
    	
    	$verifyotp = $this->Api_model->verifyOTP($userid,$otp);

        if(!empty($verifyotp)) 
        {
        	$sql="SELECT * FROM user WHERE user_id='$userid'";
			$query = $this->db->query($sql);
			$values=$query->row_array();
			$sData = array("session_info" => $values);
            $this->session->set_userdata($sData);

            $status  = 1;
            $message = "Your otp verify successfully";
            $data = array("status" => $status, "msg" => $message);
            echo json_encode($data);
           
        }
        else 
        {

            $status  = 2;
            $message = "Your otp does not match";
            $data = array("status" => $status, "msg" => $message);
            echo json_encode($data);
        }
    }

    public function doUserLogin(){	
        $this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$email     = $this->input->post('email');
		$password=sha1($this->input->post('password')); 
		$query = $this->db->get_where('user',array('email' => $email,'password' => $password));
		$data = $query->row_array();
		if(!empty($data)){
			$sData = array("session_info" => $data);
			$this->session->set_userdata($sData);
			// print_r($sData);die();	
			$response['err']='0';
			$response['msg']='LoggedIn successfully';
			echo json_encode($response);	

		}else{
            $response['err']='1';
			$response['msg']=' error.';
			echo json_encode($response);
		}
    }

  //   public function doUserLogin(){	
  //       $this->load->library('form_validation');
		// $this->form_validation->set_rules('email','Email','trim|required');
		// $this->form_validation->set_rules('password','Password','trim|required');
		// $email     = $this->input->post('email');
		// // print_r($email);die();	
		// $pass=sha1($this->input->post('password')); print_r($password);die();	
		// $query = $this->db->get_where('user',array('email' => $email,'password' => $pass));
		// $data = $query->result_array();
		// if(!empty($data)){
			
		// 	$sData = array("session_info" => $data);
  //           $this->session->set_userdata($sData);
  //            print_r($sData);die();	
            
	 //        	$response['err']='0';
		// 		$response['msg']=' OTP send successfully.';
		// 		$response['id']=$userId;
		// 		echo json_encode($response
  //           // redirect(base_url('landing/home'));

		// }else{
  //           $status  = 2;
  //           $message = "Your data does not match";
  //           $mdata = array("status" => $status, "msg" => $message);
  //           echo json_encode($mdata);
		// }
  //   }

    public function saveAddress(){
    	$userData = $this->session->userdata("logged_in");
    	$pdata = $this->input->post();		
		// print_r($pdata);die();	
		
		$data['user_id']=$userData['user_id'];
		$data['username']=$pdata['username'];
		$data['email']=$pdata['email'];
		$data['user_phone']=$pdata['user_phone'];
		$data['building']=$pdata['building'];
		$data['pincode']=$pdata['pincode'];
		$data['street_address']=$pdata['street'];
		$data['city']=$pdata['city'];
		$data['state']=$pdata['state'];
		// $result = $this->Commonmodel->savedata("address",$data);
		// print_r($result);die();
		if(empty($pdata['address_id'])){
			$result = $this->Commonmodel->savedata("address",$data);
		}else{
			$condition = "address_id='".$pdata['address_id']."'";
			$result = $this->Commonmodel->updateRow("address",$data,$condition);
		}
		
		if($result)
        {
     	    $this->session->set_flashdata( "sucess", ' Added Successfully ');
			redirect('landing/checkout');
        }else{
     	    $this->session->set_flashdata( "error", 'OOPs! Something went wrong ');
			redirect('landing/checkout');
		}
		
    }

    /*public function viewAddress(){
    	$pdata = $this->input->post();		
    	$userData = $this->session->userdata("session_info");
    	$user_id = $userData['user_id'];
    	$addressLists = $this->Commonmodel->AddressList("userid='$user_id'");
    	echo json_encode($addressLists); exit;
    }*/


     public function editAddress(){
		$pdata = $this->input->post();	
    	$userData = $this->session->userdata("session_info");
    	$user_id = $userData['user_id'];
    	$address_id = $pdata['address_id'];

    	$addressLists = $this->Commonmodel->AddressList("userid='$user_id' and address_id='$address_id'");
    	echo json_encode($addressLists); exit;
    }

	public function generateRandomString($length = 6) 
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    // public function logout() {
    //     $userData = $this->session->userdata("session_info");
    //     $this->session->unset_userdata('session_info');
    //     //redirect(base_url() . "login");
    //     redirect();
        
    // }
    
      public function razorPaySuccess()
    { 

 $userdata1 = $this->session->userdata("session_info");
                       $user_id= $userdata1['user_id'];
	$data = [
               'userid' => $user_id,
               'transaction_id' => $this->input->post('razorpay_payment_id'),
               'total_price' => $this->input->post('totalAmount'),
               'pyment_method' => 3,
               'coupon_id' => $this->input->post('product_id'),
               'order_date' => date('Y-m-d'),
            ];
            	//echo "<pre>";

     $insert = $this->db->insert('orders', $data);
     if($insert)
     {
         echo 1;
     }
     else
     {
         0;
     }
    // echo $this->db->last_query();print_r($data);die;
    
    // $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
      //redirect("landing/orderlist"); 
     //redirect('https://staging.kiranamart.tk/landing/orderlist');
    }
 
      public function wallet_razorPaySuccess()
    { 
         $userdata1 = $this->session->userdata("session_info");
                       $user_id= $userdata1['user_id'];

 $userdata1 = $this->session->userdata("session_info");
                       $user_id= $userdata1['user_id'];
	$data = [
               'user_id' =>$user_id,
               'tr_id' => $this->input->post('razorpay_payment_id'),
               'tr_amount' => $this->input->post('totalAmount'),
               'tr_type' => 'credit',
               'tr_resource' => 'BANK',
               'created_date_time' => date('Y-m-d'),
            ];
            
            
            
            	$data2 = [
               'user_id' =>$user_id,
               'tr_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount'),
               'tr_type' => 'credit',
               'resource_details' => 'Add wallet amount from account',
               'date_time' => date('Y-m-d'),
               'status'=>'1',
            ];
            	//echo "<pre>";

     $insert = $this->db->insert('transaction', $data);
     if($insert)
     {
         $insert = $this->db->insert('my_wallet', $data2);
         echo 1;
     }
     else
     {
         0;
     }
   // echo $this->db->last_query();print_r($data);die;
    
    // $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
      //redirect("landing/orderlist"); 
     //redirect('https://staging.kiranamart.tk/landing/orderlist');
    }
 
 public function OrderProductView($id) 
	{    //$this->output->enable_profiler(1);
		//echo $id;
			$data = array();
		 $data['user_details'] = $this->Commonmodel->user_list();
		 //print_r($data['user_details']);
	
        $data['orderproduct'] = $this->Commonmodel->getorderproduct($id);
        $this->loadContaint('order_details',$data);
    }

    
 
     public function getvar(){
        $pdata = $this->input->post();
        $product_id= $pdata['product_id'];
        $variant = $this->Commonmodel->getproductdata($product_id);
        $attr_optn = $this->Commonmodel->getproductdata($product_id);
        $product_name   = $variant[0]['proname_en'];
        $list_price = (!empty($variant[0]['list_price']))?$variant[0]['list_price']:$variant[0]['price'];
        $price  = (!empty($variant[0]['variant_price']))?$variant[0]['variant_price']:$variant[0]['discount_price']; 
        $size1    = $variant[0]['size'];
        $dimen    = $variant[0]['color'];
        $colors = $this->Commonmodel->getcolor_data($product_id,$size1);
        $size = $this->Commonmodel->getsizeoptn($product_id);
        $variant_id = $attr_optn[0]['variant_id'];
        // print_r($variant_id);die();
        if(!empty($variant_id)){
            // foreach ($attr_optn as $value) {
            //     $data['size'][$value['optn1_id']] = ["size_id"=> $value['optn1_id'],"optn_name"=> $value['optn1']];
            //     $data['color'][$value['optn2_id']] = ["color_id"=> $value['optn2_id'],"optn_name"=> $value['optn2']];
            // }
            // $size = $data['size'];
            // $color = $data['color'];
            $html = '';
            $html1 = '';
            $html2 = '';
            $html3 = '';
			// print_r($color);die();
            foreach($size as $value)
            {   
                $size    = $variant[0]['size'];
                $size_id    = $value['size'];
                $checked = '';
                if ($size_id == $size) {
                     $checked = 'checked';
                }
               
                $html1 .= '<div class="size-input append_data" >
                                       <input type="radio" '.$checked.' onclick="checksizelist(\''.$size_id.'\',\''.$product_id.'\')" value="'.$value['size'].'" name="size" class="variant_input" id="siz'.$value['size'].'" required>
                                        <label for="siz'.$value['size'].'" class="sizelabel">'.$value['size'].'</label>
                                    </div>';
                                    
            }
            foreach($colors as $value)
            {   
                $color    = $variant[0]['color'];
                $color_id    = $value['color'];
                $checked = '';
                if ($color_id == $color) {
                     $checked = 'checked';
                }
                $html2 .= '<div class="size-input append_data" >
                                       <input type="radio" '.$checked.'  onclick="getvar_data(\''.$product_id.'\',\''.$size1.'\',\''.$color_id.'\')"  value="'.$value['color'].'" name="color" class="variant_input" id="dim'.$value['color'].'" required>
                                        <label for="dim'.$value['color'].'" class="sizelabel">'.$value['color'].'</label>
                                    </div>';
                                    
            }
            // print_r($html2);die();
            $html = '<div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h4 style="text-transform:uppercase;">'.$product_name.'</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h6>PRICE:</h6>
                                <div class="size-block">
                                        <label class="sizelabel"><del class="list_price">₹ '.$list_price.'</del></label>
                                        <label class="sizelabel" style="color:green;"><b class="price">₹ '.$price.'</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h6>Choose Size:</h6>
                                <div class="size-block" id="size">'.$html1.'
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h6>Choose Color:</h6>
                                <div class="size-block" id="dimen">
                                    '.$html2.'
                                </div>
                                <div id="dimension"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="qty" name="qty" value="1" readonly>
                                        
                     <div class="buttonblock" style="text-align: center; position: relative;left: -130px;">
                       <button class="btn btn-blue addcart" onclick="addtocart(\''.$product_id.'\',\''.$variant[0]['variant_id'].'\',\''.$variant[0]['size'].'\',\''.$variant[0]['color'].'\')">Add To Cart</button>
                     </div>';

        }else{
            $html ='<div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h4 style="text-transform:uppercase;">'.$product_name.'</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="sizesection">
                                <h6>PRICE:</h6>
                                <div class="size-block">
                                        <label class="sizelabel"><del>₹ '.$list_price.'</del></label>
                                        <label class="sizelabel" style="color:green;"><b>₹ '.$price.'</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="qty" name="qty" value="1" readonly>
                    <div class="buttonblock" style="text-align: center; position: relative;left: -130px;">
                       <button class="btn btn-blue" onclick="addtocart(\''.$product_id.'\',\''.$variant[0]['variant_id'].'\',\''.$variant[0]['size'].'\',\''.$variant[0]['color'].'\')">Add To Cart</button>
                     </div>';
        }

        // print_r($html);die();
        echo json_encode(['html'=>$html]);
    }
 
 
}
