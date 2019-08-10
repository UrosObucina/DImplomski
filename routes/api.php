<?php

use Illuminate\Http\Request;

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
// ovde se pisu rute i drugacije se pozivaju JSON /api/users/ example
Route::group(['middleware' => ['student']], function () {
Route::get('/users/', 'UserController@getAll')->middleware('student');
Route::get('/users/{id}', 'UserController@getOne');
Route::get('/delete/users/{id}', 'UserController@delete');
Route::post('/user/login', 'UserController@login');
Route::post('/insert/users/', 'UserController@insertUser');
});
//room
Route::get('/user/room/', 'UserController@userRoom');
Route::post('/insert/user/room/', 'UserController@insertUserRoom');
Route::post('/update/user/room/', 'UserController@updateUserRoom');
Route::post('/insert/floor/room/', 'RoomController@insertRoomFloor');
Route::get('/room/', 'RoomController@getAll')->middleware('repairman');
Route::post('/insert/room/', 'RoomController@insertRoom');
Route::get('/get/floor/room/', 'RoomController@getRoom');
Route::get('/delete/room/', 'RoomController@deleteRoom');
//block
Route::get('/block/', 'BlockController@getAll');
Route::get('/block/{id}', 'BlockController@getOne');
Route::post('/insert/block/', 'BlockController@insertBlock');
Route::post('/update/block/', 'BlockController@updateBlock');
Route::get('/delete/block/', 'BlockController@deleteBlock');
Route::post('/insert/block/floors/', 'BlockController@insertBlockFloors');
//floor
Route::get('/floor/', 'FloorController@getAll');
Route::get('/floor/{id}', 'FloorController@getOne');
Route::post('/insert/floor/', 'FloorController@insertFloor');
Route::get('/delete/floor/', 'FloorController@deleteFloor');
// damage
Route::get('/damage/', 'DamageController@getAll');
Route::get('/damage/{id}', 'DamageController@getOne');
Route::post('/insert/damage/', 'DamageController@insertDamage');
Route::get('/delete/damage/{id}', 'DamageController@deleteDamage');
Route::post('/update/damage/', 'DamageController@updateDamage');

// stock
Route::get('/stock/', 'StockController@getAll');
Route::get('/stock/{id}', 'StockController@getOne');
Route::post('/insert/stock/', 'StockController@insertStock');
Route::post('/update/stock/{id}', 'StockController@updateStock');
Route::get('/delete/stock/{id}', 'StockController@deleteStock');

// delivery
Route::get('/delivery/', 'DeliveryNoteController@getAll');
Route::get('/delivery/{id}', 'DeliveryNoteController@getOne');
Route::post('/insert/delivery/', 'DeliveryNoteController@insertDelivery');

// material requirement
Route::get('/material/','MaterialRequirementController@getAll');
Route::get('/material/{id}','MaterialRequirementController@getOne');
Route::post('/insert/material/','MaterialRequirementController@insertMaterialRequirement');
Route::get('/get/user/material/','MaterialRequirementController@getUserRequirement');
Route::get('/delete/material/','MaterialRequirementController@delete');

Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});