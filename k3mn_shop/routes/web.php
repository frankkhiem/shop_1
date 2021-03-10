<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route đăng nhập vào Google
Route::get('/login/google', 'Auth\SocialAuthController@loginGoogle')->name('loginGoogle');
Route::get('/login/google/callback', 'Auth\SocialAuthController@loginGoogleCallback')->name('googleCallback');

// Xử lý sau khi đăng nhập
Route::get('/admin', 'Admin\AdminController@index')
        ->middleware('admin')
        ->name('adminPage');
Route::get('/profile', 'HomeController@index')
        ->middleware('user')
        ->name('profilePage');

// Route xử lý chức năng của admin
Route::prefix('admin')->middleware('admin')->group(function () {
    // Route quản trị danh mục sản phẩm
    Route::resource(
        '/category',
        'Admin\AdminCategoryController',
        [
            'names' => 'adminCategory'
        ]
    );
    // Route quản trị sản phẩm
    Route::resource(
        '/product',
        'Admin\AdminProductController',
        [
            'names' => 'adminProduct'
        ]
    );

    // Route::get('/category', 'Admin\AdminCategoryController@index')->name('adminCategoryIndex');
});


//       
Route::get('/home', 'HomeController@index')->name('home');
