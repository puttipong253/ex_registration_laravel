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

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::resource('users','UsersController');
Route::resource('training','TrainingController');
Route::resource('hotel','HotelController');
Route::resource('room','RoomController');

Route::put('room-update-1', 'HotelController@RoomUpdate1');
Route::put('room-update-2', 'HotelController@RoomUpdate2');
Route::get('export-users', 'UsersController@exportUser');
Route::get('export-listUsers', 'UsersController@exportListUser');
Route::get('export-room', 'RoomController@exportRoom');
Route::get('users-training', 'UsersController@usersTraining');
Route::get('users-hotel', 'UsersController@usersHotel');
Route::get('users-room', 'UsersController@usersRoom');
Route::post('partner','HotelController@partnerProvince');
Route::get('matching','UsersController@matching');
Route::post('tracking','UsersController@tracking');
Route::post('check-phone','UsersController@checkPhone');
Route::post('provinceUserRoom1','UsersController@provinceUserRoom1');
Route::post('provinceUserRoom2','UsersController@provinceUserRoom2');

Route::get('countAllUser','UsersController@countAllUser');
Route::get('countUserMatch','UsersController@countUserMatch');
Route::get('countUserNotMatch','UsersController@countUserNotMatch');
Route::get('countUserRoom','RoomController@countUserRoom');
