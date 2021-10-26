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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'auth/login';
$route['home'] = 'resources/portal_berita';
$route['verifikasi'] = 'C_qrcode';
$route['rekrutmen'] = 'rekrutmen';
$route['login'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


$route['lembur/create'] = 'c_digitalisasi_form_lembur/create';
$route['perjalanan_dinas/create'] = 'c_digitalisasi_form_k32/create';
$route['dpbj/create'] = 'c_digitalisasi_dpbj/create';
$route['dppb/create'] = 'c_digitalisasi_dppb/create';
$route['ppl/create'] = 'pengadaan/create_ppl';
$route['spph/create'] = 'pengadaan/create_spph';
$route['sph/create'] = 'pengadaan/create_sph';
$route['ban/create'] = 'pengadaan/create_ban';
$route['po/create'] = 'pengadaan/create_po';
$route['spmk/create'] = 'pengadaan/create_spmk';
$route['lpp/create'] = 'pengadaan/create_lpp';
$route['pks/create'] = 'pengadaan/create_pks';
$route['gi/create'] = 'logistik_pergudangan/create_gi';
$route['dn/create'] = 'logistik_pergudangan/create_dn';
$route['gr/create'] = 'c_digitalisasi_gr/create';
$route['stock_opname/create'] = 'c_stock_opname/create';
$route['karyawan/create'] = 'routing/redirect_gc/karyawan/master/add';
$route['inventaris_aset/create'] = 'routing/redirect_gc/inventaris_aset/list/add';
$route['portal_berita/create'] = 'c_portal_berita/create';

$route['laporan_hasil_pelatihan/create'] = 'routing/redirect_gc/laporan_hasil_pelatihan/list/add';
$route['laporan_hasil_pelatihan/list'] = 'routing/redirect_gc/laporan_hasil_pelatihan/list';
$route['evaluasi_penyelenggaraan_pelatihan/create'] = 'routing/redirect_gc/evaluasi_penyelenggaraan_pelatihan/list/add';
$route['evaluasi_penyelenggaraan_pelatihan/list'] = 'routing/redirect_gc/evaluasi_penyelenggaraan_pelatihan/list';


$route['create/izin'] = 'routing/redirect_gc/surat_izin/list/add';
$route['create/sakit'] = 'routing/redirect_gc/surat_sakit/list/add';
$route['create/cuti'] = 'routing/redirect_gc/cuti/list/add';

$route['spesimen/ttd_log'] = 'spesimen/ttd_log';
$route['spesimen/paraf_log'] = 'spesimen/paraf_log';

$route['absensi/admin'] = 'absensi/admin';
$route['absensi/report'] = 'absensi/report';
$route['absensi/scan'] = 'absensi/scan';

$route['k1/admin'] = 'k1/admin';
$route['k1/view'] = 'k1/view';
$route['k1/report'] = 'k1/report';
