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
Route::get('update-info/{id}', ['as' => 'updateInfo', 'uses' => 'CustomerController@updateInfo']);
Route::patch('update-info/{id}', ['as' => 'updateInfo', 'uses' => 'CustomerController@ExeUpdateInfo']);

Route::get('napcard/{name}/edit', ['as' => 'user.napcard.edit', 'uses' => 'CustomerController@napcard']);
Route::post('napcard/{name}/update', ['as' => 'user.napcard.update', 'uses' => 'CustomerController@updateNapCard']);

//Admin session
route::get('/admin', 'AdminController@getLogin')->name('admin');
route::post('/admin', 'AdminController@postLogin');

Route::group(['middleware' => ['admin']], function () {
//   Route::get('admin/users/{cAccName}/napcard',  ['as' => 'management.user.napcard', 'uses' => 'ManagementController@userNapcardEdit']);
//   Route::patch('admin/users/{user}/napcard',  ['as' => 'management.user.napcard', 'uses' => 'ManagementController@userNapcardUpdate']);

  Route::get('admin/users/{name}/show',  ['as' => 'management.user.show', 'uses' => 'ManagementController@userDetail']);
  Route::get('admin/users/{name}/edit',  ['as' => 'management.user.edit', 'uses' => 'ManagementController@userEdit']);
  Route::patch('admin/users/{user}/update',  ['as' => 'management.user.update', 'uses' => 'ManagementController@userUpdate']);
  Route::get('admin/list_users', ['as' => 'users', 'uses' => 'ManagementController@listUser']);
  Route::post('admin/list_users', ['as' => 'users', 'uses' => 'ManagementController@listUser']);

  Route::get('admin/chkms', ['as' => 'management.chkm.list', 'uses' => 'ManagementController@chkmList']);
  Route::get('admin/chkms/{chkm}/edit', ['as' => 'management.chkm.edit', 'uses' => 'ManagementController@chkmEdit']);
  Route::patch('admin/chkms/{chkm}/update', ['as' => 'management.chkm.update', 'uses' => 'ManagementController@chkmUpdate']);

//   Route::get('admin/thongkenap', ['as' => 'management.thongkenap.list', 'uses' => 'ManagementController@thongKeNap']);
//   Route::post('admin/thongkenap', ['as' => 'management.thongkenap.list', 'uses' => 'ManagementController@thongKeNap']);

//   Route::get('admin/lognaptien', ['as' => 'management.lognaptien.list', 'uses' => 'ManagementController@logNapTien']);
//   Route::post('admin/lognaptien', ['as' => 'management.lognaptien.list', 'uses' => 'ManagementController@logNapTien']);
//   Route::get('admin/logquanlytaikhoan', ['as' => 'management.logquanlytaikhoan.list', 'uses' => 'ManagementController@logQuanLyTaiKhoan']);
//   Route::post('admin/logquanlytaikhoan', ['as' => 'management.logquanlytaikhoan.list', 'uses' => 'ManagementController@logQuanLyTaiKhoan']);

//   Route::get('admin/lichsuruttien', ['as' => 'management.lichsuruttien.list', 'uses' => 'ManagementController@lichsuruttien']);
//   Route::post('admin/lichsuruttien', ['as' => 'management.lichsuruttien.list', 'uses' => 'ManagementController@lichsuruttien']);
});
//End admin session