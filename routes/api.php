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

// Route::get('persons', 'PersonController@index');
// Route::get('persons/{id}', 'PersonController@show');
// Route::post('persons', 'PersonController@store');
// Route::put('persons/{id}', 'PersonController@update');
// Route::delete('persons/{id}', 'PersonController@delete');
//
// Route::get('addresses', 'AddressController@index');
// Route::get('addresses/{id}', 'AddressController@show');
// Route::post('addresses', 'AddressController@store');
// Route::put('addresses/{id}', 'AddressController@update');
// Route::delete('addresses/{id}', 'AddressController@delete');
//
// Route::get('phones', 'PhoneController@index');
// Route::get('phones/{id}', 'PhoneController@show');
// Route::post('phones', 'PhoneController@store');
// Route::put('phones/{id}', 'PhoneController@update');
// Route::delete('phones/{id}', 'PhoneController@delete');

Route::resource('patients', 'PatientManagementController');
// Route::get('patients/{id}', 'PatientManagementController@index');

// Route::post('patients', 'PatientManagementController@store');
