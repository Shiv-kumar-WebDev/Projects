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
$route['default_controller'] = 'Landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


    //Landing Page
$route['Signin']          	   = 'landing/signin';
$route['Signup']          	   = 'landing/signup';
$route['Verification']    	   = 'landing/verification';
$route['Update']    	   = 'landing/changepass';
$route['updatepass']    	   = 'landing/updatepass';
$route['Logout']          	   = 'landing/logout';
$route['Home']                 = 'landing/index';
$route['doregister']           = 'landing/doregister';
$route['forgot_password']      = 'landing/forgot_password';
$route['userlogin_compare']    = 'landing/userlogin_compare';



$route['Admin']          	   = 'admin/admin/login';
$route['login_compare']          	   = 'admin/admin/login_compare';
$route['Admin/Dashboard']          	   = 'admin/admin/dashboard';
$route['log_out']          	   = 'admin/admin/log_out';
$route['Admin/Change_password']          	   = 'admin/admin/change_password';
$route['Update_password']          	   = 'admin/admin/update_password';
$route['Admin/CoDetails']          	   = 'admin/admin/codetails';
$route['Admin/StDetails']          	   = 'admin/admin/stdetails';
$route['Admin/Subjects']          	   = 'admin/admin/subjects';
$route['Admin/Addsub']          	   = 'admin/admin/addsub';
$route['Admin/ForgotPassword']          	   = 'admin/admin/forgot_pass';
$route['update_pass']          	   = 'admin/admin/update_pass';





$route['CoProfile']      = 'coach/coach/profile';
$route['co_doupdate']    = 'coach/coach/co_doupdate';
$route['Request']        = 'coach/coach/request';
$route['addtime']        = 'coach/coach/addtime';
// $route['stview']        = 'coach/coach/stview';
// $route['CoLogin']          	   = 'coach/coach/coach_login';
// $route['Cologin_compare']          	   = 'coach/coach/coach_login_compare';
// $route['CoDashboard']          	   = 'coach/coach/coach_dashboard';
// $route['Colog_out']          	   = 'coach/coach/coach_log_out';
// $route['CoChange_password']          	   = 'coach/coach/coach_change_password';
// $route['CoUpdate_password']          	   = 'coach_/coach_/coach_update_password';
// $route['CoDetails']          	   = 'coach/coach/coach_showdata';
// $route['CoForgotPassword']          	   = 'coach/coach/coach_forgot_pass';
// $route['Coupdate_pass']          	   = 'coach/coach/coach_update_pass';
// $route['CoRegister']          	   = 'coach/coach/register';



$route['StProfile']          	   = 'student/student/profile';
$route['Codetails']          	   = 'student/student/codetails';
$route['st_doupdate']          	   = 'student/student/st_doupdate';
$route['Cocomments']          	   = 'student/student/comments';