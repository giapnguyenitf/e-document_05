@extends('layouts.master')
    @section('content')
        <div class="container">
        @include('user.sidebar')
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>@lang('label.downloaded')</h5>
                    </div>
                    <div class="panel-body">
                        <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('label.document_name')</th>
                                    <th>@lang('label.file_type')</th>
                                    <th>@lang('label.times')</th>
                                    <th>@lang('label.date')</th>
                                    <th>@lang('label.detail')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downloaded as $download)
                                    <tr>
                                        <td>{{ $download->document->name }}</td>
                                        <td>{{ $download->document->file_type }}</td>
                                        <td>{{ $download->number }}</td>
                                        <td>{{ $download->updated_at->format('d/m/Y') }}</td>
                                        <td><a href="{{ route('viewDocument', $download->document->id) }}"><i class="fa fa-external-link"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    