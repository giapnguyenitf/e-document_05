@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="list-document">
            <table class="table table-bordered" id="tb-LD">
                <thead>
                    <tr>
                        <th>@lang('label.document_name')</th>
                        <th>@lang('label.date')</th>
                        <th>@lang('label.user_upload')</th>
                        <th>@lang('label.category')</th>
                        <th>@lang('label.new_category')</th>
                        <th>@lang('label.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr id="{{ $document->id }}">
                            <td>{{ $document->name }}</td>
                            <td>{{ $document->created_at->format('d/m/Y') }}</td>
                            <td>{{ $document->user->name }}</td>
                            <td>{{ $document->category->name }}</td>
                            <td>
                                @if (!$document->category->status)
                                    <i class="fa fa-pencil-square-o"></i>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.options')&nbsp;<i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href="{{ route('viewDocument', $document->id) }}"><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;@lang('label.show')</a></li>
                                        <li class="dropdown-item"><a href="{{ route('admin.acceptDocument', $document->id) }}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;@lang('label.accept')</a></li>
                                        <li class="dropdown-item"><a href=""><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;@lang('label.mark_illegal')</a></li>
                                        <li class="dropdown-item"><a href="{{ route('document.destroy', $document->id) }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;@lang('label.delete')</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        {{ $documents->links() }}
                    </tr>
                </tfoot>
            </table>
        </div>
        {{ Form::open(['route' => 'censor-document.store', 'method' => 'POST', 'class' => "form-censor-document"]) }}
            <div class="row">
                {{ Form::hidden('id', null, ['class' => 'document-id', ]) }}
                <div class="row">
                    <div class="col-md-8">
                        {{ Form::label('name', trans('label.name')) }}
                        {{ Form::text('name', null, ['class' => 'form-control document-name']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('category', trans('label.sub_category')) }}
                        {{ Form::text('category', null, ['class' => 'form-control document-category']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        {{ Form::label('description', trans('label.description')) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control document-description', 'rows' => 10,]) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Thumbnail</label>
                        <div class="">
                            <img class="img-responsive document-thumbnail" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row viewer-pdf">
                <div class="row">
                    <div class="col-md-8">
                        <object class="document-pdf" data="" type="application/pdf" width="100%" height="500px">
                            <embed src="" type="application/pdf">
                                <p>@lang('label.browser_not_support_pdf')<a href="">@lang('label.download_pdf')</a></p>
                            </embed>
                        </object>
                    </div>
                    <div class="col-md-4 change">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h5>@lang('label.change')</h5></div>
                            <div class="panel-body">
                                <div class="">
                                    <div class="parent_category">
                                        <label for="parent_category">@lang('label.parent_category')</label>
                                        <select class="btn btn-mini btn-block" name="parent_category" id="parent_category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="sub_category">
                                            <label for="category_id">@lang('label.sub_category')</label>
                                            <select class="btn btn-mini btn-block" name="category_id" id="category_id">
                                                <option value="">----</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        <div class="replace-thumbnail">
                            {{ Form::label('thumbnail', trans('label.thumbnail')) }}
                            {{ Form::file('thumbnail') }}
                        </div>
                            </div>
                        </div>
                        <div class="bt-submit">
                            {{ Form::submit(trans('label.ok'), ['class' => 'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection
@section('javascript')
    {{ Html::script('js/master.js') }}
    {{ Html::script('js/censor-document.js') }}
    {{ Html::script('js/upload.js') }}
@endsection