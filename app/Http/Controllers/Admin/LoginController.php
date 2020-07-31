<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录
	public function login(){
		return view("/Admin/Login/login");
	}
	//注册
	public function register(){
		return view("/Admin/Login/register");
	}


}
