<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		header("Cache-Control: no-store,no-cache, must-revalidate");

			if($this->session->userdata("admin_id") == '')
			redirect("Login");
       
       	$this->load->library("form_validation");
        $this->load->model("admin/Dashboard_model");
		
	}
	public function index()
	{
		$data['user']  		=   $this->Dashboard_model->getuser();
		$data['order']      =   $this->Dashboard_model->getorder();
	    $data['maincategory']  	=   $this->Dashboard_model->getmaincategory();
	    $data['category']  	=   $this->Dashboard_model->getcategory();
	    $data['subcategory']  	=   $this->Dashboard_model->getsubcategory();
		$data['product']    =   $this->Dashboard_model->getproduct();
		$todaydate = date('Y-m-d');
		$data['todayorder']      =   $this->Dashboard_model->gettodayorder($todaydate);
		
		$this->load->view('blocks/header');
		$this->load->view('dashboard',$data);
		$this->load->view('blocks/footer');
	}
	public function ChangePassword()
	{
		
		$this->load->view('blocks/header');
		$this->load->view('change_password');
		$this->load->view('blocks/footer');
	}
	public function doChangepassword()
	{
		
        $data=array();
        $config=array(
						array(
                                'field' => 'opass',
                                'label' => 'Old Password',
                                'rules' => 'trim|required'
                             ),
						array(
                                'field' => 'npass',
                                'label' => 'New Password',
                                'rules' => 'trim|required'
                             ),
						array(
                                'field' => 'cpass',
                                'label' => 'Confirm Password',
                                'rules' => 'trim|matches[npass]'
                             )
						  );
          
          	$this->form_validation->set_rules($config);              
          	$fields   = array("opass","npass");

        
        
        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
       
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata( "errors", validation_errors());
            $this->session->set_flashdata('cform',$data);
            redirect('Change-Password');
        }
		else
		{
			$id=$this->session->userdata('admin_id');
			$result1=$this->Dashboard_model->Checkoldpass($id,$data);
			if( $result1 )
			{
				$aid=$this->session->userdata('admin_id');
				$datanew['password']=md5($data['npass']);
				$result=$this->Dashboard_model->DoChangePassword($datanew,$aid);
              
				if($result > 0)
				{
					$this->session->set_flashdata('success',"Change Password Successfully");
					redirect('Change-Password');
				}
				else
				{   

                    $this->session->set_flashdata('errors',"Change Password Not Successfully");
                    redirect('Change-Password');
				}
			}
			else
			{
					$this->session->set_flashdata('errors',"Wrong Old Password");
                    redirect('Change-Password');
			}
					
		}
	}
	public function Profile()
	{
        $id = $this->session->userdata['admin_id'];
		$data['profile'] = $this->Dashboard_model->getprofile($id);
		$this->session->set_userdata($data['profile']);
		$this->load->view('blocks/header');
		$this->load->view('profile',$data);
		$this->load->view('blocks/footer');
	}
	public function doProfile()
	{
		  
      	$data=array();
      	$config=array(
				array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'trim|required'
	            ),
	          	array(
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'trim|required'
	            ),
	            array(
	                'field' => 'admin_phoneno',
	                'label' => 'Phone No',
	                'rules' => 'trim|required'
	            )
			);
        
    	$this->form_validation->set_rules($config);              
    	$fields   = array("email","username","admin_phoneno");

      	foreach($fields as $field)
      	{
          	$data[$field] = $this->input->post($field);
      	}
      	if($this->form_validation->run() == FALSE)
      	{
          	$this->session->set_flashdata("errors", validation_errors());
          	$this->session->set_flashdata('profileform',$data);
          	redirect('profile');
      	}
  		else
  		{
  			
      		$datanew['email']         = $data['email'];
            $datanew['username']      = $data['username'];
            $datanew['admin_phoneno'] = $data['admin_phoneno'];

      		$id     = $this->session->userdata['admin_id'];
      		$result = $this->Dashboard_model->DoChangeProfile($datanew,$id);
                	
  			if($result > 0)
  			{
  				$this->session->set_flashdata('success',"Profile change successfully");
  				redirect('profile');
  			}
  			else
  			{   

          		$this->session->set_flashdata('errors',"Profile change eny error");
          		redirect('profile');
  			}
  			
  		}     
	}

    ##### QUANTITY LOGS ##########\

	public function qty_logs()
	{
		$data['logs']    =   $this->Dashboard_model->getqty_logs();		
		$this->load->view('blocks/header');
		$this->load->view('quantity_logs',$data);
		$this->load->view('blocks/footer');
	}

	public function filter_logs(){
		$s_date     = $this->input->post('start_date');
		$e_date     = $this->input->post('end_date');
		$start_date = strtotime($s_date);
		$end_date   = strtotime($e_date);		
		if (empty($end_date)) {
			$end_date = $start_date;
		}
		$data['date']  = $start_date.'/'.$end_date;
		$data['logs']        = $this->Dashboard_model->getqty_logbydate($start_date,$end_date);	
		$this->load->view('blocks/header');
		$this->load->view('quantity_logs',$data);
		$this->load->view('blocks/footer');
	}

    ##### DOWLOAD CSV ##########

    public function download_csv(){
    	$start_date = $this->uri->segment(4);
    	$end_date = $this->uri->segment(5);
    	if (empty($start_date)&&empty($end_date)) {
			$logs = $this->Dashboard_model->getqty_logs();	
    	}else{
			$logs = $this->Dashboard_model->getqty_logbydate($start_date,$end_date);
		}
		$dataSource = "\"Sr.No.\",\"Type\",\"Product Name\",\"quantity\",\"Date\"\n";
        $sno = 1;
        foreach ($logs as $odr) {

            $dt = date('d-M-Y',$odr['created']);
            $type = $odr['type'];
            $proname_en = $odr['proname_en'];
            $quantity = $odr['quantity'];
            $dataSource .= "\"$sno\",\"$type\",\"$proname_en\",".
            "\"$quantity\",\"$dt\"\n";
            $sno++;
        }
        $myfilename = "logs" . date('m-d-Y_hia') . '.csv';
        header('Content-type: application/x-download');
        header('Content-Disposition: attachment; filename="' . $myfilename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($dataSource));
        set_time_limit(0);
        echo $dataSource;
        exit;         
    } 

    ##### LEDGER LOGS ##########\

	public function ledger()
	{
		$month = date('M-Y', strtotime("-1 month"));
		$pmonth     = $this->input->post('month');
		if (!empty($pmonth)) {
			$month = $pmonth;
		}
		// print_r($month);die();
		$data['ledger']    =   $this->Dashboard_model->get_ledger($month);		
		$this->load->view('blocks/header');
		$this->load->view('ledger',$data);
		$this->load->view('blocks/footer');
	}
}
