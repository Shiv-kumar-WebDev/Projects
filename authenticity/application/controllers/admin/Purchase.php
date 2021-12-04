<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Purchase_model");
        $this->load->model("admin/Settings_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function index() 
	{
		$data = array();
        $data['purchase'] = $this->Purchase_model->get_purchase();
        $this->load->view('blocks/header');
        $this->load->view('purchase/purchase_view',$data);
        $this->load->view('blocks/footer');
    }

    public function addorder() 
    {
        $this->load->view('blocks/header');
        $this->load->view('purchase/create_purchase');
        $this->load->view('blocks/footer');
    }
    public function all_products()
    {
        $all_products = $this->Purchase_model->all_products();
        foreach ($all_products as $value) {
            if (!empty($value['variant_id'])) {
                $data[] = ['label'=>$value['proname_en'].'--->'.$value['size'].'--->'.$value['color'],'value'=>$value['proname_en'],'variant_id'=>$value['variant_id']];
            }else{
                $data[] = ['label'=>$value['proname_en'],'value'=>$value['proname_en'],'variant_id'=>0];
            }
        }
        echo json_encode($data);

    }

    public function search()
    {
        $term= $_GET['term'];
        $cond = ' AND proname_en LIKE "'.$term .'%"'; 
        $return1 = $this->Purchase_model->fetch('product',$cond);
        $return_arr = [];
        foreach ($return1 as $key => $value)
        {
            $return_arr[] =  $value->proname_en;
        }
        echo json_encode($return_arr);

    }
    public function productdetail()
    {   
        $name = $_POST['name'];
        $variant_id = $_POST['variant_id'];
        $name = $this->security->xss_clean(htmlspecialchars($name));
        $name = addslashes($name);
        if (!empty($variant_id)) {
            $dta = $this->Purchase_model->fetchpro($name,$variant_id);
        }else{
            $cond2 = " And prostatus = 1 AND proname_en = '".$name."' ";
            $dta = $this->Purchase_model->fetch('product',$cond2);
        }
        if(!empty($dta)){
        $data  = array('prodat' => $dta[0]);
        }else{
        $data  = array('prodat' => 0);
        }
        print_r(json_encode($data))  ;
    }
	public function createorder(){
           
        $name           = $_POST['name'];
        $number         = $_POST['cn'];
        $s_add          = $_POST['address'];          
        $pro            = $_POST['pro'];
        $pro_price      = @$_POST['pro_price'];
        $qty            = $_POST['qty']; 
        $subtotal       = $_POST['subtotal'];
        $pid            = @$_POST['pid']; 
        $variant_id            = @$_POST['variant_id']; 
        $date           = $_POST['date'];
        $time           = strtotime($date);
        $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $invoice = substr( str_shuffle( $chars ), 0, 10 );
        $total          = 0;
       for($i=0;$i< count($pro);$i++) {
                
                $productprice    =  $subtotal[$i] ;
                $total          +=  $productprice;
                $this->Purchase_model->updateStock($pid[$i],$variant_id[$i],$qty[$i]);
        }
        //order insertion
        $orderarr = array('v_contact_no'=>$number,
                          'v_name'=>$name,
                          'v_address'=>$s_add,
                          'purchase_total'=>$total,
                          'purchase_invoice '=>$invoice,
                          'purchased_date' => $time+19800
                 );
        $purchase_id = $this->Purchase_model->insert('purchase',$orderarr);

        if($purchase_id){ 
            
                //product insertion
            for($i=0;$i< count($pro);$i++) {
              
                $productprice   =  $subtotal[$i] ;
                $product[] = array(
                            'purchase_id'=>$purchase_id,
                            'product_id'=>$pid[$i],
                            'purchased_variantid'=>$variant_id[$i],
                            'purchased_qty'=>$qty[$i],
                            'purchased_price'=> $pro_price[$i],
                            'total_product_price'=>$productprice
                );
                $logarr[] = array(
                            'transection_id'=>$purchase_id,
                            'product_id'=>$pid[$i],
                            'variant_id'=>$variant_id[$i],
                            'quantity'=>$qty[$i],
                            'type'=>'purchased',
                            'created' => $time+19800
                );
            }
            $this->Purchase_model->insertbatch('purchased_products',$product);
            $this->Purchase_model->insertbatch('qty_logs',$logarr);
            $msg   = '#'.$purchase_id.'Purchased Order successfully Created';
            $this->session->set_flashdata('success', $msg);
            redirect("AddOrder");

        }else{
           $msg   = 'Purchased Order Not Created';
          $this->session->set_flashdata('error', $msg);
          redirect("AddOrder");

        }
    }

    public function purchase_products($id) 
    {  
        $data = array();
        $data['orderproduct'] = $this->Purchase_model->getorderproduct($id);
        if(!empty($data['orderproduct'])){
            $data['details'] = $this->Purchase_model->get_details($id);
            $this->load->view('blocks/header');
            $this->load->view('purchase/purchase_products',$data);
            $this->load->view('blocks/footer');
        }else{
            redirect(404);
        }
    }

    ##### DOWLOAD CSV ##########

    public function download_csv(){

        $purchase = $this->Purchase_model->get_purchase();
        $dataSource = "\"Sr.No.\",\"Vendor name\",\"Vendor contact No\",\"Purchase Total\",\"Purchase Date\"\n";
        $sno = 1;
        foreach ($purchase as $odr) {

            $dt = date('d-M-Y',$odr['purchased_date']);
            $v_name = $odr['v_name'];
            $v_contact_no = $odr['v_contact_no'];
            $purchase_total = $odr['purchase_total'];
            $dataSource .= "\"$sno\",\"$v_name\",\"$v_contact_no\",".
            "\"$purchase_total\",\"$dt\"\n";
            $sno++;
        }
        $myfilename = "purchaseordrList_" . date('m-d-Y_hia') . '.csv';
        header('Content-type: application/x-download');
        header('Content-Disposition: attachment; filename="' . $myfilename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($dataSource));
        set_time_limit(0);
        echo $dataSource;
        exit;         
    } 
    
}
