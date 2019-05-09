<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use App\User;
use App\Hotel;
use App\Restaurant;
use App\FamousPlace;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //only show event is happening or still not happen
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $events = Event::where('start_time', '>', $now) //still not happen
            ->orWhere(function($query) use ($now){ //is happening
                    $query->where('start_time', '<', $now)
                ->where('end_time', '>', $now);
        })
            ->orderBy('start_time', 'asc')->paginate(9);
        return view('events.index', ['events' => $events, 'now' => $now]);
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
    public function show($id)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $event = Event::find($id);
        return view('events.show', ['event' => $event, 'now' => $now]);
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

    public function addEventToWishlist(Request $request, Event $event)
    {
        $notification = array(
            'message' => 'Added item successfully!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistEvents()->syncWithoutDetaching([$event->id]);
        return back()->with($notification);
    }

    public function removeEventFromWishlist(Request $request, Event $event)
    {
        $notification = array(
            'message' => 'Deleted item successfully!',
            'alert-type' => 'success'
        );
        $request->user()->wishlistEvents()->detach($event);
        return back()->with($notification);
    }

    public function search(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $tomorrow = Carbon::tomorrow('Asia/Ho_Chi_Minh')->toDateString();

        $monday = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay()->toDateString();
        $weekend = Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek()->toDateString();

        $keyword = $request->get('keyword');
        $district = $request->get('district');
        $date = $request->get('date');
        $events = Event::whereRaw('LOWER(`name`) like ?', ['%'.strtolower($keyword).'%']);

        if($district == "All districts" && $date == "All"){
            $events = $events->where(function($query) use ($now){
                $query->where('start_time','>',$now)
                ->orWhere(function($query1) use ($now){
                    $query1->where('start_time','<',$now)
                    ->where('end_time','>',$now);
                });
            })
            ->orderBy('start_time', 'asc')->paginate(9);
        }

        elseif($district == "All districts"){ //date != All
            switch ($date) {
                case 'Today':
                    # code...
                    $events = $events->whereDate('start_time', '=', $today)->orderBy('start_time', 'asc')->paginate(9);
                    break;
                case 'Tomorrow':
                    $events = $events->whereDate('start_time', '=', $tomorrow)->orderBy('start_time', 'asc')->paginate(9);
                    break;
                case 'This weekend':
                    // dd($saturday);
                    $events = $events->where(function($query) use ($saturday){
                        $query->whereDate('start_time', '=', $saturday)
                        ->whereDate('end_time','=',$saturday);
                    })->orWhere(function($query) use ($saturday, $weekend){
                        $query->whereDate('start_time','=',$saturday)
                        ->whereDate('end_time','=',$weekend);
                    })->orWhere(function($query) use($weekend){
                        $query->whereDate('start_time','=',$weekend)
                        ->whereDate('end_time', '=', $weekend);
                    })
                    ->orderBy('start_time', 'asc')->paginate(9);
                    break;
                default:
                    $start_date = date('Y-m-d', strtotime($date));
                    $events = $events->whereDate('start_time', '=', $start_date)->orderBy('start_time', 'asc')->paginate(9);
                    break;
            }
        }

        elseif ($date == "All") { //district != All districts
            # code...
            // $district = strtolower($district);
            $events = $events->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])
            ->where(function($query) use ($now){
                $query->where('start_time','>',$now)
                ->orWhere(function($query1) use ($now){
                    $query1->where('start_time','<',$now)
                    ->where('end_time','>',$now);
                });
            })
            ->orderBy('start_time', 'asc')->paginate(9);
        }

        else{ //both input
            switch ($date) {
                case 'Today':
                    # code...
                    $events = $events->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])
                    ->whereDate('start_time', '=', $today)->orderBy('start_time', 'asc')->paginate(9);
                    break;
                case 'Tomorrow':
                    $events = $events->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])
                    ->whereDate('start_time', '=', $tomorrow)->orderBy('start_time', 'asc')->paginate(9);
                    // return dd($events);
                    break;
                case 'This weekend':
                    $events = $events->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])
                    ->where(function($query) use ($saturday, $weekend){
                        $query->whereDate('start_time', '=', $saturday)
                        ->whereDate('end_time','=',$saturday)
                        ->orWhere(function($query) use ($saturday, $weekend){
                            $query->whereDate('start_time', '=', $saturday)
                            ->whereDate('start_time', '=', $weekend)
                            ->orWhere(function($query) use ($weekend){
                                $query->whereDate('start_time', '=', $weekend)
                                ->whereDate('end_time', '=', $weekend);
                            });
                        });
                    })
                    ->orderBy('start_time', 'asc')->paginate(9);
                    break;
                default:
                    # code...
                    $startdate = date('Y-m-d', strtotime($date));
                    $events = $events->whereRaw('LOWER(`location`) like ?', ['%'.strtolower($district).'%'])
                    ->whereDate('start_time', '=', $startdate)->orderBy('start_time', 'asc')->paginate(9);
                    break;
            }
        }
        $events->appends(array('keyword' => $keyword, 'district' => $district, 'date' => $date));
        return view('events.search', ['events' => $events, 'keyword' => $keyword]);
    }

    public function findNearBy(Request $request, $id){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $distance = $request->distance;
        $category = $request->category;
        $event = Event::find($id);
        $name = $event->name;
        $lat = $event->lat;
        $lng = $event->lng;
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
                    $event_results = Event::IsWithinMaxDistance($lat, $lng, $distance)
                    ->where(function($query) use ($now){
                        $query->where('start_time','>',$now)
                        ->orWhere(function($query1) use ($now){
                            $query1->where('start_time','<',$now)
                            ->where('end_time','>',$now);
                        });
                    })
            ->orderBy('start_time', 'asc')->paginate(9);
                    $event_results->appends(array('category' => $category, 'distance' => $distance));
                    return view('events.nearby_results', ['event_results' => $event_results, 'name' => $name, 'distance' => $distance]);
                    break;
                default:
                    break;
            }

    }
}
