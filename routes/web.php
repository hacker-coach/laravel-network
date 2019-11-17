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

Route::get('/', 'Controller@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/verification/{id}', 'VerificationController@verification')->name('verificationVerification');
// USER
Route::get('/user/edit', 'UserController@edit')->name('userEdit');
Route::get('/user/edit/talent', 'UserController@editTalent')->name('userEditTalent');
Route::post('/user/update/talent', 'UserController@updateTalent')->name('userUpdateTalent');
Route::post('/user/update', 'UserController@update')->name('userUpdate');
Route::get('/user/show/{user_id}', 'UserController@show')->name('userShow');
Route::get('/user/show/company/{user_id}', 'UserController@showCompany')->name('userShowCompany');
Route::get('/user/profil', 'UserController@profil')->name('userProfil');
Route::get('/user/delete', 'UserController@delete')->name('userDelete');
Route::post('/user/destroy', 'UserController@destroy')->name('userDestroy');
// POST
Route::get('/post/index', 'PostController@index')->name('postIndex');
Route::get('/post/create', 'PostController@create')->name('postCreate');
Route::post('/post/store', 'PostController@store')->name('postStore');
Route::get('/post/edit/{id}', 'PostController@edit')->name('postEdit');
Route::post('/post/update/{id}', 'PostController@update')->name('postUpdate');
Route::get('/post/show/{id}', 'PostController@show')->name('postShow');
Route::get('/post/delete/{id}', 'PostController@delete')->name('postDelete');
Route::post('/post/destroy/{id}', 'PostController@destroy')->name('postDestroy');
// ADVERT
Route::get('/advert/index', 'AdvertController@index')->name('advertIndex');
Route::get('/advert/create', 'AdvertController@create')->name('advertCreate');
Route::post('/advert/store', 'AdvertController@store')->name('advertStore');
Route::get('/advert/edit/{id}', 'AdvertController@edit')->name('advertEdit');
Route::post('/advert/update/{id}', 'AdvertController@update')->name('advertUpdate');
Route::get('/advert/show/{id}', 'AdvertController@show')->name('advertShow');
Route::get('/advert/delete/{id}', 'AdvertController@delete')->name('advertDelete');
Route::post('/advert/destroy/{id}', 'AdvertController@destroy')->name('advertDestroy');
// VERIFY
Route::get('/verify/createedit/{user_id}', 'VerifyController@createedit')->name('verifyCreateedit');
Route::post('/verify/store', 'VerifyController@store')->name('verifyStore');
Route::post('/verify/update', 'VerifyController@update')->name('verifyUpdate');
Route::get('/verify/index', 'VerifyController@index')->name('verifyIndex');
Route::get('/verify/delete/{user_id}', 'VerifyController@delete')->name('verifyDelete');
Route::post('/verify/destroy', 'VerifyController@destroy')->name('verifyDestroy');
// VERIFY Profil
Route::get('/verify/edit/profil/{user_id_from}', 'VerifyController@editProfil')->name('verifyEditProfil');
Route::post('/verify/update/profil', 'VerifyController@updateProfil')->name('verifyUpdateProfil');
Route::get('/verify/delete/profil/{user_id_from}', 'VerifyController@deleteProfil')->name('verifyDeleteProfil');
Route::post('/verify/destroy/profil', 'VerifyController@destroyProfil')->name('verifyDestroyProfil');
