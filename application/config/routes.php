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
$route['send_sms'] = 'pages/send_sms';
$route['remove_expired'] = 'pages/remove_expired';
$route['print_report'] = 'pages/print_report';
$route['manage_expired'] = 'pages/manage_expired';
$route['manage_report'] = 'pages/manage_report';
$route['submit_feeding'] = 'pages/submit_feeding';
$route['manage_feeding'] = 'pages/manage_feeding';
$route['post_receiving'] = 'pages/post_receiving';
$route['purchase_receiving/(:any)'] = 'pages/purchase_receiving/$1';
$route['remove_po_item/(:any)'] = 'pages/remove_po_item/$1';
$route['add_to_cart'] = 'pages/add_to_cart';
$route['purchase_order_new'] = 'pages/purchase_order_new';
$route['manage_purchase_order'] = 'pages/manage_purchase_order';
$route['purchase_order_manage/(:any)'] = 'pages/purchase_order_manage/$1';
$route['purchase_order'] = 'pages/purchase_order';
$route['delete_feeds/(:any)'] = 'pages/delete_feeds/$1';
$route['save_feeds'] = 'pages/save_feeds';
$route['manage_feeds'] = 'pages/manage_feeds';
$route['delete_fish/(:any)'] = 'pages/delete_fish/$1';
$route['save_fish'] = 'pages/save_fish';
$route['manage_fish'] = 'pages/manage_fish';
$route['delete_user/(:any)'] = 'pages/delete_user/$1';
$route['save_user'] = 'pages/save_user';
$route['manage_user'] = 'pages/manage_user';
$route['logout'] = 'pages/logout';
$route['main'] = 'pages/main';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
