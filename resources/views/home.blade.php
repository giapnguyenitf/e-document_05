@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="features_items">
                            <!--features_items-->
                            <h2 class="title text-center">@lang('label.new_documents')</h2>
                            @foreach ($newDocuments as $newDocument)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a class="product_thumbnail" href="{{ route('viewDocument', $newDocument->id) }}">
                                                    <img class="img-responsive" src="{{ $newDocument->thumbnail_path }}" />
                                                </a>
                                                <a class="product_name" href="{{ route('viewDocument', $newDocument->id) }}">
                                                    <h5>{{ $newDocument->name }}</h5>
                                                </a>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>
                                                        <a href="#"><i class="fa fa-file"></i>{{ $newDocument->file_type }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-eye"></i>{{ $newDocument->views }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-cloud-download"></i>{{ $newDocument->downloads }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 all_items">
                            <h2 class="title text-center">@lang('label.all_documents')</h2>
                            <div class="document_item">
                            @foreach ($documents as $document)
                                <div class="row items">
                                    <div class="col-md-2">
                                        <div class="document_thumbnail">
                                            <a href="{{ route('viewDocument', $document->id) }}"><img class="img-responsive" src="{{ $document->thumbnail_path }}" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="document_info">
                                            <div class="document_name"><a href="{{ route('viewDocument', $document->id) }}">{{ $document->name }}</a></div>
                                            <div class="document_more_detail">
                                                <div><a><i class="fa fa-adjust"></i> @lang('label.size'): {{$document->size}}</a></div>
                                                <div><a><i class="fa fa-file"></i> @lang('label.file_type'): {{ $document->file_type }}</a></div>
                                                <div><a><i class="fa fa-eye"></i>  @lang('label.views'): {{ $document->views }}</a></div>
                                                <div><a><i class="fa fa-cloud-download"></i>  @lang('label.downloads'): {{ $document->downloads }}</a></div>
                                                <div><a href="{{ route('showUser', $document->user->id) }}"><i class="fa fa-user"></i> @lang('label.upload_by'): <span class="user-upload">{{$document->user->name}}</span></a></div>
                                            </div>
                                            <div class="document_description">{{ $document->description }}</div>
                                            <div class="document_category"><span>@lang('label.category'): </span> <a href="{{ route('category',$document->Category->id) }}">{{ $document->Category->name }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{ $documents->links() }}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    {{ Html::script('js/home.js') }}
@endsection
