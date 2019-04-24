@extends('layouts.app')

@section('content')
<!--  carousel-->
<div class="list-single-carousel-wrap fl-wrap" id="sec1">
    <div class="fw-carousel fl-wrap full-height lightgallery">
        <!-- slick-slide-item -->
        <div class="slick-slide-item">
            <div class="box-item">
                <img  src="{{$famous_place->image_url}}"   alt="">
                <a href="{{$famous_place->image_url}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
            </div>
        </div>
        <!-- slick-slide-item end -->
        <!-- slick-slide-item -->
        <div class="slick-slide-item">
            <div class="box-item">
                <img  src="{{$famous_place->image_url}}"   alt="">
                <a href="{{$famous_place->image_url}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
            </div>
        </div>
        <!-- slick-slide-item end -->
        <!-- slick-slide-item -->
        <div class="slick-slide-item">
            <div class="box-item">
                <img  src="{{$famous_place->image_url}}"   alt="">
                <a href="{{$famous_place->image_url}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
            </div>
        </div>
        <!-- slick-slide-item end -->
        <!-- slick-slide-item -->
        <div class="slick-slide-item">
            <div class="box-item">
                <img  src="{{$famous_place->image_url}}"   alt="">
                <a href="{{$famous_place->image_url}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
            </div>
        </div>
        <!-- slick-slide-item end -->
        <!-- slick-slide-item -->
        <div class="slick-slide-item">
            <div class="box-item">
                <img  src="{{$famous_place->image_url}}"   alt="">
                <a href="{{$famous_place->image_url}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
            </div>
        </div>
        <!-- slick-slide-item end -->
    </div>
    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
</div>
<!--  carousel  end-->
<div class="scroll-nav-wrapper fl-wrap">
    <div class="container">
        <nav class="scroll-nav scroll-init">
            <ul>
                <li><a class="act-scrlink" href="#sec1">Gallery</a></li>
                <li><a href="#sec2">Details</a></li>
            </ul>
        </nav>
        @if(!Auth::check())
        <a href="#" class="save-btn modal-open"><i class="fa fa-heart"></i> Add to wishlist </a>
        @elseif(!$famous_place->wishlistedBy(Auth::user()))
        <a href="#" class="save-btn" onclick="event.preventDefault();
                     document.getElementById('famous_place-wishlist-form').submit();">
                     <i class="fa fa-heart"></i> Add to wishlist </a>
        <form id="famous_place-wishlist-form" class="hidden" action="{{ route('add.famous_place.wishlist', $famous_place) }}" method="POST">
            {{ csrf_field() }}
        </form>
        @endif
    </div>
</div>
<!--  section   -->
<section class="gray-section no-top-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- list-single-main-wrapper -->
                <div class="list-single-main-wrapper fl-wrap" id="sec2">
                    <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Restaurants</a><span>Restaurant details</span></div>
                    <!-- list-single-header -->
                    <div class="list-single-header list-single-header-inside fl-wrap">
                        <div class="container">
                            <div class="list-single-header-item">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="list-single-header-item-opt fl-wrap">
                                            <div class="list-single-header-cat fl-wrap">
                                                <a href="#">Restaurants</a>
                                            </div>
                                        </div>
                                        <h2>{{$famous_place->name}}</h2>
                                        <span class="section-separator"></span>
                                        <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list-single-header end -->
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>About this place </h3>
                        </div>
                        {{$famous_place->description}}
                        <a href="{{$famous_place->source_url}}" class="btn transparent-btn float-btn">Visit Website <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <!--box-widget-wrap -->
            <div class="col-md-4">
                <div class="box-widget-wrap">
                    <!--box-widget-item -->
                    <div class="box-widget-item fl-wrap">
                        <div class="box-widget-item-header">
                            <h3>Working Hours : </h3>
                        </div>
                        <div class="box-widget opening-hours">
                            <div class="box-widget-content">
                                <span class="current-status"><i class="fa fa-clock-o"></i> N/A </span>
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
                                <div id="singleMap" data-mapTitle="{{$famous_place->location}}">
                                </div>
                            </div>
                            <div class="box-widget-content">
                                <div class="list-author-widget-contacts list-item-widget-contacts">
                                    <ul>
                                        <li><span><i class="fa fa-map-marker"></i> Address :</span>{{$famous_place->location}}</li>
                                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="{{$famous_place->source_url}}">{{$famous_place->source_url}}</a></li>
                                        <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">{{$famous_place->phone}}</a></li>
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
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
<!--  section   -->
<section class="gradient-bg">
    <div class="cirle-bg">
        <div class="bg" data-bg="images/bg/circle.png"></div>
    </div>
    <div class="container">
        <div class="join-wrap fl-wrap">
            <div class="row">
                <div class="col-md-8">
                    <h3>Join our online community</h3>
                    <p>Grow your marketing and be happy with your online business</p>
                </div>
                <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>
            </div>
        </div>
    </div>
</section>
<!--  section  end-->
@endsection

@section('script')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}"></script>
<script type="text/javascript" src="{{asset('js/maps.js')}}"></script>
<script type="text/javascript">
    $(function(){
       renderMap("'{{$famous_place->location}}'");
    })
</script>
@endsection
