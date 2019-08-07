<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/backoffice/login', function () {
    return 'Admin login page will be shown here.';
});

Route::get('/register/company', 'SignInController@registerCompany')->name('registerCompany');

Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');

Route::get('/callback', 'SocialAuthGoogleController@callback');
