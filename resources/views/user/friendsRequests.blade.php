@extends('layouts.master')
    @section('css')
    @endsection
    @section('content')
    <div class="container">
        @include('user.sidebar')
        <div class="col-md-9">
            <div class="row">
                @if ($friends_requests->count())
                    @foreach ($friends_requests as $friend)
                        <div class="col-md-6">
                            <div class="row friends-profile">
                                <div class="col-md-4">
                                    <div class="friend-avatar">
                                        <img class="img-responsive" src="{{ $friend->avatar_path }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="friend-detail">
                                        <div class="friend-name">{{ $friend->name }}</div>
                                        <div class="friend-email"><i class="fa fa-envelope-o"></i>{{ $friend->email }}</div>
                                        <div class="friend-phone"><i class="fa fa-phone"></i>{{ $friend->phone }}</div>
                                    </div>
                                    <div class="friend-options">
                                        <div class="dropdown">
                                            <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.accept_request_friends') <i class="fa fa-caret-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="{{ route('acceptFriend', $friend->id) }}"><i class="fa fa-check"></i> @lang('label.accept_request_friends')</a></li>
                                                <li class="dropdown-item"><a href="{{ route('deleteFriend', $friend->id) }}"><i class="fa fa-trash"></i> @lang('label.delete_request')</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-request">
                        <h5>@lang('label.no_friends_requests')</h5>
                    </div>
                @endif
            </div>
             <div class="col-md-12">
                 <div  class="paginate-bar">
                     {{ $friends_requests->links() }}
                 </div>
             </div>
        </div>
    </div>
    @endsection
    @section('javascript')
        {{ Html::script('js/home.js') }}
    @endsection
