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

Route::group(['middleware' => ['auth', 'cekrole:admin']], 

	function () 
	{
		// Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        Route::get('/home', 'HomeController@index')->name('home');
		Route::resource('/katalog', 'HomeController@katalog');
});

// Auth::routes();

Route::group(['middleware' => ['auth', 'cekrole:user']], 
	function () 
	{
		
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/next', 'HomeController@next')->name('next');
	});

    
    Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	
	// Route::get('home', 'HomeController@index')->name('home');




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
