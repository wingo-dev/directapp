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
|B
*/
// front controller
Route::get('/', 'FrontController@index')->name('front');
Route::get('/submission', 'FrontController@submission')->name('submission');
Route::get('/list/{ctg_id}', 'FrontController@Listings')->name('detail');

Route::get('/close', 'FrontController@close')->name('close');
// end front controller

Auth::routes(['register' => false]);

// Customer part
Route::group(['prefix'=>'user'], function(){
    Route::get('/', 'HomeController@index')->name('user.home');
    // ajax part for getting category from group
    Route::post('/cateogry', 'UserController@getCategory')->name('category');
    // adding listing.
    Route::post('/listing', 'UserController@addListing')->name('add.listing');
//    management listings
    Route::get('/management', 'UserController@viewListings')->name('view.listings');
    Route::get('/management/edit/{id}', 'UserController@viewEdit')->name('view.edit.listing');
    Route::post('/management/update', 'UserController@updateListing')->name('update.listing');
    Route::get('/management/delete/{id}', 'UserController@deleteListings')->name('view.listings.delete');
//    pending list
    Route::get('/pending-list', 'UserController@pendingListings')->name('view.pending.listings');

});
// Admin part
Route::group(['prefix'=>'admin', 'middleware'=>'is_admin'], function(){
    Route::get('home', 'HomeController@adminHome')->name('admin.home');
    Route::post('add-customer', 'AdminController@addCustomer')->name('add.customer');
    Route::get('view-customers', 'AdminController@viewCustomers')->name('admin.view.customers');
    Route::get('view-customers/edit/{id}', 'AdminController@editCustomer')->name('admin.edit.customer');
    Route::post('view-customers/update', 'AdminController@updateCustomer')->name('admin.update.customer');
    Route::get('view-customers/delete/{id}', 'AdminController@customerDelete')->name('admin.customer.delete');
    // group add
    Route::get('view-category', 'AdminController@viewCategory')->name('admin.category');
    Route::post('add-group', 'AdminController@addGroup')->name('add.group');
    Route::get('delete-group/{group_id}', 'AdminController@deleteGroup')->name('delete.group');
    // category add
    Route::get('view-category/add-category/{group_id}', 'AdminController@addCategory')->name('view.category');
    Route::post('view-category/add-category', 'AdminController@storeCategory')->name('add.category');
    Route::get('delete-category/{ctg_id}', 'AdminController@deleteCategory')->name('delete.category');
    //listings management
    Route::get('view-listings-management', 'AdminController@viewListings')->name('admin.listings.management');
    Route::get('view-listings-management/edit-listing/{id}', 'AdminController@editListing')->name('admin.listing.edit');
    Route::post('view-listings-management/update', 'AdminController@updateListing')->name('admin.listing.update');
    Route::get('view-listings-management/delete/{id}', 'AdminController@listingDelete')->name('admin.listing.delete');
    // pedding listings
    Route::get('view-pending-listings', 'AdminController@viewPendingListings')->name('view.pending');
            Route::get('approve/{listing_id}', 'AdminController@approveListing')->name('admin.approve');
});
// cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});