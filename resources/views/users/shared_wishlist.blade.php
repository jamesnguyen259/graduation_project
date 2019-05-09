@extends('layouts.app')

@section('content')
<!--section -->
<section id="sec1">
    <!-- container -->
    <div class="container">
        <!-- profile-edit-wrap -->
        <div class="profile-edit-wrap">
            <div class="profile-edit-page-header">
                <h2>Shared wishlist </h2>
                <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>Shared wishlist</span></div>
            </div>
            <div class="row">
                @include('shared.sidebar')
                <div class="col-md-9">
                    <div class="dashboard-list-box fl-wrap">
                        <div class="dashboard-header fl-wrap">
                            <h3>List of your shared wishlist</h3>
                        </div>
                        <!-- dashboard-list end-->
                        @if($users->count() == 0)
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <div class="dashboard-listing-table-text">
                                        <h4>No items founded!</h4>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach($users as $user)
                                <div class="dashboard-header fl-wrap">
                                    <h3>Wishlist of {{$user->name}}</h3>
                                </div>
                                <!-- dashboard-list end-->
                                @foreach($user->wishlistEvents()->get() as $event)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <!-- <span class="new-dashboard-item">New</span> -->
                                            <div class="dashboard-listing-table-image">
                                                <a href="{{url("/events/$event->id")}}"><img src="{{$event->image_url}}" alt=""></a>
                                            </div>
                                            <div class="dashboard-listing-table-text">
                                                <h4><a href="{{url("/events/$event->id")}}">{{$event->name}}</a></h4>
                                                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$event->location}}</a></span>
                                                <ul class="dashboard-listing-table-opt  fl-wrap">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- dashboard-list end-->
                                @foreach($user->wishlistHotels as $hotel)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <!-- <span class="new-dashboard-item">New</span> -->
                                            <div class="dashboard-listing-table-image">
                                                <a href="{{url("places/hotels/$hotel->id")}}"><img src="{{$hotel->image_url}}" alt=""></a>
                                            </div>
                                            <div class="dashboard-listing-table-text">
                                                <h4><a href="{{url("places/hotels/$hotel->id")}}">{{$hotel->name}}</a></h4>
                                                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$hotel->location}}</a></span>
                                                <ul class="dashboard-listing-table-opt  fl-wrap">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- dashboard-list end-->
                                @foreach($user->wishlistRestaurants as $restaurant)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <!-- <span class="new-dashboard-item">New</span> -->
                                            <div class="dashboard-listing-table-image">
                                                <a href="{{url("places/restaurants/$restaurant->id")}}"><img src="{{$restaurant->image_url}}" alt=""></a>
                                            </div>
                                            <div class="dashboard-listing-table-text">
                                                <h4><a href="{{url("places/restaurants/$restaurant->id")}}">{{$restaurant->name}}</a></h4>
                                                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$restaurant->location}}</a></span>
                                                <ul class="dashboard-listing-table-opt  fl-wrap">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- dashboard-list end-->
                                @foreach($user->wishlistFamousPlaces as $famous_place)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <!-- <span class="new-dashboard-item">New</span> -->
                                            <div class="dashboard-listing-table-image">
                                                <a href="{{url("places/famous_places/$famous_place->id")}}"><img src="{{$famous_place->image_url}}" alt=""></a>
                                            </div>
                                            <div class="dashboard-listing-table-text">
                                                <h4><a href="{{url("places/famous_places/$famous_place->id")}}">{{$famous_place->name}}</a></h4>
                                                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a  href="#">{{$famous_place->location}}</a></span>
                                                <ul class="dashboard-listing-table-opt  fl-wrap">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            @endforeach
                        @endif
                        <!-- dashboard-list end-->
                    </div>
                </div>
            </div>
        </div>
        <!--profile-edit-wrap end -->
    </div>
    <!--container end -->
</section>
<!-- section end -->
<div class="limit-box fl-wrap"></div>
@endsection
