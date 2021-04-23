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

// User routing

Route::get('/','HomeController@index')->name('user.home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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
        Route::post('admin-edit-profile','Auth\AdminController@editProfile')->name('admin.edit.profile');
        Route::get('admin-edit-password','Auth\AdminController@editPassword')->name('admin.edit.password');
        Route::post('admin-change-password','Auth\AdminController@changePassword')->name('admin.change.password');

        //Slide management
        Route::get('admin-slider','Auth\AdminController@slider')->name('admin.slider');
        Route::get('admin-slider-create','Auth\AdminController@createSlider')->name('admin.slider.create');
        Route::post('admin-slider-store','Auth\AdminController@storeSlider')->name('admin.slider.store');
        Route::post('admin-slider-edit/{id}','Auth\AdminController@editSlider')->name('admin.slider.edit');
        Route::get('admin-slider-delete/{id}','Auth\AdminController@deleteSlider')->name('admin.slider.delete');

    });

});

