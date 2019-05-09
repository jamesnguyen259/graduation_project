@extends('layouts.app')

@section('content')
<!--  section  -->
<section class="parallax-section" data-scrollax-parent="true">
    <div class="bg par-elem "  data-bg="https://stmed.net/sites/default/files/hotel-wallpapers-28644-5356899.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title center-align">
            <h2><span>Listings All Hotels</span></h2>
            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listings All Hotels</span></div>
            <span class="section-separator"></span>
        </div>
    </div>
    <div class="header-sec-link">
        <div class="container"><a href="#sec1" class="custom-scroll-link">Let's Start</a></div>
    </div>
</section>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg no-pading no-top-padding" id="sec1">
    <div class="col-list-wrap  center-col-list-wrap left-list">
        <div class="container">
            <div class="listsearch-maiwrap box-inside fl-wrap">
                <div class="listsearch-header fl-wrap">
                    <h3>Listing<span> all hotels</span></h3>
                    <div class="listing-view-layout">
                        <ul>
                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- listsearch-input-wrap  -->
                <div class="listsearch-input-wrap fl-wrap">
                    <form action="/search/places/hotels" method="get">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input type="text" name="keyword" placeholder="Keywords?" value="">
                        </div>
                        <div class="listsearch-input-item">
                            <select name="district" data-placeholder="districts" class="chosen-select" style="display: none;">
                                <option>All districts</option>
                                <option>Ba Dinh </option>
                                <option>Hoan Kiem </option>
                                <option>Tay Ho</option>
                                <option>Long Bien</option>
                                <option>Cau Giay</option>
                                <option>Dong Da</option>
                                <option>Hai Ba Trung</option>
                                <option>Hoang Mai</option>
                                <option>Thanh Xuan</option>
                                <option>Soc Son</option>
                                <option>Dong Anh</option>
                                <option>Gia Lam</option>
                                <option>Nam Tu Liem</option>
                                <option>Thanh Tri</option>
                                <option>Bac Tu Liem</option>
                                <option>Me Linh</option>
                                <option>Ha Dong</option>
                                <option>Son Tay</option>
                                <option>Ba Vi</option>
                                <option>Phuc Tho</option>
                                <option>Dan Phuong</option>
                                <option>Hoai Duc</option>
                                <option>Quoc Oai</option>
                                <option>Thach That</option>
                                <option>Chuong My</option>
                                <option>Thanh Oai</option>
                                <option>Thuong Tin</option>
                                <option>Phu Xuyen</option>
                                <option>Ung Hoa</option>
                                <option>My Duc</option>
                            </select>
                        </div>
                        <div class="listsearch-input-item">
                            <select name="rating" data-placeholder="rating" class="chosen-select" style="display: none;">
                                <option>All</option>
                                <option>Not rated</option>
                                <option>1 star</option>
                                <option>2 stars</option>
                                <option>3 stars</option>
                                <option>4 stars</option>
                                <option>5 stars</option>
                            </select>
                        </div>
                        <!-- <div class="listsearch-input-text" id="autocomplete-container">
                            <label><i class="mbri-map-pin"></i> Enter Addres </label>
                            <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value="" autocomplete="off">
                            <a href="#" class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>
                        </div> -->
                        <!-- hidden-listing-filter -->
                        <!-- <div class="hidden-listing-filter fl-wrap" style=""> -->
                            <!-- <div class="distance-input fl-wrap" style="">
                                <div class="distance-title"> Radius around selected destination <span>1</span> km</div>
                                <div class="distance-radius-wrap fl-wrap" style="">
                                    <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="1" data-title="Radius around selected destination" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;"><div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0" style=""><div class="rangeslider__fill" style="width: 10px;"></div><div class="rangeslider__handle" style="left: 0px;"></div></div>
                                </div>
                            </div> -->
                            <!-- Checkboxes -->
                            <!-- <div class=" fl-wrap filter-tags">
                                <h4>Filter by Tags</h4>
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" name="check" checked="">
                                    <label for="check-a">Elevator in building</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-b" type="checkbox" name="check">
                                    <label for="check-b">Friendly workspace</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" name="check">
                                    <label for="check-c">Instant Book</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-d" type="checkbox" name="check">
                                    <label for="check-d">Wireless Internet</label>
                                </div>
                            </div> -->
                        <!-- </div> -->
                        <!-- hidden-listing-filter end -->
                        <button class="button fs-map-btn">Search</button>
                    </form>
                    <!-- <div class="more-filter-option">More Filters <span></span></div> -->
                </div>
                <!-- listsearch-input-wrap end -->
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing">
                <!-- listing-item -->
                @foreach($hotels as $hotel)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$hotel->image_url}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/places/hotels')}}">Hotels</a>
                            <!-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/5.jpg" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                            </div> -->
                            <h3><a href="{{url("/places/hotels/$hotel->id")}}">{{$hotel->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                @if($hotel->rating != "Not rated")
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{$hotel->rating}}">
                                </div>
                                @else
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="0">
                                Not rated</div>
                                @endif
                                <div class="geodir-category-location">
                                    <!-- <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$hotel->location}}</a> -->
                                    <h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{$hotel->location}}</h4>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- listing-item end-->
                <!-- pagination-->
                {{$hotels->render('vendor.pagination.test')}}
            </div>
            <!-- list-main-wrap end-->
        </div>
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
<!--  section  -->
<!-- <section class="gradient-bg">
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
</section> -->
<!--  section  end-->
@endsection
