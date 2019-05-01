@extends('layouts.app')

@section('content')
<!--  section  -->
<!-- <section class="parallax-section" data-scrollax-parent="true">
    <div class="bg par-elem "  data-bg="https://thumbor.mumu.agency/unsafe/1000x562/https://www.theransomnote.com/media/articles/rare-african-music-tops-trendbases-restaurant-background-music-charts/4ca464fe-54ae-457f-8680-702aaa8a13ab.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title center-align">
            <h2><span>Listings All Restaurants</span></h2>
            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listings All Restaurants</span></div>
            <span class="section-separator"></span>
        </div>
    </div>
    <div class="header-sec-link">
        <div class="container"><a href="#sec1" class="custom-scroll-link">Let's Start</a></div>
    </div>
</section> -->
<!--  section  end-->
<!--  section  -->
<section class="gray-bg no-pading no-top-padding" id="sec1">
    <div class="col-list-wrap  center-col-list-wrap left-list">
        <div class="container">
            <div class="listsearch-maiwrap box-inside fl-wrap">
                <div class="listsearch-header fl-wrap">
                    <h3>Restaurants near by <span> {{$name}}</span> with <span>{{$distance}}</span> km</h3>
                    <div class="listing-view-layout">
                        <ul>
                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- listsearch-input-wrap  -->
                <!-- <div class="listsearch-input-wrap fl-wrap">
                    <form action="/search/restaurants" method="get">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input name="keyword" type="text" placeholder="Keywords?" value="">
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
                        <button type="submit" class="button fs-map-btn">Search</button>
                    </form>
                </div> -->
                <!-- listsearch-input-wrap end -->
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing">
                <!-- listing-item -->
                @foreach($restaurant_results as $restaurant_result)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$restaurant_result->image_url}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/places/restaurants')}}">Restaurants</a>
                            <!-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/5.jpg" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                            </div> -->
                            <h3><a href="{{url("/places/restaurants/$restaurant_result->id")}}">{{$restaurant_result->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$restaurant_result->location}}</a></div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- listing-item end-->
                {{$restaurant_results->render('vendor.pagination.test')}}
                <!-- pagination-->

            </div>
            <!-- list-main-wrap end-->
        </div>
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
@endsection
