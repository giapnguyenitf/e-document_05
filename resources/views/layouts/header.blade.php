<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/home/fav-icon.png') }}" type="image/x-icon">
    <title>@lang('common.home')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style('css/bootstrap.css') }}
    {{ Html::style('css/font-awesome.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/animate.css') }}
    {{ Html::style('css/responsive.css') }}
</head>
<!--/head-->

<body>
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
                            <a href="/">
                                <img src="images/home/logo.png" alt="" />
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
                                    <a href="#">
                                         <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> giapnguyen
                                    </a>
                                    <div class="dropdown">
                                        <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('common.account_and_collection') <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href=""><i class="fa fa-cloud-upload" aria-hidden="true"></i> @lang('common.upload')</a></li>
                                            <li class="dropdown-item"><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> @lang('common.account_info')</a></li>
                                            <li class="dropdown-item"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> @lang('common.account_favorite')</a></li>
                                            <li class="dropdown-item"><a href="#"><i class="fa fa-file" aria-hidden="true"></i> @lang('common.account_uploaded')</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li>
                                    <a href="/" class="active">@lang('common.home')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
