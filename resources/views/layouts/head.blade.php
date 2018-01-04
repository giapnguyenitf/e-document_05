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
    {{ Html::style('css/style.css') }}
</head>
<body>
    @yield('content')

    {{ Html::script('js/jquery.js') }}
    {{ Html::script('js/bootstrap.js') }}
</body>
</html>
