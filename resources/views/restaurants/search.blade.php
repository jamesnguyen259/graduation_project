@extends('layouts.app')

@section('content')
<!--  section  -->
<!--  section  end-->
<!--  section  -->
<section class="gray-bg no-pading no-top-padding" id="sec1">
    <div class="col-list-wrap  center-col-list-wrap left-list">
        <div class="container">
            <div class="listsearch-maiwrap box-inside fl-wrap">
                <div class="listsearch-header fl-wrap">
                    <h3>Results For : <span>{{$keyword}}</span></h3>
                    <div class="listing-view-layout">
                        <ul>
                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- listsearch-input-wrap  -->
                <div class="listsearch-input-wrap fl-wrap">
                    <form action="/search/places/restaurants" method="get">
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
                    <!-- <div class="more-filter-option">More Filters <span></span></div> -->
                </div>
                <!-- listsearch-input-wrap end -->
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing">
                <!-- listing-item -->
                @foreach($restaurants as $restaurant)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$restaurant->image_url}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/places/restaurants')}}">Restaurants</a>
                            <!-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/5.jpg" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                            </div> -->
                            <h3><a href="{{url("/places/restaurants/$restaurant->id")}}">{{$restaurant->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                <div class="geodir-category-location"><h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{$restaurant->location}}</h4></div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- listing-item end-->
                <!-- pagination-->
                {{$restaurants->render('vendor.pagination.test')}}
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
