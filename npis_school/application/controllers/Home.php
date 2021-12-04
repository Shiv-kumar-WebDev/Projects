<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Home_model");
        $this->load->model("admin/Slider_model");
        $this->load->model("admin/News_events_model");
        $this->load->model("admin/Topper_model");
        $this->load->model("admin/Gallery_model");
        $this->load->model("admin/Testimonial_model");
   }

    public function index() 
    {   
        $data['sliders']=$this->Slider_model ->getSliderAllData();
        $data['news']=$this->News_events_model ->getnewsAllData();
        $data['toppers']=$this->Topper_model ->getToppers10thData();
        $data['toppers_12']=$this->Topper_model ->getToppers12thData();
        $data['galleries']=$this->Home_model->getimg(1,6);
        $data['testimonials']=$this->Testimonial_model ->gettestimonialAllData();
        $this->load->view('website/blocks/header');
        $this->load->view('website/index',$data);
        $this->load->view('website/blocks/footer'); 
         
    }

    public function school_overview() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/school_overview');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function mission() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/mission');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function vision() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/vision');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function team() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/team');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function sitemap() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/sitemap');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function message() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/message');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function pmessage() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/pmessage');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function whynips() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/whynips');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function process_of_admission() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/process_of_admission');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function documents_list() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/documents_list');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function enguiry() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/enguiry');
        $this->load->view('website/blocks/footer');          
    }
    public function Gen_Enquiry() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/gen_enquiry');
        $this->load->view('website/blocks/footer');          
    }

    public function faq() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/faq');
        $this->load->view('website/blocks/footer'); 
         
    }
    
    public function curriculum() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/curriculum');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function faculty() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/faculty');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function exam_planner() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/exam_planner');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Assessment_Criteria() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Assessment_Criteria');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function results() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/results');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Workshops_Seminars() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Workshops_Seminars');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function club() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/club');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Co_Curricular_Activities() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Co_Curricular_Activities');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Houses() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Houses');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Experiential_Learning() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Experiential_Learning');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Excursion_Picnic() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Excursion_Picnic');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Sports() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Sports');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Editorial_Board() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Editorial_Board');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function event() 
    {   
        $data['images']=$this->Home_model->getimg(2);
        $data['videos']=$this->Home_model->getvideos(2);
        $data['breadcrumb'] = 'Events';
        $this->load->view('website/blocks/header');
        $this->load->view('website/gallery',$data);
        $this->load->view('website/blocks/footer'); 
         
    }

    public function location_googlemap() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/location_googlemap');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Transport() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Transport');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Health_Care() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Health_Care');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function infrastructure() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/infrastructure');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function uniform() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/uniform');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function contact() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/contact');
        $this->load->view('website/blocks/footer'); 
         
    }
    

    public function gallery() 
    {   
        $data['images']=$this->Home_model->getimg(1);
        $data['videos']=$this->Home_model->getvideos(1);
        $data['breadcrumb'] = 'Gallery';
        $this->load->view('website/blocks/header');
        $this->load->view('website/gallery',$data);
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Guidelines_Parents() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Guidelines_Parents');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function feedback() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/feedback');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function testimonials() 
    {   
        $data['testimonials']=$this->Testimonial_model ->gettestimonialAllData();
        $this->load->view('website/blocks/header');
        $this->load->view('website/testimonials',$data);
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Payments() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Payments');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function General_Information() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/General_Information');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Documents_Information() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Documents_Information');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Result_Academics() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Result_Academics');
        $this->load->view('website/blocks/footer'); 
         
    }

    public function Staff() 
    {   
        $this->load->view('website/blocks/header');
        $this->load->view('website/Staff');
        $this->load->view('website/blocks/footer'); 
         
    }
    
    public function send_contact_mail() 
    {   
        $pdata = $this->input->post();
        $name =$pdata['name'];
        $email =$pdata['email'];
        $subject1 =$pdata['subject'];
        $message =$pdata['message'];
        $from   = FROM_MAIL;   
        $to     = CONTACT_US_MAIL;
            $subject = "Contact Us Enquiry";
            $headers = ['From' => $from, 'Reply-To' => $to, 'Content-type' => 'text/html; charset=iso-8859-1'];
            $msg = "<html>
                        <head>
                            <title>HTML email</title>
                        </head>
                        <body>
                            <p>Hi  Admin, Someone wants to contact to you.</p>
                            <table>
                                <tr>
                                    <th>Subject</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                                <tr>
                                    <td>". $subject1 ."</td>
                                    <td>". $name ."</td>
                                    <td>". $email ."</td>
                                    <td>". $message ."</td>
                                </tr>
                            </table>
                        </body>
                    </html>";
        // send email
         $mail =  mail($to,$subject,$msg,$headers);
        if($mail){
            $this->session->set_flashdata( "success", 'Thank You!');
            redirect('home/contact');
        }else{
            $this->session->set_flashdata( "error", 'OOPS! Something went wrong.Please try again later');
            redirect('home/contact');
        }
    }

    public function send_enquiry_mail() 
    {   
        $pdata = $this->input->post();
        $cname =$pdata['cname'];
        $pname =$pdata['pname'];
        $email =$pdata['email'];
        $class =$pdata['class'];
        $mobile =$pdata['mobile'];
        $date =$pdata['date'];

        $from   = FROM_MAIL;   
        $to     = ENQUIRY_MAIL;
            $subject = "ADMISSION ENQUIRY FORM";
            $headers = ['From' => $from, 'Reply-To' => $to, 'Content-type' => 'text/html; charset=iso-8859-1'];
            $msg = "<html>
                        <head>
                            <title>HTML email</title>
                        </head>
                        <body>
                            <p>Hi  Admin, Someone wants to contact to you.</p>
                            <table>
                                <tr>
                                    <th>DATE</th>
                                    <th>CHILD NAME</th>
                                    <th>PARENT/GUARDIAN NAME</th>
                                    <th>Email</th>
                                    <th>MOBILE NUMBER</th>
                                    <th>CLASS APPLIED FOR</th>
                                    
                                </tr>
                                <tr>
                                    <td>". $date ."</td>
                                    <td>". $cname ."</td>
                                    <td>". $pname ."</td>
                                    <td>". $email ."</td>
                                    <td>". $mobile ."</td>
                                    <td>". $class ."</td>
                                </tr>
                            </table>
                        </body>
                    </html>";
        // send email
         $mail =  mail($to,$subject,$msg,$headers);
        if($mail){
            $this->session->set_flashdata( "success", 'Thank You!');
            redirect('home/enguiry');
        }else{
            $this->session->set_flashdata( "error", 'OOPS! Something went wrong.Please try again later');
            redirect('home/enguiry');
        }
    }

    public function send_gen_enquiry_mail() 
    {   
        $pdata  = $this->input->post();
        $cname  =$pdata['cname'];
        $pname  =$pdata['pname'];
        $query  =$pdata['query'];
        $class  =$pdata['class'];
        $mobile =$pdata['mobile'];
        $date   =$pdata['date'];

        $from   = FROM_MAIL;   
        $to     = ENQUIRY_MAIL;
        $subject = "GENERAL ENQUIRY FORM";
        $headers = ['From' => $from, 'Reply-To' => $to, 'Content-type' => 'text/html; charset=iso-8859-1'];
        $msg = "<html>
                    <head>
                        <title> GENERAL ENQUIRY</title>
                    </head>
                    <body>
                        <p>Hi  Admin, Here is a new Enquiry.</p>
                        <table>
                            <tr>
                                <th>DATE</th>
                                <th>STUDENT NAME</th>
                                <th>CLASS</th>
                                <th>PARENT/GUARDIAN NAME</th>
                                <th>MOBILE NUMBER</th>
                                <th>QUERY</th>
                                
                            </tr>
                            <tr>
                                <td>". $date ."</td>
                                <td>". $cname ."</td>
                                <td>". $class ."</td>
                                <td>". $pname ."</td>
                                <td>". $mobile ."</td>
                                <td>". $query ."</td>
                            </tr>
                        </table>
                    </body>
                </html>";
        // send email
         $mail =  mail($to,$subject,$msg,$headers);
        if($mail){
            $this->session->set_flashdata( "success", 'Thank You!');
            redirect('home/Gen_Enquiry');
        }else{
            $this->session->set_flashdata( "error", 'OOPS! Something went wrong.Please try again later');
            redirect('home/Gen_Enquiry');
        }
    }
}
