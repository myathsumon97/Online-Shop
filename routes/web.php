<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/e', function () {
    return view('frontened.example');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout');

Route::resource('/login', 'LoginController');

Route::resource('/register', 'RegisterController');

Route::resource('/category', 'CategoryController');

Route::get('/category/destroy/{id}','CategoryController@destroy');

Route::resource('/product', 'ProductController');

Route::get('/online/login','FrontenedController@login');

Route::post('/store/login', 'FrontenedController@loginStore');

Route::post('/store/register', 'FrontenedController@registerStore');

Route::get('/index','FrontenedController@index');

Route::get('/contact','FrontenedController@contact');

Route::get('/product-list','FrontenedController@product');

Route::get('/add-to-cart', 'FrontenedController@AddtoCart');
