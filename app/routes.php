<?php

/*
|--------------------------------------------------------------------------
| アプリケーションルート
|--------------------------------------------------------------------------
|
| このファイルでアプリケーションの全ルートを定義します。
| 方法は簡単です。対応するURIをLaravelに指定してください。
| そしてそのURIに対応する実行コードをクロージャーで指定します。
|
*/

Route::get('/', array('as' => 'home', 'uses' => function()
{
	return View::make('home');
}));

// User Auth
Route::get('/signup', array('as' => 'signup', 'uses' => 'AuthController@showSignUp'));
Route::post('/signup', 'AuthController@execSignUp');
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
Route::post('/login', 'AuthController@execLogin');
