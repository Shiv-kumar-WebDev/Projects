<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("admin/Settings_model");
        if($this->session->userdata("admin_id") == '')
        redirect("Login");
    }
	public function Settings()
	{
		$data['settings'] = $this->Settings_model->getsettings();
		$this->load->view('blocks/header');
		$this->load->view('settings',$data);
		$this->load->view('blocks/footer');
	}
	public function doSettings()
	{
		
        $data=array();
        $config=array(
						
                        array(
                                'field' => 'site_name',
                                'label' => 'Site Name',
                                'rules' => 'trim|required'
                            ),
                        array(
                                'field' => 'minimum_price',
                                'label' => 'Minimum Price',
                                'rules' => 'trim|required'
                            ),
                            array(
                                'field' => 'order_name',
                                'label' => 'Order Name',
                                'rules' => 'trim|required'
                            ),
                             array(
                                'field' => 'gst_no',
                                'label' => 'GST No',
                                'rules' => 'trim|required'
                            ),
                        array(
                                'field' => 'usd_price',
                                'label' => 'Usd Price',
                                'rules' => 'trim|required'
                            ),
                        array(
                                'field' => 'product_title',
                                'label' => 'Title',
                                'rules' => 'trim|required'
                            )
						  );
          
      	$this->form_validation->set_rules($config);              
      	$fields   = array("site_name","minimum_price","order_name","gst_no","usd_price","product_title");

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("errors", validation_errors());
            $this->session->set_flashdata('settingsform',$data);
            redirect('settings');
        }
		else
		{
			$del_rel = $this->Settings_model->SettingsDelete();
			foreach($fields as $settings){
				$data[$settings] = $this->input->post($settings);

				$datanew['name']  = $settings;
				$datanew['value'] = $data[$settings];
				$result = $this->Settings_model->Dosettings($datanew);
			}
			if($result > 0)
			{
				$this->session->set_flashdata('success',"Site Settings Save Successfully");
				redirect('settings');
			}
			else
			{   

				$this->session->set_flashdata('errors',"something went wrong. please try again");
				redirect('settings');
			}
			
		}
    }
}
