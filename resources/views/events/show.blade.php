@extends('layouts.app')

@section('content')
<!-- section-->
<section class="parallax-section single-par list-single-section" id="sec1">
    <div class="media-container video-parallax">
        <div class="bg mob-bg" style="background-image: url('{{$event->image_url}}')"></div>
    </div>
    <div class="overlay"></div>
    <div class="bubble-bg"></div>
    <div class="list-single-header absolute-header fl-wrap">
        <div class="container">
            <div class="list-single-header-item">
                <div class="list-single-header-item-opt fl-wrap">
                    <div class="list-single-header-cat fl-wrap">
                        <a href="{{url('/events')}}">Events</a>
                    </div>
                </div>
                <h2>{{$event->name}}<span> - Hosted By </span><a href="#">{{$event->organizer_name}}</a> </h2>
                <span class="section-separator"></span>
                <div class="clearfix"></div>
                <div class="row">
                        <div class="col-md-6">
                            <div class="list-single-header-contacts fl-wrap">
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i><a  href="#">{{$event->location}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fl-wrap list-single-header-column">
                                <div class="share-holder hid-share">
                                    <div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>
                                    <div class="share-container  isShare"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<!--  section end -->
<!--  If event->end_time != NULL -->
@if($event->end_time)
    @if($event->end_time > $now)  <!--  Not ended -->
    <div class="scroll-nav-wrapper fl-wrap">
        <div class="container">
            <nav class="scroll-nav scroll-init">
                <ul>
                    <li><a class="act-scrlink" href="#sec1">Top</a></li>
                    <li><a href="#sec2">Details</a></li>
                </ul>
            </nav>
            @if(!Auth::check())
            <a href="#" class="save-btn modal-open"><i class="fa fa-heart"></i> Add to wishlist </a>
            @elseif(!$event->wishlistedBy(Auth::user()))
            <a href="#" class="save-btn" onclick="event.preventDefault();
                         document.getElementById('event-wishlist-form').submit();">
                         <i class="fa fa-heart"></i> Add to wishlist </a>
            <form id="event-wishlist-form" class="hidden" action="{{ route('add.event.wishlist', $event) }}" method="POST">
                {{ csrf_field() }}
            </form>
            @endif
        </div>
    </div>
    <!-- section-->
    <section class="gray-section no-top-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                        <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Events</a><span>Event detail</span></div>
                        <div class="list-single-main-media fl-wrap">
                            <div class="single-slider-wrapper fl-wrap">
                                <div class="single-slider fl-wrap"  >
                                    <div class="slick-slide-item"><img src="{{$event->image_url}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="list-single-main-item fl-wrap">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>About this event</h3>
                            </div>
                            {{$event->description}}
                            <a href="{{$event->source_url}}" class="btn transparent-btn float-btn">Visit website<i class="fa fa-file-pdf-o"></i></a>
                        </div>
                        <div class="list-single-main-item fl-wrap">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Explore things near by this event? </h3>
                            </div>
                            <div class="listsearch-input-wrap fl-wrap">
                                <form action="{{route('find.near.by.event', $event->id)}}" method="GET">
                                    <div class="listsearch-input-item">
                                        <select name="category" data-placeholder="category" class="chosen-select" style="display: none;">
                                            <option>Restaurants</option>
                                            <option>Hotels</option>
                                            <option>Famous places</option>
                                            <option>Events</option>
                                        </select>
                                    </div>
                                    <!-- </div> -->
                                    <div class="distance-input fl-wrap" style="">
                                        <div class="distance-title"> Radius around selected destination <span>1</span> km</div>
                                        <div class="distance-radius-wrap fl-wrap" style="">
                                            <input name="distance" class="distance-radius rangeslider--horizontal" type="range" min="0.1" max="3" step="0.1" value="0.1" data-title="Radius around selected destination" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;"><div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0" style=""><div class="rangeslider__fill" style="width: 10px;"></div><div class="rangeslider__handle" style="left: 0px;"></div></div>
                                        </div>
                                    </div>
                                    <span class="section-separator"></span>
                                    <button type="submit" class="button fs-map-btn">Go!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--box-widget-wrap -->
                <div class="col-md-4">
                    <div class="box-widget-wrap">
                        <div class="box-widget-item fl-wrap">
                            <div class="box-widget-item-header">
                                <h3>Event time details : </h3>
                            </div>
                            <div class="box-widget">
                                <div class="box-widget-content">
                                    <div class="list-author-widget-contacts list-item-widget-contacts">
                                        <ul>
                                            <li><span><i class="fa fa-calendar"></i> Start time :</span> {{$event->start_time}}</li>
                                            <li><span><i class="fa fa-calendar"></i> End time :</span> {{$event->end_time}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap">
                            <div class="box-widget-item-header">
                                <h3>Event will begin in : </h3>
                            </div>
                            <div class="box-widget counter-widget gradient-bg" data-countDate="{{$event->start_time}}">
                                <div class="countdown fl-wrap">
                                    <div class="countdown-item">
                                        <span class="days rot">00</span>
                                        <p>days</p>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="hours rot">00</span>
                                        <p>hours </p>
                                    </div>
                                    <div class="countdown-item no-dec">
                                        <span class="minutes rot2">00</span>
                                        <p>minutes </p>
                                    </div>
                                    <div class="countdown-item-seconds">
                                        <span class="seconds rot2">00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap">
                            <div class="box-widget-item-header">
                                <h3>Location / Contacts : </h3>
                            </div>
                            <div class="box-widget">
                                <div class="map-container">
                                    <div id="singleMap">
                                    </div>
                                </div>
                                <div class="box-widget-content">
                                    <div class="list-author-widget-contacts list-item-widget-contacts">
                                        <ul>
                                            <li><span><i class="fa fa-map-marker"></i> Address :</span>{{$event->location}}</li>
                                            <li><span><i class="fa fa-user"></i> Organizer :</span>{{$event->organizer_name}}</li>
                                            <li><span><i class="fa fa-globe"></i> Website :</span> <a href="{{$event->source_url}}">{{$event->source_url}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                    </div>
                </div>
                <!--box-widget-wrap end -->
            </div>
        </div>
    </section>
    <!-- section end-->
    <div class="limit-box fl-wrap"></div>
    <!-- section -->
    @else
    <section class="gray-section no-top-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="list-single-main-wrapper fl-wrap">
                        <div class="list-single-main-item fl-wrap">
                            <div class="list-single-main-item-title fl-wrap">
                                    <h3>This event has ended.</h3>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
<!--  event->end_time == NULL -->
@else
    @if($event->start_time > $now)
        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container">
                <nav class="scroll-nav scroll-init">
                    <ul>
                        <li><a class="act-scrlink" href="#sec1">Top</a></li>
                        <li><a href="#sec2">Details</a></li>
                    </ul>
                </nav>
                @if(!Auth::check())
                <a href="#" class="save-btn modal-open"><i class="fa fa-heart"></i> Add to wishlist </a>
                @elseif(!$event->wishlistedBy(Auth::user()))
                <a href="#" class="save-btn" onclick="event.preventDefault();
                             document.getElementById('event-wishlist-form').submit();">
                             <i class="fa fa-heart"></i> Add to wishlist </a>
                <form id="event-wishlist-form" class="hidden" action="{{ route('add.event.wishlist', $event) }}" method="POST">
                    {{ csrf_field() }}
                </form>
                @endif
            </div>
        </div>
        <!-- section-->
        <section class="gray-section no-top-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Events</a><span>Event detail</span></div>
                            <div class="list-single-main-media fl-wrap">
                                <div class="single-slider-wrapper fl-wrap">
                                    <div class="single-slider fl-wrap"  >
                                        <div class="slick-slide-item"><img src="{{$event->image_url}}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>About this event</h3>
                                </div>
                                {{$event->description}}
                                <a href="{{$event->source_url}}" class="btn transparent-btn float-btn">Visit website<i class="fa fa-file-pdf-o"></i></a>
                            </div>
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Explore things near by this event? </h3>
                                </div>
                                <div class="listsearch-input-wrap fl-wrap">
                                    <form action="{{route('find.near.by.event', $event->id)}}" method="GET">
                                        <div class="listsearch-input-item">
                                            <select name="category" data-placeholder="category" class="chosen-select" style="display: none;">
                                                <option>Restaurants</option>
                                                <option>Hotels</option>
                                                <option>Famous places</option>
                                                <option>Events</option>
                                            </select>
                                        </div>
                                        <!-- </div> -->
                                        <div class="distance-input fl-wrap" style="">
                                            <div class="distance-title"> Radius around selected destination <span>1</span> km</div>
                                            <div class="distance-radius-wrap fl-wrap" style="">
                                                <input name="distance" class="distance-radius rangeslider--horizontal" type="range" min="0.1" max="3" step="0.1" value="0.1" data-title="Radius around selected destination" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;"><div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0" style=""><div class="rangeslider__fill" style="width: 10px;"></div><div class="rangeslider__handle" style="left: 0px;"></div></div>
                                            </div>
                                        </div>
                                        <span class="section-separator"></span>
                                        <button type="submit" class="button fs-map-btn">Go!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Event time details : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-contacts list-item-widget-contacts">
                                            <ul>
                                                <li><span><i class="fa fa-calendar"></i> Start time :</span> {{$event->start_time}}</li>
                                                <li><span><i class="fa fa-calendar"></i> End time :</span> {{$event->end_time}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Event will begin in : </h3>
                                </div>
                                <div class="box-widget counter-widget gradient-bg" data-countDate="{{$event->start_time}}">
                                    <div class="countdown fl-wrap">
                                        <div class="countdown-item">
                                            <span class="days rot">00</span>
                                            <p>days</p>
                                        </div>
                                        <div class="countdown-item">
                                            <span class="hours rot">00</span>
                                            <p>hours </p>
                                        </div>
                                        <div class="countdown-item no-dec">
                                            <span class="minutes rot2">00</span>
                                            <p>minutes </p>
                                        </div>
                                        <div class="countdown-item-seconds">
                                            <span class="seconds rot2">00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <div id="singleMap">
                                        </div>
                                    </div>
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-contacts list-item-widget-contacts">
                                            <ul>
                                                <li><span><i class="fa fa-map-marker"></i> Address :</span>{{$event->location}}</li>
                                                <li><span><i class="fa fa-user"></i> Organizer :</span>{{$event->organizer_name}}</li>
                                                <li><span><i class="fa fa-globe"></i> Website :</span> <a href="{{$event->source_url}}">{{$event->source_url}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                        </div>
                    </div>
                    <!--box-widget-wrap end -->
                </div>
            </div>
        </section>
        <!-- section end-->
        <div class="limit-box fl-wrap"></div>
    <!-- section -->
    @else
        <section class="gray-section no-top-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-single-main-wrapper fl-wrap">
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                        <h3>This event has ended.</h3>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endif
@endsection

@section('script')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}"></script>
<script type="text/javascript" src="{{asset('js/maps.js')}}"></script>
<script type="text/javascript">
    $(function(){
       renderMap("'{{$event->location}}'");
    })
</script>
@endsection
