<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = 'Notfound';
$route['translate_uri_dashes'] = FALSE;


$route['auth'] = 'Auth';
$route['verification'] = 'Auth/verification';
$route['logout'] = 'Auth/logout';

// Administrator
$route['dashboard'] = 'Admin/index';
$route['change-password'] = 'Admin/change_password';

$route['users'] = 'Admin/users';
$route['add-users'] = 'Admin/add_user';
$route['delete-users/(:num)'] = 'Admin/delete_user/$1';
$route['update-users'] = 'Admin/update_user';

$route['akun-mahasiswa'] = 'Admin/akun_mahasiswa';
$route['add-mahasiswa'] = 'Admin/add_mahasiswa';
$route['update-mahasiswa'] = 'Admin/update_mahasiswa';
$route['delete-mahasiswa/(:num)'] = 'Admin/delete_mahasiswa/$1';

$route['reading'] = 'Admin/soal_reading';
$route['add-reading'] = 'Admin/add_reading';
$route['update-reading'] = 'Admin/update_reading';
$route['delete-reading/(:num)'] = 'Admin/delete_reading/$1';

$route['listening'] = 'Admin/soal_listening';
$route['add-listening'] = 'Admin/add_listening';
$route['update-listening'] = 'Admin/update_listening';
$route['delete-listening/(:num)'] = 'Admin/delete_listening/$1';

$route['score'] = 'Admin/score';
$route['view-detail/(:any)'] = 'Admin/details/$1';

# Disable Controller access without routing
$route['(.*)'] = "Notfound";



