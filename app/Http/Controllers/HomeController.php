<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\FamousPlace;
use App\Restaurant;
use App\Event;
use Carbon\Carbon;
use App\Http\Requests\SearchHeaderRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotel_count = Hotel::count();
        $restaurant_count = Restaurant::count();
        $famous_place_count = FamousPlace::count();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $events = Event::where('start_time', '>' , $now)->orderBy('start_time','asc')->take(5)->get();
        return view('home',['hotel_count' => $hotel_count, 'restaurant_count' => $restaurant_count, 'famous_place_count' => $famous_place_count, 'events' => $events]);
    }

    public function search(SearchHeaderRequest $request){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $keyword = $request->get("keyword");
        $type = $request->get("type");
        switch ($type) {
            case 'Hotels':
                $hotels = Hotel::whereRaw('LOWER(`name`) like ?', ['%'.strtolower($keyword).'%'])
                ->paginate(9);
                $hotels->appends(array('keyword' => $keyword, 'type' => $type));
                return view('hotels.search', ['hotels' => $hotels, 'keyword' => $keyword]);
                break;
            case 'Restaurants':
                $restaurants = Restaurant::whereRaw('LOWER(`name`) like ?', ['%'.strtolower($keyword).'%'])
                ->paginate(9);
                $restaurants->appends(array('keyword' => $keyword, 'type' => $type));
                return view('restaurants.search', ['restaurants' => $restaurants, 'keyword' => $keyword]);
                break;
            case 'Famous places':
                $famous_places = FamousPlace::whereRaw('LOWER(`name`) like ?', ['%'.strtolower($keyword).'%'])->paginate(9);
                $famous_places->appends(array('keyword' => $keyword, 'type' => $type));
                return view('famousplaces.search', ['famous_places' => $famous_places, 'keyword' => $keyword]);
                break;
            case 'Events':
                $events = Event::whereRaw('LOWER(`name`) like ?', ['%'.strtolower($keyword).'%'])
                ->where(function($query) use ($now){
                    $query->where('start_time','>',$now)
                    ->orWhere(function($query) use ($now){
                        $query->where('start_time','<',$now)
                        ->where('end_time','>',$now);
                    });
                })
            ->orderBy('start_time', 'asc')->paginate(9);
                $events->appends(array('keyword' => $keyword, 'type' => $type));
                return view('events.search', ['events' => $events, 'keyword' => $keyword]);
                break;
            default:
                # code...
                break;
        }
    }
}
