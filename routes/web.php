<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();




Route::get('/registrasi_pelanggan', 'RegisPelanggan_Controller@index')
->middleware('checkRole:admin,kasir');


// CRUD Outlet
// Route Outlet
Route::get('/outlet', 'Outlet_Controller@index')
->middleware('checkRole:admin');

Route::get('/outlet/create', 'Outlet_Controller@add')
->middleware('checkRole:admin');

Route::post('/outlet/action_create', 'Outlet_Controller@action_add')
->middleware('checkRole:admin');

Route::get('/outlet/update/{id}', 'Outlet_Controller@edit')
->middleware('checkRole:admin');

Route::put('/outlet/action_update/{id}', 'Outlet_Controller@action_edit')
->middleware('checkRole:admin');

Route::get('/outlet/delete/{id}', 'Outlet_Controller@delete')
->middleware('checkRole:admin');

Route::get('/outlet/trash', 'Outlet_Controller@trash')
->middleware('checkRole:admin');

Route::get('/outlet/restore/{id}', 'Outlet_Controller@restore')
->middleware('checkRole:admin');

Route::get('/outlet/restore_all', 'Outlet_Controller@restore_all')
->middleware('checkRole:admin');

Route::get('/outlet/delete_permanent/{id}', 'Outlet_Controller@hapus_permanen')
->middleware('checkRole:admin');

Route::get('/outlet/delete_permanent_all', 'Outlet_Controller@hapus_permanen_semua')
->middleware('checkRole:admin');

Route::get('/outlet/search', 'Outlet_Controller@cari')
->middleware('checkRole:admin');

Route::get('/outlet/search_trash', 'Outlet_Controller@cari_trash')
->middleware('checkRole:admin');
// End of Route Outlet



// CRUD Paket Cucian
// Route Paket Cucian
Route::get('/paket', 'PaketCucian_Controller@index')
->middleware('checkRole:admin');

Route::get('/paket/create', 'PaketCucian_Controller@add')
->middleware('checkRole:admin');

Route::post('/paket/action_create', 'PaketCucian_Controller@action_add')
->middleware('checkRole:admin');

Route::get('/paket/update/{id}', 'PaketCucian_Controller@edit')
->middleware('checkRole:admin');

Route::put('/paket/action_update/{id}', 'PaketCucian_Controller@action_edit')
->middleware('checkRole:admin');

Route::get('/paket/delete/{id}', 'PaketCucian_Controller@delete')
->middleware('checkRole:admin');

Route::get('/paket/trash', 'PaketCucian_Controller@trash')
->middleware('checkRole:admin');

Route::get('/paket/restore/{id}', 'PaketCucian_Controller@restore')
->middleware('checkRole:admin');

Route::get('/paket/restore_all', 'PaketCucian_Controller@restore_all')
->middleware('checkRole:admin');

Route::get('/paket/delete_permanent/{id}', 'PaketCucian_Controller@hapus_permanen')
->middleware('checkRole:admin');

Route::get('/paket/delete_permanent_all', 'PaketCucian_Controller@hapus_permanen_semua')
->middleware('checkRole:admin');

Route::get('/paket/search', 'PaketCucian_Controller@cari')
->middleware('checkRole:admin');

Route::get('/paket/search_trash', 'PaketCucian_Controller@cari_trash')
->middleware('checkRole:admin');
// End of Route Paket Cucian


// CRUD Registrasi Pelanggan
// Route Registrasi Pelanggan
Route::get('/member', 'Member_Controller@index')
->middleware('checkRole:admin,kasir');

Route::get('/member/create', 'Member_Controller@add')
->middleware('checkRole:admin,kasir');

Route::post('/member/action_create', 'Member_Controller@action_add')
->middleware('checkRole:admin,kasir');

Route::get('/member/update/{id}', 'Member_Controller@edit')
->middleware('checkRole:admin,kasir');

Route::put('/member/action_update/{id}', 'Member_Controller@action_edit')
->middleware('checkRole:admin,kasir');

Route::get('/member/delete/{id}', 'Member_Controller@delete')
->middleware('checkRole:admin,kasir');

Route::get('/member/trash', 'Member_Controller@trash')
->middleware('checkRole:admin,kasir');

Route::get('/member/restore/{id}', 'Member_Controller@restore')
->middleware('checkRole:admin,kasir');

Route::get('/member/restore_all', 'Member_Controller@restore_all')
->middleware('checkRole:admin,kasir');

Route::get('/member/delete_permanent/{id}', 'Member_Controller@hapus_permanen')
->middleware('checkRole:admin,kasir');

Route::get('/member/delete_permanent_all', 'Member_Controller@hapus_permanen_semua')
->middleware('checkRole:admin,kasir');

Route::get('/member/search', 'Member_Controller@cari')
->middleware('checkRole:admin,kasir');

Route::get('/member/search_trash', 'Member_Controller@cari_trash')
->middleware('checkRole:admin,kasir');
// End of Route Member


// CRUD User
// Route User
Route::get('/user', 'User_Controller@index')
->middleware('checkRole:admin');

Route::get('/user/create', 'User_Controller@add')
->middleware('checkRole:admin');

Route::post('/user/action_create', 'User_Controller@action_add')
->middleware('checkRole:admin');

Route::get('/user/update/{id}', 'User_Controller@edit')
->middleware('checkRole:admin');

Route::put('/user/action_update/{id}', 'User_Controller@action_edit')
->middleware('checkRole:admin');

Route::get('/user/delete/{id}', 'User_Controller@delete')
->middleware('checkRole:admin');

Route::get('/user/trash', 'User_Controller@trash')
->middleware('checkRole:admin');

Route::get('/user/restore/{id}', 'User_Controller@restore')
->middleware('checkRole:admin');

Route::get('/user/restore_all', 'User_Controller@restore_all')
->middleware('checkRole:admin');

Route::get('/user/delete_permanent/{id}', 'User_Controller@hapus_permanen')
->middleware('checkRole:admin');

Route::get('/user/delete_permanent_all', 'User_Controller@hapus_permanen_semua')
->middleware('checkRole:admin');

Route::get('/user/search', 'User_Controller@cari')
->middleware('checkRole:admin');

Route::get('/user/search_trash', 'User_Controller@cari_trash')
->middleware('checkRole:admin');
// End of Route User


// CRUD Entri Transaksi
// Route Transaksi
Route::get('/transaksi', 'Transaksi_Controller@index')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/create', 'Transaksi_Controller@add')
->middleware('checkRole:admin,kasir');

Route::post('/transaksi/action_create', 'Transaksi_Controller@action_add')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/update/{id}', 'Transaksi_Controller@edit')
->middleware('checkRole:admin,kasir');

Route::put('/transaksi/action_update/{id}', 'Transaksi_Controller@action_edit')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/delete/{id}', 'Transaksi_Controller@delete')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/trash', 'Transaksi_Controller@trash')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/restore/{id}', 'Transaksi_Controller@restore')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/restore_all', 'Transaksi_Controller@restore_all')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/delete_permanent/{id}', 'Transaksi_Controller@hapus_permanen')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/delete_permanent_all', 'Transaksi_Controller@hapus_permanen_semua')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/search', 'Transaksi_Controller@cari')
->middleware('checkRole:admin,kasir');

Route::get('/transaksi/search_trash', 'Transaksi_Controller@cari_trash')
->middleware('checkRole:admin,kasir');
// End of Route Transaksi


Route::get('/laporan', 'Laporan_Controller@index')
->middleware('checkRole:admin,kasir,owner');