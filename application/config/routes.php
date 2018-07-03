<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Halaman Admin
$route['admin'] = 'cAdmin';
$route['admin/validation'] = 'cAdmin/validation';
$route['admin/beranda'] = 'cAdmin/beranda';

//Halaman User
$route['default_controller'] = 'cUser';
//$route['admin/validation'] = 'cAdmin/validation';