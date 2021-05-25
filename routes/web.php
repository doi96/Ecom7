<?php

use App\Mail\Mail;
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
Route::get('product-category/{id}','UserController@getProductbyCategory')->name('product.category');
Route::get('product-all','UserController@allProduct')->name('product.all');
Route::get('user-product-detail/{id}','UserController@productDetail')->name('user.product.detail');

// About route
Route::get('user-about','UserController@abouts')->name('user.about');

// Post route
Route::get('user-post-{type}','UserController@getPost')->name('user.post');
Route::get('user-post-{type}-read/{id}','UserController@readPost')->name('user.post.read');

// Search post
Route::match(['get','post'],'user-search-post','UserController@searchPost')->name('user.search.post');

// Search product
Route::match(['get','post'],'user-search-product','UserController@searchProduct')->name('user.search.product');

// Distribution route
Route::get('user-distributor-list','UserController@viewDistributor')->name('user.distributor');

Route::get('user-distribution-list','UserController@viewDistribution')->name('user.distribution');
Route::match(['get','post'],'user-distributor-search','UserController@searchDistributor')->name('user.distributor.search');

//Send Mail contact
Route::get('user-contact','ContactController@contact')->name('user.contact');
Route::post('user-contact-sendmail', 'ContactController@contactPost')->name('user.contactPost');

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
        Route::post('admin-slider-getType/','Auth\AdminController@getTypeSlide')->name('admin.slider.getType');

        //Product route
        Route::get('admin-product','ProductController@index')->name('admin.product');
        Route::get('admin-product-create','ProductController@createProduct')->name('admin.product.create');
        Route::get('admin-product-read/{id}','ProductController@readProduct')->name('admin.product.read');
        Route::get('admin-product-edit/{id}','ProductController@editProduct')->name('admin.product.edit');
        Route::post('admin-product-update/{id}','ProductController@updateProduct')->name('admin.product.update');
        Route::post('admin-product-store','ProductController@storeProduct')->name('admin.product.store');

        //Post route
        Route::get('admin-post-all','Auth\AdminController@getallPost')->name('admin.post.all');
        Route::get('admin-post-create','Auth\AdminController@createPost')->name('admin.post.create');
        Route::get('admin-post-read/{id}','Auth\AdminController@readPost')->name('admin.post.read');
        Route::get('admin-post-delete/{id}','Auth\AdminController@deletePost')->name('admin.post.delete');
        Route::get('admin-post-edit/{id}','Auth\AdminController@editPost')->name('admin.post.edit');
        Route::post('admin-post-update/{id}','Auth\AdminController@updatePost')->name('admin.post.update');
        Route::post('admin-post-store','Auth\AdminController@storePost')->name('admin.post.store');

        // Distribution route
        Route::get('admin-distributor-index','Auth\AdminController@distributorIndex')->name('admin.distributor');
        Route::get('admin-distributor-add','Auth\AdminController@addDistributor')->name('admin.distributor.add');
        Route::post('admin-distributor-store','Auth\AdminController@storeDistributor')->name('admin.distributor.store');
        Route::post('admin-distributor-update/{id}','Auth\AdminController@updateDistributor')->name('admin.distributor.update');
        Route::get('admin-distributor-delete/{id}','Auth\AdminController@deleteDistributor')->name('admin.distributor.delete');

        // Distribution policy
        Route::get('admin-distribution-returnpolicy','Auth\AdminController@retrunPolicy')->name('admin.distribution.return');
        Route::get('admin-distribution-policy-create','Auth\AdminController@createPolicy')->name('admin.distribution.policy.create');
        Route::post('admin-distribution-policy-store','Auth\AdminController@storePolicy')->name('admin.distribution.policy.store');
        Route::get('admin-distribution-policy-read/{id}','Auth\AdminController@readPolicy')->name('admin.distribution.policy.read');
        Route::get('admin-distribution-policy-delete/{id}','Auth\AdminController@deletePolicy')->name('admin.distribution.policy.delete');
        Route::post('admin-distribution-policy-update/{id}','Auth\AdminController@updatePolicy')->name('admin.distribution.policy.update');
        Route::get('admin-distribution-policy-edit/{id}','Auth\AdminController@editPolicy')->name('admin.distribution.policy.edit');

    });

});

