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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activity', 'ActivityController@index');
Route::get('/employees', 'EmployeesController@index');
Route::get('/profile', 'ProfileController@index');
Route::get('/invite-new', 'InvitesController@new');
Route::get('/messages', 'MessagesController@index');
Route::get('/payments', 'PaymentsController@index');
Route::get('/profile-complete', 'ProfileController@complete');
Route::get('/account', 'AccountController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/saveComplete', 'ProfileController@saveComplete')->name('saveComplete');
Route::post('/inviteNew', 'InvitesController@inviteNew')->name('inviteNew');
