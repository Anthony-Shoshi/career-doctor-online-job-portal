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

//Without auth middleware route list
Route::get('/aboutUs', 'PageController@aboutUs')->name('aboutUs');
Route::get('/contactUs', 'PageController@contactUs')->name('contactUs');
Route::get('/allBlog', 'PageController@allBlog')->name('allBlog');
Route::get('/registerCompany', 'Company\SignInController@registerCompany')->name('registerCompany');
Route::get('/getCities/{id}', 'Company\SignInController@getCities');
Route::get('/getSkillsTag', 'Resume\ResumeController@getSkillsTag');
Route::post('/company/register/save', 'Company\SignInController@saveRegisterCompany')->name('saveRegisterCompany');

//Auth middleware route list
Route::group(['middleware'=>'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//Admin
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

//Candidate
    Route::group(['namespace' => 'Candidate'], function () {
        Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');
        Route::get('/callback', 'SocialAuthGoogleController@callback');
        Route::get('/candidate/profile', 'CandidateController@candidateProfile')->name('candidateProfile');
        Route::get('/candidate/changePassword', 'CandidateController@changePassword')->name('candidateChangePassword');
        Route::post('/candidate/updatePassword', 'CandidateController@updatePassword')->name('candidateUpdatePassword');
    });

//Company
    Route::group(['namespace' => 'Company'], function () {
        Route::get('/company/profile', 'CompanyController@companyProfile')->name('companyProfile');
        Route::post('/company/profile/update', 'CompanyController@updateCompanyProfile')->name('updateCompanyProfile');
        Route::get('/company/changePassword', 'CompanyController@changePassword')->name('companyChangePassword');
        Route::post('/company/updatePassword', 'CompanyController@updatePassword')->name('companyUpdatePassword');
    });

//Resume
    Route::group(['namespace' => 'Resume'], function () {
        Route::get('/create/resume', 'ResumeController@createResume')->name('createResume');
        Route::POST('/candidate/resume/save', 'ResumeController@saveCandidateResume')->name('saveCandidateResume');
        Route::get('/edit/resume', 'ResumeController@editResume')->name('editResume');
        Route::POST('/candidate/resume/update', 'ResumeController@updateCandidateResume')->name('updateCandidateResume');
        Route::get('/remove/{type}/{id}', 'ResumeController@remove')->name('removeEdu');
        Route::get('/view/resume', 'ResumeController@viewResume')->name('viewResume');
    });

});
