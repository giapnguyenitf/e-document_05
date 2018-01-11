@extends('layouts.master')
    @section('content')
    <div class="container">
        @include('user.sidebar')
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>@lang('label.upload')</h5>
                </div>
                <div class="panel-body">
                    @include('messages.notifications')
                    {{ Form::open(['route' => 'login', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'profile-box', 'method' => 'POST', ]) }}
                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="name">@lang('label.document_name')</label>
                            <div class="col-md-9">
                                {{ Form::text('name', null, ['class' => 'form-control', ]) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="description">@lang('label.description')</label>
                            <div class="col-md-9">
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5' ]) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('document') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="firstname">@lang('label.choose_file')</label>
                            <div class="col-md-9">
                                {{ Form::file('document') }}
                                @if ($errors->has('document'))
                                    <span class="help-block">
                                        {{ $errors->first('document') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="firstname">@lang('label.thumbnail')</label>
                            <div class="col-md-9">
                                {{ Form::file('thumbnail') }}
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">
                                        {{ $errors->first('thumbnail') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label" for="parent_category">@lang('label.category')</label>
                            <div class="col-md-5">
                                <div class="parent_category">
                                    <select class="btn btn-mini" name="parent_category" id="parent_category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="category_id">@lang('label.specialize')</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="sub_category">
                                        <select class="btn btn-mini" name="category_id" id="category_id">
                                            <option value="">----</option>
                                        </select>
                                    </div>
                                    <div id="select_category" class="input-group-addon">
                                        <i class="fa fa-exchange" ></i>
                                    </div>
                                    <div id="add_category" class="input-group-addon">
                                        <i class="fa fa-plus" ></i>
                                    </div>
                                </div>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        {{ $errors->first('category') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-md-offset-3">
                                {{ Form::submit(trans('label.upload'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('javascript')
    {{ Html::script('js/upload.js') }}
    @endsection
