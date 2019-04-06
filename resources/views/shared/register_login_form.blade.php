<div class="main-register-wrap modal">
    <div class="main-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg"><i class="fa fa-times"></i></div>
            <h3>Sign In <span>Hanoi<strong>Travel</strong></span></h3>
            <div class="soc-log fl-wrap">
                <p>For faster login or register use your social account.</p>
                <a href="{{ url('/login/facebook') }}" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                <a href="{{ url('/login/twitter') }}" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
            </div>
            <div class="log-separator fl-wrap"><span>or</span></div>
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Login</a></li>
                    <li><a href="#tab-2">Register</a></li>
                </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-content">
                        <div class="custom-form">
                            <form method="post" action="{{ route('login') }}" name="registerform">
                                @csrf
                                <label>Email Address * </label>
                                <input name="email" type="text"   onClick="this.select()" value="">
                                <label >Password * </label>
                                <input name="password" type="password"   onClick="this.select()" value="" >
                                <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">Remember me</label>
                                </div>
                            </form>
                            <div class="lost_password">
                                <a href="#">Lost Your Password?</a>
                            </div>
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form">
                                <form method="post"   name="registerform" class="main-register-form" id="main-register-form2" action="{{ route('register') }}">
                                    @csrf
                                    <label >Name * </label>
                                    <input name="name" type="text"   onClick="this.select()" value="">
                                    <label>Email Address *</label>
                                    <input name="email" type="text"  onClick="this.select()" value="">
                                    <label >Password *</label>
                                    <input name="password" type="password"   onClick="this.select()" value="" >
                                    <label >Password Confirm *</label>
                                    <input name="password_confirmation" type="password"   onClick="this.select()" value="" >
                                    <button type="submit" class="log-submit-btn"  ><span>Register</span></button>
                                </form>
                                @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
