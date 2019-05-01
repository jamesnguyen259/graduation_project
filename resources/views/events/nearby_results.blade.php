@extends('layouts.app')

@section('content')
<section class="gray-bg no-pading no-top-padding" id="sec1">
    <div class="col-list-wrap  center-col-list-wrap left-list">
        <div class="container">
            <div class="listsearch-maiwrap box-inside fl-wrap">
                <div class="listsearch-header fl-wrap">
                    <h3>Events near by <span> {{$name}}</span> with <span>{{$distance}}</span> km</h3>
                    <div class="listing-view-layout">
                        <ul>
                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing">
                <!-- listing-item -->
                @foreach($event_results as $event_result)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$event_result->image_url}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/places/events')}}">Events</a>
                            <!-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/5.jpg" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                            </div> -->
                            <h3><a href="{{url("/events/$event_result->id")}}">{{$event_result->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$event_result->location}}</a></div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- listing-item end-->
                {{$event_results->render('vendor.pagination.test')}}
                <!-- pagination-->

            </div>
            <!-- list-main-wrap end-->
        </div>
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
@endsection
