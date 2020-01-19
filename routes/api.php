<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'Api'],function (){
    Route::get('/clients','MainController@clients');
    Route::get('/blood-types','MainController@blood_types');
    Route::get('/governorates','MainController@governorate');
    Route::get('/cities','MainController@cities');
    Route::get('city','MainController@citiesSearch');
    Route::post('/register','AuthController@register');
    Route::post('/login','AuthController@login');
    Route::delete('/delete-client/{id}','AuthController@deleteClient');

    Route::group(['middleware'=>'auth:client-api'],function (){

        Route::put('/update-profile','AuthController@update_profile');
        Route::get('/posts','MainController@posts');
        Route::get('/post','MainController@post');
        Route::get('/categories','MainController@categories');
        Route::get('/donetion-requests','MainController@donetion_requests');
        Route::get('/donetion-request','MainController@donetion_request');
        Route::post('/create-donetion-request','MainController@create_donetion_request');
        Route::post('/register-token','AuthController@registerToken');
        Route::post('/remove-token','AuthController@removeToken');
        Route::post('/set-notification-setting','AuthController@setNotificationSetting');
        Route::get('/get-notification-setting','AuthController@getNotificationSetting');

    });
});
