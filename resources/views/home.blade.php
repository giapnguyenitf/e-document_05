<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/home/fav-icon.png') }}" type="image/x-icon">
    <title>@lang('common.e-document')</title>
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
    @include('layouts.header')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">@lang('label.new_documents')</h2>
                        @foreach ($newUploadDocuments as $newDocument)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="#">
                                                <img class="img-responsive" src="{{ $newDocument->thumbnail_path }}" />
                                            </a>
                                            <a href="#">
                                                <h5>{{ $newDocument->name }}</h5>
                                            </a>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-file"></i>{{ $newDocument->file_type }}</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-eye"></i>{{ $newDocument->views }}</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-cloud-download"></i>{{ $newDocument->downloads }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
    <!--/Footer-->
    {{ Html::script('js/jquery.js')}}
    {{ Html::script('js/bootstrap.js')}}
</body>
</html>
