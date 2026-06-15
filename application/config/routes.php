<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']  = 'Auth/index';
$route['logout'] = 'Auth/logout';

$route['dashboard'] = 'Dashboard/index';

$route['pengajuan']             = 'Pengajuan/index';
$route['pengajuan/buat']        = 'Pengajuan/buat';
$route['pengajuan/simpan']      = 'Pengajuan/simpan';
$route['pengajuan/riwayat']     = 'Pengajuan/riwayat';
$route['pengajuan/detail/(:num)'] = 'Pengajuan/detail/$1';

$route['admin/pengajuan']               = 'Admin/pengajuan';
$route['admin/pengajuan/detail/(:num)'] = 'Admin/detail_pengajuan/$1';
$route['admin/pengajuan/update/(:num)'] = 'Admin/update_pengajuan/$1';

$route['admin/jenis-surat']              = 'Admin/jenis_surat';
$route['admin/jenis-surat/tambah']       = 'Admin/tambah_jenis_surat';
$route['admin/jenis-surat/simpan']       = 'Admin/simpan_jenis_surat';
$route['admin/jenis-surat/edit/(:num)']  = 'Admin/edit_jenis_surat/$1';
$route['admin/jenis-surat/hapus/(:num)'] = 'Admin/hapus_jenis_surat/$1';