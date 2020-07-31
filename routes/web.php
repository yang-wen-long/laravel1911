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
   // phpinfo();
    return view('welcome');
});
// float:left
// display:block
Route::get("/user/login","Admin\LoginController@login");
Route::get("/user/register","Admin\LoginController@register");






































Route::get('/php', function () {
     phpinfo();
});
Route::get("/usr/info","Api\TestController@info");
Route::get("/Token","Api\TestController@index");
Route::post("/user/Login","Api\TestController@Login");
//对称加密调用接口
Route::post("/user/proensll","Api\TestController@proensll");
//非对称加密
Route::get("/user/aesc","Api\TestController@aesc");

//标签验证
Route::get("/user/desc","Api\TestController@desc");
//用私钥加密
Route::get("/user/desc1","Api\TestController@desc1");
//非对称加密回应
Route::post("/user/desc2","Api\TestController@desc2");
//header传参
Route::post("/user/header","Api\TestController@header");




