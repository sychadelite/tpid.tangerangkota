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
$route['default_controller'] = 'main/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* MAIN ROUTES */
// modular based routes
$route['about'] = 'main/about';
$route['visi-misi'] = 'main/visimisi';
$route['tugas-utama'] = 'main/tugasutama';
$route['struktur-organisasi'] = 'main/strukturorganisasi';

$route['kegiatan'] = 'main/kegiatan';
$route['kegiatan/group/(:any)'] = 'main/kegiatan/group/$1';
$route['kegiatan/detail/(:any)'] = 'main/kegiatan/detail/$1';

$route['pengumuman'] = 'main/pengumuman';
$route['pengumuman/group/(:any)'] = 'main/pengumuman/group/$1';
$route['pengumuman/detail/(:any)'] = 'main/pengumuman/detail/$1';

$route['galeri'] = 'main/galeri';

$route['komoditas'] = 'main/komoditas/index';
$route['harga-komoditas'] = 'main/komoditas/harga_komoditas';

/* ADMIN ROUTES */
$route['admin'] = 'admin/auth';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/users'] = 'admin/users';
$route['admin/menus'] = 'admin/menus';
$route['admin/menus/main'] = 'admin/menus/main';
$route['admin/rolepermissions'] = 'admin/rolepermissions';
$route['admin/kategori'] = 'admin/category';
$route['admin/berita/(:any)'] = 'admin/berita/index/$1';
$route['admin/profile'] = 'admin/profile/index';
$route['admin/profile/(:any)'] = 'admin/profile/slug/$1';
$route['admin/komoditas/(:any)'] = 'admin/komoditas/index/$1';

/* AUTH ROUTES */
$route['login'] = 'admin/auth';
$route['logout'] = 'admin/auth';

/* API */
// => users <=
$route['api/users']['get'] = 'admin/api/users';
$route['api/user/(:num)']['get'] = 'admin/api/users/get_by_id/$1';
$route['api/user/create']['post'] = 'admin/api/users/create';
$route['api/user/update']['post'] = 'admin/api/users/update';
$route['api/user/destroy']['post'] = 'admin/api/users/destroy';
// => menus <=
$route['api/menus']['get'] = 'admin/api/menus';
$route['api/menu/(:num)']['get'] = 'admin/api/menus/get_by_id/$1';
$route['api/menu/create']['post'] = 'admin/api/menus/create';
$route['api/menu/update']['post'] = 'admin/api/menus/update';
$route['api/menu/destroy']['post'] = 'admin/api/menus/destroy';
$route['api/menus/group/(:num)']['get'] = 'admin/api/menus/group_menus/$1';

$route['api/menus/main']['get'] = 'admin/api/menus/main_index';
$route['api/menu/main/(:num)']['get'] = 'admin/api/menus/main_get_by_id/$1';
$route['api/menu/main/create']['post'] = 'admin/api/menus/main_create';
$route['api/menu/main/update']['post'] = 'admin/api/menus/main_update';
$route['api/menu/main/destroy']['post'] = 'admin/api/menus/main_destroy';
$route['api/menus/main/group/update']['post'] = 'admin/api/menus/group_main_update';
// => rolepermissions <=
$route['api/rolepermissions']['get'] = 'admin/api/rolepermissions';
$route['api/rolepermission/(:num)']['get'] = 'admin/api/rolepermissions/get_by_id/$1';
$route['api/rolepermission/create']['post'] = 'admin/api/rolepermissions/create';
$route['api/rolepermission/update']['post'] = 'admin/api/rolepermissions/update';
$route['api/rolepermission/destroy']['post'] = 'admin/api/rolepermissions/destroy';
// => banner <=
$route['api/banners']['get'] = 'admin/api/banner';
$route['api/banner/(:num)']['get'] = 'admin/api/banner/get_by_id/$1';
$route['api/banner/create']['post'] = 'admin/api/banner/create';
$route['api/banner/update']['post'] = 'admin/api/banner/update';
$route['api/banner/destroy']['post'] = 'admin/api/banner/destroy';
// => category <=
$route['api/categories']['get'] = 'admin/api/category';
$route['api/category/(:num)']['get'] = 'admin/api/category/get_by_id/$1';
$route['api/category/create']['post'] = 'admin/api/category/create';
$route['api/category/update']['post'] = 'admin/api/category/update';
$route['api/category/destroy']['post'] = 'admin/api/category/destroy';
// => berita <=
$route['api/beritas']['get'] = 'admin/api/berita';
$route['api/beritas/(:any)']['get'] = 'admin/api/berita/get_all_by_category/$1';
$route['api/berita/(:num)']['get'] = 'admin/api/berita/get_by_id/$1';
$route['api/berita/create']['post'] = 'admin/api/berita/create';
$route['api/berita/update']['post'] = 'admin/api/berita/update';
$route['api/berita/destroy']['post'] = 'admin/api/berita/destroy';
// => profile <=
$route['api/profiles']['get'] = 'admin/api/profile';
$route['api/profiles/(:any)']['get'] = 'admin/api/profile/get_all_by_context/$1';
$route['api/profile/(:num)']['get'] = 'admin/api/profile/get_by_id/$1';
$route['api/profile/create']['post'] = 'admin/api/profile/create';
$route['api/profile/update']['post'] = 'admin/api/profile/update';
$route['api/profile/destroy']['post'] = 'admin/api/profile/destroy';
// => pasar <=
$route['api/pasars']['get'] = 'admin/api/pasar';
$route['api/pasar/(:num)']['get'] = 'admin/api/pasar/get_by_id/$1';
$route['api/pasar/create']['post'] = 'admin/api/pasar/create';
$route['api/pasar/update']['post'] = 'admin/api/pasar/update';
$route['api/pasar/destroy']['post'] = 'admin/api/pasar/destroy';
// => komoditas <=
$route['api/komoditases']['get'] = 'admin/api/komoditas';
$route['api/komoditas/(:num)']['get'] = 'admin/api/komoditas/get_by_id/$1';
$route['api/komoditas/create']['post'] = 'admin/api/komoditas/create';
$route['api/komoditas/update']['post'] = 'admin/api/komoditas/update';
$route['api/komoditas/destroy']['post'] = 'admin/api/komoditas/destroy';
// => komoditas rekapitulasi <=
$route['api/komoditas/rekapitulasis']['get'] = 'admin/api/komoditasrekapitulasi';
$route['api/komoditas/rekapitulasi/(:num)']['get'] = 'admin/api/komoditasrekapitulasi/get_by_id/$1';
$route['api/komoditas/rekapitulasi/create']['post'] = 'admin/api/komoditasrekapitulasi/create';
$route['api/komoditas/rekapitulasi/update']['post'] = 'admin/api/komoditasrekapitulasi/update';
$route['api/komoditas/rekapitulasi/destroy']['post'] = 'admin/api/komoditasrekapitulasi/destroy';
// => komoditas kelompok <=
$route['api/komoditas/kelompoks']['get'] = 'admin/api/komoditaskelompok';
$route['api/komoditas/kelompok/(:num)']['get'] = 'admin/api/komoditaskelompok/get_by_id/$1';
$route['api/komoditas/kelompok/create']['post'] = 'admin/api/komoditaskelompok/create';
$route['api/komoditas/kelompok/update']['post'] = 'admin/api/komoditaskelompok/update';
$route['api/komoditas/kelompok/destroy']['post'] = 'admin/api/komoditaskelompok/destroy';
// => komoditas jenis <=
$route['api/komoditas/jenises']['get'] = 'admin/api/komoditasjenis';
$route['api/komoditas/jenis/(:num)']['get'] = 'admin/api/komoditasjenis/get_by_id/$1';
$route['api/komoditas/jenis/create']['post'] = 'admin/api/komoditasjenis/create';
$route['api/komoditas/jenis/update']['post'] = 'admin/api/komoditasjenis/update';
$route['api/komoditas/jenis/destroy']['post'] = 'admin/api/komoditasjenis/destroy';

