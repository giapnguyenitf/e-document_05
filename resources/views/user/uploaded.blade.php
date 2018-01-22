@extends('layouts.master')
    @section('content')
    <div class="container">
        @include('user.sidebar')
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h5>@lang('label.uploaded')</h5>
                </div>
                <div class="panel-body">
                    @include('messages.notifications')
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('label.document_name')</th>
                                <th>@lang('label.date')</th>
                                <th>@lang('label.file_type')</th>
                                <th>@lang('label.downloads')</th>
                                <th>@lang('label.views')</th>
                                <th>@lang('label.status')</th>
                                <th>@lang('label.illegal')</th>
                                <th>@lang('label.detail')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uploaded as $upload)
                                <tr>
                                    <td>{{ $upload->name }}</td>
                                    <td>{{ $upload->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $upload->file_type }}</td>
                                    <td>{{ $upload->downloads }}</td>
                                    <td>{{ $upload->views }}</td>
                                    <td>
                                        @if($upload->status)
                                            <a href="#"><i title="@lang('label.ready_to_read')" class="fa fa-check"></i></a>
                                        @else
                                            <a href="#"><i title="@lang('label.wait_for_censorship')" class="fa fa-flask"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($upload->is_illegal)
                                            <i title="@lang('label.is_illegal')" class="fa fa-exclamation-triangle"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.options') <i class="fa fa-caret-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="{{ route('viewDocument', $upload->id) }}"><i class="fa fa-external-link"></i> @lang('label.detail')</a></li>
                                                <li class="dropdown-item">
                                                    {{ Form::open(['route' => ['document.destroy', $upload->id], 'method' => 'DELETE'] ) }}
                                                        {{ Form::button('<i  class="fa fa-trash"></i>&nbsp;'.trans('label.delete_document'), ['type' => 'submit', 'class' => 'btn btn-defaul btn-sm', 'id' => 'bt-delete-document']) }}
                                                    {{ Form::close() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $uploaded->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('javascript')
    {{ Html::script('js/upload.js') }}
    @endsection
