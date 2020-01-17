<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function(){
    Route::get('/','MainController@home');
    Route::get('/about-us','MainController@aboutUs');
    Route::get('/articals','MainController@articals');
    Route::get('/artical-details/{id}','MainController@articalDetails');
    Route::get('/contact','MainController@contact');
    Route::post('/contact','MainController@storeMessage');
    Route::get('/donation','MainController@donation');
    Route::get('/donation-details/{id}','MainController@donationDetails');
    Route::post('/signin','MainController@signin');
    Route::get('/sign-new-donation','MainController@signNewDonation');
    Route::post('/signup','MainController@signup');
    Route::post('/store-donation','MainController@storeDonation');
    Route::get('/donation-filter','MainController@donetion_filtter');
    Route::post('/toggle','MainController@toggle');

    Route::get('city/{id}','mainController@getCity');

});

//*********client auth****************
Route::prefix('client')->namespace('Auth')->group(function(){
   // Route::get('/', 'ClientController@index')->name('client.dashboard');

    Route::get('/login', 'ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'ClientLoginController@login')->name('client.login.submit');
    Route::post('/logout', 'ClientLoginController@logout')->name('client.logout');

    // Registration Routes...
    Route::get('/register', 'ClientRegisterController@showRegistrationForm')->name('client.register');
    Route::post('/register', 'ClientRegisterController@register');

    //    password reset route
    Route::post('/password/email', 'ClientForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
    Route::get('/password/reset', 'ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::post('/password/reset', 'ClientResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'ClientResetPasswordController@showResetForm')->name('client.password.reset');
});




//***********USER AUTH***************
Auth::routes();
Route::post('/user/logout', 'Auth\LoginController@userlogout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
