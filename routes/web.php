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

//============================后台路由部分============================

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

// 广告管理
// 1.友情链接
Route::get('/admin/ad/index', 'Admin\AdController@index');
Route::get('/admin/ad/add', 'Admin\AdController@add');
Route::post('/admin/ad/insert', 'Admin\AdController@insert');
Route::get('/admin/ad/edit/{id}', 'Admin\AdController@edit');
Route::post('/admin/ad/update/{id}', 'Admin\AdController@update');
Route::get('/admin/ad/delete/{id}', 'Admin\AdController@delete');

// 2.热门场地
Route::get('/admin/re/index', 'Admin\ReController@index');
Route::get('admin/re/add', 'Admin\ReController@add');
Route::post('/admin/re/insert', 'Admin\ReController@insert');
Route::get('/admin/re/edit/{id}', 'Admin\ReController@edit');
Route::post('/admin/re/update/{id}', 'Admin\ReController@update');
Route::get('/admin/re/delete/{id}', 'Admin\ReController@delete');

// 评论管理
Route::get('/admin/comment/index', 'Admin\CommentController@index');
Route::get('/admin/comment/delete/{id}', 'Admin\CommentController@delete');











//============================前台路由部分============================

//前台首页加载
Route::get('/home/index', 'Home\IndexController@index');

//前台用户注册 登录 退出
Route::post('/home/register', 'Home\RegisterController@insert');
Route::get('/home/register/ajax', 'Home\RegisterController@ajax');
Route::post('/home/login', 'Home\LoginController@login');
Route::get('/home/logout', 'Home\LoginController@logout');

// 前台添加商户
Route::get('/home/merchant/register', 'Home\MerchantController@register');
Route::post('/home/merchant/insert', 'Home\MerchantController@insert');
Route::get('/home/merchant/fill', 'Home\MerchantController@fill');
Route::get('/home/merchant/attest', 'Home\MerchantController@attest');
Route::get('/home/merchant/complete', 'Home\MerchantController@complete');
Route::post('/home/merchant/ajaxrename', 'Home\MerchantController@ajaxrename');

//前台添加我的订单
Route::get('/home/order/myOrder', 'Home\OrderController@index');


// 前台我的开场
Route::get('home/personal/index', 'Home\PersonalController@index');
Route::post('home/personal/insert', 'Home\PersonalController@insert');

// 前台我的开场修改密码
Route::get('home/personal/amend', 'Home\PersonalController@amend');
Route::get('/home/personal/ajax', 'Home\PersonalController@ajax');

// 前台我的开场里面的收藏夹
Route::get('home/personal/collect', 'Home\PersonalController@collect');
Route::get('home/personal/merchant', 'Home\PersonalController@merchant');


