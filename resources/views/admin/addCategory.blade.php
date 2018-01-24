@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row category-row">
            <div class="col-md-4">
                <div>
                    {{ Form::open(['route' => 'add-category.store', 'method' => 'POST']) }}
                        {{ Form::label('new_parent_category', trans('label.parent_category')) }}
                        {{ Form::text('new_parent_category', null, ['class' => 'form-control']) }}
                        {{ Form::submit(trans('label.add_new'), ['class' => 'btn btn-primary btn-block', 'id' => 'bt-add-new']) }}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                {{ Form::open(['route' => 'add-subCategory.store', 'method' => 'POST']) }}
                    <div>
                        <label>@lang('label.parent_category')</label>
                        <select class="form-control" name="parent_category" id="parent_category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        {{ Form::label('new_sub_category', trans('label.sub_category')) }}
                        {{ Form::text('new_sub_category', null, ['class' => 'form-control']) }}
                        {{ Form::submit(trans('label.add_new'), ['class' => 'btn btn-primary btn-block', 'id' => 'bt-add-new']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection