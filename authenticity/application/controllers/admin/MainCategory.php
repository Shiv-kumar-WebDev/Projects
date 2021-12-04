<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory extends CI_Controller {

    public function __construct() {

        parent::__construct();



        $this->load->library("form_validation");

        $this->load->model("admin/Maincategory_model");



        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        header("Cache-Control: no-store,no-cache, must-revalidate");



        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function maincategoryView() {
        $data = array();

        $data['maincategory'] = $this->Maincategory_model->getmaincategory();

        $this->load->view('blocks/header');

        $this->load->view('maincategory/maincategory-view', $data);

        $this->load->view('blocks/footer');
    }

    public function addmaincategory() {

        $data = $this->session->flashdata("cform");

        $this->load->view('blocks/header');

        $this->load->view('maincategory/add-maincategory');

        $this->load->view('blocks/footer');
    }

    public function doAddmaincategory() {


        $data = array();

        $config = array(
            array(
                'field' => 'maincategory_name_en',
                'label' => 'maincategory Name(En)',
                'rules' => 'trim|required'
            )
        );

        // print_r($config);die();
        $this->form_validation->set_rules($config);

        $fields = array("maincategory_name_en","name_ar");



        $mainmaincat_image = ($_FILES['maincatimage']['name'] != '') ? $_FILES['maincatimage']['name'] : '';


        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('Addmaincategory');
        } else {



            $this->file_uploader->set_default_upload_path("./assets/images/maincategory/");

            $this->file_uploader->set_no_of_files_on_folder(25);

            $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

            $mainmaincat_image = $this->file_uploader->upload_image('maincatimage');


            $datanew['maincategory_name_en'] = $data['maincategory_name_en'];
			 if ($mainmaincat_image['status'] == 200) {

                $string = $mainmaincat_image['data'];

                $mainmaincat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                $datanew['maincat_image'] = $mainmaincat_image;
// print_r($datanew);die();
            } /*else {

                $this->session->set_flashdata("cform", $data);

                $this->session->set_flashdata("errors", $mainmaincat_image['status']);

                redirect("Addmaincategory");
            }*/

            $result = $this->Maincategory_model->DoAddmaincategory($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "maincategory Add Successfully");

                redirect('MainCategory');
            } else {



                $this->session->set_flashdata('errors', "maincategory Not Add Successfully");

                redirect('MainCategory');
            }
        }
    }

    public function Editmaincategory($id) {

        $data = array();

        $data = $this->session->flashdata("cform");

        $this->load->view('blocks/header');

        $data['editmaincategory'] = $this->Maincategory_model->edit_maincategory($id);
// print_r($data);die();
        $this->load->view('maincategory/edit-maincategory', $data);

        $this->load->view('blocks/footer');
    }

    public function doUpdatemaincategory($id) {



        $data = array();

        $config = array(
            array(
                'field' => 'maincategory_name_en',
                'label' => 'maincategory Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("maincategory_name_en","name_ar");



        $mainmaincat_image = ($_FILES['maincatimage']['name'] != '') ? $_FILES['maincatimage']['name'] : '';



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('Editmaincategory/' . $id);
        } else {

            if ($mainmaincat_image != '') {

                $this->file_uploader->set_default_upload_path("./assets/images/maincategory/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $mainmaincat_image = $this->file_uploader->upload_image('maincatimage');



                if ($mainmaincat_image['status'] == 200) {

                    $string = $mainmaincat_image['data'];

                    $mainmaincat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['maincat_image'] = $mainmaincat_image;

                    $userdata = $this->Maincategory_model->getImageidmaincategory($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/images/maincategory/' . $userdata[0]['image'];

                        unlink($path);
                    }
                } /*else {

                    $this->session->set_flashdata("cform", $data);

                    $this->session->set_flashdata("errors", $maincat_image['status']);

                    redirect('Editmaincategory/' . $id);
                }*/
            }
            //print_r($data);
            $datanew['maincategory_name_en'] = $data['maincategory_name_en'];
            //print_r($datanew); die;
			$result = $this->Maincategory_model->DoUpdatemaincategory($datanew, $id);

            if ($result > 0) {

                $this->session->set_flashdata('success', "maincategory edit Successfully");

                redirect('MainCategory');
            } else {



                $this->session->set_flashdata('errors', "maincategory Not Edit Successfully");

                redirect('MainCategory');
            }
        }
    }

  public function logoView() {

        $data = array();

        $data['logo'] = $this->Maincategory_model->getlogo();

        $this->load->view('blocks/header');

        $this->load->view('logo/slider-view', $data);

        $this->load->view('blocks/footer');
    }

	  public function Addlogo() {

        $data = $this->session->flashdata("sform");
       $data['maincategory'] = $this->Maincategory_model->getmaincategory();
        $this->load->view('blocks/header');

        $this->load->view('logo/add-slider',$data);

        $this->load->view('blocks/footer');
    }
	
	
		public function doAddlogo() {


        $data = array();

        $config = array(
            array(
                'field' => 'sliderimage',
                'label' => 'Image',
                'rules' => 'trim'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("sliderimage");



        $slider_image = ($_FILES['sliderimage']['name'] != '') ? $_FILES['sliderimage']['name'] : '';

       //  echo $slider_image;
		// echo "<br>";
        // echo "<pre>";
		// print_r($_POST);die;
        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('sform', $data);

            redirect('Addlogo');
        } else {



            $this->file_uploader->set_default_upload_path("./assets/logo/");

            $this->file_uploader->set_no_of_files_on_folder(25);

            $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

            $slider_image = $this->file_uploader->upload_image('sliderimage');



            if ($slider_image['status'] == 200) {

                $string = $slider_image['data'];
                //echo $string;
                $slider_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);
				//echo "<br>";
               //echo $string;die;
                $datanew['logo'] = $slider_image;
				$datanew['site'] = $this->input->post('sitename');
				 $datanew['status'] = 1;
				//$datanew['sub_cat_id'] = $this->input->post('subcatname');
            } else {

                $this->session->set_flashdata("sform", $data);

                $this->session->set_flashdata("errors", $slider_image['status']);

                redirect("AddSlider");
            }
           // echo "<pre>";
			//print_r($datanew);die;
            $result = $this->Maincategory_model->DoAddlogo($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Logo Add Successfully");

                redirect('Logo');
            } else {



                $this->session->set_flashdata('errors', "Logo Not Add Successfully");

                redirect('Logo');
            }
        }
    }
	
	
	 public function Editlogo($id) {

        $data = array();

        $data = $this->session->flashdata("sform");

        $this->load->view('blocks/header');

        $data['edit_logo'] = $this->Maincategory_model->edit_logo($id);

        $this->load->view('logo/edit-slider', $data);

        $this->load->view('blocks/footer');
    }
	
 public function doUpdatelogo($id) {



        $data = array();

        $config = array(
            array(
                'field' => 'sliderimage',
                'label' => 'Image',
                'rules' => 'trim'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("sliderimage");



        $slider_image = ($_FILES['sliderimage']['name'] != '') ? $_FILES['sliderimage']['name'] : '';



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('sform', $data);

            redirect('Editlogo/' . $id);
        } else {

            if ($slider_image != '') {

                $this->file_uploader->set_default_upload_path("./assets/logo/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $slider_image = $this->file_uploader->upload_image('sliderimage');



                if ($slider_image['status'] == 200) {

                    $string = $slider_image['data'];

                    $slider_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);
                 
                   $datanew['logo'] = $slider_image;
				   $datanew['site'] = $this->input->post('sitename');
				   $datanew['status'] = 1;
				  
					
				  
				  

                    $userdata = $this->Maincategory_model->getImageilogo($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/logo/' . $userdata[0]['image'];

                        unlink($path);
                    }

                    $result = $this->Maincategory_model->DoUpdatelogo($datanew, $id);
                } else {

                    $this->session->set_flashdata("sform", $data);

                    $this->session->set_flashdata("errors", $slider_image['status']);

                    redirect('Editlogo/' . $id);
                }
				//  $datanew['logo'] = $slider_image;
				  
            }



                   $datanew['site'] = $this->input->post('sitename');
				   $datanew['status'] = 1;
				  // print_r($datanew);die;
				    $result = $this->Maincategory_model->DoUpdatelogo($datanew, $id);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Logo edit Successfully");

                redirect('Logo');
            } else {



                $this->session->set_flashdata('errors', "Logo Not Edit Successfully");

                redirect('Logo');
            }
        }
    }
	

    public function maincategoryStatus($id) 
    {

      // $id = $this->uri->segment(2);

        $getstatus = $this->Maincategory_model->DogetStatus($id);

        $status = $getstatus['maincatstatus'];
// print_r($status);die();


        if ($status == 0) {

        $datanew['maincatstatus'] = '1';

        $result = $this->Maincategory_model->DoEditStatus($datanew, $id);

        redirect('MainCategory');

        } else {

        $datanew['maincatstatus'] = '0';

        $result = $this->Maincategory_model->DoEditStatus($datanew, $id);

        redirect('MainCategory');

        }
    } 
    public function spotlightStatus($id) 
    {

      // $id = $this->uri->segment(2);

        $getstatus = $this->Maincategory_model->DogetStatus($id);

        $status = $getstatus['spotlight'];
// print_r($status);die();


        if ($status == 0) {

        $datanew['spotlight'] = '1';

        $result = $this->Maincategory_model->DoEditStatus($datanew, $id);

        redirect('MainCategory');

        } else {

        $datanew['spotlight'] = '0';

        $result = $this->Maincategory_model->DoEditStatus($datanew, $id);

        redirect('MainCategory');

        }
    } 
      
      
    public function deleteStatus($id) 
    {
        if ($this->Maincategory_model->DeleteStatus($id)) {
            $this->session->set_flashdata('success', "maincategory Delete Successfully");
            redirect('MainCategory');
            } else {
            $this->session->set_flashdata('danger', "maincategory Not Delete Successfully");
            redirect('MainCategory');
            }
    } 
      
      

    //Slider Code start

    public function sliderView() {

        $data = array();

        $data['slider'] = $this->Maincategory_model->getslider();

        $this->load->view('blocks/header');

        $this->load->view('slider/slider-view', $data);

        $this->load->view('blocks/footer');
    }

    public function AddSlider() {

        $data = $this->session->flashdata("sform");
        $data['maincategory'] = $this->Maincategory_model->getmaincategory();
        $this->load->view('blocks/header');

        $this->load->view('slider/add-slider',$data);

        $this->load->view('blocks/footer');
    }

    public function doAddSlider() {

   $data = array();

        $config = array(
            array(
                'field' => 'sliderimage',
                'label' => 'Image',
                'rules' => 'trim'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("sliderimage");



        $slider_image = ($_FILES['sliderimage']['name'] != '') ? $_FILES['sliderimage']['name'] : '';

       //  echo $slider_image;
		// echo "<br>";
        // echo "<pre>";
		// print_r($_POST);die;
        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('sform', $data);

            redirect('AddSlider');
        } else {



            $this->file_uploader->set_default_upload_path("./assets/images/slider/");

            $this->file_uploader->set_no_of_files_on_folder(25);

            $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

            $slider_image = $this->file_uploader->upload_image('sliderimage');



            if ($slider_image['status'] == 200) {

                $string = $slider_image['data'];
                //echo $string;
                $slider_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);
				//echo "<br>";
               //echo $string;die;
                $datanew['image'] = $slider_image;
				$datanew['cat_id'] = $this->input->post('catname');
				$datanew['sub_cat_id'] = $this->input->post('subcatname');
            } else {

                $this->session->set_flashdata("sform", $data);

                $this->session->set_flashdata("errors", $slider_image['status']);

                redirect("AddSlider");
            }
            //echo "<pre>";
			//print_r($datanew);die;
            $result = $this->Maincategory_model->DoAddslider($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Slider Add Successfully");

                redirect('Slider');
            } else {



                $this->session->set_flashdata('errors', "Slider Not Add Successfully");

                redirect('Slider');
            }
        }
    }

    public function Editslider($id) {

        $data = array();

        $data = $this->session->flashdata("sform");

        $this->load->view('blocks/header');

        $data['editslider'] = $this->Maincategory_model->edit_slider($id);

        $this->load->view('slider/edit-slider', $data);

        $this->load->view('blocks/footer');
    }

    public function doUpdateSlider($id) {



        $data = array();

        $config = array(
            array(
                'field' => 'sliderimage',
                'label' => 'Image',
                'rules' => 'trim'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("sliderimage");



        $slider_image = ($_FILES['sliderimage']['name'] != '') ? $_FILES['sliderimage']['name'] : '';



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('sform', $data);

            redirect('EditSlider/' . $id);
        } else {

            if ($slider_image != '') {

                $this->file_uploader->set_default_upload_path("./assets/images/slider/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $slider_image = $this->file_uploader->upload_image('sliderimage');



                if ($slider_image['status'] == 200) {

                    $string = $slider_image['data'];

                    $slider_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['image'] = $slider_image;

                    $userdata = $this->Maincategory_model->getImageidSlider($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/images/slider/' . $userdata[0]['image'];

                        unlink($path);
                    }

                    $result = $this->Maincategory_model->DoUpdateslider($datanew, $id);
                } else {

                    $this->session->set_flashdata("sform", $data);

                    $this->session->set_flashdata("errors", $slider_image['status']);

                    redirect('EditSlider/' . $id);
                }
            }







            if ($result > 0) {

                $this->session->set_flashdata('success', "Slider edit Successfully");

                redirect('Slider');
            } else {



                $this->session->set_flashdata('errors', "Slider Not Edit Successfully");

                redirect('Slider');
            }
        }
    }

    public function DeleteSlider($id)
    {
        $userdata = $this->Maincategory_model->getImageidsliderdata($id);
        if(!empty($userdata['image'])) 
        {
            $path = FCPATH .'assets/images/slider/'.$userdata['image'];
            unlink($path);
        }
        $result = $this->Maincategory_model->Dodeleteslider($id);
        if ($result > 0) 
        {
            $this->session->set_flashdata('success', "Slider image deleted Successfully");
            redirect('Slider');
        } 
        else 
        {
            $this->session->set_flashdata('errors', "something went wrong please try again");
            redirect('Slider');
        }
     }   

}