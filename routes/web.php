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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();

// login/logout routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// // registration routes 
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// // password reset routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset')->name('password.request');

Route::get('/', 'HomeController@index')->name('home');
Route::get('play-game/{id}', 'PlayGameController@playGame');
Route::get('account-info/{id}', ['as' => 'accountInfo', 'uses' => 'CustomerController@detail']);
Route::get('change-password/{id}', ['as' => 'changePassword', 'uses' => 'CustomerController@changePassword']);
Route::patch('change-password/{id}', ['as' => 'changePassword', 'uses' => 'CustomerController@ExeChangePassword']);
Route::get('change-email/{id}', ['as' => 'changeEmail', 'uses' => 'CustomerController@changeEmail']);
Route::patch('change-email/{id}', ['as' => 'changeEmail', 'uses' => 'CustomerController@ExeChangeEmail']);
Route::get('change-phone/{id}', ['as' => 'changePhone', 'uses' => 'CustomerController@changePhone']);
Route::patch('change-phone/{id}', ['as' => 'changePhone', 'uses' => 'CustomerController@ExeChangePhone']);