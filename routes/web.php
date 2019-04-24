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
#Home pages
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

#Social login
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

#Places page
Route::get('/places/{types}', 'PlacesController@index');
Route::get('/places/{types}/{id}', 'PlacesController@show');
#Add or remove hotels to/from wishlist
Route::post('/places/hotels/{hotel}/wishlists', 'PlacesController@addHotelToWishlist')->name('add.hotel.wishlist');
Route::delete('/places/hotels/{hotel}/wishlists', 'PlacesController@removeHotelFromWishlist')->name('delete.hotel.wishlist');
#Add or remove restaurants to/from wishlist
Route::post('/places/restaurants/{restaurant}/wishlists', 'PlacesController@addRestaurantToWishlist')->name('add.restaurant.wishlist');
Route::delete('/places/restaurants/{restaurant}/wishlists', 'PlacesController@removeRestaurantFromWishlist')->name('delete.restaurant.wishlist');
#Add or remove famous places to/from wishlist
Route::post('/places/famous_places/{famous_place}/wishlists', 'PlacesController@addFamousPlaceToWishlist')->name('add.famous_place.wishlist');
Route::delete('/places/famous_places/{famous_place}/wishlists', 'PlacesController@removeFamousPlaceFromWishlist')->name('delete.famous_place.wishlist');

#Add or remove events to/from wishlist
Route::get('/events', 'EventsController@index');
Route::get('/events/{id}', 'EventsController@show');
Route::post('/events/{event}/wishlists', 'EventsController@addEventToWishlist')->name('add.event.wishlist');
Route::delete('/events/{event}/wishlists', 'EventsController@removeEventFromWishlist')->name('delete.event.wishlist');

#Wishlist show
Route::get('/wishlist', 'WishlistController@index')->name('wishlist');

#Search and filter route
Route::get('/search/events/','EventsController@search');

Route::get('/user_edit', function () {
    return view('users.edit');
})->name('user_edit');

Route::get('/user_changepassword', function () {
    return view('users.changepassword');
})->name('user_changepassword');


