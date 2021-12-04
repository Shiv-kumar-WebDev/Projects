<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

		$this->load->library("form_validation");
        $this->load->model("admin/User_model");

		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store,no-cache, must-revalidate");

        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function reviews() 
    {
        $data = array();
        $data['reviews'] = $this->User_model->getreview();
        $this->load->view('blocks/header');
        $this->load->view('user/reviews',$data);
        $this->load->view('blocks/footer');
    }
    public function reviewStatus() {
        $id = $this->uri->segment(2);
        $getstatus = $this->User_model->DogetreviewStatus($id);
        $status = $getstatus['review_status'];
        // print_r($status);die();
        if ($status == 0) {
            $datanew['review_status'] = '1';
            $result = $this->User_model->DoEditreviewStatus($datanew, $id);
            redirect('Reviews');
        } else {
            $datanew['review_status'] = '0';
            $result = $this->User_model->DoEditreviewStatus($datanew, $id);
            redirect('Reviews');
        }

    }
    public function deletereview($id) {
        if ($this->User_model->deletereviewStatus($id)) {
            $this->session->set_flashdata('success', "Review Deleted Successfully");
            redirect('Reviews');
            } else {
            $this->session->set_flashdata('danger', "Review Not Deleted");
            redirect('Reviews');
        }

    }
    public function UserView() 
	{
		$data = array();
        $data['user'] = $this->User_model->getuser();
        $this->load->view('blocks/header');
        $this->load->view('user/user-view',$data);
        $this->load->view('blocks/footer');
    }
	public function UserStatus() {
		$id = $this->uri->segment(2);
        $getstatus = $this->User_model->DogetStatus($id);
		$status = $getstatus['user_status'];
        
        if ($status == 0) {
            $datanew['user_status'] = '1';
            $result = $this->User_model->DoEditStatus($datanew, $id);
			redirect('User');
        } else {
            $datanew['user_status'] = '0';
            $result = $this->User_model->DoEditStatus($datanew, $id);
            redirect('User');
        }

    }
    
    ##### DOWLOAD CSV ##########

    public function download_csv(){

        $users = $this->User_model->getuser();
        $dataSource = "\"Sr.No.\",\"User name\",\"User Email \",\"User phone \",\"Total Orders\",\"created\"\n";
        $sno = 1;
        foreach ($users as $row) {
            $item = $this->User_model->getorders($row['user_id']);
            $total_purchase = 0;
            $ttlorder = count($item);
            foreach ($item as $value) {
                $total_purchase += $value['total_price'];
            }
            $user_name = $row['username'];
            $email = $row['email'];
            $user_phone = $row['user_phone'];
            $user_create_date = $row['user_create_date'];
            $dataSource .= "\"$sno\",\"$user_name\",\"$email\",\"$user_phone\",\"$ttlorder\",\"$total_purchase\",".
            "\"$user_create_date\"\n";
            $sno++;
        }
        $myfilename = "users" . date('m-d-Y_hia') . '.csv';
        header('Content-type: application/x-download');
        header('Content-Disposition: attachment; filename="' . $myfilename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($dataSource));
        set_time_limit(0);
        echo $dataSource;
        exit;         
    } 
    

    public function deleteStatus($id) {
		// $id = $this->uri->segment(3);
        // $getstatus = $this->User_model->DogetStatus($id);
        // $status = $getstatus['user_status'];
        
        // if ($status == 0) {
        //     $datanew['user_status'] = '1';
        //     $result = $this->User_model->DoEditStatus($datanew, $id);
        //     redirect('User');
        // } else {
        //     $datanew['user_status'] = '0';
        //     $result = $this->User_model->DoEditStatus($datanew, $id);
        //     redirect('User');
        // }
        if ($this->User_model->deleteStatus($id)) {
            $this->session->set_flashdata('success', "Category User Successfully");
            redirect('User');
            } else {
            $this->session->set_flashdata('danger', "Category Not User Successfully");
            redirect('User');
            }

    }
	
}
