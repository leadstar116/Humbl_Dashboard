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
Route::get('/faq', 'HelpController@faq');
Route::get('/invites', 'InvitesController@index');
Route::get('/campaigns', 'CampaignsController@index');
Route::get('/proof', 'ProofController@index');
Route::get('/messages', 'MessagesController@index');
Route::get('/payments', 'PaymentsController@index');
Route::get('/profile-complete', 'ProfileController@complete');
Route::get('/account', 'AccountController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/saveComplete', 'ProfileController@saveComplete')->name('saveComplete');
