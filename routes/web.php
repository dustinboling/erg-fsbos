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

Route::prefix('dashboard')->group(function() {
    Route::name('agent.')->group(function () {
        //Route::get('/',             'Agent\DashboardController@index')->name('dashboard');
        Route::get('/', function () { // Temporary until dashboard is finished
            return redirect()->route('agent.leads.index');
        })->name('dashboard');
        Route::get('/register',         'Agent\Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/register',        'Agent\Auth\RegisterController@register');
        Route::get('/login',            'Agent\Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login',           'Agent\Auth\LoginController@login')->name('login.submit');
        Route::get('/logout',           'Agent\Auth\LoginController@logout')->name('logout');
        Route::post('/password/email',       'Agent\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('/password/reset',        'Agent\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/reset',       'Agent\Auth\ResetPasswordController@reset');
        Route::get('/password/reset/{token}','Agent\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::get('/leads',                 'Agent\LeadsController@index')->name('leads.index');
        Route::get('/leads/{user}',          'Agent\LeadsController@show')->name('leads.show');
        Route::get('/listings',              'Agent\ListingsController@index')->name('listings.index');
        Route::get('/listings/{listing}',    'Agent\ListingsController@show')->name('listings.show');
        Route::post('comments/{user}',       'Agent\CommentController@store')->name('comments.store');
    });
});

// Pages
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/contact', 'ContactFormSubmissionsController@create')->name('contact');
Route::post('/contact', 'ContactFormSubmissionsController@store')->name('contact.store');
Route::get('/buyers', 'PagesController@buyers')->name('buyers');
Route::get('/sellers', 'PagesController@sellers')->name('sellers');

// Listings
Route::get('/for-sale-by-owner', 'ListingsController@index')->name('listings.index');
Route::get('/for-sale-by-owner/{listing}', 'ListingsController@show')->name('listings.show');
Route::get('/search', 'ListingsController@search')->name('listings.search');

// Cities
Route::get('/cities', 'CitiesController@index')->name('cities.index');
Route::get('/homes-for-sale-by-owner', function () {
    return redirect()->route('cities.index');
});
Route::get('/homes-for-sale-by-owner/{city}', 'CitiesController@show')->name('cities.show');

// Leads
Route::post('seller-leads', 'SellerLeadsController@store')->name('seller-leads.store');
//Route::resource('seller-leads', 'SellerLeadsController');

// Mailchimp
Route::resource('subscribe', 'SubscribersController');

// Auth
Auth::routes();
Route::resource('users', 'UsersController')->middleware('auth')->only([
    'edit', 'update'
    ]);

