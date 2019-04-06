@extends('layouts.app')

@section('content')
<!-- section-->
<section class="parallax-section single-par list-single-section" id="sec1">
    <div class="media-container video-parallax">
        <div class="bg mob-bg" style="background-image: url(images/bg/1.jpg)"></div>
        <div class="video-container">
            <video autoplay  loop muted  class="bgvid">
                <source src="video/1.mp4" type="video/mp4">
            </video>
        </div>
                <!--
                    Vimeo code

                     <div  class="background-vimeo" data-vim="97871257"> </div> -->
                <!--
                    Youtube code

                     <div  class="background-youtube-wrapper" data-vid="Hg5iNVSp2z8" data-mv="1"> </div> -->
    </div>
    <div class="overlay"></div>
    <div class="bubble-bg"></div>
    <div class="list-single-header absolute-header fl-wrap">
        <div class="container">
            <div class="list-single-header-item">
                <div class="list-single-header-item-opt fl-wrap">
                    <div class="list-single-header-cat fl-wrap">
                        <a href="#">Events</a>
                        <span>  Now Opening <i class="fa fa-check"></i></span>
                    </div>
                </div>
                <h2>Event In City Hall<span> - Hosted By </span><a href="author-single.html">Alisa Noory</a> </h2>
                <span class="section-separator"></span>
                <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                    <span>(2 reviews)</span>
                </div>
                <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-single-header-contacts fl-wrap">
                            <ul>
                                <li><i class="fa fa-phone"></i><a  href="#">+7(111)123456789</a></li>
                                <li><i class="fa fa-map-marker"></i><a  href="#">USA 27TH Brooklyn NY</a></li>
                                <li><i class="fa fa-envelope-o"></i><a  href="#">yourmail@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="fl-wrap list-single-header-column">
                            <div class="share-holder hid-share">
                                <div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>
                                <div class="share-container  isShare"></div>
                            </div>
                            <span class="viewed-counter"><i class="fa fa-eye"></i> Viewed -  156 </span>
                            <a class="custom-scroll-link" href="#sec5"><i class="fa fa-hand-o-right"></i>Add Review </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  section end -->
<div class="scroll-nav-wrapper fl-wrap">
    <div class="container">
        <nav class="scroll-nav scroll-init">
            <ul>
                <li><a class="act-scrlink" href="#sec1">Top</a></li>
                <li><a href="#sec2">Details</a></li>
                <li><a href="#sec3">Speakers</a></li>
                <li><a href="#sec4">Reviews</a></li>
            </ul>
        </nav>
        <a href="#" class="save-btn"> <i class="fa fa-heart"></i> Save </a>
    </div>
</div>
<!-- section-->
<section class="gray-section no-top-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="list-single-main-wrapper fl-wrap" id="sec2">
                    <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listing Single</span></div>
                    <div class="list-single-main-media fl-wrap">
                        <div class="single-slider-wrapper fl-wrap">
                            <div class="single-slider fl-wrap"  >
                                <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div>
                                <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div>
                                <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div>
                            </div>
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                    </div>
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>About Event</h3>
                        </div>
                        <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                        <a href="#" class="btn transparent-btn float-btn">Download Broshure<i class="fa fa-file-pdf-o"></i></a>
                        <span class="fw-separator"></span>
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Amenities</h3>
                        </div>
                        <div class="listing-features fl-wrap">
                            <ul>
                                <li><i class="fa fa-rocket"></i> Elevator in building</li>
                                <li><i class="fa fa-wifi"></i> Free Wi Fi</li>
                                <li><i class="fa fa-motorcycle"></i> Free Parking</li>
                                <li><i class="fa fa-cloud"></i> Air Conditioned</li>
                                <li><i class="fa fa-shopping-cart"></i> Online Ordering</li>
                                <li><i class="fa fa-paw"></i> Pet Friendly</li>
                                <li><i class="fa fa-tree"></i> Outdoor Seating</li>
                                <li><i class="fa fa-wheelchair"></i> Wheelchair Friendly</li>
                            </ul>
                        </div>
                        <span class="fw-separator"></span>
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Tags</h3>
                        </div>
                        <div class="list-single-tags tags-stylwrap">
                            <a href="#">Event</a>
                            <a href="#">Conference</a>
                            <a href="#">Strategies</a>
                            <a href="#">Trends</a>
                            <a href="#">Schedule</a>
                            <a href="#">Speak</a>
                        </div>
                    </div>
                    <div class="accordion">
                        <a class="toggle act-accordion" href="#"> Details option   <i class="fa fa-angle-down"></i></a>
                        <div class="accordion-inner visible">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                        </div>
                        <a class="toggle" href="#"> Details option 2  <i class="fa fa-angle-down"></i></a>
                        <div class="accordion-inner">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                        </div>
                        <a class="toggle" href="#"> Details option 3  <i class="fa fa-angle-down"></i></a>
                        <div class="accordion-inner">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                        </div>
                    </div>
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap" id="sec3">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Event Speakers  </h3>
                        </div>
                        <div class="team-holder fl-wrap">
                            <!-- team-item -->
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="images/team/1.jpg" alt="" class="respimg">
                                </div>
                                <div class="team-info">
                                    <h3><a href="#">Alisa Gray</a></h3>
                                    <h4>Business consultant</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                    <ul class="team-social">
                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- team-item  end-->
                            <!-- team-item -->
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="images/team/1.jpg" alt="" class="respimg">
                                </div>
                                <div class="team-info">
                                    <h3><a href="#">Austin Evon</a></h3>
                                    <h4>Photographer</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                    <ul class="team-social">
                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- team-item end  -->
                            <!-- team-item -->
                            <div class="team-box">
                                <div class="team-photo">
                                    <img src="images/team/1.jpg" alt="" class="respimg">
                                </div>
                                <div class="team-info">
                                    <h3><a href="#">Taylor Roberts</a></h3>
                                    <h4>Co-manager associated</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                                    <ul class="team-social">
                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- team-item end  -->
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap" id="sec4">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Item Revies -  <span> 3 </span></h3>
                        </div>
                        <div class="reviews-comments-wrap">
                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="images/avatar/1.jpg" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Jessie Manrty</a></h4>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                    <div class="clearfix"></div>
                                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                    <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>27 May 2018</span>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->
                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="images/avatar/1.jpg" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Mark Rose</a></h4>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                    <div class="clearfix"></div>
                                    <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                    <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>12 April 2018</span>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->
                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="images/avatar/1.jpg" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Adam Koncy</a></h4>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                    <div class="clearfix"></div>
                                    <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                    <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>03 December 2017</span>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap" id="sec5">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Add Revies  & Rate iteam</h3>
                        </div>
                        <!-- Add Review Box -->
                        <div id="add-review" class="add-review-box">
                            <div class="leave-rating-wrap">
                                <span class="leave-rating-title">Your rating  for this listing : </span>
                                <div class="leave-rating">
                                    <input type="radio" name="rating" id="rating-1" value="1"/>
                                    <label for="rating-1" class="fa fa-star-o"></label>
                                    <input type="radio" name="rating" id="rating-2" value="2"/>
                                    <label for="rating-2" class="fa fa-star-o"></label>
                                    <input type="radio" name="rating" id="rating-3" value="3"/>
                                    <label for="rating-3" class="fa fa-star-o"></label>
                                    <input type="radio" name="rating" id="rating-4" value="4"/>
                                    <label for="rating-4" class="fa fa-star-o"></label>
                                    <input type="radio" name="rating" id="rating-5" value="5"/>
                                    <label for="rating-5" class="fa fa-star-o"></label>
                                </div>
                            </div>
                            <!-- Review Comment -->
                            <form   class="add-comment custom-form">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label><i class="fa fa-user-o"></i></label>
                                            <input type="text" placeholder="Your Name *" value=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label><i class="fa fa-envelope-o"></i>  </label>
                                            <input type="text" placeholder="Email Address*" value=""/>
                                        </div>
                                    </div>
                                    <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                </fieldset>
                                <button class="btn  big-btn  color-bg flat-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- Add Review Box / End -->
                    </div>
                    <!-- list-single-main-item end -->
                </div>
            </div>
            <!--box-widget-wrap -->
            <div class="col-md-4">
                <div class="box-widget-wrap">
                    <!--box-widget-item -->
                    <div class="box-widget-item fl-wrap">
                        <div class="box-widget-item-header">
                            <h3>Event Will Begin : </h3>
                        </div>
                        <div class="box-widget counter-widget gradient-bg" data-countDate="09/12/2019">
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
                            <h3>Register Now : </h3>
                        </div>
                        <div class="box-widget opening-hours">
                            <div class="box-widget-content">
                                <form   class="add-comment custom-form">
                                    <fieldset>
                                        <label><i class="fa fa-user-o"></i></label>
                                        <input type="text" placeholder="Your Name *" value=""/>
                                        <div class="clearfix"></div>
                                        <label><i class="fa fa-envelope-o"></i>  </label>
                                        <input type="text" placeholder="Email Address*" value=""/>
                                        <label><i class="fa fa-phone"></i>  </label>
                                        <input type="text" placeholder="Phone*" value=""/>
                                        <div class="quantity fl-wrap">
                                            <span><i class="fa fa-user-plus"></i>Persons : </span>
                                            <div class="quantity-item">
                                                <input type="button" value="-" class="minus">
                                                <input type="text"    name="quantity"   title="Qty" class="qty" min="1" max="3" step="1" value="1">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </div>
                                        <select data-placeholder="Ticket Type" class="chosen-select" >
                                            <option value="Ticket Type">Ticket Type</option>
                                            <option value="Standard Pass">Standard Pass</option>
                                            <option value="Silver Pass">Silver Pass</option>
                                            <option value="Gold Pass">Gold Pass</option>
                                            <option value="Platinum Pass">Platinum Pass</option>
                                        </select>
                                        <textarea cols="40" rows="3" placeholder="Additional Information:"></textarea>
                                    </fieldset>
                                    <button class="btn  big-btn  color-bg flat-btn">Book Now<i class="fa fa-angle-right"></i></button>
                                </form>
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
                                <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                            </div>
                            <div class="box-widget-content">
                                <div class="list-author-widget-contacts list-item-widget-contacts">
                                    <ul>
                                        <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="#">USA 27TH Brooklyn NY</a></li>
                                        <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>
                                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a></li>
                                    </ul>
                                </div>
                                <div class="list-widget-social">
                                    <ul>
                                        <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget-item end -->
                    <!--box-widget-item -->
                    <div class="box-widget-item fl-wrap">
                        <div class="box-widget-item-header">
                            <h3>Hosted by : </h3>
                        </div>
                        <div class="box-widget list-author-widget">
                            <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                <span class="list-author-widget-link"><a href="author-single.html">Alisa Noory</a></span>
                                <img src="images/avatar/1.jpg" alt="">
                            </div>
                            <div class="box-widget-content">
                                <div class="list-author-widget-text">
                                    <div class="list-author-widget-contacts">
                                        <ul>
                                            <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                            <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>
                                            <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a></li>
                                        </ul>
                                    </div>
                                    <a href="author-single.html" class="btn transparent-btn">View Profile <i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget-item end -->
                    <!--box-widget-item -->
                    <div class="box-widget-item fl-wrap">
                        <div class="box-widget-item-header">
                            <h3>More from this employer : </h3>
                        </div>
                        <div class="box-widget widget-posts">
                            <div class="box-widget-content">
                                <ul>
                                    <li class="clearfix">
                                        <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg"  alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title="">Cafe "Lollipop"</a>
                                            <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg"  alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title=""> Apartment in the Center</a>
                                            <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg"  alt=""></a>
                                        <div class="widget-posts-descr">
                                            <a href="#" title="">Event in City Mol</a>
                                            <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                        </div>
                                    </li>
                                </ul>
                                <a class="widget-posts-link" href="#">See All Listing<span><i class="fa fa-angle-right"></i></span></a>
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
<!-- section end-->
@endsection
