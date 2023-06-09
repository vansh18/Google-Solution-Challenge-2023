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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/user_login';
$route['validate-user'] = 'login/validate';
$route['logout'] = 'login/user_logout';
$route['signup'] = 'login/signup';
$route['register-user'] = 'login/register_user';
$route['knowing-you'] = 'login/knowing_you';

$route['home'] = 'home';
$route['meditation'] = 'home/meditation';
$route['chill-music'] = 'home/chill_music';
$route['habituation'] = 'habituation';
$route['add-habit'] = 'habituation/add_habit';
$route['delete-habit'] = 'habituation/delete_habit';
$route['reset-habit'] = 'habituation/reset_habit';

$route['get-output'] = 'chat/get_chat';
$route['chat'] = 'chat/call_chat';
$route['begin-chat'] = 'welcome/start_chat';

$route['upload-file'] = 'storage/upload_file';
$route['get-file'] = 'storage/get_file';

$route['helpline'] = 'home/helpline';
$route['feedback'] = 'home/feedback';
$route['about-hope'] = 'home/about_hope';
