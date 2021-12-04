<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_events extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
		$this->load->model("admin/News_events_model");
		$this->load->library("form_validation");
        
    }


	public function index()
	{	
		$data['news_events']=$this->News_events_model ->getnewsAllData();
		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/news_events',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function addNews_events(){

        $this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/addNews_events');
		$this->load->view('admin/blocks/footer');
		
	}

	public function insert(){


		$config = array(
            array(
                'field' => 'title',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('AddNews_events');
        }else{

			$data = array(
				    'news_events_title' => $this->input->post('title'),
				);			
			$result=$this->News_events_model->addnews($data);
			$this->session->set_flashdata('success', "News events Add Successfully");
	  		redirect('admin/News_events');
  		}
	}
	

	
	 

	public function editNews_events(){

		$id=$this->uri->segment('4');
		
		
		$data['news_events']=$this->News_events_model->getNewsData($id);

		$this->load->view('admin/blocks/header');
		$this->load->view('admin/blocks/sidebar');
		$this->load->view('admin/editNews_events',$data);
		$this->load->view('admin/blocks/footer');
	}
	
	public function update_news_events(){
		$id=$this->uri->segment('4');
		$data['news_events']=$this->News_events_model->update_news_data($id);
		$this->session->set_flashdata('success', "News events Update Successfully");
		redirect('admin/News_events');
	}
	public function deleteNews_events(){
		$id=$this->uri->segment('4');
		
		$data['news_events']=$this->News_events_model->delete_news($id);
		$this->session->set_flashdata('success', "News events Delete Successfully");
		redirect('admin/News_events');
		
	}

	public function inactive(){
		$id=$this->uri->segment('4');
		
		$data['news_events']=$this->News_events_model->update_status_inactive_news($id);
		redirect('admin/News_events');
	}
	public function active(){
		$id=$this->uri->segment('4');
		
		$data['news_events']=$this->News_events_model->update_status_active_news($id);
		redirect('admin/News_events');
	}
	
	
}
