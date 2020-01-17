<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        Route::prefix('dashboard')->name('dashboard.')->group(function(){
           Route::group(['middleware'=>'auth'], function () {
               Route::get('/index', 'DashboardController@index')->name('index');
               Route::get('/edit-profile/{id}', 'DashboardController@editProfile')->name('edit-profile');
               Route::put('/update-profile/{id}', 'DashboardController@updateProfile')->name('update-profile');

               Route::get('city/{id}','GetCityController@getCity')->name('city');
               Route::get('status', 'GetCityController@updateStatus')->name('status');
               Route::post('reply-message/{id}', 'ContactsController@replyMessage')->name('reply-message');
       //  ********roles and permissions************************************
               Route::resource('roles','RoleController');
               Route::resource('permissions','PermissionController');

               Route::resource('users', 'UserController');
               Route::resource('clients', 'ClientController');
               Route::resource('settings', 'SettingsController');
               Route::resource('categories', 'CategoriesController');
               Route::resource('posts', 'PostsController');
               Route::resource('governorates', 'GovernoratesController');
               Route::resource('cities', 'CitiesController');
               Route::resource('donation-requests','DonationRequestsController');
               Route::resource('contacts','ContactsController');
               Route::resource('notifications','NotificationController');
           });

        });//end the dashboard
    });
