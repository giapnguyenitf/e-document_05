@extends('layouts.master')
    @section('css')
        {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css') }}
    @endsection
    @section('content')
    <div class="container">
        @include('user.sidebar')
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>@lang('label.user_profile')</h5>
                </div>
                <div class="panel-body">
                    @include('messages.notifications')
                    {{ Form::open(['route' => 'profile.store', 'files' => true,'class' => 'form-horizontal', 'id' => 'profile-box', 'method' => 'POST', ]) }}
                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="name">@lang('label.name')</label>
                            <div class="col-md-9">
                                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', ]) }}
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="email">@lang('label.email')</label>
                            <div class="col-md-9">
                                {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'type' => 'email', ]) }}
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="firstname">@lang('label.firstname')</label>
                            <div class="col-md-9">
                                {{ Form::text('firstname', Auth::user()->firstname, ['class' => 'form-control', 'type' => 'text', ]) }}
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="lastname">@lang('label.lastname')</label>
                            <div class="col-md-9">
                                {{ Form::text('lastname', Auth::user()->lastname, ['class' => 'form-control', 'type' => 'text', ]) }}
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="date_of_birth">@lang('label.date_of_birth')</label>
                            <div class="col-md-9">
                                <div class="input-group date" id="datetimepicker">
                                    {{ Form::text('date', Auth::user()->date_of_birth, ['id' => 'date', 'class' => 'form-control']) }}
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="address">@lang('label.address')</label>
                            <div class="col-md-9">
                                <div id="locationField">
                                    {{ Form::text('address', Auth::user()->address, ['class' => 'form-control', 'id' =>'autocomplete', 'type' => 'text', 'onFocus' => 'geolocate()',]) }}
                                </div>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="">@lang('label.phone')</label>
                            <div class="col-md-9">
                                {{ Form::text('phone', Auth::user()->phone, ['class' => 'form-control', 'type' => 'text', ]) }}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label" for="">@lang('label.gender')</label>
                            <div class="col-md-3">
                                {{ Form::select('gender', ['1' => trans('label.male'), '0' => trans('label.female')], Auth::user()->gender, []) }}
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="">@lang('label.avatar')</label>
                            <div class="col-md-3">
                                {{ Form::file('avatar') }}
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-md-offset-3">
                                {{ Form::submit(trans('label.update'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        
                    {{ Form::close() }}

                    {{ Form::open(['route' => 'password.update', 'class' => 'form-horizontal', 'method' => 'POST',  'id' => 'change-password-box']) }}
                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="">@lang('label.password')</label>
                            <div class="col-md-9">
                                {{ Form::password('password', ['class' => 'form-control', ]) }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="">@lang('label.confirm_password')</label>
                            <div class="col-md-9">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', ]) }}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-md-offset-3">
                                {{ Form::submit(trans('label.change_password'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('javascript')
        {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js') }}
        {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js') }}
        {{ Html::script('https://use.fontawesome.com/a6499bd878.js') }}
        {{ Html::script('js/profile.js')}}
        {{ Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyDhXqDwjEfKlCPTNni75UrHRQbkRBjEDc4&libraries=places&callback=initAutocomplete') }}
    @endsection
