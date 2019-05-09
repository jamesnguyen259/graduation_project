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
Route::get('/places/{types}/{id}/findnearby', 'PlacesController@findNearBy')->name('find.near.by');

#Add or remove hotels to/from wishlist
Route::post('/places/hotels/{hotel}/wishlists', 'PlacesController@addHotelToWishlist')->name('add.hotel.wishlist');
Route::delete('/places/hotels/{hotel}/wishlists', 'PlacesController@removeHotelFromWishlist')->name('delete.hotel.wishlist');

#Add or remove restaurants to/from wishlist
Route::post('/places/restaurants/{restaurant}/wishlists', 'PlacesController@addRestaurantToWishlist')->name('add.restaurant.wishlist');
Route::delete('/places/restaurants/{restaurant}/wishlists', 'PlacesController@removeRestaurantFromWishlist')->name('delete.restaurant.wishlist');

#Add or remove famous places to/from wishlist
Route::post('/places/famous_places/{famous_place}/wishlists', 'PlacesController@addFamousPlaceToWishlist')->name('add.famous_place.wishlist');
Route::delete('/places/famous_places/{famous_place}/wishlists', 'PlacesController@removeFamousPlaceFromWishlist')->name('delete.famous_place.wishlist');

#Events page
Route::get('/events', 'EventsController@index');
Route::get('/events/{id}', 'EventsController@show');
Route::get('/events/{id}/findnearby', 'EventsController@findNearBy')->name('find.near.by.event');

#Add or remove events to/from wishlist
Route::post('/events/{event}/wishlists', 'EventsController@addEventToWishlist')->name('add.event.wishlist');
Route::delete('/events/{event}/wishlists', 'EventsController@removeEventFromWishlist')->name('delete.event.wishlist');

#Wishlist
Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
Route::post('/share-wishlist', 'WishlistController@addShare')->name('add.share.wishlist');
Route::get('/shared-wishlist','WishlistController@showShared')->name('show.shared.wishlist');

#Search and filter route
Route::get('/search','HomeController@search');
Route::get('/search/events/','EventsController@search');
Route::get('/search/places/{types}', 'PlacesController@search');

Route::get('/user_edit', function () {
    return view('users.edit');
})->name('user_edit');

Route::get('/user_changepassword', function () {
    return view('users.changepassword');
})->name('user_changepassword');

Route::get('/user_notification', function () {
    return view('users.notification');
})->name('user_notification');
