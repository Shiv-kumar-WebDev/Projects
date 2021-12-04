<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coupon extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Coupon_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function coupon() 
    {
        $data = array();
        $data['coupon'] = $this->Coupon_model->getcoupon();
        $this->load->view('blocks/header');
        $this->load->view('coupon/coupon_view',$data);
        $this->load->view('blocks/footer');
    }
    public function add_coupon() 
    {
        $data       =   $this->session->flashdata("cpform");
        $data['products'] = $this->Coupon_model->getproducts();
        $data['category'] = $this->Coupon_model->getcat();
        $this->load->view('blocks/header');
        $this->load->view('coupon/add_coupon',$data);
        $this->load->view('blocks/footer');
    }
    public function doAddCoupon() 
    {

        $data=array();
        $config=array(
                        
                        array(
                                'field' => 'discount_type',
                                'label' => 'Discount Type',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'coupon_code',
                                'label' => 'Coupon Code',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'coupon_amount',
                                'label' => 'Coupon Amount',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'start_date',
                                'label' => 'Start Date',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'expiry_date',
                                'label' => 'Expiry Date',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'users',
                                'label' => 'Coupon Quantity',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'usage_limit_per_user',
                                'label' => 'Usage Limit Per User',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'minimum_amount',
                                'label' => 'Minimum Amount',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'discount_upto',
                                'label' => 'discount upto',
                                'rules' => 'trim|required'
                              )
                    );
          $this->form_validation->set_rules($config);              
          $fields   = array("discount_type","coupon_code","coupon_amount","start_date","users","usage_limit_per_user","minimum_amount","expiry_date","discount_upto");

        // print_r($product_categories);die();
        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('cpform',$data);
            redirect('add_coupon');
        }
        else
        {   
            if ($data['discount_type'] == 'percent') {

                if ($data['coupon_amount'] > 100) {
                    $this->session->set_flashdata('errors',"something went wrong please try again");
                    redirect('add_coupon');
                    
                }

            }else{

                $datanew['discount_type']          = $data['discount_type'];
                $datanew['coupon_code']    = $data['coupon_code'];
                $datanew['coupon_amount']    = $data['coupon_amount'];
                $datanew['start_date']      = $data['start_date'];
                $datanew['expiry_date']     = $data['expiry_date'];
                $datanew['users'] = $data['users'];
                $datanew['discount_upto'] = $data['discount_upto'];  
                $datanew['usage_limit_per_user'] = $data['usage_limit_per_user'];   
                $datanew['minimum_amount']    = $data['minimum_amount'];
            }
                    
            $result=$this->Coupon_model->DoAddCoupon($datanew);
      
            if($result > 0)
            {
                $this->session->set_flashdata('success',"Coupon Add Successfully");
                redirect('coupon');
            }
            else
            {   

              $this->session->set_flashdata('errors',"something went wrong please try again");
              redirect('coupon');
            }
        }
    }
    public function edit_coupon($id)
    {
        $data = array();
        $data       =   $this->session->flashdata("cpform");
        $this->load->view('blocks/header');
        $data['editcoupon'] = $this->Coupon_model->edit_coupon($id); 
        $data['products'] = $this->Coupon_model->getproducts();
        $data['category'] = $this->Coupon_model->getcat();
        $this->load->view('coupon/edit_coupon',$data);
        $this->load->view('blocks/footer');
        
    }  
    public function doUpdateCoupon($id) 
    {

        $data=array();
        $config=array(
                        
                        array(
                                'field' => 'discount_type',
                                'label' => 'Discount Type',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'coupon_code',
                                'label' => 'Coupon Code',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'coupon_amount',
                                'label' => 'Coupon Amount',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'start_date',
                                'label' => 'Start Date',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'expiry_date',
                                'label' => 'Expiry Date',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'users',
                                'label' => 'Coupon Quantity',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'usage_limit_per_user',
                                'label' => 'Usage Limit Per User',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'minimum_amount',
                                'label' => 'Minimum Amount',
                                'rules' => 'trim|required'
                              ),
                        array(
                                'field' => 'discount_upto',
                                'label' => 'discount upto',
                                'rules' => 'trim|required'
                              )
                    );
        $this->form_validation->set_rules($config);              
        $fields   = array("discount_type","coupon_code","coupon_amount","start_date","users","usage_limit_per_user","minimum_amount","expiry_date","discount_upto");
        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('cpform',$data);
            redirect('edit_coupon/'.$id);
        }
        else
        {   
            if ($data['discount_type'] == 'percent' && $data['coupon_amount'] > 100) {

               // if ($data['coupon_amount'] > 100) {
                $this->session->set_flashdata('errors',"something went wrong please try again");
                redirect('edit_coupon/'.$id);
                    
                // }

            }else{

                $datanew['discount_type']          = $data['discount_type'];
                $datanew['coupon_code']    = $data['coupon_code'];
                $datanew['coupon_amount']    = $data['coupon_amount'];
                $datanew['start_date']      = $data['start_date'];
                $datanew['expiry_date']     = $data['expiry_date'];
                $datanew['users'] = $data['users'];
                $datanew['discount_upto'] = $data['discount_upto'];  
                $datanew['usage_limit_per_user'] = $data['usage_limit_per_user'];   
                $datanew['minimum_amount']    = $data['minimum_amount'];
            }
            $result=$this->Coupon_model->DoUpdatecoupon($datanew,$id);
      
            if($result > 0)
            {
                $this->session->set_flashdata('success',"Coupon edit Successfully");
                redirect('coupon');
            }
            else
            {   

              $this->session->set_flashdata('errors',"something went wrong please try again");
              redirect('coupon');
            }
        }
    }

    public function delete_coupon($id)
    {
        $datanew['deleted']    = 2;
        // print_r($datanew);die();
        if ($this->Coupon_model->DoUpdatecoupon($datanew,$id)) {
            $this->session->set_flashdata('warning',"Coupon Deleted");
           redirect('coupon');
        }
         
        
    }  
    //delivery date code
    public function delivery_date() 
    {
        $data = array();
        $data['delivery_date'] = $this->Coupon_model->getdeliverydate();
        $this->load->view('blocks/header');
        $this->load->view('delivery_date/delivery_date_view',$data);
        $this->load->view('blocks/footer');
    }
    public function add_delivery_date() 
    {
        $data       =   $this->session->flashdata("ddform");
        $this->load->view('blocks/header');
        $this->load->view('delivery_date/add_delivery_date');
        $this->load->view('blocks/footer');
    }
    public function doAddDeliveryDate() 
    {

        $data=array();
        $config=array(
                        
                array(
                        'field' => 'start_date',
                        'label' => 'Start Date',
                        'rules' => 'trim|required'
                      ),
                array(
                        'field' => 'end_date',
                        'label' => 'End Date',
                        'rules' => 'trim|required'
                      ),
                array(
                        'field' => 'start_time[]',
                        'label' => 'Start Time',
                        'rules' => 'trim|required'
                      ),
                array(
                        'field' => 'end_time[]',
                        'label' => 'End Time',
                        'rules' => 'trim|required'
                      ),
                );
                
        $this->form_validation->set_rules($config);              
        $fields   = array("start_date","end_date","start_time","end_time");

        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('ddform',$data);
            redirect('add_delivery_date');
        }
        else
        {   
                
                $finaldate = array(); 
                  
                $variable1 = strtotime($data['start_date']); 
                $variable2 = strtotime($data['end_date']); 
                  
                for ($currentDate = $variable1; $currentDate <= $variable2;$currentDate += (86400)) 
                {                                   
                    $finaldate[] = date('Y-m-d', $currentDate); 
                } 
                foreach($finaldate as $fdate)
                {
                    $datanew['delivery_date'] = $fdate;
                    $result=$this->Coupon_model->DoAdddeliverydate($datanew);
                    
                    $time_array = array_combine($data['start_time'],$data['end_time']);
                    foreach($time_array as $start_time => $end_time)
                    {
                        $setime['delivery_date_id'] = $result;
                        $setime['start_time']       = $start_time;
                        $setime['end_time']         = $end_time;
                        
                        $result1=$this->Coupon_model->DoAdddeliverydatetime($setime); 
                    }
                }
                if($result > 0)
                {
                    $this->session->set_flashdata('success',"Delivery date and time Add Successfully");
                    redirect('delivery_date');
                }
                else
                {   

                  $this->session->set_flashdata('errors',"something went wrong please try again");
                  redirect('delivery_date');
                }
        }
    }

    public function delete_delivery_date($id)
    {
        $result = $this->Coupon_model->delete_delivery_date($id);
        if ($result > 0) 
        {
            $result1 = $this->Coupon_model->delete_deliverytime($id);
            $this->session->set_flashdata('success', "Delivery time deleted Successfully");
            redirect('delivery_date');
        }
        else
        {
            $this->session->set_flashdata('errors', "something went wrong please try again");
            redirect('delivery_date');
        }

    }   
	
}
