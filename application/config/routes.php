<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//<-- HALAMAN ADMIN -->
$route['admin'] = 'cAdmin';
$route['admin/validation'] = 'cAdmin/validation';
$route['admin/beranda'] = 'cAdmin/lihatLog';
$route['admin/keluar'] = 'cAdmin/keluar';

//CRUD PIC
$route['admin/pic'] = 'cAdmin/lihatPIC';
$route['admin/pic/(:any)'] = 'cAdmin/lihatPIC/$1';
$route['admin/tambahpic'] = 'cAdmin/tambahPIC';
$route['admin/validasitambahpic'] = 'cAdmin/validasiTambahPIC';
$route['admin/editpic/(:any)'] = 'cAdmin/editPIC/$1';
$route['admin/validasieditpic'] = 'cAdmin/validasiEditPIC';
$route['admin/hapuspic'] = 'cAdmin/hapusPIC';

//CRUD CHECKLIST
$route['admin/checklist'] = 'cAdmin/lihatChecklist';
$route['admin/editchecklist'] = 'cAdmin/editChecklist';
$route['admin/infochecklist/(:any)'] = 'cAdmin/lihatInfoChecklist/$1';
$route['admin/validasieditchecklist'] = 'cAdmin/validasiEditChecklist';
$route['admin/tambahchecklist'] = 'cAdmin/tambahChecklist';
$route['admin/validasitambahchecklist'] = 'cAdmin/validasiTambahChecklist';
$route['admin/hapuschecklist'] = 'cAdmin/hapusChecklist';

//CRUD ABSENSI
$route['admin/absensi'] = 'cAdmin/lihatAbsensi';
$route['admin/tambahabsensi'] = 'cAdmin/tambahAbsensi';
$route['admin/validasitambahabsensi'] = 'cAdmin/validasiTambahAbsensi';
$route['admin/hapusabsensi'] = 'cAdmin/hapusAbsensi';
$route['admin/editabsensi'] = 'cAdmin/editAbsensi';
$route['admin/gantiabsensi'] = 'cAdmin/gantiAbsensi';

$route['admin/log'] = 'cAdmin/lihatLog';
$route['admin/gantipiclog'] = 'cAdmin/gantiPICLog';

//Halaman User
$route['pic'] = 'cUser';
