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
                                    <th>@lang('label.file_type')</th>
                                    <th>@lang('label.date')</th>
                                    <th>@lang('label.detail')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favorites as $favorite)
                                    <tr>
                                        <td>{{ $favorite->document->name }}</td>
                                        <td>{{ $favorite->document->file_type }}</td>
                                        <td>{{ $favorite->document->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.options') <i class="fa fa-caret-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><a href="{{ route('viewDocument', $favorite->document->id) }}"><i class="fa fa-external-link"></i> @lang('label.detail')</a></li>
                                                    <li class="dropdown-item"><a href="{{ route('unFavoritesDocument', $favorite->document->id) }}"><i class="fa fa-trash"></i> @lang('label.un_favorites')</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
