<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['(:any)/category/(:num)/(:any).html'] = "$1/category/$2/$3";
$route['(:any)/view/(:num)/(:num)/(:num)/(:num)/(:any).html'] = "$1/detail/$5/$6";
$route['(:any)/view/(:num)/(:any).html'] = "$1/detail/$2/$3";
$route['(:any)/read/(:num)/(:num)/(:num)/(:num)/(:any).html'] = "$1/detail/$5/$6";
$route['(:any)/read/(:num)/(:any).html'] = "$1/detail/$2/$3";
$route['page/(:num)/(:any)'] = "page/detail/$1/$2";

$route['gadmin/(:any)/edit/(:num)'] = "$1/$1_admin/add/$2";
$route['gadmin/(:any)/(:any)/(:num)'] = "$1/$1_admin/$2/$3";
$route['gadmin/([a-zA-Z_-]+)/(:any)'] = '$1/$1_admin/$2';
$route['gadmin/media_album/(:any)'] = 'media_manager/media_album_admin/$1';
$route['gadmin/media_album'] = 'media_manager/media_album_admin';
$route['gadmin/auth/login'] = 'user/auth/login';
$route['gadmin/auth'] = 'user/auth/login';
$route['gadmin/([a-zA-Z_-]+)'] = '$1/$1_admin';
$route['gadmin'] = "dashboard/dashboard_admin";

$route['search/(:any)'] = "base/search/$1";
$route['search'] = "base/search";

$route['default_controller'] = "base";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */