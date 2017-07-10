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

// 路由群组访问中间件
Route::group(['middleware' => 'adminlogin'], function()
	{
		// 后台管理员管理
		Route::get('/admin/index', 'Admin\IndexController@index');
		Route::get('/admin/manage/add', 'Admin\ManageController@add');
		Route::post('/admin/manage/insert', 'Admin\ManageController@insert');
		Route::get('/admin/manage/index', 'Admin\ManageController@index');
		Route::get('/admin/manage/edit/{id}', 'Admin\ManageController@edit');
		Route::post('/admin/manage/update/{id}', 'Admin\ManageController@update');
		Route::get('/admin/manage/delete/{id}', 'Admin\ManageController@delete');
		Route::get('/admin/manage/state/{id}/{status}', 'Admin\ManageController@state');
	});

// 后台管理员登录
Route::get('/admin/login', 'Admin\LoginController@login');
Route::post('/admin/dologin', 'Admin\LoginController@doLogin');
Route::get('admin/logout', 'Admin\LoginController@logout');

//后台验证码
Route::get('/kit/captcha/{tmp}', 'Admin\KitController@captcha');


// 后台忘记密码功能
Route::get('/admin/forgot', 'Admin\ForgotController@forgot');
Route::post('/admin/sendEmail', 'Admin\ForgotController@sendEmail');
Route::get('/admin/link/{token}', 'Admin\ForgotController@link');
Route::get('/admin/newpass/{id}', 'Admin\ForgotController@newPass');
Route::get('/admin/info', 'Admin\ForgotController@info');
Route::post('/admin/updatepass', 'Admin\ForgotController@updatePass');

//前台首页加载
Route::get('/home/index', 'Home\IndexController@index');

//前台用户注册
Route::post('/home/register', 'Home\RegisterController@insert');
Route::get('/home/register/ajax', 'Home\RegisterController@ajax');

//前台用户登录
Route::post('/home/login', 'Home\LoginController@login');

//前台用户退出
Route::get('/home/logout', 'Home\LoginController@logout');

// 前台添加商户
Route::get('/home/merchant/register', 'Home\MerchantController@register');
Route::post('/home/merchant/insert', 'Home\MerchantController@insert');
Route::get('/home/merchant/fill', 'Home\MerchantController@fill');
Route::get('/home/merchant/attest', 'Home\MerchantController@attest');
Route::get('/home/merchant/complete', 'Home\MerchantController@complete');
Route::post('/home/merchant/ajaxrename', 'Home\MerchantController@ajaxrename');

// 忘记密码功能
Route::get('/admin/forgot', 'Admin\ForgotController@forgot');
Route::post('/admin/sendEmail', 'Admin\ForgotController@sendEmail');
Route::get('/admin/link/{token}', 'Admin\ForgotController@link');
Route::get('/admin/newpass/{id}', 'Admin\ForgotController@newPass');
Route::get('/admin/info', 'Admin\ForgotController@info');
Route::post('/admin/updatepass', 'Admin\ForgotController@updatePass');





//前台添加我的订单
Route::get('/home/order/myOrder', 'Home\OrderController@index');




