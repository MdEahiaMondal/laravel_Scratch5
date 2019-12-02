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

Route::get('/', 'Frontend\HomeController@index')->name('home');


// Frontend Controller
Route::get('register', 'Frontend\AuthCountroller@showRegisterForm')->name('register');
Route::post('register', 'Frontend\AuthCountroller@processRegister')->name('register.store');
Route::get('login', 'Frontend\AuthCountroller@showLoginForm')->name('login');
Route::post('login', 'Frontend\AuthCountroller@loginCheck')->name('login.check');
Route::get('logout', 'Frontend\AuthCountroller@logout')->name('logout');



// BackendController
Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');
Route::resource('categories', 'Backend\CategoryController');
Route::resource('posts', 'Backend\PostController');

