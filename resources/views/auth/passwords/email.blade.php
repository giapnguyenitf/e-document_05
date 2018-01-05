@extends('layouts.head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default" id="reset-box">
                    <div class="panel-heading">
                    <a href="{{ route('home') }}">@lang('common.e-document')</a>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ Form::open(['route' => 'password.email', 'method' => 'POST']) }}
                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
                            </div>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            {{ Form::submit(trans('label.send_link_reset'),['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
