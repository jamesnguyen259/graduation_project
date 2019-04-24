<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Restaurant;
use App\FamousPlace;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if ($type == "hotels") {
            $hotels = Hotel::paginate(9);
            return view('hotels.index', ['hotels' => $hotels]);
        } elseif ($type == "restaurants") {
            $restaurants = Restaurant::paginate(9);
            return view('restaurants.index', ['restaurants' => $restaurants]);
        } elseif ($type == "famous_places") {
            $famous_places = FamousPlace::paginate(9);
            return view('famousplaces.index', ['famous_places' => $famous_places]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        if ($type == "hotels") {
            $hotel = Hotel::find($id);
            return view('hotels.show', ['hotel' => $hotel]);
        } elseif ($type == "restaurants") {
            $restaurant = Restaurant::find($id);
            return view('restaurants.show', ['restaurant' => $restaurant]);
        } elseif ($type == "famous_places") {
            $famous_place = FamousPlace::find($id);
            return view('famousplaces.show', ['famous_place' => $famous_place]);
        // return view('places.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addHotelToWishlist(Request $request, Hotel $hotel)
    {
        $request->user()->wishlistHotels()->syncWithoutDetaching([$hotel->id]);
        return back();
    }

    public function removeHotelFromWishlist(Request $request, Hotel $hotel)
    {
        $request->user()->wishlistHotels()->detach($hotel);
        return back();
    }

    public function addRestaurantToWishlist(Request $request, Restaurant $restaurant)
    {
        $request->user()->wishlistRestaurants()->syncWithoutDetaching([$restaurant->id]);
        return back();
    }

    public function removeRestaurantFromWishlist(Request $request, Restaurant $restaurant)
    {
        $request->user()->wishlistRestaurants()->detach($restaurant);
        return back();
    }

    public function addFamousPlaceToWishlist(Request $request, FamousPlace $famous_place)
    {
        $request->user()->wishlistFamousPlaces()->syncWithoutDetaching([$famous_place->id]);
        return back();
    }

    public function removeFamousPlaceFromWishlist(Request $request, FamousPlace $famous_place)
    {
        $request->user()->wishlistFamousPlaces()->detach($famous_place);
        return back();
    }

}
