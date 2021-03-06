
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
    return view('home.index.index');
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


		// 后台商户审核管理
		Route::get('/admin/merchant/index', 'Admin\MerchantController@index');
		Route::get('/admin/merchant/state/{id}/{status}', 'Admin\MerchantController@state');
		Route::get('/admin/merchant/check', 'Admin\MerchantController@check');
		Route::get('/admin/merchant/merinfo/{id}', 'Admin\MerchantController@merinfo');
		Route::post('/admin/merchant/noreason', 'Admin\MerchantController@noreason');
		Route::get('/admin/merchant/pass/{uid}', 'Admin\MerchantController@pass');
		Route::get('/admin/merchant/loser', 'Admin\MerchantController@loser');
		Route::get('/admin/merchant/lookinfo/{id}', 'Admin\MerchantController@lookinfo');
		Route::get('/admin/merchant/merdelete/{id}', 'Admin\MerchantController@merdelete');

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

		//普通用户信息管理列表
		Route::get('/admin/user/index', 'Admin\UserController@index');
		Route::get('/admin/user/state/{id}/{status}', 'Admin\UserController@state');

		//订单管理列表
		Route::get('/admin/order/index', 'Admin\OrderController@index');

		//评论管理
		Route::get('/admin/comment/index', 'Admin\CommentController@index');

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


//============================前台路由部分============================

//前台首页加载
Route::get('/home/index', 'Home\IndexController@index');

//前台用户注册 登录 退出
Route::post('/home/register', 'Home\RegisterController@insert');
Route::get('/home/register/ajax', 'Home\RegisterController@ajax');

// Route::get('/home/register/checkPhone', 'Home\RegisterController@checkPhone');

Route::post('/home/login', 'Home\LoginController@login');
Route::get('/home/logout', 'Home\LoginController@logout');



// ==================================== 前台添加商户及商户登录 ========================================
Route::get('/home/merchant/register', 'Home\MerchantController@register');
Route::post('/home/merchant/ajaxrename', 'Home\MerchantController@ajaxrename');
Route::get('/home/merchant/ajaxGetCode', 'Home\MerchantController@ajaxGetCode');
Route::get('/home/merchant/ajaxverify', 'Home\MerchantController@ajaxverify');
Route::get('/home/merchant/ajaxcity', 'Home\MerchantController@ajaxcity');
Route::post('/home/merchant/ajaxback', 'Home\MerchantController@ajaxback');
Route::post('/home/merchant/insert', 'Home\MerchantController@insert');
// 路由群组访问中间件
Route::group(['middleware' => 'merchantlogin'], function()
	{
		Route::get('/home/merchant/fill/{id}', 'Home\MerchantController@fill');
		Route::get('/home/merchant/back/{id}', 'Home\MerchantController@back');
		Route::post('/home/merchant/add', 'Home\MerchantController@add');
		Route::post('/home/merchant/userUpdate', 'Home\MerchantController@userUpdate');
		Route::get('/home/merchant/fillEdit/{uid}', 'Home\MerchantController@fillEdit');
		Route::post('/home/merchant/fillUpdate/{uid}', 'Home\MerchantController@fillUpdate');
		Route::get('/home/merchant/attest/{uid}', 'Home\MerchantController@attest');
		Route::get('/home/merchant/checked/{uid}', 'Home\MerchantController@checked');
		Route::get('/home/merchant/notchecked/{uid}', 'Home\MerchantController@notchecked');
	});
// ===================================================================================================



//前台添加我的订单
Route::get('/home/order/myOrder', 'Home\OrderController@index');
Route::post('/home/order/add', 'Home\OrderController@add');

// 购物车
Route::get('/home/shop', 'Home\ShopController@index');
Route::get('/home/shop/ajax', 'Home\ShopController@ajax');

// Route::get('/home/shop', 'Home\ShopController@index');


// 前台我的开场
Route::get('home/personal/index', 'Home\PersonalController@index');
Route::post('home/personal/insert', 'Home\PersonalController@insert');
Route::get('home/personal/collect', 'Home\PersonalController@collect');
Route::get('home/personal/merchant', 'Home\PersonalController@merchant');
Route::get('home/personal/updata', 'Home\PersonalController@updata');
Route::get('home/personal/amend', 'Home\PersonalController@amend');
Route::post('/home/personal/add', 'Home\PersonalController@add');

// 前台修改密码ajax
// Route::get('home/personal/ajax', 'Home\PersonalController@ajax');

//前台搜索
Route::get('/home/search/general', 'Home\SearchController@search');
Route::get('/home/search/super', 'Home\SearchController@superSearch');
Route::get('/home/search/ajax', 'Home\SearchController@ajax');
Route::get('/home/search/dq', 'Home\SearchController@dq');

//前台详情
Route::get('/home/detail/{id}', 'Home\DetailController@index');
Route::get('/home/details/ajax', 'Home\DetailController@ajax');
Route::get('/home/details/insert', 'Home\DetailController@insert');

//前台收藏 与 取消收藏
Route::post('/home/collect', 'Home\SearchController@collect');

// 前台评论页
Route::get('/home/pingl/index/{id}', 'Home\PinglController@index');
Route::post('/home/pingl/insert', 'Home\PinglController@insert');

//
Route::get('/home/login/ajax', 'Home\LoginController@ajax');

//
Route::get('/home/register/sendEmail', 'Home\RegisterController@sendEmail');



//======================================= 商户中心 =============================================
// index 主页
Route::get('/tenant/index', 'Tenant\IndexController@index');

// 路由群组访问中间件
Route::group(['middleware' => 'tenantlogin'], function()
	{
		// logout 退出登录
		Route::get('/tenant/logout', 'Tenant\LoginController@logout');

		// detail 基本信息
		Route::get('/tenant/detail/complete', 'Tenant\DetailController@complete');
		Route::post('/tenant/detail/add', 'Tenant\DetailController@add');
		Route::get('/tenant/detail/edit/{uid}', 'Tenant\DetailController@edit');
		Route::post('/tenant/detail/update/{uid}', 'Tenant\DetailController@update');
		Route::get('/tenant/detail/addImg/{uid}', 'Tenant\DetailController@addImg');
		Route::post('/tenant/detail/insertImg/{uid}', 'Tenant\DetailController@insertImg');
		Route::get('/tenant/detail/editImg/{uid}', 'Tenant\DetailController@editImg');
		Route::post('/tenant/detail/updateImg/{uid}', 'Tenant\DetailController@updateImg');
		Route::post('tenant/detail/update/{uid}', 'Tenant\DetailController@update');

		// mansite 场地管理
		Route::get('/tenant/mansite/add', 'Tenant\MansiteController@add');
		Route::post('/tenant/mansite/insert/{uid}', 'Tenant\MansiteController@insert');
		Route::get('/tenant/mansite/show/{uid}', 'Tenant\MansiteController@show');
		Route::get('/tenant/mansite/add', 'Tenant\MansiteController@add');
		Route::post('/tenant/mansite/insert/{uid}', 'Tenant\MansiteController@insert');
		Route::get('/tenant/mansite/show/{uid}', 'Tenant\MansiteController@show');
		Route::get('/tenant/mansite/siteAdd', 'Tenant\MansiteController@siteAdd');
		Route::post('/tenant/mansite/siteInsert/{uid}', 'Tenant\MansiteController@siteInsert');
		Route::get('/tenant/mansite/siteShow/{uid}', 'Tenant\MansiteController@siteShow');
		Route::get('/tenant/mansite/siteEdit/{id}', 'Tenant\MansiteController@siteEdit');
		Route::post('/tenant/mansite/siteUpdate/{id}', 'Tenant\MansiteController@siteUpdate');
		Route::get('/tenant/mansite/siteDelete/{id}', 'Tenant\MansiteController@siteDelete');
		Route::get('/tenant/mansite/guestAdd', 'Tenant\MansiteController@guestAdd');
		Route::post('/tenant/mansite/guestInsert/{uid}', 'Tenant\MansiteController@guestInsert');
		Route::get('/tenant/mansite/guestShow/{uid}', 'Tenant\MansiteController@guestShow');
		Route::get('/tenant/mansite/guestEdit/{id}', 'Tenant\MansiteController@guestEdit');
		Route::post('/tenant/mansite/guestUpdate/{id}', 'Tenant\MansiteController@guestUpdate');
		Route::get('/tenant/mansite/guestDelete/{id}', 'Tenant\MansiteController@guestDelete');
		Route::get('/tenant/mansite/restAdd', 'Tenant\MansiteController@restAdd');
		Route::post('/tenant/mansite/restInsert/{uid}', 'Tenant\MansiteController@restInsert');
		Route::get('/tenant/mansite/restShow/{uid}', 'Tenant\MansiteController@restShow');
		Route::get('/tenant/mansite/restEdit/{id}', 'Tenant\MansiteController@restEdit');
		Route::post('/tenant/mansite/restUpdate/{id}', 'Tenant\MansiteController@restUpdate');
		Route::get('/tenant/mansite/restDelete/{id}', 'Tenant\MansiteController@restDelete');
		Route::get('/tenant/mansite/avAdd', 'Tenant\MansiteController@avAdd');
		Route::post('/tenant/mansite/avInsert/{uid}', 'Tenant\MansiteController@avInsert');
		Route::get('/tenant/mansite/avShow/{uid}', 'Tenant\MansiteController@avShow');
		Route::get('/tenant/mansite/avEdit/{id}', 'Tenant\MansiteController@avEdit');
		Route::post('/tenant/mansite/avUpdate/{id}', 'Tenant\MansiteController@avUpdate');
		Route::get('/tenant/mansite/avDelete/{id}', 'Tenant\MansiteController@avDelete');

		// trade 交易管理
		Route::get('/tenant/trade/order', 'Tenant\TradeController@order');
	});	
// =======================================================================================================

