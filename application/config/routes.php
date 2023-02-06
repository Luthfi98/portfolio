<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';
$route['account'] = 'auth/account';
$route['update-account'] = 'auth/updateProfile';

$route['update-profile'] = 'profiles/save';

$route['project'] = 'welcome/project';
$route['project/(:any)'] = 'welcome/project/$1';

$route['show-cv'] = 'welcome/cv';

$route['default_controller'] = 'welcome';
$route['404_override'] = 'Errors/error404';
$route['translate_uri_dashes'] = FALSE;
