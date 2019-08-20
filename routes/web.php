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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('ProfileComplete');
Route::get('/activity', 'ActivityController@index')->middleware('ProfileComplete');
Route::get('/employees', 'EmployeesController@index')->middleware('ProfileComplete');
Route::get('/profile', 'ProfileController@index')->middleware('ProfileComplete');
Route::get('/invite-new', 'InvitesController@new')->middleware('ProfileComplete');
Route::get('/messages', 'MessagesController@index')->middleware('ProfileComplete');
Route::get('/payments', 'PaymentsController@index')->middleware('ProfileComplete');
Route::get('/profile-complete', 'ProfileController@complete');
Route::get('/payment-complete', 'PaymentsController@complete')->middleware('ProfileComplete');
Route::get('/account', 'AccountController@index')->middleware('ProfileComplete');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/saveComplete', 'ProfileController@saveComplete')->name('saveComplete');
Route::post('/updateProfile', 'ProfileController@update')->name('updateProfile');
Route::post('/inviteNew', 'InvitesController@inviteNew')->name('inviteNew')->middleware('ProfileComplete');
