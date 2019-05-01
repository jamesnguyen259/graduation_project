<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Restaurant;
use App\FamousPlace;
use App\Event;
use Carbon\Carbon;

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
            $hotels = Hotel::orderBy('name','asc')->paginate(9);
            return view('hotels.index', ['hotels' => $hotels]);
        } elseif ($type == "restaurants") {
            $restaurants = Restaurant::paginate(9);
            return view('restaurants.index', ['restaurants' => $restaurants]);
        } elseif ($type == "famous_places") {
            $famous_places = FamousPlace::orderBy('name','asc')->paginate(9);
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
        $notification = array(
            'message' => 'Added item to wishlist!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistHotels()->syncWithoutDetaching([$hotel->id]);
        return back()->with($notification);
    }

    public function removeHotelFromWishlist(Request $request, Hotel $hotel)
    {
        $notification = array(
            'message' => 'Deleted item successfully!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistHotels()->detach($hotel);
        return back()->with($notification);
    }

    public function addRestaurantToWishlist(Request $request, Restaurant $restaurant)
    {
        $notification = array(
            'message' => 'Added item to wishlist!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistRestaurants()->syncWithoutDetaching([$restaurant->id]);
        return back()->with($notification);
    }

    public function removeRestaurantFromWishlist(Request $request, Restaurant $restaurant)
    {
        $notification = array(
            'message' => 'Deleted item successfully!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistRestaurants()->detach($restaurant);
        return back()->with($notification);
    }

    public function addFamousPlaceToWishlist(Request $request, FamousPlace $famous_place)
    {
        $notification = array(
            'message' => 'Added item to wishlist!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistFamousPlaces()->syncWithoutDetaching([$famous_place->id]);
        return back()->with($notification);
    }

    public function removeFamousPlaceFromWishlist(Request $request, FamousPlace $famous_place)
    {
        $notification = array(
            'message' => 'Deleted item successfully!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistFamousPlaces()->detach($famous_place);
        return back()->with($notification);
    }

    public function search(Request $request, $type)
    {
        //Search hotels
        //Filter by keyword, rating and district
        if ($type == "hotels"){
                $keyword = $request->get('keyword');
                $district = $request->get('district');
                $rating = $request->get('rating');

                $hotels = Hotel::where('name','like','%'.$keyword.'%');
                //Not choose anything => all
                if($district == "All districts" && $rating == "All"){
                    $hotels = $hotels->orderBy('name','asc')->paginate(9);
                }
                //Choose only rating => filter by rating
                elseif($district == "All districts"){
                    if($rating == "1 star"){
                        $rating = str_replace(" star", "", $rating);
                    }
                    else{
                        $rating = str_replace(" stars", "", $rating);
                    }
                    $hotels = $hotels->where('rating','=',$rating)->orderBy('name','asc')->paginate(9);
                }
                //Choose only district => filter by district
                elseif($rating == "All"){
                    $hotels = $hotels->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])->orderBy('name','asc')->paginate(9);
                }
                //Choose both district and rating => filter by both district and rating
                else{
                    if($rating == "1 star"){
                        $rating = str_replace(" star", "", $rating);
                    }
                    else{
                        $rating = str_replace(" stars", "", $rating);
                    }
                    $hotels = $hotels->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])->where('rating','=',$rating)->orderBy('name','asc')->paginate(9);
                }
                $hotels->appends(array('keyword' => $keyword, 'district' => $district, 'rating' => $rating));
                return view('hotels.search',['hotels' => $hotels, 'keyword' => $keyword]);
        }

        //Search restaurants
        //Filter by keyword, district
        elseif($type == "restaurants"){
            $keyword = $request->get('keyword');
            $district = $request->get('district');
            $restaurants = Restaurant::where('name' , 'like' , '%'.$keyword.'%');
            //Not choose anything => all
            if($district == "All districts"){
                $restaurants = $restaurants->orderBy('name', 'asc')->paginate(9);
            }
            //Choose only district => filter by district
            else{
                $restaurants = $restaurants->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])->orderBy('name', 'asc')->paginate(9);
            }
            $restaurants->appends(array('keyword' => $keyword, 'district' => $district));
            return view('restaurants.search', ['restaurants' => $restaurants, 'keyword' => $keyword]);
        }

        //Search famous place
        //Filter by keyword, district
        else{
            $keyword = $request->get('keyword');
            $district = $request->get('district');
            $famous_places = FamousPlace::where('name', 'like', '%'.$keyword.'%');
            //Not choose anything => all
            if($district == "All districts"){
                $famous_places = $famous_places->orderBy('name' , 'asc')->paginate(9);
            }
            //Choose only district => filter by district
            else{
                $famous_places = $famous_places->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])->orderBy('name', 'asc')->paginate(9);
            }
            $famous_places->appends(array('keyword' => $keyword, 'district' => $district));
            return view('famousplaces.search',['famous_places' => $famous_places, 'keyword' => $keyword]);
        }
    }

    public function findNearBy(Request $request, $type, $id){
        // dd($request->distance);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $distance = $request->distance;
        $category = $request->category;
        if($type == "restaurants"){
            $restaurant = Restaurant::find($id);
            $name = $restaurant->name;
            $lat = $restaurant->lat;
            $lng = $restaurant->lng;
            switch ($category) {
                case 'Restaurants':
                    $restaurant_results = Restaurant::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $restaurant_results->appends(array('category' => $category, 'distance' => $distance));
                    // dd($restaurant_results);
                    return view('restaurants.nearby_results', ['restaurant_results' => $restaurant_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Hotels':
                    $hotel_results = Hotel::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $hotel_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('hotels.nearby_results', ['hotel_results' => $hotel_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Famous places':
                    $famous_place_results = FamousPlace::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $famous_place_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('famousplaces.nearby_results', ['famous_place_results' => $famous_place_results, 'name' => $name, 'distance' => $distance]);
                case 'Events':
                    $event_results = Event::IsWithinMaxDistance($lat, $lng, $distance)->where('start_time','>',$now)->paginate(9);
                    $event_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('events.nearby_results', ['event_results' => $event_results, 'name' => $name, 'distance' => $distance]);
                    break;
                default:
                    break;
            }
        }
        elseif($type == "hotels"){
            $hotel = Hotel::find($id);
            $name = $hotel->name;
            $lat = $hotel->lat;
            $lng = $hotel->lng;
            switch ($category) {
                case 'Restaurants':
                    $restaurant_results = Restaurant::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $restaurant_results->appends(array('category' => $category, 'distance' => $distance));
                    // dd($restaurant_results);
                    return view('restaurants.nearby_results', ['restaurant_results' => $restaurant_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Hotels':
                    $hotel_results = Hotel::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $hotel_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('hotels.nearby_results', ['hotel_results' => $hotel_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Famous places':
                    $famous_place_results = FamousPlace::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $famous_place_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('famousplaces.nearby_results', ['famous_place_results' => $famous_place_results, 'name' => $name, 'distance' => $distance]);
                case 'Events':
                    $event_results = Event::IsWithinMaxDistance($lat, $lng, $distance)->where('start_time','>',$now)->paginate(9);
                    $event_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('events.nearby_results', ['event_results' => $event_results, 'name' => $name, 'distance' => $distance]);
                    break;
                default:
                    break;
            }
        }
        elseif($type == "famous_places"){
            $famous_place = FamousPlace::find($id);
            $name = $famous_place->name;
            $lat = $famous_place->lat;
            $lng = $famous_place->lng;
            switch ($category) {
                case 'Restaurants':
                    $restaurant_results = Restaurant::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $restaurant_results->appends(array('category' => $category, 'distance' => $distance));
                    // dd($restaurant_results);
                    return view('restaurants.nearby_results', ['restaurant_results' => $restaurant_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Hotels':
                    $hotel_results = Hotel::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $hotel_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('hotels.nearby_results', ['hotel_results' => $hotel_results, 'name' => $name, 'distance' => $distance]);
                    break;
                case 'Famous places':
                    $famous_place_results = FamousPlace::IsWithinMaxDistance($lat, $lng, $distance)->paginate(9);
                    $famous_place_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('famousplaces.nearby_results', ['famous_place_results' => $famous_place_results, 'name' => $name, 'distance' => $distance]);
                case 'Events':
                    $event_results = Event::IsWithinMaxDistance($lat, $lng, $distance)->where('start_time','>',$now)->paginate(9);
                    $event_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('events.nearby_results', ['event_results' => $event_results, 'name' => $name, 'distance' => $distance]);
                    break;
                default:
                    break;
            }
        }
        else{

        }

    }

}
