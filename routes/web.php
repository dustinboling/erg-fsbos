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
Route::get('/home', 'PagesController@home')->name('home')->middleware('auth');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/services', 'PagesController@services')->name('services');

Route::resource('subscribe', 'SubscribersController');
Route::resource('homes', 'ListingsController')->middleware('auth');
Route::resource('cities', 'CitiesController')->middleware('auth');

Auth::routes();
Route::get('/my-account', 'UsersController@index')->name('account');
