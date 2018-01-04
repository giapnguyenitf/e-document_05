@extends('layouts.head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" id="login-box">
                    <div class="panel-heading" id="title-box-login">
                        <a href="{{ route('home') }}">@lang('common.e-document')</a>
                    </div>

                    <div class="panel-body">
                        {{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal']) }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                <div class="input-group">
                                        <span class=" input-group-addon" ><i class="fa fa-user"></i></span>
                                        {{ Form::text('email', old('email'), ['class' => 'form-control input-group', 'placeholder' => trans('label.email'), 'required', 'autofocus']) }}
                                </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        {{ Form::password('password', ['class' => 'form-control input-group', 'placeholder' => trans('label.password'), 'required']) }}
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label id="remember-me">
                                            {{ Form::checkbox('remember', old('remember') ? 'checked' : '') }} @lang('common.remember_me')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    {{ Form::button(trans('label.login'), ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) }}
                                    <div class="row" id="link-option">
                                        <div class="col-sm-6">
                                            <a href="{{ route('password.request') }}">@lang('common.forgot_password')</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{ route('register') }}"><span>@lang('label.not_a_member')</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
