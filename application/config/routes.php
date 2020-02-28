<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'Beranda';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
$route['store_tanya']['post']  = 'beranda/store_tanya';

$route['bm']= 'BMController/index';

#########################################################################################################
# auth admin
$route['login/admin']['get']       = 'LoginAdminController/index';
$route['login/admin/auth']['post'] = 'LoginAdminController/auth';
$route['logout/admin']['get']      = 'LoginAdminController/logout';

#########################################################################################################
# auth karyawan
$route['login/karyawan']['get']           = 'LoginKaryawanController/index';
$route['login/karyawan/check']['post']    = 'LoginKaryawanController/check';
$route['login/karyawan/auth']['post']     = 'LoginKaryawanController/auth';
$route['login/karyawan/register']['post'] = 'LoginKaryawanController/register';
$route['logout/karyawan']['get']          = 'LoginKaryawanController/logout';

#########################################################################################################
# auth anggota
$route['login/anggota']['get']              = 'LoginAnggotaController/index';
$route['login/anggota/check_sirkah']['get'] = 'LoginAnggotaController/check_sirkah';
$route['login/anggota/check']['post']       = 'LoginAnggotaController/check';
$route['login/anggota/auth']['post']        = 'LoginAnggotaController/auth';
$route['login/anggota/register']['post']    = 'LoginAnggotaController/register';
$route['logout/anggota']['get']             = 'LoginAnggotaController/logout';

#########################################################################################################
# admin dashboard
$route['backend/dashboard']['get'] = 'backend/DashboardController/index';

#########################################################################################################
# admin berita
$route['backend/berita/index']                     = 'backend/BeritaController/index';
$route['backend/berita/create']['get']             = 'backend/BeritaController/create';
$route['backend/berita/store']['post']             = 'backend/BeritaController/store';
$route['backend/berita/show/(:any)']['get']        = 'backend/BeritaController/show/$1';
$route['backend/berita/edit/(:num)']['get']        = 'backend/BeritaController/edit/$1';
$route['backend/berita/update']['post']            = 'backend/BeritaController/update';
$route['backend/berita/destroy/(:num)']['get']     = 'backend/BeritaController/destroy/$1';
$route['backend/berita/flag/(:num)/(:num)']['get'] = 'backend/BeritaController/flag/$1/$2';

#########################################################################################################
# admin kisah
$route['backend/kisah/index']                     = 'backend/KisahController/index';
$route['backend/kisah/create']['get']             = 'backend/KisahController/create';
$route['backend/kisah/store']['post']             = 'backend/KisahController/store';
$route['backend/kisah/show/(:any)']['get']        = 'backend/KisahController/show/$1';
$route['backend/kisah/edit/(:num)']['get']        = 'backend/KisahController/edit/$1';
$route['backend/kisah/update']['post']            = 'backend/KisahController/update';
$route['backend/kisah/destroy/(:num)']['get']     = 'backend/KisahController/destroy/$1';
$route['backend/kisah/flag/(:num)/(:num)']['get'] = 'backend/KisahController/flag/$1/$2';

#########################################################################################################
# admin profile
$route['backend/profile/index']              = 'backend/ProfileController/index';
$route['backend/profile/show/(:any)']['get'] = 'backend/ProfileController/show/$1';
$route['backend/profile/edit/(:num)']['get'] = 'backend/ProfileController/edit/$1';
$route['backend/profile/update']['post']     = 'backend/ProfileController/update';

#########################################################################################################
# admin bukutamu
$route['backend/bukutamu/index'] = 'backend/BukuTamuController/index';

#########################################################################################################
# admin manage account
// admin
$route['backend/admin/index']['get']              = 'backend/AdminController/index';
$route['backend/admin/store']['post']             = 'backend/AdminController/store';
$route['backend/admin/edit/(:num)']['get']        = 'backend/AdminController/edit/$1';
$route['backend/admin/update']['post']            = 'backend/AdminController/update';
$route['backend/admin/destroy/(:num)']['get']     = 'backend/AdminController/destroy/$1';
$route['backend/admin/flag/(:num)/(:num)']['get'] = 'backend/AdminController/flag/$1/$2';
$route['backend/admin/check/(:any)']['get']       = 'backend/AdminController/check/$1';
$route['backend/admin/reset']['post']             = 'backend/AdminController/reset';

// karyawan
$route['backend/karyawan/index']['get']              = 'backend/KaryawanController/index';
$route['backend/karyawan/store']['post']             = 'backend/KaryawanController/store';
$route['backend/karyawan/edit/(:any)']['get']        = 'backend/KaryawanController/edit/$1';
$route['backend/karyawan/update']['post']            = 'backend/KaryawanController/update';
$route['backend/karyawan/destroy/(:any)']['get']     = 'backend/KaryawanController/destroy/$1';
$route['backend/karyawan/flag/(:num)/(:any)']['get'] = 'backend/KaryawanController/flag/$1/$2';
$route['backend/karyawan/check/(:any)']['get']       = 'backend/KaryawanController/check/$1';
$route['backend/karyawan/reset']['post']             = 'backend/KaryawanController/reset';

// anggota
$route['backend/anggota/index']['get']              = 'backend/AnggotaController/index';
$route['backend/anggota/store']['post']             = 'backend/AnggotaController/store';
$route['backend/anggota/edit/(:num)']['get']        = 'backend/AnggotaController/edit/$1';
$route['backend/anggota/update']['post']            = 'backend/AnggotaController/update';
$route['backend/anggota/destroy/(:num)']['get']     = 'backend/AnggotaController/destroy/$1';
$route['backend/anggota/flag/(:num)/(:num)']['get'] = 'backend/AnggotaController/flag/$1/$2';
$route['backend/anggota/check/(:any)']['get']       = 'backend/AnggotaController/check/$1';
$route['backend/anggota/reset']['post']             = 'backend/AnggotaController/reset';


#########################################################################################################
# karyawan dashboard
$route['karyawan/dashboard']['get'] = 'karyawan/DashboardController/index';

#########################################################################################################
# karyawan berita
$route['karyawan/berita/index']                     = 'karyawan/BeritaController/index';
$route['karyawan/berita/create']['get']             = 'karyawan/BeritaController/create';
$route['karyawan/berita/store']['post']             = 'karyawan/BeritaController/store';
$route['karyawan/berita/show/(:any)']['get']        = 'karyawan/BeritaController/show/$1';
$route['karyawan/berita/edit/(:num)']['get']        = 'karyawan/BeritaController/edit/$1';
$route['karyawan/berita/update']['post']            = 'karyawan/BeritaController/update';
$route['karyawan/berita/destroy/(:num)']['get']     = 'karyawan/BeritaController/destroy/$1';
$route['karyawan/berita/flag/(:num)/(:num)']['get'] = 'karyawan/BeritaController/flag/$1/$2';

#########################################################################################################
# karyawan kisah
$route['karyawan/kisah/index']                     = 'karyawan/KisahController/index';
$route['karyawan/kisah/create']['get']             = 'karyawan/KisahController/create';
$route['karyawan/kisah/store']['post']             = 'karyawan/KisahController/store';
$route['karyawan/kisah/show/(:any)']['get']        = 'karyawan/KisahController/show/$1';
$route['karyawan/kisah/edit/(:num)']['get']        = 'karyawan/KisahController/edit/$1';
$route['karyawan/kisah/update']['post']            = 'karyawan/KisahController/update';
$route['karyawan/kisah/destroy/(:num)']['get']     = 'karyawan/KisahController/destroy/$1';
$route['karyawan/kisah/flag/(:num)/(:num)']['get'] = 'karyawan/KisahController/flag/$1/$2';


#########################################################################################################
# anggota dashboard
$route['anggota/dashboard']['get']     = 'anggota/DashboardController/index';
$route['anggota/sirkah/(:num)']['get'] = 'anggota/DashboardController/sirkah/$1';

#########################################################################################################
# utility
$route['sha1']['get'] = function(){
	echo sha1('admin123)'.UYAH);
	exit;
};