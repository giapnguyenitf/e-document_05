@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" id="user-info-card">
                <div class="col-md-4">
                    <div class="card-profile">
                        <div class="card-avatar">
                            <img class="img-responsive" src="{{ $user->avatar_path }}" alt="">
                        </div>
                        <div class="card-name"><strong>{{ $user->name }}</strong></div>
                        <div class="card-add-friend">
                            @switch ($status)
                                @case(config('setting.is_friend'))
                                    <div class="dropdown">
                                        <a class="dropdown dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check"></i> @lang('label.friends')&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="{{ route('deleteFriend', $user->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> @lang('label.delete_friends')</a></li>
                                        </ul>
                                    </div>
                                    @break
                                @case(config('setting.request_send'))
                                    <div class="dropdown">
                                        <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.request_friends_sent')&nbsp;<i class="fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="{{ route('deleteFriend', $user->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> @lang('label.delete_request')</a></li>
                                        </ul>
                                    </div>
                                    @break
                                @case(config('setting.request_receive'))
                                    <div class="dropdown">
                                        <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.accept_request_friends') <i class="fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="{{ route('acceptFriend', $user->id) }}"><i class="fa fa-check"></i> @lang('label.accept_request_friends')</a></li>
                                            <li class="dropdown-item"><a href="{{ route('deleteFriend', $user->id) }}"><i class="fa fa-trash"></i> @lang('label.delete_request')</a></li>
                                        </ul>
                                    </div>
                                    @break
                                @default
                                    <div class="btn-add">
                                        <a id="btn-add-friend" href="{{ route('addFriend', $user->id) }}"><i class="fa fa-plus"></i> @lang('label.add_friends')</a>
                                    </div>
                            @endswitch
                            <div class="more-detail">
                                    <div class="email">
                                        <div class="info"><i class="fa fa-envelope-o"></i> {{ $user->email }}</div>
                                    </div>
                                    <div class="friend">
                                        <div class="info"><i class="fa fa-users"></i>{{ $number_friends }}</div>
                                    </div>
                                    <div class="downloads">
                                        <div class="info" ><i class="fa fa-phone"></i> {{ $user->phone }}</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 statistic">
                    <div class="card-detail">
                        <div class="card-number-uploads">
                            <div class="upload-detail">
                                <h5>@lang('label.uploads'):</h5>
                                <h4>{{ $user->documents->count() }}</h4>
                            </div>
                        </div>
                        <div class="card-document-upload">
                            <div class="recent-upload-title">@lang('label.recent_upload')</div>
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <tbody>
                                    @foreach ($recent_uploads as $recent_upload)
                                    <tr class="">
                                            <td>{{ $recent_upload->name }}</td>
                                            <td>{{ $recent_upload->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
