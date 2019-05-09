@extends('layouts.app')

@section('content')
<!--section -->
<section id="sec1">
    <!-- container -->
    <div class="container">
        <!-- profile-edit-wrap -->
        <div class="profile-edit-wrap">
            <div class="profile-edit-page-header">
                <h2>Notifications</h2>
                <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>Notification</span></div>
            </div>
            <div class="row">
                @include('shared.sidebar')
                <div class="col-md-9">
                    <div class="dashboard-list-box fl-wrap">
                        <div class="dashboard-header fl-wrap">
                            <h3>You got some notifications, check now.</h3>
                        </div>
                        <div class="dashboard-list">
                            <div class="dashboard-message">
                                <span class="new-dashboard-item">New</span>
                                <div class="dashboard-message-avatar">
                                    <img src="{{asset('images/avatar/1.jpg')}}" alt="">
                                </div>
                                <div class="dashboard-message-text">
                                    <h4>Andy Smith - <span>27 December 2018</span></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                    <span class="reply-mail clearfix">Reply : <a class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                </div>
                            </div>
                        </div>
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
