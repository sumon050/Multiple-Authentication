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
//Route::post('/user/logout','Auth\LoginController@userlogout')->name('user.logout');


Route::prefix('/admin')->group(function() {
	Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Admin\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	Route::get('/logout','Admin\AdminLoginController@logout')->name('admin.logout');

	//password Reset Routes
	Route::post('/password/email','Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset','Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset','Admin\AdminResetPasswordController@reset')->name('admin. password.update');
	Route::get('/password/reset/{token}','Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
