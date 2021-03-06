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
Route::get('/profile', 'ProfileController@index')->middleware('ProfileComplete')->name('Profile');
Route::get('/messages', 'MessagesController@index')->middleware('ProfileComplete');
Route::get('/payments', 'PaymentsController@index')->middleware('ProfileComplete');
Route::get('/profile-complete', 'ProfileController@complete')->middleware('PaymentComplete');
Route::get('/payment-complete', 'PaymentsController@complete')->name('payment-complete');
Route::get('/invite-new', 'InvitesController@new')->middleware('ProfileComplete')->name('invite-new');
Route::get('/account_redirect', 'PaymentsController@redirect');
Route::get('/verify_failure', 'PaymentsController@verifyFailure');
Route::get('/verify_success', 'PaymentsController@verifySuccess');
Route::get('/account', 'AccountController@index')->middleware('ProfileComplete');
Route::get('/qrcode', 'AccountController@qrcode')->middleware('ProfileComplete');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/saveComplete', 'ProfileController@saveComplete')->name('saveComplete');
Route::post('/savePayment', 'PaymentsController@savePayment')->name('savePayment');
Route::post('/updateProfile', 'ProfileController@update')->name('updateProfile');
Route::post('/inviteNew', 'InvitesController@inviteNew')->name('inviteNew')->middleware('ProfileComplete');
Route::post('/remove_staff', 'EmployeesController@removeStaff')->name('remove_staff')->middleware('ProfileComplete');
Route::post('/create_stripe_account', 'PaymentsController@createAccount')->name('create_stripe_account');
Route::post('/verify_stripe_account', 'PaymentsController@verifyAccount')->name('verify_stripe_account');
