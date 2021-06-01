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

Route::get('produk_member', function () {
    return view('produk_member');
});

Route::get('treatment_member', function () {
    return view('treatment_member');
});

Route::get('daftar', function () {
    return view('daftar');
});

Route::get('daftarKlinik', function () {
    return view('daftarKlinik');
});

Route::get('super_index', function () {
    return view('super_admin/super_index');
});

Route::get('admin_klinik/index', function () {
    return view('admin_klinik/index');
});


//======================= Super Admin ==================================
Route::get('/super_admin/DashboardSuper','KlinikController@tampil');

Route::get('klinik', 'KlinikController@index');
Route::post('addKlinik', 'KlinikController@create');
Route::put('editKlinik{id}','KlinikController@update');
Route::delete('deleteKlinik{id}','KlinikController@delete');

Route::get('/registerKlinik', 'KlinikController@registerKlinik');
Route::post('registerKlinikPost', 'KlinikController@registerKlinikPost');


//========================Admin Klinik==================================

Route::get('/admin_klinik/DashboardAdmin','CrudMemberController@tampil');
Route::get('/member','CrudMemberController@index');
Route::post('addMember','CrudMemberController@create');
Route::delete('deleteMember/{id}','CrudMemberController@delete');

Route::get('produk','ProdukController@index');
Route::post('addProduk', 'ProdukController@create');
Route::put('editProduk/{id}','ProdukController@update');
Route::delete('deleteProduk/{id}','ProdukController@delete');

Route::get('/pemesanan_produk/pemesanan_produk','PemesananProdukController@index');
Route::put('/pemesanan_produk/ubahStatus/{id}','PemesananProdukController@update');
Route::delete('/pemesanan_produk/hapusPemesanan/{id}','PemesananProdukController@delete');
Route::post('/pemesanan_produk/konfirmasiPemesanan/{id}','PemesananProdukController@konfirmasi');
Route::get('/pemesanan_produk/batalPemesanan/{id}','PemesananProdukController@batalkan');
Route::post('/pemesanan_produk/dibatalkanPemesanan/{id}','PemesananProdukController@aksibatal');
Route::get('/pemesanan_produk/diambilPemesanan/{id}','PemesananProdukController@diambil');

Route::get('/pemesanan_produk/pembayaran_produk','PembayaranProdukController@index');
Route::get('/pemesanan_produk/validasiPembayaran/{id_pp}','PembayaranProdukController@validasiBayar');
Route::get('/pemesanan_produk/batalPembayaran/{id_pp}','PembayaranProdukController@BayarBatal');
Route::get('/pemesanan_produk/deletePembayaranProduk{id_pp}','PembayaranProdukController@BayarBatal');



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
Route::get('member/DashboardMember', 'MemberController@tampil');
Route::get('/registerMember', 'MemberController@registerMember');
Route::post('registerMemberPost', 'MemberController@registerMemberPost');


//=============================== Produk ==========================================================
Route::get('produk_member', 'PemesananProdukController@tampilProduk');
Route::get('detailProduk{id_produk}', 'PemesananProdukController@tampilDetailProduk');
Route::get('Member/riwayat_Beli', 'PemesananProdukController@riwayat');
Route::get('riwayat/{id_pp}', 'PemesananProdukController@riwayatDetail');

//=============================== TreatMent========================================================
Route::get('treatment_member', 'PemesananTreatmentController@tampilTreatment');
Route::get('detailTreatment{id_treatment}', 'PemesananTreatmentController@tampilDetailTreatment');
Route::get('/produk_member', 'PemesananProdukController@tampilProduk');
Route::get('/detailProduk{id_produk}', 'PemesananProdukController@tampilDetailProduk');
Route::get('/treatment_member', 'PemesananTreatmentController@tampilTreatment');
Route::get('/detailTreatment(id_treatment)', 'PemesananProdukController@tampilDetailTreatment');
Route::post('/registerMemberPost', 'MemberController@registerMemberPost');
Route::get('/', 'HalamanMemberController@tampil');



Route::post('/loginPost', 'LoginController@loginPost');
Route::get('/logout', 'LoginController@logout');