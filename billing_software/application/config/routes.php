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
$this->set_directory("admin");
$route['default_controller'] = 'Dashboard';
// $route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


//admin login
$route['Login'] 	       	       = 'Login/index';
$route['Login/doLogin'] 	       	       = 'Login/doLogin';
$route['Login/logout'] 	       	       = 'Login/logout';

//dashboard and change password
$route['Dashboard'] 	     = 'Dashboard/index';
$route['Change-Password'] 	 = 'Dashboard/ChangePassword';
$route['profile'] 	         = 'Dashboard/profile';
$route['Dashboard/doChangepassword'] 	 = 'Dashboard/doChangepassword';



//User
$route['User']          	  	= 'User/userView';
$route['Reviews']          	  	= 'User/reviews';
$route['reviewStatus/(:num)']     = 'User/reviewStatus/$1';
$route['UserStatus/(:num)']     = 'User/UserStatus/$1';

$route['landing/verify_database']          	  = 'landing/verify_database';


//Product
$route['Clients']          	  	 = 'Client/index';
$route['AddClient']             = 'Client/add_client';
$route['EditClient/(:num)']     = 'Client/edit_client/$1';
$route['ClientStatus/(:num)/(:num)']   = 'Client/status/$1/$2';
$route['ClientDelete/(:num)']     = 'Client/delete/$1';

//Vendor
$route['Vendor']          	  	 = 'Vendor/index';
$route['AddVendor']             = 'Vendor/add_vendor';

//Item
$route['Items']          	  	 = 'Items/index';
$route['AddItems']             = 'Items/add_Items';
$route['EditItem/(:num)']     = 'Items/edit_item/$1';
$route['ItemStatus/(:num)/(:num)']   = 'Items/status/$1/$2';
$route['ItemDelete/(:num)']     = 'Items/delete/$1';

//Invoice
$route['Invoices']          	  	 = 'Invoices/index';
$route['AddInvoices']             = 'Invoices/add_Invoice';

//Quote
$route['Quotes']          	  	 = 'Quotes/index';
$route['AddQuotes']             = 'Quotes/add_Quote';

//Delivery_note
$route['Delivery_notes']          	  	 = 'Delivery_notes/index';
$route['AddDelivery_notes']             = 'Delivery_notes/add_delivery_note';

//Credit_note
$route['Credit_notes']          	  	 = 'Credit_notes/index';
$route['AddCredit_notes']             = 'Credit_notes/add_credit_note';


//Debit_note
$route['Debit_notes']          	  	 = 'Debit_notes/index';
$route['AddDebit_notes']             = 'Debit_notes/add_debit_note';

//Purchase_order
$route['Purchase_orders']          	  	 = 'Purchase_orders/index';
$route['AddPurchase_orders']             = 'Purchase_orders/add_purchase_order';

//Bill
$route['Bills']          	  	 = 'Bills/index';
$route['AddBills']             = 'Bills/add_bill';


//Expense
$route['Expenses']          	  	 = 'Expenses/index';
$route['AddExpenses']             = 'Expenses/add_expense';


//Country
$route['viewCountry']          	  	 = 'Country/index';
$route['addCountry']             = 'Country/addCountry';

//State
$route['viewState']          	  	 = 'State/index';
$route['addState']             = 'State/addState';

//City
$route['viewCity']          	  	 = 'City/index';
$route['addCity']             = 'City/add_city';


//Order
//$route['Orderpdf']          = 'Order/Orderpdf';
$route['Order']          	  	= 'Order/orderView';
$route['OrderProduct/(:num)']   = 'Order/OrderProductView/$1';
$route['Orderpdf/(:num)']   = 'Order/Orderpdf/$1';
//settings
$route['settings'] 	           = 'Settings/Settings';

$route['GetStates'] 	           = 'Dashboard/getstates';
$route['GetCities'] 	           = 'Dashboard/getcities';