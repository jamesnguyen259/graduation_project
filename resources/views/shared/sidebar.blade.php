<div class="col-md-3">
    <div class="fixed-bar fl-wrap">
        <div class="user-profile-menu-wrap fl-wrap">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Main</h3>
                <ul>
                    <li><a href="{{route('user_edit')}}"><i class="fa fa-user-o"></i> Edit profile</a></li>
                    <li><a href="{{route('user_changepassword')}}"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Plans</h3>
                <ul>
                    <li><a href="{{route('wishlist')}}"><i class="fa fa-th-list"></i> My wishlist</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <a href="{{ route('logout') }}" class="log-out-btn" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log Out</a>
            <form method="post" action="{{ route('logout') }}" id="logout-form" style="display: none">
                @csrf
            </form>
        </div>
    </div>
</div>
