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
// front controller
Route::get('/', 'FrontController@index')->name('front');
Route::get('/list/{ctg_id}', 'FrontController@Listings')->name('detail');
// end front controller

Auth::routes(['register' => false]);

// Customer part
Route::group(['prefix'=>'user'], function(){
    Route::get('/', 'HomeController@index')->name('user.home');
    // ajax part for getting category from group
    Route::post('/cateogry', 'UserController@getCategory')->name('category');
    // adding listing.
    Route::post('/listing', 'UserController@addListing')->name('add.listing');

});
// Admin part
Route::group(['prefix'=>'admin', 'middleware'=>'is_admin'], function(){
    Route::get('home', 'HomeController@adminHome')->name('admin.home');
    Route::post('add-customer', 'AdminController@addCustomer')->name('add.customer');
    // group add
    Route::get('view-category', 'AdminController@viewCategory')->name('admin.category');
    Route::post('add-group', 'AdminController@addGroup')->name('add.group');
    Route::get('delete-group/{group_id}', 'AdminController@deleteGroup')->name('delete.group');
    // cateogry add
    Route::get('view-category/add-category/{group_id}', 'AdminController@addCategory')->name('view.category');
    Route::post('view-category/add-category', 'AdminController@storeCategory')->name('add.category');
    Route::get('delete-category/{ctg_id}', 'AdminController@deleteCategory')->name('delete.category');
    // pedding listings
    Route::get('view-pendding-listings', 'AdminController@viewPendingListings')->name('view.pending');
});
// cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});