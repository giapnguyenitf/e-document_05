@extends('layouts.head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="{{ route('home') }}">@lang('common.e-document')</a>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'password.request', 'method' => 'POST', 'class' => 'form-horizontal']) }}
                            {{ Form::text('token', $token, ['type' => 'hidden']) }}
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </span>
                                {{ Form::text('email', $email or old('email'), ['class' => 'form-control', 'type' => 'email'], 'required', 'autofocus') }}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                {{ Form::text('password', null, ['class' => 'form-control', 'type' => 'password', 'required', 'autofocus', 'placeholder' => trans('label.password')]) }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                                {{ Form::text('password_confirmation', null, ['class' => 'form-control', 'type' => 'email', 'required', 'autofocus', 'placeholder' => trans('label.confirm_password')]) }}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{ Form::submit(trans('label.change_password'), ['class' => 'btn btn-primary']) }}
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
