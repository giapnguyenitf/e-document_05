<!DOCTYPE html>
@extends('layouts.head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" id="register-box">
                    <div class="panel-heading">
                        <a href="{{ route('home') }}">@lang('common.e-document')</a>
                    </div>

                    <div class="panel-body">
                        {{ Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'form-horizontal']) }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-address-book" aria-hidden="true"></i>
                                        </span>
                                        {{ Form::text('name', old('name'), ['class' => 'form-control input-group', 'placeholder' => trans('common.username'), 'required', 'autofocus']) }}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('label.email')]) }}
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
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('label.password') , 'required']) }}
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
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('label.confirm_password'), 'required']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    {{ Form::submit(trans('label.register'), ['class' => 'btn btn-primary btn-block']) }}
                                    <div id="login-link">
                                        <a href="{{ route('login') }}">@lang('label.has_account')</a>
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
   
