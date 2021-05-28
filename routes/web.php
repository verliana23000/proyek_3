<?php

use Illuminate\Support\Facades\Route;

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
Route::get('member/DashboardMember', function () {
    return view('member/DashboardMember');
});

Route::get('produk_member', function () {
    return view('produk_member');
});

Route::get('treatment_member', function () {
    return view('treatment_member');
});

Route::get('daftar', function () {
    return view('daftar');
});

Route::get('super_index', function () {
    return view('super_admin/super_index');
});

Route::get('/', function () {
    return view('/');
});

Route::get('index', function () {
    return view('admin_klinik/index');
});


//======================= Super Admin ==================================
Route::get('/super_admin/loginadmin', 'LoginAdminController@login');
Route::get('/super_admin/super_index', 'LoginAdminController@index');
Route::post('/super_admin/loginPost', 'LoginAdminController@loginPost');
Route::get('/super_admin/logout', 'LoginAdminController@logout');

Route::get('klinik','KlinikController@index');
Route::post('addKlinik', 'KlinikController@create');
Route::put('editKlinik/{id}','KlinikController@update');

//========================Admin Klinik==================================

Route::get('/admin_klinik/loginadmin', 'LoginAdminController@login');
Route::get('/index', 'LoginAdminController@index');
Route::post('/loginPost', 'LoginAdminController@loginPost');
Route::get('logout', 'LoginAdminController@logout');



Route::get('member','CrudMemberController@index');
Route::get('addMember','CrudMemberController@create');
Route::get('editMember(id)','CrudMemberController@update');


Route::get('produk','ProdukController@index');
Route::post('addProduk', 'ProdukController@create');
Route::put('editProduk/{id}','ProdukController@update');
Route::delete('deleteProduk/{id}','ProdukController@delete');


Route::get('pemesanan_produk','PemesananProdukController@index');
Route::post('addPemesanan_produk', 'PemesananProdukController@create');
Route::put('editPemesanan_produk/{id}','PemesananProdukController@update');
Route::delete('deletePemesanan_produk/{id}','PemesananProdukController@delete');



Route::get('pembayaran_produk','PembayaranProdukController@index');
Route::delete('deletePembayaran_produk/{id}','PembayaranProdukController@delete');



Route::get('treatment','TreatmentController@index');
Route::post('addTreatment', 'TreatmentController@create');
Route::put('editTreatment/{id}','TreatmentController@update');
Route::delete('deleteTreatment/{id}','TreatmentController@delete');



Route::get('pemesanan_treatment','PemesananTreatmentController@index');
Route::delete('deletePemesanan_produk/{id}','PemesananTreatmentController@delete');



Route::get('pembayaran_treatment','PembayaranTreatmentController@index');
Route::delete('deletePembayaran_treatment/{id}','PembayaranTreatmentController@delete');



Route::get('antrian','AntrianController@index');
Route::delete('deleteAntrian/{id}','AntrianController@delete');


//================================ Member ============================================
Route::get('member/DashboardMember', 'MemberController@index');
Route::get('/index', 'MemberController@loginMember');
Route::post('loginMemberPost', 'MemberController@loginMemberPost');
Route::post('registerMemberPost', 'MemberController@registerMemberPost');
Route::get('/logoutMember', 'MemberController@logoutMember');

//=============================== Produk ==========================================================
Route::get('produk_member', 'PemesananProdukController@tampilProduk');
Route::get('detailProduk{id_produk}', 'PemesananProdukController@tampilDetailProduk');
Route::get('Member/riwayat_Beli', 'PemesananProdukController@riwayat');
Route::get('riwayat/{id_pp}', 'PemesananProdukController@riwayatDetail');

//=============================== TreatMent========================================================
Route::get('treatment_member', 'PemesananTreatmentController@tampilTreatment');
Route::get('detailTreatment{id_treatment}', 'PemesananTreatmentController@tampilDetailTreatment');
