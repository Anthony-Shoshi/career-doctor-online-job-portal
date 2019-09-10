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
Route::get('/backoffice', 'Admin\SignInController@adminLogin')->name('adminLogin');

//Auth middleware route list
Route::group(['middleware'=>'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
 
// Admin
Route::group(['namespace' => 'Admin'], function () {
    //Route::get('/backoffice', 'AdminController@index')->name('adminHome');
    //Route::get('/backoffice', 'SignInController@adminLogin')->name('adminLogin');
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
    //Country
    Route::get('/addCountry', 'CountryController@addCountry')->name('addCountry');
    Route::post('/saveCountry', 'CountryController@saveCountry')->name('saveCountry');
    Route::get('/countryList', 'CountryController@countryList')->name('countryList');
    Route::get('/editCountry/{id}', 'CountryController@editCountry')->name('editCountry');
    Route::post('/updateCountry', 'CountryController@updateCountry')->name('updateCountry');
    Route::get('/deleteCountry/{id}', 'CountryController@deleteCountry')->name('deleteCountry');
    //City
    Route::get('/addCity', 'CityController@addCity')->name('addCity');
    Route::post('/saveCity', 'CityController@saveCity')->name('saveCity');
    Route::get('/countryListToGetCities', 'CityController@countryListToGetCities')->name('countryListToGetCities');
    Route::get('/cityList/{id}', 'CityController@cityList')->name('cityList');
    Route::get('/editCity/{id}', 'CityController@editCity')->name('editCity');
    Route::post('/updateCity', 'CityController@updateCity')->name('updateCity');
    Route::get('/deleteCity/{id}', 'CityController@deleteCity')->name('deleteCity');
    //Job Skills
    Route::get('/addJobSkills', 'JobSkillsController@addJobSkills')->name('addJobSkills');
    Route::post('/saveJobSkill', 'JobSkillsController@saveJobSkill')->name('saveJobSkill');
    Route::get('/editJobSkill/{id}', 'JobSkillsController@editJobSkill')->name('editJobSkill');
    Route::post('/updateJobSkill', 'JobSkillsController@updateJobSkill')->name('updateJobSkill');
    Route::get('/deleteJobSkill/{id}', 'JobSkillsController@deleteJobSkill')->name('deleteJobSkill');
    Route::get('/jobSkillsList', 'JobSkillsController@jobSkillsList')->name('jobSkillsList');
    Route::get('/newJobSkillsList', 'JobSkillsController@newJobSkillsList')->name('newJobSkillsList');
    Route::get('/acceptNewJobSkill/{id}', 'JobSkillsController@acceptNewJobSkill')->name('acceptNewJobSkill');
    Route::get('/rejectNewJobSkill/{id}', 'JobSkillsController@rejectNewJobSkill')->name('rejectNewJobSkill');

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
