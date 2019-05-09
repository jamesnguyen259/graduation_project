@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
@endsection

@section('content')
<!--  section  -->
<section class="parallax-section" data-scrollax-parent="true">
    <div class="bg par-elem "  data-bg="https://www.coalitionagency.com/wp-content/uploads/Coalition-Event-Background.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title center-align">
            <h2><span>Listings All Events</span></h2>
            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listings All Events</span></div>
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
                    <h3>Listing<span> all events</span></h3>
                    <div class="listing-view-layout">
                        <ul>
                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- listsearch-input-wrap  -->
                <div class="listsearch-input-wrap fl-wrap">
                    <form action="/search/events" method="get" accept-charset="utf-8">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input type="text" placeholder="Keywords?" name="keyword" value="">
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
                            <select name="date" data-placeholder="date" class="chosen-select" style="display: none;">
                                <option>All</option>
                                <option>Today</option>
                                <option>Tomorrow</option>
                                <option>This weekend</option>
                                <option id="pick-date">Pick a date</option>
                            </select>
                            <input type="text" id="datepicker" style="visibility: hidden;">
                        </div>
                        <button type="submit" class="button fs-map-btn">Search</button>
                    </form>
                </div>
                <!-- listsearch-input-wrap end -->
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing">
                <!-- listing-item -->
                @foreach($events as $event)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <img src="{{$event->image_url}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="geodir-category-content fl-wrap">
                            <a class="listing-geodir-category" href="{{url('/events')}}">Events</a>
                            <!-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/5.jpg" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                            </div> -->
                            <h3><a href="{{url("/events/$event->id")}}">{{$event->name}}</a></h3>
                            <div class="geodir-category-options fl-wrap">
                                <div class="geodir-category-location"><h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->location}}</h4>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <!-- listing-item end-->
                <!-- pagination-->
                {{$events->render('vendor.pagination.test')}}
            </div>
            <!-- list-main-wrap end-->
        </div>
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
    $("#datepicker").datepicker({
        onSelect: function(date){
            $("#pick-date").val(date);
            $("#pick-date").text(date);
            $("select[name='date']").val(date);
            $("select[name='date'] + div.nice-select > span.current").text(date);
        }
    })
    $("ul.list li[data-value='Pick a date']").on("click",function(){
        $("#datepicker").datepicker("show");
    })
});
</script>
@endsection
