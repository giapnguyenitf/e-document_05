@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="list-document">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>@lang('label.document_name')</th>
                        <th>@lang('label.user_upload')</th>
                        <th>@lang('category')</th>
                        <th>@lang('label.views')</th>
                        <th>@lang('label.downloads')</th>
                        <th>@lang('label.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->name }}</td>
                            <td>{{ $document->user->name }}</td>
                            <td>{{ $document->category->name }}</td>
                            <td>{{ $document->views }}</td>
                            <td>{{ $document->downloads }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown dropdown-toggle" data-toggle="dropdown">@lang('label.options')<i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href=""><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;@lang('label.show')</a></li>
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
    </div>
@endsection