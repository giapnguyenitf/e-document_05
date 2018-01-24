<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/home/fav-icon.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('common.e-document')</title>
    {{ Html::style('css/bootstrap.css') }}
    {{ Html::style('css/font-awesome.css') }}
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/metisMenu.min.css') }}
    {{ Html::style('css/sb-admin-2.min.css') }}
    {{ Html::style('css/admin.css') }}
    @yield('css')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-primary navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">@lang('label.e-document')</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong></strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> @lang('label.new_post')
                                    <span class="pull-right text-muted small"></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ route('profile.index') }}">
                                <i class="fa fa-user fa-fw"></i> @lang('label.profile')</a>
                        </li>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i> @lang('label.logout')</a>
                </li>
                {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form']) }}
                {{ Form::close() }}
                </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('admin.index') }}">
                                <i class="fa fa-dashboard fa-fw"></i> @lang('label.dashboard')</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-user fa-fw"></i> @lang('label.member')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">@lang('label.list_members')</a>
                                </li>
                                <li>
                                    <a href="">@lang('label.add_new_member')</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-files-o fa-fw"></i> @lang('label.documents')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('censored-document.index') }}">@lang('label.list_documents')</a>
                                </li>
                                <li>
                                    <a href="{{ route('censor-document.index') }}">@lang('label.check_documents')</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-bars"></i> @lang('label.category')
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">@lang('label.list_category')</a>
                                </li>
                                <li>
                                    <a href="{{ route('add-category.index') }}">@lang('label.new_category')</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
           @yield('content')
        </div>
    </div>
    {{ Html::script('js/jquery.js') }}
    {{ Html::script('js/bootstrap.js') }} 
    {{ Html::script('js/metisMenu.min.js') }}
    {{ Html::script('js/sb-admin-2.min.js')}}
    @yield('javascript')
</body>
</html>
