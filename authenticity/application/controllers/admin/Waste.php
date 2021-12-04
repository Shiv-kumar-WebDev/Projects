<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Waste extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Waste_model");
        $this->load->model("admin/Settings_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function index() 
	{
		$data = array();
        $data['waste'] = $this->Waste_model->get_waste();
        $this->load->view('blocks/header');
        $this->load->view('waste/waste_view',$data);
        $this->load->view('blocks/footer');
    }

    public function addwaste() 
    {
        $this->load->view('blocks/header');
        $this->load->view('waste/create_waste');
        $this->load->view('blocks/footer');
    }
     public function all_products()
    {
        $all_products = $this->Waste_model->all_products();
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
        $return1 = $this->Waste_model->fetch('product',$cond);
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
            $dta = $this->Waste_model->fetchpro($name,$variant_id);
        }else{
            $cond2 = " And prostatus = 1 AND proname_en = '".$name."' ";
            $dta = $this->Waste_model->fetch('product',$cond2);
        }
        if(!empty($dta)){
        $data  = array('prodat' => $dta[0]);
        }else{
        $data  = array('prodat' => 0);
        }
        print_r(json_encode($data))  ;
    }
	public function createwaste(){
           
        $name           = $_POST['name'];
        $number         = $_POST['cn'];
        $s_add          = $_POST['address'];          
        $pro            = $_POST['pro'];
        $pro_price      = @$_POST['pro_price'];
        $qty            = $_POST['qty']; 
        $subtotal       = $_POST['subtotal'];
        $pid            = @$_POST['pid']; 
        $variant_id     = @$_POST['variant_id']; 
        $date           = $_POST['date'];
        $time           = strtotime($date);
        $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $invoice = substr( str_shuffle( $chars ), 0, 10 );
        $total          = 0;
       for($i=0;$i< count($pro);$i++) {
                
                $productprice    =  $subtotal[$i] ;
                $total          +=  $productprice;
                $this->Waste_model->updateStock($pid[$i],$variant_id[$i],$qty[$i]); 
        }
        //order insertion
        $orderarr = array('v_contact_no'=>$number,
                          'v_name'=>$name,
                          'v_address'=>$s_add,
                          'waste_total'=>$total,
                          'waste_invoice '=>$invoice,
                          'waste_date' => $time+19800
                 );
        $waste_id = $this->Waste_model->insert('waste',$orderarr);
        if($waste_id){ 
            
                //product insertion
            for($i=0;$i< count($pro);$i++) {
              
                $productprice   =  $subtotal[$i] ;
                $product[] = array('waste_id'=>$waste_id,
                                   'product_id'=>$pid[$i],
                                   'variantid'=>$variant_id[$i],
                                   'waste_qty'=>$qty[$i],
                                   'waste_price'=> $pro_price[$i],
                                   'total_product_price'=>$productprice
                                );
                $logarr[] = array(
                            'transection_id'=>$waste_id,
                            'product_id'=>$pid[$i],
                            'variant_id'=>$variant_id[$i],
                            'quantity'=>$qty[$i],
                            'type'=>'waste',
                            'created' => $time+19800
                );
            }
            $this->Waste_model->insertbatch('waste_products',$product);
            $this->Waste_model->insertbatch('qty_logs',$logarr);
           $msg   = '#'.$waste_id.'waste Order successfully Created';
          $this->session->set_flashdata('success', $msg);
          redirect("AddWaste");

        }else{
           $msg   = 'wasted Order Not Created';
          $this->session->set_flashdata('error', $msg);
          redirect("AddWaste");

        }
    }

  public function waste_products($id) 
  {  
    $data = array();
        $data['orderproduct'] = $this->Waste_model->getorderproduct($id);
        if(!empty($data['orderproduct'])){
            $data['details'] = $this->Waste_model->getwaste_details($id);
        // print_r($data);die();
            $this->load->view('blocks/header');
            $this->load->view('waste/waste_products',$data);
            $this->load->view('blocks/footer');
        }else{
            redirect(404);
        }
    }

    ##### DOWLOAD CSV ##########

    public function download_csv(){

        $waste = $this->Waste_model->get_waste();
        $dataSource = "\"Sr.No.\",\"Vendor name\",\"Vendor contact No\",\"Waste Total\",\"Waste Date\"\n";
        $sno = 1;
        foreach ($waste as $odr) {

            $dt = date('d-M-Y',$odr['waste_date']);
            $v_name = $odr['v_name'];
            $v_contact_no = $odr['v_contact_no'];
            $waste_total = $odr['waste_total'];
            $dataSource .= "\"$sno\",\"$v_name\",\"$v_contact_no\",".
            "\"$waste_total\",\"$dt\"\n";
            $sno++;
        }
        $myfilename = "wasteordrList_" . date('m-d-Y_hia') . '.csv';
        header('Content-type: application/x-download');
        header('Content-Disposition: attachment; filename="' . $myfilename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($dataSource));
        set_time_limit(0);
        echo $dataSource;
        exit;         
    } 
}
