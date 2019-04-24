<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\FamousPlace;
use App\Restaurant;
use App\Event;
use Carbon\Carbon;


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
}
