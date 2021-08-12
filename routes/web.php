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
Route::get('/single', function () {
    return view('single');
});
Route::get('/categories', function () {
    return view('categories');
});

Route::get('/company/allapplyed', function () {
    return view('company/allapplyed');

});Route::get('/company/sortedcv', function () {
    return view('company/sortedcv');

});Route::get('/company/unsortedcv', function () {
    return view('company/sortedcv');
});
Route::get('/test', 'CompanyController@test');
Route::post('/show', 'CompanyController@testshow')->name('test.show');
// Route::get('/search', 'SerchController@fontPageSerch')->name('search.jobs.get');
Route::post('/search', 'SerchController@fontPageSerch')->name('search.jobs');
Route::get('/job/categories', 'PostCircularController@index')->name('post.circuler.catagory');
Route::get('/job/categories/match', 'PostCircularController@circulerMatchView')->name('post.circuler.catagory.matched');
Route::get('/job/details/{id}', 'PostCircularController@jobCircularDetails')->name('job.details');
Route::post('/job/details', 'PostCircularController@jobSearch')->name('job.details.search');
Route::get('/apply/{id}','UserCircularApplyController@applymatchied')->name('apply.match');
Route::get('/viewcv_download/{id}', 'downloadController@exportpdf')->name('view.cv.download');

Auth::routes(['verify' => true]);
Route::prefix('home')->group(function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/perfonnel', 'UserPersonalinfoController@userPersonalinfo')->name('user.perfonnel.info');
	Route::get('/viewcv', 'UserPersonalinfoController@cv')->name('view.cv');
	
	Route::get('/editcv', 'UserPersonalinfoController@cvedit')->name('edit.cv');
	Route::post('/editcv/{id}', 'UserPersonalinfoController@cveditstore')->name('edit.cv.submit');
	Route::post('/editcvaddress/{id}', 'UserPersonalinfoController@cvaddresseditstore')->name('edit.cv.address.submit');
	Route::post('/editcvcareer/{id}', 'UserPersonalinfoController@careerInfo')->name('edit.cv.careerinfo.submit');

	Route::post('/education', 'UserPersonalinfoController@education')->name('insert.cv.education.submit');
	Route::get('/view_edit_education/{id}', 'UserPersonalinfoController@educationEditShow')->name('edit.view.cv.education');
	Route::post('/edit_education/{id}', 'UserPersonalinfoController@educationEdit')->name('edit.cv.education.submit');
		
	Route::post('/training', 'UserPersonalinfoController@training')->name('insert.cv.training.submit');
	Route::get('/view_edit_training/{id}', 'UserPersonalinfoController@trainingEditShow')->name('edit.view.cv.training');
	Route::post('/edit_training/{id}', 'UserPersonalinfoController@trainingEdit')->name('edit.cv.training.submit');

	Route::post('/proquality', 'UserPersonalinfoController@proquality')->name('insert.cv.proquality.submit');
	Route::get('/view_edit_proquality/{id}', 'UserPersonalinfoController@proqualityEditShow')->name('edit.view.cv.proquality');
	Route::post('/edit_proquality/{id}', 'UserPersonalinfoController@proqualityEdit')->name('edit.cv.proquality.submit');

	Route::post('/language', 'UserPersonalinfoController@language')->name('insert.cv.language.submit');
	Route::get('/view_edit_language/{id}', 'UserPersonalinfoController@languageEditShow')->name('edit.view.cv.language');
	Route::post('/edit_language/{id}', 'UserPersonalinfoController@languageEdit')->name('edit.cv.language.submit');

	Route::post('/reference', 'UserPersonalinfoController@reference')->name('insert.cv.reference.submit');
	Route::post('/expreance', 'ExperienceController@storeExperiences')->name('insert.cv.expreance.submit');
	
	
});
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//Admin route section
Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/allusers', 'AdminController@allusers')->name('admin.allusers');
	Route::get('/allcomps', 'AdminController@allcomps')->name('admin.allcomps');

	Route::get('/categories','AdminController@categories')->name('categories');
	Route::post('/categories/cat_create','AdminController@categoriesAdd')->name('insert.categories.submit');
	Route::post('/categories/div_create','AdminController@divisionAdd')->name('insert.division.submit');
});
//Company route section
Route::prefix('company')->group(function(){
	Route::get('/register', 'Auth\CompanyRegisterController@companyRegisterForm')->name('company.register');
	Route::post('/register', 'Auth\CompanyRegisterController@registerCompany')->name('company.register.submit');
	Route::get('/login','Auth\CompanyLoginController@showLoginForm')->name('company.login');
	Route::post('/login','Auth\CompanyLoginController@login')->name('company.login.submit');
	Route::get('/', 'CompanyController@index')->name('company.dashboard');
	
	Route::get('/create','CompanyController@companyProfile')->name('company.profile');
	Route::post('/create','CompanyController@store')->name('company.profile.submit');
	Route::get('/view','CompanyController@viewCompanyProfile')->name('company.profile.view');
	Route::get('/create/edit/{id}','CompanyController@editviewCompanyProfile')->name('company.profile.editview');
	Route::post('/create/edit/{id}','CompanyController@editCompanyProfile')->name('company.profile.edit.submit');

	Route::get('/circular','CompanyController@JobCircular')->name('company.circular');
	Route::post('/circular','CompanyController@JobCircularPost')->name('company.circular.submit');
	Route::get('/circular/view','CompanyController@JobCircularView')->name('company.circular.view');
	Route::get('/apply/allcv','CompanyController@ApplyCircular')->name('company.apply.allcv'); //this route unknown
	Route::get('/apply/all/{id}','CircularApplyController@ApplyCircular')->name('company.applyer.all');
	Route::get('/apply/sorted_cv','CompanyController@SortedCV')->name('company.apply.sortedcv'); //this route unknown
	Route::get('/apply/sorted_cv/{id}','CircularApplyController@applyerMatch')->name('company.applyer.sortedcv');
	Route::get('/apply/unsorted_cv','CompanyController@UnsortedCV')->name('company.apply.unsortedcv'); //this route unknown
	Route::get('/apply/unsorted_cv/{id}','CircularApplyController@applyerUnmatch')->name('company.applyer.unsortedcv');
	Route::get('/sorted/{id}','CircularApplyController@manualAccept')->name('manual.sortlist');
	Route::get('/unsorted/{id}','CircularApplyController@manualReject')->name('manual.unsortlist');
});

