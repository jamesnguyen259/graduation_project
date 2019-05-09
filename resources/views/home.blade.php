@extends('layouts.app')

@section('content')
<!--section -->
<section class="hero-section no-dadding"  id="sec1">
    <div class="slider-container-wrap fl-wrap">
        <div class="slider-container">
            <!-- slideshow-item -->
            <div class="slider-item fl-wrap">
                <div class="bg bg-ser"   data-bg="https://i.pinimg.com/originals/9a/ed/52/9aed52fc3bc091ebcfb38fede16c2ed2.jpg"></div>
                <div class="overlay"></div>
                <div class="hero-section-wrap fl-wrap">
                    <div class="container">
                        <div class="intro-item fl-wrap">
                            <h2>Discover Our Categories</h2>
                            <h3>You can find something interesting in Hanoi!</h3>
                        </div>
                        <span class="section-separator"></span>
                        <div class="box-cat-container">
                            <!--box-cat-->
                            <a href="{{url('/places/restaurants')}}" class="box-cat color-bg" data-bgscr="https://thumbor.mumu.agency/unsafe/1000x562/https://www.theransomnote.com/media/articles/rare-african-music-tops-trendbases-restaurant-background-music-charts/4ca464fe-54ae-457f-8680-702aaa8a13ab.jpg">
                                <i class="fa fa-cutlery"></i>
                                <h4>Restaurants</h4>
                            </a>
                            <!--box-cat end-->
                            <!--box-cat-->
                            <a href="{{url('/places/hotels')}}" class="box-cat color-bg" data-bgscr="https://stmed.net/sites/default/files/hotel-wallpapers-28644-5356899.jpg">
                                <i class="fa fa-bed"></i>
                                <h4>Hotels</h4>
                            </a>
                            <!--box-cat end-->
                            <!--box-cat-->
                            <a href="{{url('/places/famous_places')}}" class="box-cat color-bg" data-bgscr="https://www.hanoicitybreaks.com/wp-content/uploads/2010/04/Hoan-Kiem-Lake.jpg">
                                <i class="fa fa-bank"></i>
                                <h4>Famous places</h4>
                            </a>
                            <!--box-cat end-->
                            <!--box-cat-->
                            <a href="{{url('/events')}}" class="box-cat color-bg" data-bgscr="https://www.coalitionagency.com/wp-content/uploads/Coalition-Event-Background.jpg">
                                <i class="fa fa-users"></i>
                                <h4>Events</h4>
                            </a>
                            <!--box-cat end-->
                        </div>
                    </div>
                </div>
            </div>
            <!--  slideshow-item end  -->
        </div>
        <!-- <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div> -->
        <!-- <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div> -->
    </div>
</section>
<!-- section end -->
<!--section -->
<section id="sec2">
    <div class="container">
        <div class="section-title">
            <h2>Explore places</h2>
            <div class="section-subtitle">Lots of amazing places</div>
            <span class="section-separator"></span>
            <p>Explore some of the best places from around Hanoi from our partners and friends.</p>
        </div>
        <!-- portfolio start -->
        <div class="gallery-items fl-wrap mr-bot spad">
            <!-- gallery-item-->
            <div class="gallery-item">
                <div class="grid-item-holder">
                    <div class="listing-item-grid">
                        <img  src="http://citybook.kwst.net/images/all/4.jpg"   alt="">
                        <div class="listing-counter"><span>{{$restaurant_count}} </span> Locations</div>
                        <div class="listing-item-cat">
                            <h3><a href="{{url('/places/restaurants')}}">Restaurants</a></h3>
                            <p>Explore restaurants in Hanoi from lot of sources</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- gallery-item end-->
            <!-- gallery-item-->
            <!-- <div class="gallery-item gallery-item-second">
                <div class="grid-item-holder">
                    <div class="listing-item-grid">
                        <img  src="http://citybook.kwst.net/images/bg/19.jpg"   alt="">
                        <div class="listing-counter"><span>6 </span> Locations</div>
                        <div class="listing-item-cat">
                            <h3><a href="listing.html">Cafe - Pub</a></h3>
                            <p>Constant care and attention to the patients makes good record</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- gallery-item end-->
            <!-- gallery-item-->
            <div class="gallery-item">
                <div class="grid-item-holder">
                    <div class="listing-item-grid">
                        <img  src="https://asiaopentours.net/wp-content/uploads/2018/03/hoan-kiem-lake-1.jpg"   alt="">
                        <div class="listing-counter"><span>{{$famous_place_count}} </span> Locations</div>
                        <div class="listing-item-cat">
                            <h3><a href="{{url('/places/famous_places')}}">Famous places</a></h3>
                            <p>Want to explore most famous places in Hanoi? Click here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- gallery-item end-->
            <!-- gallery-item-->
            <div class="gallery-item">
                <div class="grid-item-holder">
                    <div class="listing-item-grid">
                        <img  src="http://citybook.kwst.net/images/all/22.jpg"   alt="">
                        <div class="listing-counter"><span>{{$hotel_count}} </span> Locations</div>
                        <div class="listing-item-cat">
                            <h3><a href="{{url('/places/hotels')}}">Hotels</a></h3>
                            <p>Find somewhere to relax by exploring hotels in Hanoi</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- gallery-item end-->
            <!-- gallery-item-->
            <!-- <div class="gallery-item">
                <div class="grid-item-holder">
                    <div class="listing-item-grid">
                        <img  src="images/all/1.jpg"   alt="">
                        <div class="listing-counter"><span>15 </span> Locations</div>
                        <div class="listing-item-cat">
                            <h3><a href="listing.html">Shop - Store</a></h3>
                            <p>Constant care and attention to the patients makes good record</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- gallery-item end-->
        </div>
        <!-- portfolio end -->
    </div>
</section>
<!-- section end -->
<!--section -->
<section class="gray-section">
    <div class="container">
        <div class="section-title">
            <h2>Upcoming events</h2>
            <div class="section-subtitle">Upcoming events</div>
            <span class="section-separator"></span>
            <p>Explore lots of upcoming events in Hanoi.</p>
        </div>
    </div>
    <!-- carousel -->
    <div class="list-carousel fl-wrap card-listing ">
        <!--listing-carousel-->
        <div class="listing-carousel  fl-wrap ">
            <!--slick-slide-item-->
            @foreach($events as $event)
            <div class="slick-slide-item">
                <!-- listing-item -->
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$event->image_url}}" alt="">
                            <!-- <div class="overlay"></div>
                            <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div> -->
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/events')}}">Events</a>
                            <h3><a href="{{url("/events/$event->id")}}">{{$event->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->location}}</a></div>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- listing-item end-->
            </div>
            @endforeach
            <!--slick-slide-item end-->
        </div>
        <!--listing-carousel end-->
        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
    </div>
    <a href="{{url('/events')}}" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
    <!--  carousel end-->
</section>
<!-- section end -->
@endsection

@push('scripts')
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script> -->
@endpush
