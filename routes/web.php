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
    return redirect()->route('home');
});

// Pages
Route::get('/home', 'PagesController@home')->name('home')->middleware('auth');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/services', 'PagesController@services')->name('services');

// Listings
Route::get('/for-sale-by-owner', 'ListingsController@index')->name('listings.index');
Route::get('/for-sale-by-owner/{listing}', 'ListingsController@show')->name('listings.show');

// Cities
Route::get('/cities', 'CitiesController@index')->name('cities.index');
Route::get('/homes-for-sale-by-owner/{city}', 'CitiesController@show')->name('cities.show');

Route::resource('subscribe', 'SubscribersController');
//Route::resource('listings', 'ListingsController')->middleware('auth');
//Route::resource('cities', 'CitiesController')->middleware('auth');
Route::resource('leads', 'LeadsController')->middleware('auth');

Auth::routes();
Route::get('/my-account', 'UsersController@index')->name('account');
