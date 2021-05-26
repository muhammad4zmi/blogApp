<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		return view('/front/index');
	}

	// public function register()
	// {
	// 	return view('auth/register');
	// }
	// public function admin()
	// {
	// 	return view('admin/index');
	// }
}
