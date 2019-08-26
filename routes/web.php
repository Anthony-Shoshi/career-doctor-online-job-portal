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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/aboutUs', 'PageController@aboutUs')->name('aboutUs');
Route::get('/contactUs', 'PageController@contactUs')->name('contactUs');
Route::get('/allBlog', 'PageController@allBlog')->name('allBlog');

// Admin
Route::group(['namespace' => 'Admin'], function () {
    //Route::get('/backoffice', 'AdminController@index')->name('adminHome');
    Route::get('/backoffice', 'SignInController@adminLogin')->name('adminLogin');
    //Category
    Route::get('/addCategory', 'CategoryController@addCategory')->name('addCategory');
    Route::post('/saveCategory', 'CategoryController@saveCategory')->name('saveCategory');
    Route::get('/categoryList', 'CategoryController@categoryList')->name('categoryList');
    Route::get('/editCategory/{id}', 'CategoryController@editCategory')->name('editCategory');
    Route::post('/updateCategory', 'CategoryController@updateCategory')->name('updateCategory');
    Route::get('/deleteCategory/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
    //Industry
    Route::get('/addIndustry', 'IndustryController@addIndustry')->name('addIndustry');
    Route::post('/saveIndustry', 'IndustryController@saveIndustry')->name('saveIndustry');
    Route::get('/industryList', 'IndustryController@industryList')->name('industryList');
    Route::get('/editIndustry/{id}', 'IndustryController@editIndustry')->name('editIndustry');
    Route::post('/updateIndustry', 'IndustryController@updateIndustry')->name('updateIndustry');
    Route::get('/deleteIndustry/{id}', 'IndustryController@deleteIndustry')->name('deleteIndustry');
});

// Candidate
Route::group(['namespace' => 'Candidate'], function () {
    Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');
    Route::get('/callback', 'SocialAuthGoogleController@callback');
    Route::get('/candidate/profile', 'CandidateController@candidateProfile')->name('candidateProfile');
    Route::post('/candidate/profile/save', 'CandidateController@saveCandidateProfile')->name('saveCandidateProfile');
    Route::post('/candidate/profile/update', 'CandidateController@updateCandidateProfile')->name('updateCandidateProfile');
    Route::get('/candidate/changePassword', 'CandidateController@changePassword')->name('changePassword');
    Route::post('/candidate/updatePassword', 'CandidateController@updatePassword')->name('updatePassword');
});

// Company
Route::group(['namespace' => 'Company'], function () {
    Route::get('/registerCompany', 'SignInController@registerCompany')->name('registerCompany');
    Route::get('/getCities/{id}', 'SignInController@getCities');
    Route::post('/company/register/save', 'SignInController@saveRegisterCompany')->name('saveRegisterCompany');
    Route::get('/company/profile', 'CompanyController@companyProfile')->name('companyProfile');
    Route::post('/company/profile/update', 'CompanyController@updateCompanyProfile')->name('updateCompanyProfile');
    Route::get('/company/changePassword', 'CompanyController@changePassword')->name('changePassword');
    Route::post('/company/updatePassword', 'CompanyController@updatePassword')->name('updatePassword');
});

//CV
Route::group(['namespace' => 'CV'], function () {
    Route::get('/create/cv', 'CvController@index')->name('index');
});
