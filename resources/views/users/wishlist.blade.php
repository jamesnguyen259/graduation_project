@extends('layouts.app')

@section('content')
<!--section -->
<section id="sec1">
    <!-- container -->
    <div class="container">
        <!-- profile-edit-wrap -->
        <div class="profile-edit-wrap">
            <div class="profile-edit-page-header">
                <h2>My wishlist </h2>
                <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>My wishlist</span></div>
            </div>
            <div class="row">
                @include('shared.sidebar')
                <div class="col-md-9">
                    <div class="dashboard-list-box fl-wrap">
                        <div class="dashboard-header fl-wrap">
                            <h3>List of my wishlist</h3>
                        </div>
                        <!-- dashboard-list end-->
                        @if( ($events->count() == 0) && ($hotels->count() == 0) && ($restaurants->count() == 0) && ($famous_places->count() == 0))
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <div class="dashboard-listing-table-text">
                                        <h4>No items founded!</h4>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- dashboard-list end-->
                            @foreach($events as $event)
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
                                                <li><a href="#" onclick="event.preventDefault();
                                                document.getElementById('event-wishlist-destroy-{{ $event->id }}').submit();" class="del-btn">Delete <i class="fa fa-trash-o"></i></a>
                                                    <form action="{{ route('delete.event.wishlist', $event) }}" method="POST" id="event-wishlist-destroy-{{ $event->id }}" class="hidden">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- dashboard-list end-->
                            @foreach($hotels as $hotel)
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
                                                <li><a href="#" onclick="event.preventDefault();
                                                document.getElementById('hotel-wishlist-destroy-{{ $hotel->id }}').submit();" class="del-btn">Delete <i class="fa fa-trash-o"></i></a>
                                                <form action="{{ route('delete.hotel.wishlist', $hotel) }}" method="POST" id="hotel-wishlist-destroy-{{ $hotel->id }}" class="hidden">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- dashboard-list end-->
                            @foreach($restaurants as $restaurant)
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
                                                <li><a href="#" onclick="event.preventDefault();
                                                document.getElementById('restaurant-wishlist-destroy-{{ $restaurant->id }}').submit();" class="del-btn">Delete <i class="fa fa-trash-o"></i></a>
                                                <form action="{{ route('delete.restaurant.wishlist', $restaurant) }}" method="POST" id="restaurant-wishlist-destroy-{{ $restaurant->id }}" class="hidden">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- dashboard-list end-->
                            @foreach($famous_places as $famous_place)
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
                                                <li><a href="#" onclick="event.preventDefault();
                                                document.getElementById('famous_place-wishlist-destroy-{{ $famous_place->id }}').submit();" class="del-btn">Delete <i class="fa fa-trash-o"></i></a>
                                                <form action="{{ route('delete.famous_place.wishlist', $famous_place) }}" method="POST" id="famous_place-wishlist-destroy-{{ $famous_place->id }}" class="hidden">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <div class="dashboard-listing-table-text">
                                        <h4>Share my wishlist to another user?</h4>
                                    </div>
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <form action="{{route('add.share.wishlist')}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="listsearch-input-item">
                                                <select name="email" data-placeholder="category" class="chosen-select" style="display: none;">
                                                    @foreach($users as $user)
                                                    <option>{{$user->email}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- </div> -->
                                            <span class="section-separator"></span>
                                            <button type="submit" class="button fs-map-btn">Share</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
