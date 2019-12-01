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
    return view('frontend.home');
});


// Frontend Controller
Route::get('register', 'Frontend\AuthCountroller@showRegisterForm')->name('register');
Route::post('register', 'Frontend\AuthCountroller@processRegister')->name('register.store');
Route::get('login', 'Frontend\AuthCountroller@showLoginForm')->name('login');



