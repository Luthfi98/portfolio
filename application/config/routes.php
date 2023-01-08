<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';
$route['account'] = 'auth/account';
$route['update-profile'] = 'auth/updateProfile';

$route['project'] = 'welcome/project';
$route['project/(:any)'] = 'welcome/project/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
