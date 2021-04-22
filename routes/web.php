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
    return view('users.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::middleware('auth:admin')->group(function(){

        Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');

        //Category
        Route::get('category', 'CategoryController@index')->name('admin.category.index');
        Route::get('create-category', 'CategoryController@create')->name('admin.category.create');
        Route::post('store-category', 'CategoryController@store')->name('admin.category.store');
        Route::get('delete-category/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
        Route::post('edit-category/{id}', 'CategoryController@edit')->name('admin.category.edit');

        //Admin profile
        Route::get('admin-profile','Auth\AdminController@profile')->name('admin.profile');
        Route::post('admin-avatar','Auth\AdminController@avatar')->name('admin.avatar');

    });

});

