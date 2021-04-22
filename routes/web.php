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

//========================= MEMBER ==========================

Route::get('home_member', function () {
    return view('/home_member');
});

//========================= ADMIN ============================

Route::get('index', function () {
    return view('admin_klinik/index');
});


Route::get('produk', function () {
    return view('admin_klinik/produk/produk');
});

Route::get('treatment', function () {
    return view('admin_klinik/treatment/treatment');
});

//========================Klinik==================================

Route::get('klinik','KlinikController@index');
Route::post('addKlinik', 'KlinikController@create');
Route::put('editKlinik/{id}','KlinikController@update');


//========================Member=================================

Route::get('/member','MemberController@index');
Route::post('addMember', 'MemberController@create');
Route::put('editMember/{id}','MemberController@update');
Route::delete('deleteMember/{id}','MemberController@delete');

//=========================Produk=================================

Route::get('produk','ProdukController@index');
Route::post('addProduk', 'ProdukController@create');
Route::put('editProduk/{id}','ProdukController@update');
Route::delete('deleteProduk/{id}','ProdukController@delete');
