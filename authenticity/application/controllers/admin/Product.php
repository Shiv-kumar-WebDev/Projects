<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = base_url().'assets/ckeditor/';
        $this->load->model("admin/Product_model");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");
        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }


    public function quantity_stock() {
        $data = array();
        $data['product'] = $this->Product_model->getproduct();
        $this->load->view('blocks/header');
        $this->load->view('product/quantity', $data);
        $this->load->view('blocks/footer');
    }


    public function viewcategories($id) {
        $data = array();
        $data['categories'] = $this->Product_model->getproductcategories($id);
        $data['product_id'] = $id;
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('product/product_categories', $data);
        $this->load->view('blocks/footer');
    }

    public function AddProductcategory($id) {
        $data = $this->session->flashdata("pform");
        $data['maincategory'] = $this->Product_model->getmaincategory();
        $data['product'] = $this->Product_model->getpro($id);
        // $data['product_id'] = $id;
        // print_r($data);die();
        $this->load->view('blocks/header');
        $this->load->view('product/addproductcategories',$data);
        $this->load->view('blocks/footer');
    }

    public function doAddcategories() {
         $data = array();
        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            ),array(
                'field' => 'subcatid',
                'label' => 'Sub Category',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $fields = array("maincatid","catid","subcatid","product_id");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddCountry_Weight');
        }else{
            $product_id = $data['product_id'];            
            $maincatid        = $data['maincatid'];
            $subcatid    = $data['subcatid'];
            $catid        = $data['catid'];


            $result =  $this->Product_model->checkcategories($product_id,$maincatid,$catid,$subcatid);
            // print_r($result);die();
            if (empty($result)) {
            $datanew['product_id']        = $product_id;
            $datanew['maincatid']        = $maincatid;
            $datanew['subcatid']        = $subcatid;
            $datanew['catid']        = $catid;

            $this->Product_model->doAddcategories($datanew);
            $this->session->set_flashdata('success', "Country Weight uploaded Successfully !");
            redirect('Product_Categories/'.$product_id);

            }else{
                $this->session->set_flashdata('errors', "Product Already Exist");
                redirect('AddProductCategory/'.$product_id);
            }          
        }
    }
    public function productView() {
        $data = array();
        $data['product'] = $this->Product_model->getproduct();
        $data['category'] = $this->Product_model->getcategory();
        $this->load->view('blocks/header');
        $this->load->view('product/product-view', $data);
        $this->load->view('blocks/footer');
    }

    public function productView_outOfStock() {
        $data = array();
        $data['product'] = $this->Product_model->getproductout();
        $this->load->view('blocks/header');
        $this->load->view('product/product_outOfStock', $data);
        $this->load->view('blocks/footer');
    }

    ##### DOWLOAD CSV ##########

    public function download_csv(){

        $products = $this->Product_model->getproductout();
        $dataSource = "\"Sr.No.\",\"Product name\",\"Variant Type \",\"Quantity Total\"\n";
        $sno = 1;
        foreach ($products as $odr) {
            $product_name = $odr['proname_en'];
            if (!empty($odr['variant_id'])) { 
                $var_type = $odr['size'].' ---> '.$odr['color'];  
            }else{ 
                $var_type = "-";
            }
            $stock_qty = $odr['stock_qty'];
            $dataSource .= "\"$sno\",\"$product_name\",\"$var_type\",".
            "\"$stock_qty\"\n";
            $sno++;
        }
        $myfilename = "quantitystock" . date('m-d-Y_hia') . '.csv';
        header('Content-type: application/x-download');
        header('Content-Disposition: attachment; filename="' . $myfilename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($dataSource));
        set_time_limit(0);
        echo $dataSource;
        exit;         
    } 
    

    public function getbycat() {
        // $data = array();
        $cat= $this->input->post('cat');
        $data['product'] = $this->Product_model->getbycat($cat);
        $data['category'] = $this->Product_model->getcategory();
        $this->load->view('blocks/header');
        $this->load->view('product/product-view', $data);
        $this->load->view('blocks/footer');
        
        
    }

    public function oos_productList() { //$this->output->enable_profiler(1);
        $product_name_search=$_POST['search']['value'];
        $list = $this->Product_model->get_oos_product($product_name_search);
        $listcount = $this->Product_model->get_oos_product_count($product_name_search);
         
          $data = array();
          $no = $_POST['start'];
           foreach ($list as $value) {
        
            $row = array();
               $no++;
            $row[] = $no;
            $row[] = $value['name_en'];
            $row[] = $value['subcategory_name_en'];
            $row[] = $value['proname_en'];
            $row[] = $value['brand_name_en'];
            $row[] = $value['subunit'];

            $data[] = $row;
               
           }
         // echo "<pre>";
          //print_r($data);die;
           $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($listcount),
            "recordsFiltered" => count($listcount),
            "data" => $data,
        );
          echo json_encode($output);
     }


    public function stockView() {
        $data = array();
        $data['stock'] = $this->Product_model->getproduct();
        $this->load->view('blocks/header');
        $this->load->view('product/stock-view', $data);
        $this->load->view('blocks/footer');
    }

	public function viewstock($id) {
        $data = array();
        $data['viewstock'] = $this->Product_model->getproductvariant($id);
        $this->load->view('blocks/header');
        $this->load->view('product/stock_variant_view', $data);
        $this->load->view('blocks/footer');
    }

    public function AddProduct() {
        $data = $this->session->flashdata("pform");
        $data['maincategory'] = $this->Product_model->getmaincategory();
        $data['colors']     = $this->Product_model->getColors();
        $this->load->view('blocks/header');
        $this->load->view('product/add-product', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddProduct() {
         $data = array();
        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'subcatid',
                'label' => 'Sub Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'product_name_en',
                'label' => 'Product Name(En)',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'brand_name_en',
                'label' => 'Brand Name(En)',
                'rules' => 'trim|required'
            ),
			
            array(
                'field' => 'description_en',
                'label' => 'Description(En)',
                'rules' => 'trim|required'
            ),array(
                'field' => 'product_weight',
                'label' => 'Product Weight(In KG)',
                'rules' => 'trim|required'
            )
            
        );
        $this->form_validation->set_rules($config);
        $fields = array("maincatid","catid", "subcatid","price","discount_price","discount","usd_price","usd_discount_price","product_name_en","product_name_ar","brand_name_en","brand_name_ar","description_en","description_ar","product_image","offer_month","color_id","product_weight");

        $pro_image = ($_FILES['product_image']['name'] != '') ? $_FILES['product_image']['name'] : '';
        // print_r($pro_image);die();
		foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        //print_r($data);die();
        $offer_month = (!empty($data['offer_month']))?1:0;
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('AddProduct');
        }else{
            $this->file_uploader->set_default_upload_path("./assets/images/products/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $pro_image = $this->file_uploader->upload_image('product_image');

                $maincatid        = $data['maincatid'];
                $subcatid    = $data['subcatid'];
                $catid        = $data['catid'];

            $datanew['maincatid']        = $maincatid;
            $datanew['subcatid']    = $subcatid;
            $datanew['catid']        = $catid;
            $datanew['proname_en']    = $data['product_name_en'];
            $datanew['brand_name_en'] = $data['brand_name_en'];            
            $datanew['price']        = $data['price'];
            $datanew['discount_price']    = $data['discount_price'];
            $datanew['discount']        = $data['discount'];
            $datanew['usd_price']    = $data['usd_price'];
            $datanew['usd_discount_price'] = $data['usd_discount_price'];
            $datanew['color_id']       = $data['color_id'];
            $datanew['product_weight']       = $data['product_weight'];
            $datanew['offer_month'] = $offer_month;

            $datanew['description_en'] = $data['description_en'];
                 if ($pro_image['status'] == 200) {

                    $string = $pro_image['data'];

                    $pro_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['promain_image'] = $pro_image;
                }

			$product_id = $this->Product_model->DoAddProduct($datanew);
                  /* multiple files uploding logic START */   
              
				   
                        $filesCount = count($_FILES['product_images']['name']); 
                        for($i = 0; $i < $filesCount; $i++){ 
                            $_FILES['file']['name']     = $_FILES['product_images']['name'][$i]; 
                            $_FILES['file']['type']     = $_FILES['product_images']['type'][$i]; 
                            $_FILES['file']['tmp_name'] = $_FILES['product_images']['tmp_name'][$i]; 
                            $_FILES['file']['error']    = $_FILES['product_images']['error'][$i]; 
                            $_FILES['file']['size']     = $_FILES['product_images']['size'][$i]; 
                             
                            // File upload configuration 
                            $uploadPath = './assets/images/products/'; 

                             $config['encrypt_name'] =FALSE;
                             $config['upload_path'] =$uploadPath;
                             $config['allowed_types'] = 'jpg|jpeg|gif|png';
                             $config['max_size']    = '20000000000000';
                             $config['overwrite']     = FALSE;
                             
                            // Load and initialize upload library 
                            $this->load->library('upload', $config); 
                            $this->upload->initialize($config); 

                            // Upload file to server 
                            if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                $fileData = $this->upload->data(); 
                                $uploadData[$i]['product_id'] = $product_id; 
                                $uploadData[$i]['pro_image_name'] = $fileData['file_name']; 
                            }
                        }
                        $newdata['product_id']        = $product_id;
                        $newdata['maincatid']        = $maincatid;
                        $newdata['subcatid']        = $subcatid;
                        $newdata['catid']        = $catid;

                        $this->Product_model->doAddcategories($newdata);

                        #### INSERT QUANTITY STOCK #########

                        $newdata1['product_id']        = $product_id;
                        $newdata1['variant_id']        = 0;
                        $newdata1['stock_qty']        = 0;                      
                        $this->Product_model->doAddstock($newdata1);

                        if(!empty($uploadData)){ 
                            // Insert files info into the database 
 
                            $insert_pr_img = $this->Product_model->insert_Product_Images($uploadData); 
                            if($insert_pr_img)
                            {
                                $this->session->set_flashdata('success', " hello Product Add and image also upload Successfully !");
                               
                                redirect('variant/'. $product_id);
                            }
                           
                        } 
                   
           
            /* multiple files uploding logic END */

			
            $this->session->set_flashdata('success', "Product Add and image also upload Successfully !");
            redirect('Product');
            
        }
    }

    public function EditProduct($id) {
        $data = array();
        $data = $this->session->flashdata("pform");
        $data['category'] = $this->Product_model->getcategory();
		$data['editproduct'] = $this->Product_model->edit_product($id);
        $data['maincategory'] = $this->Product_model->getmaincategory();
        $data['subcategory'] = $this->Product_model->getsubcategory($data['editproduct']['catid']);
        $data['product_img'] = $this->Product_model->get_product_image($id);
        $data['colors']     = $this->Product_model->getColors();
        $this->load->view('blocks/header');
        $this->load->view('product/edit-product', $data);
        $this->load->view('blocks/footer');
    }

   
    public function doUpdateProduct($id) {
        $data = array();
        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'subcatid',
                'label' => 'Sub Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'product_name_en',
                'label' => 'Product Name(En)',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'brand_name_en',
                'label' => 'Brand Name(En)',
                'rules' => 'trim|required'
            ),
            
            array(
                'field' => 'description_en',
                'label' => 'Description(En)',
                'rules' => 'trim|required'
            ),array(
                'field' => 'product_weight',
                'label' => 'Product Weight(In KG)',
                'rules' => 'trim|required'
            )
            
        );
        $this->form_validation->set_rules($config);
        $fields = array("maincatid","catid", "subcatid","product_name_en","product_name_ar","brand_name_en","brand_name_ar","description_en","description_ar","product_image","product_images","offer_month","color_id","product_weight");

        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        $offer_month = ( $data['offer_month']=='on')?1:0;
		if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('pform', $data);
            redirect('EditProduct/' . $id);
        } else {
            
            $datanew['maincatid']    = $data['maincatid'];
            $datanew['subcatid']    = $data['subcatid'];
            $datanew['catid']        = $data['catid'];
            $datanew['proname_en']    = $data['product_name_en'];
			$datanew['brand_name_en'] = $data['brand_name_en'];
			$datanew['description_en'] = $data['description_en'];
            $datanew['color_id']       = $data['color_id'];
            $datanew['product_weight']       = $data['product_weight'];
            $datanew['offer_month']    = $offer_month;
            //print_r($datanew); die;
            if(!empty($_FILES['product_image']['name'])){

                $this->file_uploader->set_default_upload_path("./assets/images/products/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $pro_image = $this->file_uploader->upload_image('product_image');
                //print_r($pro_image); die;
                if ($pro_image['status'] == 200) {

                    $string = $pro_image['data'];

                    $pro_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['promain_image'] = $pro_image;
                }
                //print_r($datanew); die;
                $result = $this->Product_model->DoUpdateProduct($datanew, $id); 

            }else{
                $result = $this->Product_model->DoUpdateProduct($datanew, $id); 
            }

			if(!empty($_FILES['product_images']['name'])){ 
                $filesCount = count($_FILES['product_images']['name']); 
                        for($i = 0; $i < $filesCount; $i++){ 
                            $_FILES['file']['name']     = $_FILES['product_images']['name'][$i]; 
                            $_FILES['file']['type']     = $_FILES['product_images']['type'][$i]; 
                            $_FILES['file']['tmp_name'] = $_FILES['product_images']['tmp_name'][$i]; 
                            $_FILES['file']['error']    = $_FILES['product_images']['error'][$i]; 
                            $_FILES['file']['size']     = $_FILES['product_images']['size'][$i]; 
                             
                            // File upload configuration 
                            $uploadPath = './assets/images/products/'; 

                             $config['encrypt_name'] =FALSE;
                             $config['upload_path'] =$uploadPath;
                             $config['allowed_types'] = 'jpg|jpeg|gif|png';
                             $config['max_size']    = '20000000000000';
                             $config['overwrite']     = FALSE;
                             
                            // Load and initialize upload library 
                            $this->load->library('upload', $config); 
                            $this->upload->initialize($config); 

                            // Upload file to server 
                            if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                $fileData = $this->upload->data(); 
                                $uploadData[$i]['product_id'] = $id; 
                                $uploadData[$i]['pro_image_name'] = $fileData['file_name']; 
                                // $uploadData[$i]['create_date_time'] = date("Y-m-d H:i:s"); 
                            }else{ 
                            } 
                        }
                         // $uploadData['image_first']=implode(',',$array);
                         // $uploadData['image_first']=$uploadData['image_first'].',';
                        // print_r($uploadData);
                        // exit;
                         
                        // File upload error message 
                        // $errorUpload = !empty($errorUpload)?' Upload Error: '.trim($errorUpload, ' | '):''; 
                      
                         
                if(!empty($uploadData)){ 
                    // Insert files info into the database 

                    // $insert_pr_img = 
                            $insert_pr_img = $this->Product_model->insert_Product_Images($uploadData); 
                    // if($insert_pr_img)
                    // {
                    //     $this->session->set_flashdata('success', "Product Add and image also upload Successfully !");
                    // }
                   
                } 
            }
   
            /* multiple files uploding logic END */
			
			

            if ($result > 0) {
                $this->session->set_flashdata('success', "Product edit Successfully");
               redirect('Product');
            } else {
                $this->session->set_flashdata('errors', "Product Not Edit Successfully");
               redirect('Product');
            }
        }
    }

 public function ProductStatus_delete() 
    {
        $id = $this->uri->segment(2);

        if ($this->Product_model->DoDeleteStatus($id)) {  
            $this->session->set_flashdata('success', "Product Delete Successfully");
            redirect('Product');
        } else {
            $this->session->set_flashdata('error', "Product Not Deleted");
            redirect('Product');
        }
    }
    public function ProductStatus($id) 
    {
        // $id = $this->uri->segment(2);
        $getstatus = $this->Product_model->DogetStatus($id);
        $status = $getstatus['prostatus'];
        // print_r($status);die();

        if ($status == 0) {
            $datanew['prostatus'] = '1';
            $result = $this->Product_model->DoEditStatus($datanew, $id);
            redirect('Product');
        } else {
            $datanew['prostatus'] = '0';
            $result = $this->Product_model->DoEditStatus($datanew, $id);
            redirect('Product');
        }
    }

    public function ProductArrival($id) 
    {
        // $id = $this->uri->segment(2);
        $getstatus = $this->Product_model->DogetnewStatus($id);
        $status = $getstatus['new_arr'];
        // print_r($status);die();

        if ($status == 0) {
            $datanew['new_arr'] = '1';
            $result = $this->Product_model->DoEditStatus($datanew, $id);
            redirect('Product');
        } else {
            $datanew['new_arr'] = '0';
            $result = $this->Product_model->DoEditStatus($datanew, $id);
            redirect('Product');
        }
    }

    public function UnitView() {
        $data = array();
        $data['unit'] = $this->Product_model->getunit();
        $this->load->view('blocks/header');
        $this->load->view('product/unit-view', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddunit() {



        $data = array();

        $config = array(
            array(
                'field' => 'unit_en',
                'label' => 'Unit Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("unit_en","unit_ar");



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('uform', $data);

            redirect('Unit');
        } else {

            $datanew['unit_option_en'] = $data['unit_en'];
			$result = $this->Product_model->DoAddunit($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Unit Add Successfully");

                redirect('Unit');
            } else {



                $this->session->set_flashdata('errors', "Unit Not Add Successfully");

                redirect('Unit');
            }
        }
    }
	public function Subunitview($id) {
        $data = array();
		$data['unit']    = $this->Product_model->getunitdata($id);
        $data['subunit'] = $this->Product_model->getsubunit($id);
		$data['unitid'] =$id;
        $this->load->view('blocks/header');
        $this->load->view('product/subunit-view', $data);
        $this->load->view('blocks/footer');
    }

    public function doAddsubunit($id) {



        $data = array();

        $config = array(
			array(
                'field' => 'unit_id',
                'label' => 'Unit',
                'rules' => 'trim'
            ),
            array(
                'field' => 'subunit_en',
                'label' => 'Subunit Name(En)',
                'rules' => 'trim|required'
            ),
			
        );

        $this->form_validation->set_rules($config);

        $fields = array("unit_id","subunit_en","subunit_ar");



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('suform', $data);

            redirect('Subunit/'.$id);
        } else {
			$datanew['unit_id']       = $id;
            $datanew['subunit_option_en'] = $data['subunit_en'];
			

            $result = $this->Product_model->DoAddsubunit($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Subunit Add Successfully");

                redirect('Subunit/'.$id);
            } else {



                $this->session->set_flashdata('errors', "Subunit Not Add Successfully");

                redirect('Subunit/'.$id);
            }
        }
    }
	public function subunitStatus() {
        $id = $this->uri->segment(2);
        $getstatus = $this->Product_model->DogetsubunitStatus($id);
        $status = $getstatus['subunit_status'];
		$subid = $getstatus['unit_id'];

        if ($status == 0) {
            $datanew['subunit_status'] = '1';
            $result = $this->Product_model->DoEditsubunitStatus($datanew, $id);
            redirect('Subunit/'.$subid);
        } else {
            $datanew['subunit_status'] = '0';
            $result = $this->Product_model->DoEditsubunitStatus($datanew, $id);
            redirect('Subunit/'.$subid);
        }
    }
    
    public function getsubcategory(){
        if($this->input->post()){
            $id=$this->input->post('id');print_r($id);die;
            $result=  $this->Product_model->getsubcategory($id);
			// print_r($id);die;
            echo json_encode($result);
            exit;
        }
    }
	public function getSubunit(){
        if($this->input->post()){
            $id=$this->input->post('id');
            $result=  $this->Product_model->getsubunitlist($id);
			//print_r($result);die;
            echo json_encode($result);
            exit;
        }
    }
	//variant
	

    //             Product Variant Code


    public function variant($id) {
        $data = array();
        $data['variant'] = $this->Product_model->getvariant($id);
        // print_r($data);die;
        $data['product_id'] =$id;
        $this->load->view('blocks/header');
        $this->load->view('variant/variant_view', $data); 
        $this->load->view('blocks/footer');
    }
    
    public function variant_view_out_of_stock($id) {
        $data = array();
        $data['variant'] = $this->Product_model->getvariant_out_of_stock($id);
        $data['product_id'] =$id;
        $this->load->view('blocks/header');
        $this->load->view('variant/variant_view_out_of_stock', $data);
        $this->load->view('blocks/footer');
    }
    public function Addvariant($id) {
        $data['productname'] = $this->Product_model->getproductname($id);
        // $data['att'] = $this->Product_model->getattr();
       
        $data['attr_optn'] = $this->Product_model->getattroptn();
        $data['varid']=$id;
        $this->load->view('blocks/header');
        $this->load->view('variant/add_variant', $data);
        $this->load->view('blocks/footer');
    }

   public function doAddVariant($id) {
        $data = array();
        $config = array(
            array(
                'field' => 'size',
                'label' => 'size',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'color',
                'label' => 'color type',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'list_price',
                'label' => 'variant list price',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'variant_price',
                'label' => 'variant price',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'variant_weight',
                'label' => 'variant Weight',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $fields = array("size","color","proid","variant_price","list_price","usd_list_price","usd_variant_price","variant_weight");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('vform', $data);
            redirect('Addvariant/'.$id);
        }else{
            $datanew['product_id']     = $id;
            $datanew['size']   = $data['size'];
            $datanew['color']   = $data['color'];
            $datanew['list_price']  = $data['list_price'];
            $datanew['variant_price']  = $data['variant_price'];
            $datanew['usd_list_price']  = $data['usd_list_price'];
            $datanew['usd_variant_price']  = $data['usd_variant_price'];
            $datanew['variant_weight']  = $data['variant_weight'];
        
            $result=$this->Product_model->DoAddvarint($datanew);

            ####### ADD VARIANT STOCK ######

            $newdata1['product_id']        = $id;
            $newdata1['variant_id']        = $result;
            $newdata1['stock_qty']        = 0;                      
            $this->Product_model->doAddstock($newdata1);

            if ($result > 0) {
                $this->session->set_flashdata('success', "Variant Add Successfully");
                redirect('Addvariant/'.$id);
            } else {
                $this->session->set_flashdata('errors', "Variant Not Add Successfully");
                redirect('Addvariant/'.$id);
            }
            
        }
    }
    public function Editvariant($id,$product_id) {
       
        $data['editvariant'] = $this->Product_model->edit_variant($id); 
        $data['productname'] = $this->Product_model->getproductname($product_id);       
        $data['attr_optn'] = $this->Product_model->getattroptn();
        // print_r($data);die();
        $data['product_id']=$product_id;
        $this->load->view('blocks/header');
        $this->load->view('variant/edit_variant', $data);
        $this->load->view('blocks/footer');
    }

    public function doUpdatevariant($id) {
        $data = array();
        $config = array(
            array(
                'field' => 'size',
                'label' => 'size',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'color',
                'label' => 'color type',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'list_price',
                'label' => 'variant list price',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'variant_price',
                'label' => 'variant price',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        $fields = array("size","color","proid","variant_price","list_price","usd_list_price","usd_variant_price");
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('vform', $data);
            redirect('Editvariant/' . $id.'/'.$data['proid']);
        } else {
            $datanew['product_id']     = $data['proid'];
            $datanew['size']   = $data['size'];
            $datanew['color']   = $data['color'];
            $datanew['list_price']  = $data['list_price'];
            $datanew['variant_price']  = $data['variant_price'];
            $datanew['usd_list_price']  = $data['usd_list_price'];
            $datanew['usd_variant_price']  = $data['usd_variant_price'];
            // $datanew['variant_weight']  = $data['variant_weight'];
            
            $result = $this->Product_model->DoUpdatevariant($datanew, $id);

            if ($result > 0) {
                $this->session->set_flashdata('success', "Variant edit Successfully");
                redirect('variant/'.$data['proid']);
            } else {
                $this->session->set_flashdata('errors', "Variant Not Edit Successfully");
                redirect('variant/'.$data['proid']);
            }
        }
    }
    public function variantStatus($id) {
        $getstatus = $this->Product_model->DogetvariantStatus($id);
        $status = $getstatus['variant_status'];
        $idd = $getstatus['product_id'];
        if ($status == 0) {
            $datanew['variant_status'] = '1';
            $result = $this->Product_model->DoEditvariantStatus($datanew, $id);
            redirect('variant/'.$idd);
        } else {
            $datanew['variant_status'] = '0';
            $result = $this->Product_model->DoEditvariantStatus($datanew, $id);
            redirect('variant/'.$idd);
        }
    }

       /** delete Product Images*/
    public function productImgdelete($id)
    {
        if ($this->Product_model->delete('product_images',$id,'pro_image_id')) {
            $this->session->set_flashdata('success', 'Product Image has been deleted successfully.');
            echo 'success';
        } else {
            $this->session->set_flashdata('errors', 'Error occured while delete Product Image!!!');
            echo 'false';
        }


    }
}
