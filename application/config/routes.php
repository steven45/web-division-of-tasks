<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Halaman Admin
$route['admin'] = 'cAdmin';
$route['admin/validation'] = 'cAdmin/validation';
$route['admin/beranda'] = 'cAdmin/beranda';

$route['admin/keluar'] = 'cAdmin/keluar';
$route['admin/tambahpic'] = 'cAdmin/tambahPIC';

//Halaman User
$route['pic'] = 'cUser';
//$route['admin/validation'] = 'cAdmin/validation';
