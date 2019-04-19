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
Route::get('/buyers', 'PagesController@buyers')->name('buyers');
Route::get('/sellers', 'PagesController@sellers')->name('sellers');

// Listings
Route::get('/for-sale-by-owner', 'ListingsController@index')->name('listings.index')->middleware('auth');
Route::get('/for-sale-by-owner/{listing}', 'ListingsController@show')->name('listings.show')->middleware('auth');
Route::get('/search', 'ListingsController@search')->name('listings.search')->middleware('auth');

// Cities
Route::get('/cities', 'CitiesController@index')->name('cities.index')->middleware('auth');
Route::get('/homes-for-sale-by-owner/{city}', 'CitiesController@show')->name('cities.show')->middleware('auth');

// Leads
Route::post('seller-leads', 'SellerLeadsController@store')->name('seller-leads.store');
//Route::resource('seller-leads', 'SellerLeadsController')->middleware('auth');

// Mailchimp
Route::resource('subscribe', 'SubscribersController');

// Auth
Auth::routes();
Route::get('/my-account', 'UsersController@index')->name('account')->middleware('auth');
