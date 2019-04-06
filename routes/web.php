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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/places', 'PlacesController@index')->name('places');
Route::get('/events', 'EventsController@index')->name('events');

Route::get('/place_details', 'PlacesController@show')->name('place_details');
Route::get('/event_details', 'EventsController@show')->name('event_details');

Route::get('/user_edit', function () {
    return view('users.edit');
})->name('user_edit');

Route::get('/user_changepassword', function () {
    return view('users.changepassword');
})->name('user_changepassword');

Route::get('/user_wishlist', function () {
    return view('users.wishlist');
})->name('user_wishlist');
