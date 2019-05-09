<header class="main-header dark-header center-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{route('home')}}"><img src="{{asset('images/logo4.png')}}"  alt=""></a>
        </div>
        <div class="header-search vis-header-search">
            <form action="/search" method="GET">
                <div class="header-search-input-item">
                    <input name="keyword" type="text" placeholder="Keywords" value=""/>
                </div>
                <div class="header-search-select-item">
                    <select name="type" data-placeholder="All Categories" class="chosen-select" >
                        <option>Hotels</option>
                        <option>Restaurants</option>
                        <option>Famous places</option>
                        <option>Events</option>
                    </select>
                </div>
                <button class="header-search-button" type="submit">Search</button>
            </form>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        <!-- <a href="dashboard-add-listing.html" class="add-list">Add Listing <span><i class="fa fa-plus"></i></span></a> -->
        @if(!Auth::check())
        <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>
        @else
        <div class="header-user-menu">
            <div class="header-user-name">
            <span><img src="{{asset('images/avatar/1.jpg')}}" alt=""></span>
                Hello , {{ Auth::user()->name }}
            </div>
            <ul>
                <li><a href="{{route('wishlist')}}"> Wishlist</a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="return logout(event);">Log Out</a>
                    <form method="post" action="{{ route('logout') }}" id="logout-form" style="display: none">
                    @csrf
                    </form>
                </li>
            </ul>
        </div>
        @endif
        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{ url('/places/hotels') }}">Hotels</a></li>
                    <li><a href="{{ url('/places/restaurants') }}">Restaurants</a></li>
                    <li><a href="{{ url('/places/famous_places') }}">Famous places</a></li>
                    <li><a href="{{ url('/events') }}">Events</a></li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
<script type="text/javascript">
    function logout(event){
        event.preventDefault();
        var check = confirm("Do you really want to logout?")
        if (check){
            document.getElementById('logout-form').submit();
        }
    }
</script>
