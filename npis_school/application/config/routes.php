<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['index'] 	       	       = 'website/School/index';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


//admin login
$route['Login'] 	       	       = 'admin/Login/index';
$route['Login/doLogin'] 	       	       = 'admin/Login/doLogin';
$route['Login/logout'] 	       	       = 'admin/Login/logout';

//dashboard and change password
$route['Dashboard'] 	     = 'admin/Dashboard/index';
$route['Change-Password'] 	 = 'admin/Dashboard/ChangePassword';
$route['profile'] 	         = 'admin/Dashboard/profile';
$route['Dashboard/doChangepassword'] 	 = 'admin/Dashboard/doChangepassword';


//Slider
$route['Slider']          	  	= 'admin/Slider/index';
$route['AddSlider']             = 'admin/Slider/addSlider';
$route['EditSlider/(:num)']     = 'admin/Category/EditSlider/$1';
$route['DeleteSlider/(:num)']   = 'admin/Category/DeleteSlider/$1';

$route['Logo']          	  	= 'admin/Category/logoView';
$route['Addlogo']             = 'admin/Category/Addlogo';
$route['Editlogo/(:num)']     = 'admin/Category/Editlogo/$1';

//News_events
$route['News_events']          	  	= 'admin/News_events/index';
$route['AddNews_events']             = 'admin/News_events/addNews_events';
 

//Gallery
$route['Gallery']          	  	= 'admin/Gallery/index';
$route['AddGallery']             = 'admin/Gallery/addGallery';
 


//Toppers
$route['Toppers']          	  	= 'admin/Toppers/index';
$route['AddToppers']             = 'admin/Toppers/addToppers';
 


//Testimonial
$route['Testimonial']          	  	= 'admin/Testimonial/index';
$route['AddTestimonial']             = 'admin/Testimonial/addTestimonial';
 

//Video
$route['Video']          	  	= 'admin/Video/index';
$route['AddVideo']             = 'admin/Video/addVideo';
 


//Videos
$route['Videos']          	  	= 'admin/Video/allvideos';
$route['AddVideos']             = 'admin/Video/addvideos';
$route['DeleteVideo/(:num)']   = 'admin/Video/DeleteVideos/$1';


//settings
$route['settings'] 	           = 'admin/Settings/Settings';
