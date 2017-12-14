<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

/* Route user */
$route['dashboard/users'] = 'user';
$route['dashboard/user/(:any)'] = 'user/$1';
$route['dashboard/user/edit/(:any)'] = 'user/edit/$1';
$route['dashboard/user/update/(:any)'] = 'user/update/$1';
$route['dashboard/user/delete/(:any)'] = 'user/delete/$1';
$route['dashboard/my-profile'] = "user/my_profile";

/* Route vendor */
$route['dashboard/vendor'] = 'vendor';
$route['dashboard/vendor/(:any)'] = 'vendor/$1';
$route['dashboard/vendor/edit/(:any)'] = 'vendor/edit/$1';
$route['dashboard/vendor/update/(:any)'] = 'vendor/update/$1';
$route['dashboard/vendor/delete/(:any)'] = 'vendor/delete/$1';


/* Route barang */
$route['dashboard/barang'] = 'barang';
$route['dashboard/barang/(:any)'] = 'barang/$1';
$route['dashboard/barang/edit/(:any)'] = 'barang/edit/$1';
$route['dashboard/barang/update/(:any)'] = 'barang/update/$1';
$route['dashboard/barang/delete/(:any)'] = 'barang/delete/$1';
$route['dashboard/barang/get/(:any)'] = 'barang/get/$1';

/* Route approval */
$route['dashboard/approval'] = 'approval';
$route['dashboard/approval/(:any)'] = 'approval/$1';
$route['dashboard/approval/set/(:any)'] = 'approval/set/$1';
$route['dashboard/approval/set-store/(:any)'] = 'approval/set_store/$1';

/* Route PPB */
$route['dashboard/ppb'] = 'ppb/open';
$route['dashboard/ppb/(:any)'] = 'ppb/$1';
$route['dashboard/ppb/edit/(:any)'] = 'ppb/edit/$1';
$route['dashboard/ppb/update/(:any)'] = 'ppb/update/$1';
$route['dashboard/ppb/delete/(:any)'] = 'ppb/delete/$1';
$route['dashboard/ppb/get/(:any)'] = 'ppb/get/$1';

$route['report/print/ppb/(:any)'] = 'report/print/$1';

/* Route for Request */
$route['dashboard/request/approval/(:any)'] = 'request/approval/$1';
$route['dashboard/req/approval'] = 'request/req_approval';
$route['dashboard/approve/(:any)'] = 'approval/approve/$1';



$route['404_override'] = 'errors';
$route['access-denied'] = 'errors/access_denied';
$route['translate_uri_dashes'] = TRUE;
