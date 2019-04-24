<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use App\User;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $events = Event::where('start_time', '>', $now)->orderBy('start_time', 'asc')->paginate(9);
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
        $request->user()->wishlistEvents()->syncWithoutDetaching([$event->id]);
        return back();
    }

    public function removeEventFromWishlist(Request $request, Event $event)
    {
        $request->user()->wishlistEvents()->detach($event);
        return back();
    }

    public function search(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $tomorrow = Carbon::tomorrow('Asia/Ho_Chi_Minh')->toDateString();
        $keyword = $request->get('keyword');
        $district = $request->get('district');
        $date = $request->get('date');
        $events = Event::where('start_time', '>', $now)->where('name', 'like', '%'.$keyword.'%');

        if($district == "All districts" && $date == "All"){
            $events = $events->orderBy('start_time', 'asc')->paginate(9);
        }

        elseif($district == "All districts"){ //date != All
            switch ($date) {
                case 'Today':
                    # code...
                    $events = $events->whereDate('start_time', '=', $today)->orderBy('start_time', 'asc')->paginate(9);
                    break;
                case 'Tomorrow':
                    $events = $events->whereDate('start_time', '=', $tomorrow)->orderBy('start_time', 'asc')->paginate(9);
                    // return dd($events);
                    break;
                case 'This weekend':
                    break;
                default:
                    # code...
                    break;
            }
        }

        elseif ($date == "All") { //district != All districts
            # code...
            $events = $events->where('location', 'like', '%'.$district.'%')->orderBy('start_time', 'asc')->paginate(9);
        }

        else{
            switch ($date) {
                case 'Today':
                    # code...
                    $events = $events->where('location', 'like', '%'.$district.'%')->whereDate('start_time', '=', $today)->orderBy('start_time', 'asc')->paginate(9);
                    break;
                case 'Tomorrow':
                    $events = $events->where('location', 'like', '%'.$district.'%')->whereDate('start_time', '=', $tomorrow)->orderBy('start_time', 'asc')->paginate(9);
                    // return dd($events);
                    break;
                case 'This weekend':
                    break;
                default:
                    # code...
                    break;
            }
        }

        $events->appends(array('keyword' => $keyword, 'district' => $district, 'date' => $date));
        return view('events.search', ['events' => $events, 'keyword' => $keyword]);
    }
}
