<?php

if (!defined('BASEPATH'))
    Exit('No Direct script access allowed');

class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();

    }

    //register api code
    public function register_api($datanew) {
        $this->db->insert('user', $datanew);
        return $this->db->insert_id();
    }

    //add sign up amount
    public function add_signup_bonus_amount($data_sign) {
        $this->db->insert('my_wallet', $data_sign);
        return $this->db->insert_id();
    }

public function getslider_image($pid) {
        
        $this->db->select("id,product_id,product_image_name");
        $this->db->from("product_slider_image");
        $this->db->where("product_id", $pid);
       // $this->db->where("variant_status !=1");
        $query = $this->db->get();
        return $query->result_array();
    }


    // add reffrede amount 
    public function add_referral_code_amount($data_ref) {
        $this->db->insert('my_wallet', $data_ref);
        return $this->db->insert_id();
    }

    // get reffred id from user_id
    public function get_reffred_id($user_id)
    {
        $this->db->select('referral_from_id');
        $this->db->from('my_wallet');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // check for the first transaction 

    public function check_transaction($user_id)
    {
        $this->db->select("*");
        $this->db->from("transaction");
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //update wallet if first transaction 
    public function update_wallet_status($reffred_user_id,$user_id,$new_data) {
        $this->db->where("user_id", $reffred_user_id);
        $this->db->where("referral_to_id", $user_id);
        return $this->db->update('my_wallet', $new_data);
    }
    
    
     public function deliver_slot_time() 
    {
        $this->db->select("*");
        $this->db->from("delivery_date");
       // $this->db->where("delivery_date", $delivery_date);
        $query = $this->db->get();
        return $query->result_array();
    }

    // create transaction  
     public function create_transaction($tr_data) {
        $this->db->insert('transaction', $tr_data);
        return $this->db->insert_id();
    }

    // get wallet details
    public function get_wallet_details($user_id)
    {
        $this->db->select("amount,tr_type,tr_id,date_time,resource_details");
        $this->db->where('status','1');
        $this->db->where('user_id',$user_id);
        $this->db->from('my_wallet');
        $query = $this->db->get();
        return $query->result();
    }

    // get get_transaction_details
    public function get_transaction_details($user_id)
    {
        $this->db->select("user_id,tr_id,tr_type,tr_resource,tr_amount,status,created_date_time");
        $this->db->where('user_id',$user_id);
        $this->db->from('transaction');
        $query = $this->db->get();
        return $query->result();
    }

    // get wallet amount
    public function get_wallet_amount($user_id)
    {
        try{
            $query = $this->db->query("SELECT sum( case when tr_type='credit' then amount else  0 end) as add_amount,sum( case when tr_type='debit' then amount else  0 end) as minus_amount FROM my_wallet where status='1' AND user_id='$user_id'");
        return $query->result();

        }
        catch (\Throwable $th) {
            //echo $th->getMessage();
        }
        
    }

    // add amount to wallet
    public function add_wallet_amount($wallet_data)
    {
        
        $this->db->insert('my_wallet', $wallet_data);
        return $this->db->insert_id();
    }

    // update amount to wallet
     public function update_wallet_amount($wallet_data)
    {
        try{
        $this->db->insert('my_wallet', $wallet_data);
        return $this->db->insert_id();
        }
        catch (\Throwable $th) {
            //echo $th->getMessage();
        }
    }

    //register update api code
    public function registerupdate_api($email, $datanew1) {
        $this->db->where("email", $email);
        return $this->db->update('user', $datanew1);
    }
    //update token login time
    public function login_update($datanew, $user_id) {
        $this->db->where("user_id", $user_id);
        return $this->db->update('user', $datanew);
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
  echo "cURL Error #:" . $err;
} else {
  return $response;
}
	
		}	
       /* $this->load->model("Settings_model");
        $setting = $this->Settings_model->getsettings();
        foreach($setting as $smssetting)
        {
            if($smssetting['name'] == 'sms_username')
            {
                $username = $smssetting['value'];
            }
            if($smssetting['name'] == 'sms_password')
            {
                $password = $smssetting['value'];
            }
            if($smssetting['name'] == 'sms_sender_name')
            {
                $sender = $smssetting['value'];
            }
            
        }
        $number=$messageContent['to'];
        $message=$messageContent['message'];

        $curl_scraped_page = '';
        if($messageContent['to'] != "" && $messageContent['message'] != "")
        { 
            $url="http://portal.eurofox.in/vapi/pushsms?user=".urlencode($username)."&authkey=".urlencode($password)."&sender=".urlencode($sender)."&mobile=".urlencode($number)."&text=".urlencode($message)."&rpt=".urlencode('1');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch); 
        }*/
        //return json_decode($curl_scraped_page,true);
    }

    //register api code check email 
    public function checkmail($email) {
        $this->db->select("email");
        $this->db->from("user");
        $this->db->where("email", $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    //register api code check pass 
    public function checkpass($email) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email", $email);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function checkmobile($phone) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_phone", $phone);
        $query = $this->db->get();
        return $query->row_array();
    }
    // check refrreal  code
    public function checreferral_code($referral_code) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("referral_code", $referral_code);
        $query = $this->db->get();
      //  echo $this->db->last_query();die;
        return $query->row_array();
    }
    //Login api code
    public function login_api($email, $pass) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email", $email);
        $this->db->where("password", $pass);
        $query = $this->db->get();
        return $query->result_array();
    }

    //register api code check all data email 
    public function checkdata($email) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email", $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    //social login api code
    public function socialloginadd($datanew) {
        return $this->db->insert('user', $datanew);
    }

    //social login update api code
    public function socialloginupdate($email, $datanew1) {
        $this->db->where("email", $email);
        return $this->db->update('user', $datanew1);
    }

    // slider api code
    public function slider_api() {
        /*  $this->db->select("*");
        $this->db->from("slider");
        $query = $this->db->get();
        return $query->result_array();*/
		
		$this->db->select("slider.*,category.name_en,category.name_ar");
        $this->db->from("slider");
		$this->db->join('category', 'category.category_id = slider.cat_id','inner');
        //$this->db->join('subcategory', 'subcategory.subcategory_id = slider.sub_cat_id','inner');
        $this->db->order_by("slider.slider_id", "desc");
        $query = $this->db->get();

        return $query->result_array();
    }

     // slider api code
    public function sliders() {
        $this->db->select("slider_id,CONCAT('http://kisankesaath.com/assets/images/slider/',image) as image,cat_id,sub_cat_id");
        $this->db->from("slider");
        $this->db->order_by("slider_id", "desc");
        $query = $this->db->get();

        return $query->result_array();
    }
    // get all category
    public function get_all_category()
    {
        $this->db->select('category_id,name_en,name_ar,image');
        $this->db->from('category');
        $this->db->where("status", 0);
        $data=$this->db->get();
        return $data->result_array();
    }

    // category api code
    public function category_api() 
    {
        $this->db->select("category_id,name_en,name_ar,image");
        $this->db->from("category");
        $this->db->where("status", 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    // product cart check api code
    public function productcart_api($proid, $userid,$variant_id) {

        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $this->db->where("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function productwishlist_api($proid, $userid) {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    // product cart check api code
    public function unittypes_api($unit, $unitprice = null) {
        
        $expUnit = explode(",", $unit);
        $expPrice = explode(",", $unitprice);
        $pushPrice = [];
        for($i=0; $i<count($expUnit); $i++){
            $this->db->select("id,unit_option");
            $this->db->from("unit_types");
            $this->db->where("id", $expUnit[$i]);
            $this->db->where("status", "Y");
            $query = $this->db->get()->result_array();
            $pushPrice[] = ["id" => $query[0]['id'], "unit_option" => $query[0]['unit_option'], "price_index" => $i, "unit_price" => $expPrice[$i]];
        }
        return $pushPrice;
//        print_r($pushPrice); exit();
        
//        $this->db->select("id,unit_option");
//        $this->db->from("unit_types");
//        $this->db->where_in("id", explode(",", $unit));
//        $this->db->where("status", "Y");
//        $query = $this->db->get();
//        if ($unitprice != null) {
////            $expUnit = explode(",", $unit);
//            $expPrice = explode(",", $unitprice);
//            $loadData = $query->result_array();
//            $pushPrice = [];
//            foreach ($loadData as $key => $unitData) {
//                $pushPrice[] = ["id" => $unitData['id'], "unit_option" => $unitData['unit_option'], "price_index" => $key, "unit_price" => $expPrice[$key]];
//            }
//            
////            print_r($pushPrice); exit();
//            return $pushPrice;
//        }
//        return $query->result();
    }

    // product api code
    public function product_api($categoryID="",$subcategory="") {
        
        $this->db->select("*");
        $this->db->from("product");
        if(!empty($categoryID))
        {
            $this->db->where("catid", $categoryID);
        }
        if(!empty($subcategory))
        {
         $this->db->where("subcatid", $subcategory);
        }
       
        $this->db->where("prostatus !=1");
        $query = $this->db->get();
        return $query->result_array();
    }
    // variant api code
    public function getvariantid($pid) {
        
        $this->db->select("variant_id");
        $this->db->from("variant");
        $this->db->where("product_id", $pid);
        $this->db->where("variant_status !=1");
        $query = $this->db->get();
        return $query->row_array();
    }



    // variant api code
    public function getvariant($pid) {
        
        $this->db->select("*");
        $this->db->from("variant");
        $this->db->where("product_id", $pid);
        $this->db->where("variant_status !=1");
        $this->db->join("unit_types", "variant.unit=unit_types.id");
        $query = $this->db->get();
        return $query->result_array();
    }
    // variant api code
    public function getvariantdata($variantid) {
        
        $this->db->select("*");
        $this->db->from("variant");
        $this->db->where("variant_id", $variantid);
        $this->db->where("variant_status !=1");
        $query = $this->db->get();
        return $query->result_array();
    }
    // cart  data check api code
    public function cartcheck($user_id,$product_id,$variant_id) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("userid", $user_id);
        $this->db->where("productid", $product_id);
        $this->db->where("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //cart insert api code
    public function cart_api($datanew) {
        
        return $this->db->insert('cart', $datanew);
    }

    //update cart api code
    public function cartqty($datanew1, $user_id, $product_id,$variant_id) {
        $this->db->where("userid", $user_id);
        $this->db->where("productid", $product_id);
        $this->db->where("variant_id", $variant_id);

        return $this->db->update('cart', $datanew1);
    }

    //delete cart qty 0 api code
    public function cartqtydelete($user_id, $product_id,$variant_id) {
        $this->db->where("userid", $user_id);
        $this->db->where("productid", $product_id);
        $this->db->where("variant_id", $variant_id);
        return $this->db->delete("cart");
    }

    // cart view api code
    public function cartview_api($user_id) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("cart.userid", $user_id);
        $this->db->join("product", "cart.productid=product.product_id");
        $this->db->join("variant", "cart.variant_id=variant.variant_id");
        $this->db->join("unit_types", "variant.unit=unit_types.id");
        $query = $this->db->get();
        return $query->result_array();
    }

    //cart delete api code
    public function cartdelete_api($cart_id) {
        $this->db->where("cart_id", $cart_id);
        return $this->db->delete("cart");
    }

    //orders api code
    public function orders_api($datanew) {
        $this->db->insert('orders', $datanew);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //product orders api code
    public function productorders_api($datanew1) {
        return $this->db->insert('product_orders', $datanew1);
    }

    //orders view api code
    public function ordersview_api($user_id) {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("userid", $user_id);
        $this->db->order_by("order_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    //orders product view api code
    public function ordersviewproduct_api($orderid) {
        $this->db->select("*");
        $this->db->from("product_orders");
        $this->db->where("order_id", $orderid);
        $this->db->join("product", "product_orders.productid=product.product_id");
        $this->db->join("variant", "product_orders.variant_id=variant.variant_id");
        $this->db->join("unit_types", "variant.unit=unit_types.id");

        $query = $this->db->get();
        return $query->result_array();
    }

    //orders cancle api code
    public function cancleorders_api($datanew, $user_id, $order_id) {
        $this->db->where("userid", $user_id);
        $this->db->where("order_id", $order_id);
        return $this->db->update('orders', $datanew);
    }

    //delete cart order success api code
    public function deletecart($user_id) {
        $this->db->where("userid", $user_id);
        return $this->db->delete('cart');
    }

    //address get api code
    public function getaddress($address_id) {
        $this->db->select("*");
        $this->db->from("address");
        $this->db->where("address_id", $address_id);
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->row_array();
    }

    // product get view api code
    public function product_stock($vid) {
        $this->db->select("total_qty");
        $this->db->from("variant");
        $this->db->where("variant_id", $vid);
        $query = $this->db->get();
        return $query->row_array();
    }

    //product update stock api code
    public function product_orders_update($datanew2, $vid) {
        $this->db->where("variant_id", $vid);
        return $this->db->update('variant', $datanew2);
    }

    // cancle order product qty get view api code
    public function get_cancle_orders($order_id) {
        $this->db->select("productid,po_qty,variant_id");
        $this->db->from("product_orders");
        $this->db->where("order_id", $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //address insert api code
    public function Addaddress_api($datanew) {
        return $this->db->insert('address', $datanew);
    }

    // address view api code
    public function addressview_api($user_id) {
        $this->db->select("*");
        $this->db->from("address");
        $this->db->where("userid", $user_id);
        $query = $this->db->get();
        $address=$query->result_array();
       
        for($i=0;$i<count($address);$i++){
            $this->db->select("delivery_charge");
            $this->db->from("society");
            $this->db->where("zipcode", $address[$i]['pincode']);
            $delivery_charge_qurey = $this->db->get();
            $delivery_charge=$delivery_charge_qurey->result_array();
            if(count($delivery_charge) > 0){
                $address[$i]['delivery_charge']=$delivery_charge[0]['delivery_charge'];
            }else{
                $address[$i]['delivery_charge']='';
            }
            
        }
        
        return $address;
    }

    //address delete api code
    public function addressdelete_api($address_id) {
        $this->db->where("address_id", $address_id);
        return $this->db->delete("address");
    }

    //address update api code
    public function Updateaddress_api($datanew, $address_id) {
        $this->db->where("address_id", $address_id);
        return $this->db->update('address', $datanew);
    }

    //wishlist api code
    public function wishlist_api($datanew) {
        return $this->db->insert('wishlist', $datanew);
    }

    //wishlist delete api code
    public function wishlistdelete_api($productid, $userid) {
        $this->db->where("productid", $productid);
        $this->db->where("userid", $userid);
        return $this->db->delete("wishlist");
    }

    //wishlist view api code
    public function wishlistview_api($userid) {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("wishlist.userid", $userid);
        $this->db->join("product", "wishlist.productid=product.product_id");
        
        $this->db->where("product.prostatus !=1");
        $query = $this->db->get();
        return $query->result_array();
    }

    // wishlist product cart check api code
    public function wishlistcart_api($proid,$userid) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    // notification api code
    public function notification_api($user_id) 
    {
        $this->db->select("*");
        $this->db->from("notification");
        $where = '(user_id='.$user_id.' or type =1)';
        $this->db->where($where);
        $this->db->order_by('notification_id', "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    //feedback api code
    public function feedback_api($datanew) {
        return $this->db->insert('feedback', $datanew);
    }

    // page api code
    public function page_api() {
        $this->db->select("*");
        $this->db->from("page");
        $query = $this->db->get();
        return $query->result_array();
    }

    //change password
    public function Checkoldpass($uid, $oldpass) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_id", $uid);
        $this->db->where("password", $oldpass);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function DoChangePassword($datanew, $uid) {
        $this->db->where("user_id", $uid);
        return $this->db->update('user', $datanew);
    }

    //forgot password update code 
    public function codeupdate($email, $datacode) {
        $this->db->where("email", $email);
        return $this->db->update('user', $datacode);
    }

 

    //Profile edit api code
    public function ProfileApi($datanew, $uid) {
        $this->db->where("user_id", $uid);
        return $this->db->update('user', $datanew);
       // echo $this->db->last_query();
    }

    // search cart check api code
    public function searchcart_api($proid, $userid,$variant_id) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
         $this->db->where("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //search wishlist api
    public function searchwishlist_api($proid, $userid,$variant_id) {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $this->db->where("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // search product api code
    public function search_api($name) {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->like("proname_en", $name);
        $this->db->where("prostatus !=1");
        $query = $this->db->get();
        return $query->result_array();
    }

    // whats new cart check api code
    public function whatsnewcart_api($variant_id, $userid) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("variant_id", $variant_id);
        $this->db->where("userid", $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    //whats new wishlist api
    public function whatsnewwishlist_api($variant_id, $userid) {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("variant_id", $variant_id);
        $this->db->where("userid", $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    // whats new product api code
    public function whatsnew_api() {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("prostatus !=1");
        $this->db->order_by('product_id', 'DESC');
        $this->db->limit('20');
        $query = $this->db->get();
        return $query->result_array();
    }

    // top popular cart check api code
    public function toppopularcart_api($proid,$userid,$variant_id) {
        $this->db->select("*");
        $this->db->from("cart");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $this->db->where("variant_id", $variant_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //top popular wishlist api
    public function toppopularwishlist_api($proid,$userid) {
        $this->db->select("*");
        $this->db->from("wishlist");
        $this->db->where("productid", $proid);
        $this->db->where("userid", $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    // top popular product api code
    public function toppopular_api() {
        $this->db->select("productid, count(productid) as cnt,product_id,catid,subcatid,proname_en,proname_ar,brand_name_en,brand_name_ar,description_en,description_ar,prostatus,variant_id");
        $this->db->from("product_orders");
        $this->db->group_by('productid');
        $this->db->order_by('cnt', 'desc');
        $this->db->join("product", "product_orders.productid=product.product_id");
        $this->db->where("product.prostatus !=1");
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function subcategroylist($id)
    {
        $this->db->select("*");

        $this->db->from("subcategory");

        $this->db->where("categroy_id", $id);

        $this->db->where("status", 0);

        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function view_receipt($orderid){
        $this->db->select('orders.total_price,orders.order_id,society.delivery_charge');
        $this->db->join('address','orders.address_id = address.address_id','LEFT');
        $this->db->join('society','society.zipcode = orders.pincode','LEFT');
        $this->db->where('orders.order_id',$orderid);
        $result['order_details'] = $this->db->get('orders')->result_array();
        
        $this->db->select("product_orders.selected_unit,product.proimage,product.proname,product_orders.po_qty,product_orders.po_price");
        $this->db->join('product','product.product_id = product_orders.productid','LEFT');
        $this->db->where('product_orders.order_id',$orderid);
        $result['product_details']= $this->db->get('product_orders')->result_array();
        
        return $result;
        
    }
    //get order cart detail
    public function getordercart($userid)
    {
        $this->db->select("cart.*,variant.price,variant.discount_price,variant.unit");
        $this->db->from("cart");
        $this->db->where("cart.userid",$userid);
        $this->db->join('variant','cart.variant_id = variant.variant_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    //check phone no
    public function checkpno($user_phone) 
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_phone", $user_phone);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row_array();
    }
    
    
    public function UpdateOtp($datanew,$user_phone)
    {
        $this->db->where("user_phone", $user_phone);
        return $this->db->update('user', $datanew);
    }
    //get user detail
    public function getuserdetail($user_id)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    //get user_id of reffreal code used

    public function get_ref_user_id($referral_code)
    {
        $this->db->select("user_id");
        $this->db->from("user");
        $this->db->where("referral_code", $referral_code);
        $query = $this->db->get();
        return $query->row_array();
    }

    //verify otp
    public function verifyOTP($user_id,$otp) 
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $this->db->where("otp", $otp);
        $query = $this->db->get();
        return $query->row_array();
    }
    //check coupon
    public function checkcoupon($coupon_code)
    {
        $this->db->select("*");
        $this->db->from("coupon");
        $this->db->where("coupon_code", $coupon_code);
        $query = $this->db->get();
        return $query->row_array();
    }
    //apply coupon count
    public function applycouponcount($user_id,$coupon_id)
    {
        $this->db->select("*");
        $this->db->from("apply_coupon");
        $this->db->where("user_id", $user_id);
        $this->db->where("coupon_id", $coupon_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    //add apply coupon
    public function addapplycoupon($cp) 
    {
        return $this->db->insert('apply_coupon', $cp);
    }
    public function getdeliverydate($delivery_date) 
    {
        $this->db->select("*");
        $this->db->from("delivery_date");
        $this->db->where("delivery_date", $delivery_date);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getdeliverydatetime($id,$currentTime) 
    {
        //echo $currentTime;
        if($currentTime=='09 AM')
        {
            $star_time='09:30 AM';
            $end_time='11:30 AM';
        }
        else if($currentTime=='10 AM')
        {
           $star_time='09:30 AM';
            $end_time='11:30 AM';
        }
        else if($currentTime=='11 AM')
        {
        date_default_timezone_set('Asia/Kolkata');
        $currentTimess = date('h:i A', time () );
           $star_time='09:30 AM';
            $end_time=$currentTimess;
        }
        else if($currentTime=='12 PM')
        {
            $star_time='12:00 PM';
            $end_time='02:30 PM';
        }
        else if($currentTime=='01 PM')
        {
        $star_time='12:00 PM';
        $end_time='02:30 PM';
        }
        else if($currentTime=='02 PM')
        {
        date_default_timezone_set('Asia/Kolkata');
        $currentTimess = date('h:i A', time () );
        $star_time='12:00 PM';;
        $end_time=$currentTimess;
        }
        else if($currentTime=='03 PM')
        {
        $star_time='03:00 PM';
        $end_time='05:30 PM';
        }
        else if($currentTime=='04 PM')
        {
        $star_time='03:00 PM';
        $end_time='05:30 PM';
        }
        else if($currentTime=='05 PM')
        {
        date_default_timezone_set('Asia/Kolkata');
        $currentTimess = date('h:i A', time () );
        $star_time='03:00 PM';
        $end_time=$currentTimess;
        }
       else if($currentTime=='06 PM')
        {
        $star_time='06:00 PM';
        $end_time='09:30 PM';
        }
        else if($currentTime=='07 PM')
        {
        $star_time='06:00 PM';
        $end_time='09:30 PM';
        }
        else if($currentTime=='08 PM')
        {
        $star_time='06:00 PM';
        $end_time='09:30 PM';
        }
        else if($currentTime=='09 PM')
        {
        date_default_timezone_set('Asia/Kolkata');
        $currentTimess = date('h:i A', time () );
        $star_time='06:00 PM';
        $end_time=$currentTimess;
        }
        
       // echo $currentTime;//die;
        $this->db->select("delivery_time.*,delivery_date.delivery_date");
        $this->db->from("delivery_time");
        $this->db->where("delivery_time.delivery_date_id", $id);
        //$this->db->where("delivery_time.start_time", $star_time);
       // $this->db->where("delivery_time.end_time<=", $end_time);
        $this->db->join("delivery_date", "delivery_time.delivery_date_id = delivery_date.delivery_date_id");
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result_array();
    }
    //get city
    public function getcity()
    {
        $this->db->select("*");
        $this->db->from("city");
        $this->db->where("city_status",1);
        $query = $this->db->get();
        return $query->result_array();
    }
    //get society
    public function getsociety($city_id)
    {
        $this->db->select("*");
        $this->db->from("society");
        $this->db->where("city_id",$city_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }
    //get coupon details
    public function getcoupondetails($coupon_id)
    {
        $this->db->select("*");
        $this->db->from("coupon");
        $this->db->where("coupon_id",$coupon_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    //orders view api code
    public function order_details($order_id)
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("order_id", $order_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }
    //get admin details
    public function getadmindetails()
    {
        $this->db->select("*");
        $this->db->from("admin_login");
        $query = $this->db->get();
        return $query->row_array();
    }

    //get search en
    public function getsearchlistingen($search) 
    {
        $sql = "SELECT category_id as id,name_en as name,'category' as type FROM `category` WHERE LOWER(name_en) LIKE '%".$search."%' and status='0'
                UNION
                SELECT subcategory_id as id,subcategory_name_en as name,'sub_category' as type FROM `subcategory` WHERE LOWER(subcategory_name_en) LIKE '%".$search."%' and status='0'
                UNION
                SELECT product_id as id,proname_en as name,'product' as type FROM `product` WHERE LOWER(proname_en) LIKE '%".$search."%' and prostatus='0'";
                
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }
    
    //get search ar
    public function getsearchlistingar($search) 
    {
        $sql = "SELECT category_id as id,name_ar as name,'category' as type FROM `category` WHERE LOWER(name_ar) LIKE '%".$search."%' and status='0'
                UNION
                SELECT subcategory_id as id,subcategory_name_ar as name,'sub_category' as type FROM `subcategory` WHERE LOWER(subcategory_name_ar) LIKE '%".$search."%' and status='0'
                UNION
                SELECT product_id as id,proname_ar as name,'product' as type FROM `product` WHERE LOWER(proname_ar) LIKE '%".$search."%' and prostatus='0'";
                
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }
    //product deatils 
    public function product_deatils($product_id)
    {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_id", $product_id);
        $this->db->where("prostatus !=1");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRelatedPro($subcatid,$pid) {
        
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("subcatid", $subcatid);
        $this->db->where("product_id !=", $pid);
        $this->db->where("prostatus !=1");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //check phone no
    public function checkdeliveryboy($user_phone,$user_pass) 
    {
        $this->db->select("*");
        $this->db->from("deliveryboy");
        $this->db->where("mobile", $user_phone);
        $this->db->where("epassword", $user_pass);
        $this->db->where("status !=1");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    
    public function getuserdetails($user_id) 
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // get user_phone
    public function get_user_phone($user_id)
    {
        $this->db->select('user_phone');
        $this->db->from(user);
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function UpdateOrderDeliver($datanew,$order_id)
    {
        $this->db->where("order_id", $order_id);
        return $this->db->update('orders', $datanew);
    }
    
    public function UpdateOADeliver($datanew,$orderid)
    {
        $this->db->where("orderid", $orderid);
        return $this->db->update('orderassigned', $datanew);
    }
    
    // first all order list
    public function getOrderAssigned($deliveryboyid) {
        $this->db->select("orderassigned.deliveryboyid,orderassigned.orderid,orderassigned.userid,user.first_name,user.last_name,user.user_phone,orderassigned.oadate,orderassigned.status,orders.order_date,orders.street_address,orders.society,orders.address,orders.city,orders.pincode,orders.latitude,orders.longitude,orders.pyment_method,orders.delivery_date,orders.oadeliverdate,orders.oadelivertime");
        $this->db->from("orderassigned");
        $this->db->join("user", "orderassigned.userid=user.user_id");
        $this->db->join("orders", "orderassigned.orderid=orders.order_id");
        $this->db->where('orderassigned.status','0');
        $this->db->where("deliveryboyid", $deliveryboyid);
        $query = $this->db->get();
            
        return $query->result_array();
     }
     
     // for all deliverd orderd
     public function get_Past_OrderAssigned($deliveryboyid)
     {
        $this->db->select("orderassigned.deliveryboyid,orderassigned.orderid,orderassigned.userid,user.first_name,user.last_name,user.user_phone,orderassigned.oadate,orderassigned.status,orders.order_date,orders.street_address,orders.society,orders.address,orders.city,orders.pincode,orders.latitude,orders.longitude,orders.pyment_method,orders.delivery_date,orders.oadeliverdate,orders.oadelivertime");
        $this->db->from("orderassigned");
        $this->db->join("user", "orderassigned.userid=user.user_id");
        $this->db->join("orders", "orderassigned.orderid=orders.order_id");
        $this->db->where('orderassigned.status','1');
        $this->db->where("deliveryboyid", $deliveryboyid);
        $query = $this->db->get();
            
        return $query->result_array();
     }
    
    // public function getOrderAssigned($deliveryboyid) {
    //     $this->db->select("orderassigned.deliveryboyid,orderassigned.orderid,orderassigned.userid,user.first_name,user.last_name,user.user_phone,orderassigned.oadate,orderassigned.status,orders.order_date,orders.address,orders.pincode,orders.city,orders.pyment_method,orders.delivery_date,orders.oadeliverdate,orders.oadelivertime");
    //     $this->db->from("orderassigned");
    //     $this->db->join("user", "orderassigned.userid=user.user_id");
    //     $this->db->join("orders", "orderassigned.orderid=orders.order_id");
    //     $this->db->where("deliveryboyid", $deliveryboyid);
    //     $query = $this->db->get();
            
    //     return $query->result_array();
    //  }
     
     public function getorderproduct($id) 
    {
        try{
            
        $this->db->select("product.proname_en,unit_types.unit_option_en,product_orders.po_qty,(product_orders.po_qty * product_orders.discount_price) AS price");
        $this->db->from("product_orders");
        $this->db->where("product_orders.order_id", $id);
        $this->db->join("product", "product_orders.productid=product.product_id");
        $this->db->join("unit_types", "product_orders.unit_types_id=unit_types.id",'left');
        $query = $this->db->get();
        return $query->result_array();
        }
        catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    
    public function getorderproductmd($id) 
    {
    
        try{
            
        $this->db->select("product_orders.order_id,product_orders.user_id,user.first_name,user.last_name,user.user_phone,orders.order_date,orders.delivery_date,orders.street_address,orders.society,orders.address,orders.city,orders.state,orders.pincode,orders.latitude,orders.longitude,product_orders.po_qty,product_orders.discount_price,orders.delivery_charge,coupon.coupon_code,orders.coupon_discount,orders.sub_total,orders.pyment_method,orders.order_status,orders.oadeliverdate,orders.oadelivertime");
        $this->db->from("product_orders");
        $this->db->where("product_orders.order_id", $id);
        //$this->db->group_by("product_orders.order_id");
        $this->db->join("user", "product_orders.user_id=user.user_id");
        $this->db->join("product", "product_orders.productid=product.product_id");
        $this->db->join("orders", "product_orders.order_id=orders.order_id");
        $this->db->join("coupon", "orders.coupon_id=coupon.coupon_id",'left');
        
        // $this->db->select('order_id,user_id');
        // $this->db->from("product_orders");
        // $this->db->where("order_id", $id);
        //$this->db->group_by("order_id");
        $query = $this->db->get();
        if($query == 1)
        {
          $results = $query->row_array();
          $qty=$results['po_qty'];
          $price=$results['discount_price'];
          $g_total=$qty * $price;
          $new=array('Grand_total'=>$g_total);
          $all=array_merge($results,$new);
          return  $all;
        }
        else
        {
          return false;
        }
        
        }
        catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    
    public function getRequiredProducts() 

    {
    
        $this->db->select("product_orders.variant_id,product_orders.unit_types_id,product.proname_en,orders.order_date,orders.delivery_date,unit_types.unit_option_en,SUM(product_orders.po_qty) AS tpo_qty");
        $this->db->from("product_orders");
        $this->db->where("orders.order_status", 0);
        $this->db->group_by(array("DATE_FORMAT(orders.delivery_date, \"%Y-%m-%d\")","product_orders.variant_id", "product_orders.unit_types_id")); 
        $this->db->join("product", "product_orders.productid=product.product_id");
        $this->db->join("orders", "product_orders.order_id=orders.order_id");
        $this->db->join("unit_types", "product_orders.unit_types_id=unit_types.id",'left');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
   //Coded by Start Rahul Chauhan 22 May 2020
    //admin login
    public function checkadmin($email,$password) 
    {
        $this->db->select("*");
        $this->db->from("admin_login");
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    //Get Pending Order Details for store manager app

    public function getOrderlistdelivery(){
        $this->db->select("orders.order_id,orders.userid,user.first_name,user.last_name,user.user_phone,orders.order_date,orders.address,orders.pincode,orders.city,orders.pyment_method,orders.delivery_date,orders.sub_total,orders.total_price");
        $this->db->from("orders");
        $this->db->where("order_status", 0);
        $this->db->join("user", "orders.userid=user.user_id");
        $this->db->order_by("order_id", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllOrderlist(){
        $this->db->select("order_id,orders.userid,user.first_name,user.last_name,user.user_phone,order_date,orders.address,pincode,orders.city,pyment_method,delivery_date,sub_total,total_price,order_status,delivery_charge,coupon_discount,oastatus");
        $this->db->from("orders");
        $this->db->join("user", "orders.userid=user.user_id");
        $this->db->order_by("order_id", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getOrderlist(){
        $this->db->select("deliveryboy.name,orderassigned.orderid,orderassigned.userid,user.first_name, sub_total, user.last_name,user.user_phone,orderassigned.oadate,orderassigned.status,orders.order_date,orders.address,orders.pincode,orders.city,orders.pyment_method,orders.delivery_date,orders.oadeliverdate,orders.oadelivertime");
        $this->db->from("orderassigned");
        $this->db->join("user", "orderassigned.userid=user.user_id");
        $this->db->join("orders", "orderassigned.orderid=orders.order_id");
        $this->db->join("deliveryboy", "orderassigned.deliveryboyid=deliveryboy.deliveryboy_id");
        //$this->db->where("deliveryboyid", $deliveryboyid);
        $query = $this->db->get();
            
        return $query->result_array();
    }
    
    
    public function getTotalSalestoday($order_date){
        $datef = date_format((date_create($order_date)),"Y-m-d");
        $this->db->select("SUM(sub_total) AS total_sale");
        $this->db->from("orders");
        $this->db->where("order_date", $datef);
        $this->db->where("order_status !=1");
        $this->db->group_by("order_date");
        $query = $this->db->get();
        return $query->row_array();
        
    }
    
    public function getTotalSales(){
        
        $this->db->select("SUM(sub_total) AS total_sale");
        $this->db->from("orders");
        $this->db->where("order_status !=1");
        $query = $this->db->get();
        return $query->row_array();
        
    }   

      public function getReferral_code($user_id) {
        $this->db->select("referral_code");
        $this->db->from("user");
        $this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->result_array();
     }

     // get all category
    public function get_all_subcategory(){
        $this->db->select("subcategory_id,categroy_id,subcategory_name_en,CONCAT('http://kisankesaath.com/assets/images/subcategory/',subcategory_image) as image");
        $this->db->from('subcategory');
        $this->db->where("status", 0);
        $data=$this->db->get();
        return $data->result_array();
    }

    public function SendOrderPlacedSms($messageContent){
        //print_r($messageContent);die;
        if($messageContent['to'] != "" && $messageContent['var1'] != ""){
            $SMS_API_URL  = SMS_API_URL;
            $SMS_API_KEY  = SMS_API_KEY;
            $curl = curl_init();
            $params = array(
                'From'  => "KISANP",
                'TemplateName'   => "order_place_user",
                'To'      => $messageContent['to'],
                'VAR1'    => $messageContent['var1'],
                'VAR2'    => $messageContent['var2'],
                'VAR3'    => $messageContent['var3'],
            );
            $requesturl = "$SMS_API_URL/$SMS_API_KEY/ADDON_SERVICES/SEND/TSMS/";
          
            $ch = curl_init($requesturl);
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
              curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              curl_setopt($ch, CURLOPT_TIMEOUT, 30);
              $response = curl_exec($ch);

            //print_r($response);die;
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              return $response;
            }
        }   
    }

    
    // Code end - by Rahul Chauhan
}
