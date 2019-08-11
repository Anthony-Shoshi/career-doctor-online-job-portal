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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

<<<<<<< Updated upstream
Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');

Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register/company', 'SignInController@registerCompany')->name('registerCompany');
=======
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/backoffice/login', 'SignInController@adminLogin')->name('adminLogin');
});

// Candidate
Route::group(['namespace' => 'Candidate'], function () {
    Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');
    Route::get('/callback', 'SocialAuthGoogleController@callback');
    Route::get('/candidate/profile', 'CandidateController@candidateProfile')->name('candidateProfile');
    Route::post('/candidate/profile/save', 'CandidateController@saveCandidateProfile')->name('saveCandidateProfile');
    Route::post('/candidate/profile/update', 'CandidateController@updateCandidateProfile')->name('updateCandidateProfile');
});

// Company
Route::group(['namespace' => 'Company'], function () {
    Route::get('/register/company', 'SignInController@registerCompany')->name('registerCompany');
    Route::get('/company/profile', 'CompanyController@companyProfile')->name('companyProfile');
});

//CV
Route::group(['namespace' => 'CV'], function () {
    Route::get('/create/cv', 'CvController@index')->name('index');
});
>>>>>>> Stashed changes
