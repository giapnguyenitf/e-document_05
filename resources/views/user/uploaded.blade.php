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
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('label.document_name')</th>
                                <th>@lang('label.date')</th>
                                <th>@lang('label.file_type')</th>
                                <th>@lang('label.downloads')</th>
                                <th>@lang('label.status')</th>
                                <th>@lang('label.detail')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uploaded as $upload)
                                <tr>
                                    <td>{{ $upload->name }}</td>
                                    <td>{{ $upload->created_at }}</td>
                                    <td>{{ $upload->file_type }}</td>
                                    <td>{{ $upload->downloads }}</td>
                                    <td>{{ $upload->status }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('javascript')
    {{ Html::script('js/upload.js') }}
    @endsection
