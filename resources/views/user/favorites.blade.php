@extends('layouts.master')
    @section('content')
        <div class="container">
            @include('user.sidebar')
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>@lang('label.favorites')</h5>
                    </div>
                    <div class="panel-body">
                        <table  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('label.document_name')</th>
                                    <th>@lang('label.description')</th>
                                    <th>@lang('label.file_type')</th>
                                    <th>@lang('label.detail')</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
