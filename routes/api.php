<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//======================Klinik==================================

Route::get('klinik','KlinikController@index');
Route::post('addKlinik', 'KlinikController@create');
Route::put('editKlinik/{id}','KlinikController@update');

//=====================Member==================================

Route::get('member','MemberController@index');
Route::post('addMember', 'MemberController@create');
Route::put('editMember/{id}','MemberController@update');
Route::delete('deleteMember/{id}','MemberController@delete');


