<?php

use Illuminate\Support\Facades\Route;
//date_default_timezone_set('Asia/Dhaka');

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

//middleware to check Deadline over or not
//Route::group(['middleware'=>'checkDeadline'], function (){

    Route::get('/', 'PageController@welcomePage')->name('welcomePage');

    Auth::routes();

//Without auth middleware route list
Route::get('/aboutUs', 'PageController@aboutUs')->name('aboutUs');
Route::get('/contactUs', 'PageController@contactUs')->name('contactUs');
Route::get('/termsAndConditions', 'PageController@termsAndConditions')->name('termsAndConditions');
Route::get('/privacyAndPolicy', 'PageController@privacyAndPolicy')->name('privacyAndPolicy');
Route::get('/allBlog', 'PageController@allBlog')->name('allBlog');
Route::get('/registerCompany', 'Company\SignInController@registerCompany')->name('registerCompany');
Route::get('/getCities/{id}', 'Company\SignInController@getCities');
Route::get('/getSkillsTag', 'Resume\ResumeController@getSkillsTag');
Route::post('/company/register/save', 'Company\SignInController@saveRegisterCompany')->name('saveRegisterCompany');
Route::get('/backoffice', 'Admin\SignInController@adminLogin')->name('adminLogin');
Route::get('/single/job/view/{id}', 'Company\JobPostController@singleJobView')->name('singleJobView');
Route::any('/list/job/view/{company_id?}', 'Company\JobPostController@jobListView')->name('jobListView');
Route::get('/company/profile/view/{id}', 'Company\CompanyController@companyProfileView')->name('companyProfileView');
Route::get('/company/job/list/view/{id}', 'Company\JobPostController@jobListOfThisCompany')->name('jobListOfThisCompany');
Route::get('/all/review/{company_id}', 'Candidate\RatingController@allReview')->name('allReview');
//Searches
Route::get('search/jobs/by/', 'Candidate\SearchJobsController@searchJobsBy')->name('searchJobsBy');
Route::post('send/contact/email', 'PageController@sendContactEmail')->name('sendContactEmail');

//Auth middleware route list
Route::group(['middleware'=>'auth'], function() {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
 
// Admin
    Route::group(['namespace' => 'Admin', 'middleware' => 'checkAdmin'], function () {
        //Route::get('/backoffice', 'AdminController@index')->name('adminHome');
        //Route::get('/backoffice', 'SignInController@adminLogin')->name('adminLogin');
        //Job List
        Route::get('/jobListForAdmin', 'JobController@jobListForAdmin')->name('jobListForAdmin');
        //Users
        Route::get('/candidateListForAdmin', 'JobController@candidateListForAdmin')->name('candidateListForAdmin');
        Route::get('/companyListForAdmin', 'JobController@companyListForAdmin')->name('companyListForAdmin');
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
        //Job types
        Route::get('/addJobType', 'JobTypesController@addJobType')->name('addJobType');
        Route::post('/saveJobType', 'JobTypesController@saveJobType')->name('saveJobType');
        Route::get('/jobTypeList', 'JobTypesController@jobTypeList')->name('jobTypeList');
        Route::get('/editJobType/{id}', 'JobTypesController@editJobType')->name('editJobType');
        Route::post('/updateJobType', 'JobTypesController@updateJobType')->name('updateJobType');
        Route::get('/deleteJobType/{id}', 'JobTypesController@deleteJobType')->name('deleteJobType');
        //Job jobQualification
        Route::get('/addJobQualification', 'JobQualificationController@addJobQualification')->name('addJobQualification');
        Route::post('/saveJobQualification', 'JobQualificationController@saveJobQualification')->name('saveJobQualification');
        Route::get('/jobQualificationList', 'JobQualificationController@jobQualificationList')->name('jobQualificationList');
        Route::get('/editJobQualification/{id}', 'JobQualificationController@editJobQualification')->name('editJobQualification');
        Route::post('/updateJobQualification', 'JobQualificationController@updateJobQualification')->name('updateJobQualification');
        Route::get('/deleteJobQualification/{id}', 'JobQualificationController@deleteJobQualification')->name('deleteJobQualification');
        //Education Degrees
        Route::get('/addEducationDegree', 'EducationDegreeController@addEducationDegree')->name('addEducationDegree');
        Route::post('/saveEducationDegree', 'EducationDegreeController@saveEducationDegree')->name('saveEducationDegree');
        Route::get('/educationDegreeList', 'EducationDegreeController@educationDegreeList')->name('educationDegreeList');
        Route::get('/editEducationDegree/{id}', 'EducationDegreeController@editEducationDegree')->name('editEducationDegree');
        Route::post('/updateEducationDegree', 'EducationDegreeController@updateEducationDegree')->name('updateEducationDegree');
        Route::get('/deleteEducationDegree/{id}', 'EducationDegreeController@deleteEducationDegree')->name('deleteEducationDegree');
        //Messages
        Route::get('get/contactus/messages', 'ContactMessageController@getContactUsMessages')->name('getContactUsMessages');
        //Settings
        Route::get('/generalSettings', 'SettingsController@generalSettings')->name('generalSettings');
        Route::post('/update/general/settings', 'SettingsController@updateGeneralSettings')->name('updateGeneralSettings');
    });

//Candidate
    Route::group(['namespace' => 'Candidate', 'middleware' => 'checkCandidate'], function () {
        Route::get('/redirect', 'SocialAuthGoogleController@redirect')->name('redirect');
        Route::get('/callback', 'SocialAuthGoogleController@callback');
        Route::get('/candidate/profile', 'CandidateController@candidateProfile')->name('candidateProfile');
        //Change Password
        Route::get('/candidate/changePassword', 'ChangePasswordController@changePassword')->name('candidateChangePassword');
        Route::post('/candidate/updatePassword', 'ChangePasswordController@updatePassword')->name('candidateUpdatePassword');
        //Shortlisted Job
        Route::get('shortListed/job','ShortListController@viewShortListedJob')->name('viewShortListedJob');
        Route::get('shortListed/job/search/{search}','ShortListController@shortListedJobSearch')->name('shortListedJobSearch');
        Route::get('shortListed/job/sort/by/{value}','ShortListController@shortListedJobSortBy')->name('shortListedJobSortBy');
        //Candidate Messages
        Route::get('candidate/messages/{id?}', 'MessagesController@candidateMessages')->name('candidateMessages');
        Route::post('send/candidate/messages', 'MessagesController@sendMessageByCandidate')->name('sendMessageByCandidate');
        //Applied Jobs
        Route::get('candidate/applied/jobs', 'JobApplyController@appliedJobs')->name('appliedJobs');
        Route::get('candidate/withdraw/application/{id}', 'JobApplyController@withdrawApplication')->name('withdrawApplication');

    });

//Company
    Route::group(['namespace' => 'Company', 'middleware' => 'checkCompany'], function () {
        //Profile
        Route::get('/company/profile', 'CompanyController@companyProfile')->name('companyProfile');
        Route::post('/company/profile/update', 'CompanyController@updateCompanyProfile')->name('updateCompanyProfile');
        //Change Password
        Route::get('/company/changePassword', 'ChangePasswordController@changePassword')->name('companyChangePassword');
        Route::post('/company/updatePassword', 'ChangePasswordController@updatePassword')->name('companyUpdatePassword');
        //Post Job
        Route::get('company/post/job','JobPostController@postJob')->name('postJob');
        Route::post('company/post/job/save','JobPostController@savePostJob')->name('savePostJob');
        //Find Candidate
        Route::any('candidate/list/view','CandidateListController@candidateListView')->name('candidateListView');
        Route::get('candidate/profile/view/{id}','CandidateListController@candidateProfileView')->name('candidateProfileView');
        //Manage Job
        Route::get('company/manage/job','JobPostController@manageJob')->name('manageJob');
        Route::get('company/edit/job/{id}','JobPostController@editJobPost')->name('editJobPost');
        Route::post('company/post/job/update','JobPostController@updatePostJob')->name('updatePostJob');
        Route::get('company/post/job/view/{id}','JobPostController@viewJobPost')->name('viewJobPost');
        Route::get('company/post/job/delete/{id}','JobPostController@deleteJobPost')->name('deleteJobPost');
        Route::get('manage/jobs/search/{search}','JobPostController@manageJobSearch')->name('manageJobSearch');
        Route::get('manage/jobs/sort/by/{value}','JobPostController@manageJobSortBy')->name('manageJobSortBy');
        //Job Applications
        Route::get('company/job/applications','JobApplicationController@jobApplication')->name('jobApplication');
        Route::get('view/resume/pdf/{id}','JobApplicationController@viewResumePdf')->name('viewResumePdf');
        Route::get('download/resume/{id}','JobApplicationController@downloadResume')->name('downloadResume');
        Route::get('edit/status/{id}','JobApplicationController@editStatus')->name('editStatus');
        Route::post('update/status','JobApplicationController@updateStatus')->name('updateStatus');
        //Followed By
        Route::get('followed/by','FollowController@followedBy')->name('followedBy');
        Route::get('search/followers/{search}','FollowController@searchFollowers')->name('searchFollowers');
        Route::get('followers/sort/by/{value}','FollowController@followersSortBy')->name('followersSortBy');
        //Company Messages
        Route::get('company/messages/{id?}','MessagesController@companyMessages')->name('companyMessages');
        Route::post('send/company/message','MessagesController@sendMessageByCompany')->name('sendMessageByCompany');

    });

//Resume
    Route::group(['namespace' => 'Resume', 'middleware' => 'checkCandidate'], function () {
        Route::get('/create/resume', 'ResumeController@createResume')->name('createResume');
        Route::POST('/candidate/resume/save', 'ResumeController@saveCandidateResume')->name('saveCandidateResume');
        Route::get('/edit/resume', 'ResumeController@editResume')->name('editResume');
        Route::POST('/candidate/resume/update', 'ResumeController@updateCandidateResume')->name('updateCandidateResume');
        Route::get('/remove/{type}/{id}', 'ResumeController@remove')->name('removeEdu');
        Route::get('/view/resume', 'ResumeController@viewResume')->name('viewResume');
    });

//Cover Letter
    Route::group(['namespace' => 'CoverLetter', 'middleware' => 'checkCandidate'], function (){
       Route::get('create/coverletter','CoverLetterController@createCoverLetter')->name('createCoverLetter');
       Route::get('create/new/coverletter','CoverLetterController@createNewCoverLetter')->name('createNewCoverLetter');
       Route::post('save/coverletter','CoverLetterController@saveCoverLetter')->name('saveCoverLetter');
       Route::get('edit/coverletter/{id}','CoverLetterController@editCoverLetter')->name('editCoverLetter');
       Route::post('update/coverletter','CoverLetterController@updateCoverLetter')->name('updateCoverLetter');
       Route::get('delete/coverletter/{id}','CoverLetterController@deleteCoverLetter')->name('deleteCoverLetter');
    });

//Company Follow
    Route::group(['namespace'=>'Company', 'middleware' => 'checkCandidate'], function(){
        Route::get('company/follow/{company}','FollowController@followCompany')->name('followCompany');
        Route::get('company/unFollow/{company}','FollowController@unFollowCompany')->name('unFollowCompany');
    });

//Shortlist Job
    Route::group(['namespace'=>'Candidate', 'middleware' => 'checkCandidate'], function(){
        Route::post('shortlist/job', 'ShortListController@shortListJob')->name('shortListJob');
        Route::post('delist/job', 'ShortListController@deListJob')->name('deListJob');
    });

//Shortlist Resume
    Route::group(['namespace'=>'Candidate', 'middleware' => 'checkCompany'], function(){
        Route::post('shortlist/resume', 'ShortListController@shortListResume')->name('shortListResume');
        Route::post('remove/shortlist/resume', 'ShortListController@RemoveShortListedResume')->name('RemoveShortListedResume');
        //Shortlisted Resumes
        Route::get('shortlisted/resumes','ShortListController@shortListedResumes')->name('shortListedResumes');
    });

//Company Rating
    Route::group(['namespace' => 'Candidate', 'middleware' => 'checkCandidate'], function() {
        Route::post('submit/rating','RatingController@submitRating')->name('submitRating');
        Route::get('edit/rating/{company_id}','RatingController@editRating')->name('editRating');
        Route::post('update/rating','RatingController@updateRating')->name('updateRating');
        Route::get('candidate/review/list','RatingController@candidateReviewList')->name('candidateReviewList');
        Route::get('view/candidate/review/{id}','RatingController@viewCandidateReview')->name('viewCandidateReview');
    });

//Candidate Rating
    Route::group(['namespace' => 'Candidate', 'middleware' => 'checkCompany'], function() {
        Route::post('submit/candidate/rating','RatingController@submitCandidateRating')->name('submitCandidateRating');
        Route::get('/all/candidate/review/{candidate_id}', 'RatingController@allCandidateReview')->name('allCandidateReview');
        Route::get('edit/candidate/rating/{candidate_id}','RatingController@editCandidateRating')->name('editCandidateRating');
        Route::post('update/candidate/rating','RatingController@updateCandidateRating')->name('updateCandidateRating');
        Route::get('company/review/list','RatingController@companyReviewList')->name('companyReviewList');
        Route::get('view/company/review/{id}','RatingController@viewCompanyReview')->name('viewCompanyReview');

    });

//Rating Manage by Admin
        Route::get('/companyReviewListForAdmin','Candidate\RatingController@companyReviewListForAdmin')->name('companyReviewListForAdmin')->middleware('checkAdmin');
        Route::get('/candidateReviewListForAdmin','Candidate\RatingController@candidateReviewListForAdmin')->name('candidateReviewListForAdmin')->middleware('checkAdmin');
        Route::get('delete/company/review/{id}','Candidate\RatingController@deleteCompanyReview')->name('deleteCompanyReview')->middleware('checkAdmin');
        Route::get('delete/candidate/review/{id}','Candidate\RatingController@deleteCandidateReview')->name('deleteCandidateReview')->middleware('checkAdmin');

//Apply Job Internal System
    Route::group(['namespace' => 'Candidate', 'middleware' => 'checkCandidate'], function() {
       Route::get('apply/job/{id}','JobApplyController@applyJob')->name('applyJob');
       Route::get('get/cover/letter','JobApplyController@getCoverLetter')->name('getCoverLetter');
       Route::post('save/apply/job','JobApplyController@saveApplyJob')->name('saveApplyJob');
    });

});

//});
