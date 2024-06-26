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
|	https://codeigniter.com/userguide3/general/routing.html
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
// $route['default_controller'] = 'Post_Controller/loginforms';
$route['default_controller'] = 'Post_Controller/loginforms';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Post
$route['accountsettings'] = 'Post_Controller/accountlist';
$route['dashboard'] = 'Post_Controller/dashboardforms';
$route['add-salesrep'] = 'Post_Controller/new_salesrep';
$route['view-payroll'] = 'Post_Controller/create_payrollforms';

//Function
$route['save-newuser'] = 'Function_Controller/save_user';
$route['authenticate-account'] = 'Function_Controller/function_authenticate';
$route['update-account'] = 'Function_Controller/function_updateuseraccount';
$route['deleteuseraccount/(:any)'] = 'Function_Controller/function_deleteduseraccount/$1';
$route['submit-salesrep'] = 'Function_Controller/function_newsalesrep';
$route['update-salesrep'] = 'Function_Controller/function_updatesalesrep';
$route['deletesalesrepuser/(:any)'] = 'Function_Controller/function_deletedatesalesrep/$1';
$route['logout-account'] = 'Function_Controller/logout';

//AJAX Function
$route['validate-fullname'] = 'Function_Controller/check_salesrep_exists';
$route['get-bonusbyrepname'] = 'Function_Controller/fetch_bonus';

//AJAX Post
$route['show-salesrepdata'] = 'Post_Controller/fetch_data_salesrep';
$route['show-useraccountdata'] = 'Post_Controller/fetch_data_useraccount';

//FPDF
$route['print-payrollSystem'] = 'PDF_Generated/PDFCreatepayroll_Controller/Payroll_pdf';








