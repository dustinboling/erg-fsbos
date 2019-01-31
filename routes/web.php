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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::get('/listings', function () {

    return view('listings')->withListings([
        [
            'id' => 'ERG-123',
            'price' => '200000',
            'baths' => 2,
            'beds' => 1
        ],
        [
            'id' => 'ERG-124',
            'price' => '300000',
            'baths' => 3,
            'beds' => 2
        ],
        [
            'id' => 'ERG-125',
            'price' => '400000',
            'baths' => 4,
            'beds' => 3
        ]
    ]);
});