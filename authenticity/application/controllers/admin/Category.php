<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {

        parent::__construct();



        $this->load->library("form_validation");

        $this->load->model("admin/Category_model");



        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        header("Cache-Control: no-store,no-cache, must-revalidate");



        if ($this->session->userdata("admin_id") == '')
            redirect("Login");
    }

    public function categoryView() {

        $data = array();

        $data['category'] = $this->Category_model->getcategory();

        $this->load->view('blocks/header');

        $this->load->view('category/category-view', $data);

        $this->load->view('blocks/footer');
    }

    public function AddCategory() {

        $data = $this->session->flashdata("cform");
        $info['maincategory'] = $this->Category_model->getmaincategroy();
// print_r($info);die();
        $this->load->view('blocks/header');

        $this->load->view('category/add-category', $info);

        $this->load->view('blocks/footer');
    }

    public function doAddCategory() {



        $data = array();

        $config = array(
            array(
                'field' => 'maincat_id',
                'label' => 'Main Category Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'name_en',
                'label' => 'Category Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("name_en","name_ar","maincat_id");



        $cat_image = ($_FILES['catimage']['name'] != '') ? $_FILES['catimage']['name'] : '';
// print_r($this->input->post('maincat_id'));die();


        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }
// print_r($data);die();
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('AddCategory');
        } else {



            $this->file_uploader->set_default_upload_path("./assets/images/category/");

            $this->file_uploader->set_no_of_files_on_folder(25);

            $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

            $cat_image = $this->file_uploader->upload_image('catimage');



            $datanew['name_en'] = $data['name_en'];
            $datanew['maincategory_id'] = $data['maincat_id'];
			 if ($cat_image['status'] == 200) {

                $string = $cat_image['data'];

                $cat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                $datanew['image'] = $cat_image;
                // print_r($datanew);die();
            } /*else {

                $this->session->set_flashdata("cform", $data);

                $this->session->set_flashdata("errors", $cat_image['status']);

                redirect("AddCategory");
            }*/

            $result = $this->Category_model->DoAddcategory($datanew);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Category Add Successfully");

                redirect('Category');
            } else {



                $this->session->set_flashdata('errors', "Category Not Add Successfully");

                redirect('Category');
            }
        }
    }

    public function EditCategory($id) {

        $data = array();

        $data = $this->session->flashdata("cform");

        $this->load->view('blocks/header');

        $data['editcategory'] = $this->Category_model->edit_category($id);
        // print_r($data);die();
        $data['maincategory'] = $this->Category_model->getmaincategroy();

        $this->load->view('category/edit-category', $data);

        $this->load->view('blocks/footer');
    }

    public function doUpdateCategory($id) {



        $data = array();

        $config = array(
            array(
                'field' => 'maincat_id',
                'label' => 'Main Category Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'name_en',
                'label' => 'Category Name(En)',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        $fields = array("name_en","name_ar","maincat_id");



        $cat_image = ($_FILES['catimage']['name'] != '') ? $_FILES['catimage']['name'] : '';



        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata("errors", validation_errors());

            $this->session->set_flashdata('cform', $data);

            redirect('EditCategory/' . $id);
        } else {

            if ($cat_image != '') {

                $this->file_uploader->set_default_upload_path("./assets/images/category/");

                $this->file_uploader->set_no_of_files_on_folder(25);

                $this->file_uploader->set_allowed_types("jpg|jpeg|png|");

                $cat_image = $this->file_uploader->upload_image('catimage');



                if ($cat_image['status'] == 200) {

                    $string = $cat_image['data'];

                    $cat_image = preg_replace("@[^A-Za-z0-9\-_.\/]+@i", "_", $string);

                    $datanew['image'] = $cat_image;

                    $userdata = $this->Category_model->getImageidCategory($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/images/category/' . $userdata[0]['image'];

                        unlink($path);
                    }
                } /*else {

                    $this->session->set_flashdata("cform", $data);

                    $this->session->set_flashdata("errors", $cat_image['status']);

                    redirect('EditCategory/' . $id);
                }*/
            }

            $datanew['name_en'] = $data['name_en'];
            $datanew['maincategory_id'] = $data['maincat_id'];
			$result = $this->Category_model->DoUpdatecategory($datanew, $id);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Category edit Successfully");

                redirect('Category');
            } else {



                $this->session->set_flashdata('errors', "Category Not Edit Successfully");

                redirect('Category');
            }
        }
    }

  public function logoView() {

        $data = array();

        $data['logo'] = $this->Category_model->getlogo();

        $this->load->view('blocks/header');

        $this->load->view('logo/slider-view', $data);

        $this->load->view('blocks/footer');
    }

	  public function Addlogo() {

        $data = $this->session->flashdata("sform");
       $data['category'] = $this->Category_model->getcategory();
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
            $result = $this->Category_model->DoAddlogo($datanew);



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

        $data['edit_logo'] = $this->Category_model->edit_logo($id);

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
				  
					
				  
				  

                    $userdata = $this->Category_model->getImageilogo($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/logo/' . $userdata[0]['image'];

                        unlink($path);
                    }

                    $result = $this->Category_model->DoUpdatelogo($datanew, $id);
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
				    $result = $this->Category_model->DoUpdatelogo($datanew, $id);



            if ($result > 0) {

                $this->session->set_flashdata('success', "Logo edit Successfully");

                redirect('Logo');
            } else {



                $this->session->set_flashdata('errors', "Logo Not Edit Successfully");

                redirect('Logo');
            }
        }
    }
	

    public function CategoryStatus($id) 
    {

      // $id = $this->uri->segment(2);

        $getstatus = $this->Category_model->DogetStatus($id);

        $status = $getstatus['status'];



        if ($status == 0) {

        $datanew['status'] = '1';

        $result = $this->Category_model->DoEditStatus($datanew, $id);

        redirect('Category');

        } else {

        $datanew['status'] = '0';

        $result = $this->Category_model->DoEditStatus($datanew, $id);

        redirect('Category');

        }
    } 
      
    

    public function GridStatus($id) 
    {

      // $id = $this->uri->segment(2);

        $getstatus = $this->Category_model->DogetStatus($id);

        $status = $getstatus['cat_grid'];



        if ($status == 0) {

        $datanew['cat_grid'] = '1';

        $result = $this->Category_model->DoEditStatus($datanew, $id);

        redirect('Category');

        } else {

        $datanew['cat_grid'] = '0';

        $result = $this->Category_model->DoEditStatus($datanew, $id);

        redirect('Category');

        }
    } 
      
      
    public function deleteStatus($id) 
    {
        if ($this->Category_model->DeleteStatus($id)) {
            $this->session->set_flashdata('success', "Category Delete Successfully");
            redirect('Category');
            } else {
            $this->session->set_flashdata('danger', "Category Not Delete Successfully");
            redirect('Category');
            }
    } 
      
      

    //Slider Code start

    public function sliderView() {

        $data = array();

        $data['slider'] = $this->Category_model->getslider();

        $this->load->view('blocks/header');

        $this->load->view('slider/slider-view', $data);

        $this->load->view('blocks/footer');
    }

    public function AddSlider() {

        $data = $this->session->flashdata("sform");
        $data['maincategory'] = $this->Category_model->getmaincategroy();
        $this->load->view('blocks/header');

        $this->load->view('slider/add-slider',$data);

        $this->load->view('blocks/footer');
    }

    public function doAddSlider() {

   $data = array();

        $config = array(
            array(
                'field' => 'maincatid',
                'label' => 'Main Category',
                'rules' => 'trim'
            ),
            array(
                'field' => 'catid',
                'label' => 'Category',
                'rules' => 'trim'
            ),
            array(
                'field' => 'subcatid',
                'label' => 'Sub Category',
                'rules' => 'trim'
            ),
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
                $datanew['maincat_id'] = $this->input->post('maincatid');
				$datanew['cat_id'] = $this->input->post('catid');
				$datanew['sub_cat_id'] = $this->input->post('subcatid');
            } else {

                $this->session->set_flashdata("sform", $data);

                $this->session->set_flashdata("errors", $slider_image['status']);

                redirect("AddSlider");
            }
            //echo "<pre>";
			//print_r($datanew);die;
            $result = $this->Category_model->DoAddslider($datanew);



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

        $data['editslider'] = $this->Category_model->edit_slider($id);

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

                    $userdata = $this->Category_model->getImageidSlider($id);

                    if ($userdata[0]['image']) {

                        $path = FCPATH . 'assets/images/slider/' . $userdata[0]['image'];

                        unlink($path);
                    }

                    $result = $this->Category_model->DoUpdateslider($datanew, $id);
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
        $userdata = $this->Category_model->getImageidsliderdata($id);
        if(!empty($userdata['image'])) 
        {
            $path = FCPATH .'assets/images/slider/'.$userdata['image'];
            unlink($path);
        }
        $result = $this->Category_model->Dodeleteslider($id);
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