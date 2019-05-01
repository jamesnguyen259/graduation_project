<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
        </div>
        <div class="header-search vis-header-search">
            <div class="header-search-input-item">
                <input type="text" placeholder="Keywords" value=""/>
            </div>
            <div class="header-search-select-item">
                <select data-placeholder="All Categories" class="chosen-select" >
                    <option>All Categories</option>
                    <option>Hotels</option>
                    <option>Restaurants</option>
                    <option>Famous places</option>
                    <option>Events</option>
                </select>
            </div>
            <button class="header-search-button" onclick="window.location.href='listing.html'">Search</button>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        <a href="dashboard-add-listing.html" class="add-list">Add Listing <span><i class="fa fa-plus"></i></span></a>
        @if(!Auth::check())
        <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>
        @else
        <div class="header-user-menu">
            <div class="header-user-name">
                <span><img src="images/avatar/1.jpg" alt=""></span>
                Hello , {{ Auth::user()->name }}
            </div>
            <ul>
                <li><a href="{{route('user_edit')}}"> Edit profile</a></li>
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
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">Explore<i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="#">Places<i class="fa fa-caret-down"></i></a>
                                <ul>
                                    <li><a href="{{ url('/places/hotels') }}">Hotels</a></li>
                                    <li><a href="{{ url('/places/restaurants') }}">Restaurants</a></li>
                                    <li><a href="{{ url('/places/famous_places') }}">Famous places</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/events') }}">Events</a></li>
                        </ul>
                        <!--second level end-->
                    </li>
                    <!-- <li>
                        <a href="#">News</a>
                    </li> -->
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
