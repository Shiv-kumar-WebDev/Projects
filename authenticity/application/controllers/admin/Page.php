<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/Page_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function pageView() 
	{
		$data = array();
        $data['page'] = $this->Page_model->getpage();
        $this->load->view('blocks/header');
        $this->load->view('page/page-view',$data);
        $this->load->view('blocks/footer');
    }
	public function AddPage() 
	{
		$data		=	$this->session->flashdata("pform");
        $this->load->view('blocks/header');
        $this->load->view('page/add-page');
        $this->load->view('blocks/footer');
    }
	public function doAddPage() 
	{

        $data=array();
        $config=array(
						
						array(
                                'field' => 'title',
                                'label' => 'Title',
                                'rules' => 'trim|required'
                              ),
						array(
                                'field' => 'slug',
                                'label' => 'Slug',
                                'rules' => 'trim|required'
                              ),
						array(
                                'field' => 'description',
                                'label' => 'Description',
                                'rules' => 'trim|required'
                              ),
						
					);
          $this->form_validation->set_rules($config);              
          $fields   = array("title","slug","description");

        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
		if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata( "errors", validation_errors());
            $this->session->set_flashdata('pform',$data);
            redirect('AddPage');
        }
		else
		{	
				$datanew['page_title'] = $data['title'];
				$datanew['page_slug']  = $data['slug'];
				$datanew['page_description'] = $data['description'];
					
				$result=$this->Page_model->DoAddpage($datanew);
		  
				if($result > 0)
				{
					$this->session->set_flashdata('success',"Page Add Successfully");
					redirect('Page');
				}
				else
				{   

				  $this->session->set_flashdata('errors',"Page Not Add Successfully");
				  redirect('Page');
				}
		}
    }
    public function EditPage($id)
	{
		$data = array();
		$data		=	$this->session->flashdata("pform");
		$this->load->view('blocks/header');
		$data['editpage'] = $this->Page_model->edit_page($id); 
		$this->load->view('page/edit-page',$data);
		$this->load->view('blocks/footer');
		
	}  
	public function doUpdatePage($id) 
	{

        $data=array();
        $config=array(
						array(
                                'field' => 'title',
                                'label' => 'Title',
                                'rules' => 'trim|required'
                              ),
						array(
                                'field' => 'slug',
                                'label' => 'Slug',
                                'rules' => 'trim|required'
                              ),
						array(
                                'field' => 'description',
                                'label' => 'Description',
                                'rules' => 'trim|required'
                              ),
						
					);
          $this->form_validation->set_rules($config);              
          $fields   = array("title","slug","description");
						
						
        foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
		if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata( "errors", validation_errors());
            $this->session->set_flashdata('pform',$data);
            redirect('EditPage/'.$id);
        }
		else
		{	
			$datanew['page_title'] = $data['title'];
			$datanew['page_slug']  = $data['slug'];
			$datanew['page_description'] = $data['description'];
			$result=$this->Page_model->DoUpdatepage($datanew,$id);
	  
			if($result > 0)
			{
				$this->session->set_flashdata('success',"Page edit Successfully");
				redirect('Page');
			}
			else
			{   

			  $this->session->set_flashdata('errors',"Page Not Edit Successfully");
			  redirect('Page');
			}
		}
    }
	
}
