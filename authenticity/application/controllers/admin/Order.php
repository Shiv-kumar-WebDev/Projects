<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Order_model");
        $this->load->model("admin/Settings_model");
        $this->load->model("Api_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function orderView() 
	{   
        //$this->output->enable_profiler(1);
		$data = array();
        $data['order'] = $this->Order_model->getorder();
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('order/order-view',$data);
        $this->load->view('blocks/footer');
    }
    
    
    public function AllorderList() {
		 
		    $list = $this->Order_model->getorder();
		    $listcount = $this->Order_model->getorder_count();
		    // print_r($list);die();
		    $data = array();
            $no = $_POST['start'];
		    foreach ($list as $value) {
                $this->db->select("*");
                $this->db->from("product_orders");
                $this->db->where("order_id",$value['order_id']);
                $query = $this->db->get();
                $item = $query->num_rows();
		        $row = array();
			    $no++;
    			$row[] = $no;
                $row[] = $value['order_id'];
                $row[] = $value['username'];
                $row[] = $value['order_date'];
                $row[] = $value['delivery_date'];
			    if($value['pyment_method'] == 0){
                    $row[] = '<span class="label label-primary">NOT PAID YET</span>';
                }else if($value['pyment_method'] == 1) { 
                    $row[] = '<span class="label label-danger">Net Banking</span>'; 
                }else if($value['pyment_method'] == 2) { 
                    $row[] = '<span class="label label-success">Credit card/Debit card </span>'; 
                }else{
                    $row[] = '<span class="label label-warning">Wallate</span>';
                }
         
                $row[] = $value['total_price'];
                $row[] = $item;
			    $row[] = '<a class="btn btn-xs btn-warning" href=' . base_url("OrderProduct/"). $value['order_id']. '><i class="fa fa-eye fa-lg"></i></a>';
			    if($value['order_status'] == 0){
                    $row[] = '<span class="label label-primary">Pending</span>';
                }else if($value['order_status'] == 1) { 
                    $row[] = '<span class="label label-danger">Cancle</span>'; 
                }else if($value['order_status'] == 2) { 
                    $row[] = '<span class="label label-success">Mark As Delivered</span>'; 
                }else if($value['order_status'] == 4) { 
                    $row[] = '<span class="label label-warning">Order InCheckout</span>'; 
                }else if($value['order_status'] == 5) { 
                    $row[] = '<span class="label label-warning">Order Shipped</span>'; 
                }else{
                    $row[] = '<span class="label label-info">Pickup</span>';
                }
			     $data[] = $row;
		    }
		   // echo "<pre>";
		 // print_r($data);die;
		    $output = array(
                "draw" => $_POST['draw'],
                "data" => $data,
            );
		  echo json_encode($output);
		 
	}
	public function OrderProductView($id) 
	{  
		$data = array();
        $data['orderproduct'] = $this->Order_model->getorderproduct($id);
        $data['details'] = $this->Order_model->getorderdetails($id);
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('order/order-product-view',$data);
        $this->load->view('blocks/footer');
    }
    public function Print_invoice()
    {
        $this->load->view('order/Print_invoice');
    }
	public function status()
	{
	     $id           = $this->input->post('orderid');
	     $uid          = $this->input->post('uid');
	     $order_status = $this->input->post('cstatus');
	     // print_r($_POST);die;
		$datanew['order_status'] = $order_status; 
        $result= $this->Order_model->statusupdate($id,$datanew);
        if ($result) {
             redirect('OrderProduct/'.$id);
         } 
        // print_r($result);die;
		// if($result) 
		// {
  //           if($order_status == 0)
  //           {
  //           	$dstatus ="pending";
  //           }
  //           if($order_status == 1)
  //           {
  //           	$dstatus ="cancle";
  //           }
  //           if($order_status == 2)
  //           {
  //           	$dstatus ="mark As delivered";
  //           }
  //           if($order_status == 3)
  //           {
  //           	$dstatus ="pickup";
  //           }
            
  //           $checkdata= $this->Order_model->getuserdetails($uid);

  //           //send message
  //           $messageContent['to']      = $checkdata['user_phone'];
  //           $messageContent['message'] = 'Your Order Number: '.$id.' Your order has been '.$dstatus;
  //           $sendmsg = $this->Api_model->SendMessage($messageContent);

  //           //send mail
  //           $settings  =  $this->Settings_model->getsettings();
  //           foreach ($settings as $site_settings) 
  //           {
  //               if($site_settings['name'] == 'smtp_protocol')
  //               {
  //                   $smtp_protocol = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_host')
  //               {
  //                   $smtp_host = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_port')
  //               {
  //                   $smtp_port = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_crypto')
  //               {
  //                   $smtp_crypto = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_user')
  //               {
  //                   $smtp_user = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_password')
  //               {
  //                   $smtp_password = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'smtp_sender_email')
  //               {
  //                   $smtp_sender_email = $site_settings['value'];
  //               }
  //               if($site_settings['name'] == 'site_name')
  //               {
  //                   $site_name = $site_settings['value'];
  //               }
  //               if(empty($site_name))
  //               {
  //                   $site_name="";
  //               }
  //           }

  //           $config['protocol']    = $smtp_protocol;
  //           $config['smtp_host']   = $smtp_host;
  //           $config['smtp_port']   = $smtp_port;
  //           $config['smtp_crypto'] = $smtp_crypto;
  //           $config['smtp_user']   = $smtp_user;
  //           $config['smtp_pass']   = $smtp_password;
  //           $config['mailtype']    = 'html';
  //           $config['newline']     = '\r\n';
  //           $config['charset']     = 'utf-8';

  //           $this->load->library('email');
  //           $this->email->initialize($config);

  //           $this->email->from($smtp_sender_email, ucfirst($site_name));
  //           $form = $checkdata['email'];  
  //           $to = $checkdata['first_name'].' '.$checkdata['last_name'];
  //           $this->email->to($form,$to);
  //           $sta = '- order '.$dstatus;
  //           $this->email->subject(ucfirst($site_name).' '.$sta);
  //           $message= 'Your Order Number: '.$id.' Your order has been '.$dstatus;
  //           $this->email->set_mailtype("html");
  //           $this->email->message($message);
  //           $this->email->send();

  //           //send notification
  //           $datanoti['user_id']  = $uid;
  //           $datanoti['id']       = $id;
  //           $datanoti['title']    = 'your order '.$dstatus;
  //           $datanoti['message']  = 'Your Order Number: '.$id.' Your order has been '.$dstatus;

  //           $sendnoti= $this->Order_model->OrderNotification($datanoti);

  //           //$this->session->set_flashdata('success', "Order status change This order Id ".$id);
  //           redirect('OrderProduct/'.$id);
  //          // echo "1";die;
  //       } 
		
    }

    // code START by MAHIPAL RAWAT 22 may 20202 

    public function filter_order()
    {
        
        $start_date=$this->input->post("start_date");
        $end_date=$this->input->post("end_date");
        $cstatus=$this->input->post("cstatus");
        $data['order'] = $this->Order_model->get_order_by_filter($start_date,$end_date,$cstatus);

        $this->load->view('blocks/header');
        $this->load->view('order/order-view',$data);
        $this->load->view('blocks/footer');
        
    

    }
	
	
	 public function Orderpdf($id)
    {
	    $data = array();
        $data['orderproduct'] = $this->Order_model->getorderproduct($id);
       // $this->load->view('blocks/header');
        $this->load->view('order/order-product-viewpdf',$data);
        //$this->load->view('blocks/footer');
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		//$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));	
	}
	

     // code END by MAHIPAL RAWAT 22 may 20202 
}
