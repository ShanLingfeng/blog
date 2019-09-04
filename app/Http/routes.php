<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//前台路由
Route::get('/','Home\IndexController@index');
//列表
Route::get('/cate/{cate_id}','Home\IndexController@cate');
//文章
Route::get('/a/{art_id}','Home\IndexController@article');

//后台路由
//登录路由
Route::any('admin/login','Admin\LoginController@login');
//创建验证码路由
Route::get('admin/code','Admin\LoginController@code');

//进入首页时候，首页的所有路由，都需要经过登录中间件过滤，意思是：在使用这些路由时候，都需要满足中间件的条件才能使用
Route::group(['middleware'=>['admin/login'],'prefix'=>'admin','namespace'=>'Admin'],function (){
//首页路由
    Route::get('index','IndexController@index'); //只有将要进入首页时候，需要经过中间件过滤一下
//详情页
    Route::get('info','IndexController@info');
    //修改密码
    Route::any('pass','IndexController@pass');
//退出
    Route::get('quit','LoginController@quit');
        //文章分类资源路由
    Route::resource('category','CategoryController');
//    分类排序
    Route::any('cate/changeorder','CategoryController@changeOrder');
    //文章路由
    Route::resource('article','ArticleController');
    //文章下载
    Route::any('word/{art_id}','CommonController@word');
    //文章下载
    Route::any('picture/{art_id}','CommonController@picture');
    //上传图片
    Route::any('upload','CommonController@upload');
    //友情链接
    Route::resource('links','LinkController');
    // 友情链接排序
    Route::any('links/changeorder','LinkController@changeOrder');
    //自定义导航
    Route::resource('navs','NavsController');
    // 自定义导航排序
    Route::any('navs/changeorder','NavsController@changeOrder');

    //网站配置
    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');
});
//
////文章分类资源路由
//Route::resource('admin/category','Admin\CategoryController');
////    分类排序
//Route::any('admin/cate/changeorder','Admin\CategoryController@changeOrder');