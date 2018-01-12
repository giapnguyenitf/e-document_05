<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone"></i> +84 976 353 194
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i> contact@edocument.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <select class="btn btn-mini" name="lang" id="lang">
                                    <option value="en">en</option>
                                    <option value="vi">vi</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo pull-left">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/home/logo.png') }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="search-box">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" id="search" placeholder="Search">
                            <span class="input-group-addon">
                                <a href=""><i class="fa fa-search"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                @guest
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> @lang('common.login')
                                    </a>
                                @else
                                    <a href="">
                                        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> {{ Auth::user()->name }}
                                    </a>
                                @endguest
                                <div class="dropdown">
                                    <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('common.account_and_collection') <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    @guest
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i> @lang('common.sign_in_with_google')</a></li>
                                            <li class="dropdown-item"><a href=""><i class="fa fa-google" aria-hidden="true"></i> @lang('common.sign_in_with_facebook')</a></li>
                                            <hr>
                                            <li class="dropdown-item"><a href="{{ route('register') }}">@lang('common.register')</a></li>
                                            <li class="dropdown-item"><a href="{{ route('password.request') }}">@lang('common.forgot_password')</a></li>
                                        </ul>
                                    @else
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href=""><i class="fa fa-cloud-upload" aria-hidden="true"></i> @lang('common.upload')</a></li>
                                            <li class="dropdown-item"><a href="{{ route('profile.index') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> @lang('common.account_info')</a></li>
                                            <li class="dropdown-item"><a href=""><i class="fa fa-heart" aria-hidden="true"></i> @lang('common.account_favorite')</a></li>
                                            <li class="dropdown-item"><a href=""><i class="fa fa-btc" aria-hidden="true"></i> @lang('label.buy_coins')</a></li>
                                            <li class="dropdown-item">
                                                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i> @lang('common.logout')
                                                </a>
                                            </li>
                                            {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                                            {{ Form::close() }}
                                        </ul>
                                    @endguest
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->
    <nav class="navbar navbar-primary">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}">@lang('common.home')</a></li>
                </ul>
            </div>
        </div>
    </nav>
   
</header>
<!--/header-->
