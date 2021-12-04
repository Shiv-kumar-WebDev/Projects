<?php  if(!defined('BASEPATH')) Exit ('No Direct script access allowed');
class Order_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('Pushnotifications');
	}
public function getorder() 
	{
	    if (isset($_POST['cstatus']) && $_POST['cstatus'] != '') {
            $this->db->where('orders.order_status', $_POST['cstatus']);
			$cstatus=$_POST['cstatus'];
        }
		if (isset($_POST['start_date']) && $_POST['start_date'] != '') {
            $this->db->where('orders.order_date>=', $_POST['start_date']);
			//$start_date=$_POST['start_date'];
        }
		if (isset($_POST['end_date']) && $_POST['end_date'] != '') {
            $this->db->where('orders.order_date<=', $_POST['end_date']);
			//$end_date=$_POST['end_date'];
        }
        $this->db->select("*");
        $this->db->from("orders");
		$this->db->join("user", "orders.userid=user.user_id");
		$this->db->order_by("order_id", "DESC");
		 // if ($_POST['length'] != -1){
   //          $this->db->limit($_POST['length'], $_POST['start']);
			//   }
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function getorder_count() 
	{
	    if (isset($_POST['cstatus']) && $_POST['cstatus'] != '') {
            $this->db->where('orders.order_status', $_POST['cstatus']);
			$cstatus=$_POST['cstatus'];
        }
		if (isset($_POST['start_date']) && $_POST['start_date'] != '') {
            $this->db->where('orders.order_date>=', $_POST['start_date']);
			//$start_date=$_POST['start_date'];
        }
		if (isset($_POST['end_date']) && $_POST['end_date'] != '') {
            $this->db->where('orders.order_date<=', $_POST['end_date']);
			//$end_date=$_POST['end_date'];
        }
        $this->db->select("*");
        $this->db->from("orders");
		$this->db->join("user", "orders.userid=user.user_id");
		$this->db->order_by("order_id", "DESC");
		
        $query = $this->db->get();
        return $query->result_array();
	}
    // get order by filter

    // code START by MAHIPAL RAWAT 22 may 20202 

    public function get_order_by_filter($start_date,$end_date,$cstatus)
    {
        
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->join("user", "orders.userid=user.user_id");
        $this->db->where('orders.order_status',$cstatus);
        if($start_date && $end_date)
        {
        $this->db->where('DATE(orders.order_date) >=', date('Y-m-d',strtotime($start_date)));
        $this->db->where('DATE(orders.order_date) <=', date('Y-m-d',strtotime($end_date)));
        }

        $this->db->order_by("order_id", "DESC");
        $query = $this->db->get();
        return $query->result_array();

    }


    public function getorderproduct($id) 
    {
        $this->db->select("*");
        $this->db->from("product_orders");
        $this->db->where("product_orders.order_id", $id);
        $this->db->join("product", "product_orders.productid=product.product_id");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getorderdetails($id) 
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->join("user", "orders.userid=user.user_id",'left');
        $this->db->join("address", "orders.address_id=address.address_id",'left');
        $this->db->where("orders.order_id", $id);
        $query = $this->db->get();
       // echo $this->db->last_query();
        return $query->result_array();
    }
	public function statusupdate($id,$datanew)
	{
        $this->db->where("order_id", $id);
		return $this->db->update("orders", $datanew);
    }
    public function getuserdetails($user_id) 
	{
        $this->db->select("*");
        $this->db->from("user");
		$this->db->where("user_id", $user_id);
        $query = $this->db->get();
        return $query->row_array();
	}

// code START by MAHIPAL RAWAT 22 may 20202 
    
////////////////////////// send notification code //////////////////////////////////////////////

	//get notifiction server key
	public function getapikey($setting)
	{
		$this->db->select('value');
        $this->db->from("site_settings");
        $this->db->where('name', $setting);
        $query= $this->db->get();
        return $query->row_array();
	}
    public function getUserandroidadmin($user_id)
    {
        $this->db->select("device_token");
        $this->db->from("user");
        $this->db->where("user_status",0);
        if(is_array($user_id)){

            $this->db->where_in("user_id",$user_id);
        }else{
            $this->db->where("user_id",$user_id);
        }
        $this->db->where("device_type",0);
        $query = $this->db->get();
        $tokens = array();
        foreach ($query->result_array() as $token) {
            if($token['device_token'] != ''){
                $tokens[] = $token['device_token'];
            }
        }

        return $tokens;
    }
    public function getUseriphoneadmin($user_id)
    {
        $this->db->select("device_token");
        $this->db->from("user");
        $this->db->where("user_status",0);
        if(is_array($user_id)){

            $this->db->where_in("user_id",$user_id);
        }else{
            $this->db->where("user_id",$user_id);
        }
        $this->db->where("device_type",1);
        $query = $this->db->get();
        $tokens = array();
        foreach ($query->result_array() as $token) {
            if($token['device_token'] != ''){
                $tokens[] = $token['device_token'];
            }
        }

        return $tokens;
    }
    //send notifiction
    public function OrderNotification($adminnotification)
    {

    	$datanew['user_id']      = $adminnotification['user_id'];
    	$datanew['order_id']     = $adminnotification['id'];
        $datanew['title']        = $adminnotification['title'];
        $datanew['notification'] = $adminnotification['message'];
        $datanew['type']         = 2;
        
        $this->db->insert('notification', $datanew); 
		
        $androidtokenArray     = $this->getUserandroidadmin($adminnotification['user_id']);
        $iphonetokenArray      = $this->getUseriphoneadmin($adminnotification['user_id']);
        
        if($adminnotification)
        {
            
            $this->SendAdminDevicetypeNotification(1,$androidtokenArray,$adminnotification);
            $this->SendAdminDevicetypeNotification(0,$iphonetokenArray,$adminnotification);
            return true;
        }
        else
        {
            return false;
        }
          

    }
    public function SendAdminDevicetypeNotification($devicetype,$tokenArray,$datanotification)
    {
        
        $totalRecord = count($tokenArray);
            if($totalRecord > 1000)
            {
                $record_limit = 1000;
                $page = ceil($totalRecord/$record_limit);
                for($i=1; $i<= $page; $i++)
                {
                    $offset = $record_limit * $i-1;
                        
                    $userIds = array_slice( $tokenArray, $offset, $record_limit );
                    
                    $notificationData = array(
                        'device_token' => $userIds,
                        'id'           => $datanotification['id'],
                        'title'        => $datanotification['title'],
                        'message'      => $datanotification['message']
                    );
                    $this->sendAdminAppsNotification($notificationData,$devicetype);
                }
            }
            else
            {
                $notificationData = array(
                    
                    'device_token' => $tokenArray,
                    'id'           => $datanotification['id'],
                    'title'        => $datanotification['title'],
                    'message'      => $datanotification['message']
                );
                $this->sendAdminAppsNotification($notificationData,$devicetype);
            }
           
    }
    function sendAdminAppsNotification($data,$devicetype)
    {
        
        $deviceToken=array();
		$key ="api_key";
        $apidata = $this->getapikey($key);
        $apiKey = $apidata['value'];
        
        $notificationData = array(
            'id'           => $data['id'],
            'title'        => $data['title'],
            'message'      => $data['message'],
            'type'         => 2,
            'click_action' => "send notifiction",
            'device_token' => $data['device_token']
        );
        if($devicetype == 1)
        {

            PushNotifications::android($apiKey,$notificationData);
             
        }
        else
        {
            PushNotifications::iOS($apiKey,$notificationData);
        }
          
    }

}