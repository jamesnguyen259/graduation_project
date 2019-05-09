<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $users = User::all()->except(Auth::id());
            $events = $request->user()->wishlistEvents()->get();
            $hotels = $request->user()->wishlistHotels()->get();
            $restaurants = $request->user()->wishlistRestaurants()->get();
            $famous_places = $request->user()->wishlistFamousPlaces()->get();
            return view('users.wishlist', ['users' => $users, 'events' => $events, 'hotels' => $hotels, 'restaurants' => $restaurants, 'famous_places' => $famous_places]);
        } else {
            $notification = array(
                'message' => 'You must login to view your own wishlist!',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
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
    public function show($id)
    {
        //
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

    public function addShare(Request $request)
    {
        $notification = array(
            'message' => 'Shared!',
            'alert-type' => 'success'
        );
        $email = $request->get("email");
        $user = User::where('email', '=', $email)->first();
        Auth::user()->addShare($user);
        return back()->with($notification);
    }

    public function showShared(Request $request)
    {
        if (Auth::check()){
            $user = $request->user(); //authenticating user
            $id = $user->id;
            $sharer_users = User::whereHas('shareWishlists', function($query) use ($id){
                $query->where('shareables.shared_id', $id);
            })
            ->get();
            // dd($sharer_users);
            return view('users.shared_wishlist', ['users' => $sharer_users]);
        }else{
            $notification = array(
                'message' => 'You must login first!',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        }
    }
}
