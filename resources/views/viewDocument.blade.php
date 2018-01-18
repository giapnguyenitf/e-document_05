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
                       <div class="col-md-10 col-md-offset-1">
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="document-title">
                                        <h5>{{ $document->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row document-infomation">
                                        <div class="col-md-6">
                                            <div class="document-more-detail">
                                                <div class="people-share">@lang('label.share_by')&#58;&nbsp;<a href="{{ route('showUser', $document->user->id) }}">{{ $document->user->name }}</a></div>
                                                <div class="date-share">@lang('label.date')&#58;&nbsp;{{ $document->created_at->format('d/m/Y') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="document-statistic">
                                                <div class="number-views">@lang('label.views')&#58;&nbsp;{{ $document->views }}</div>
                                                <div class="number-downloads">@lang('label.downloads')&#58;&nbsp;{{ $document->downloads }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="document-options">
                                                <div class="bt-favorites">
                                                    @if ($favorites)
                                                        <a href="{{ route('unFavoritesDocument', $document->id) }}"><i class="fa fa-heart"></i>&nbsp;@lang('label.un_favorites')</a>
                                                    @else
                                                        <a href="{{ route('favoritesDocument', $document->id) }}"><i class="fa fa-heart-o"></i>&nbsp;@lang('label.favorites')</a>
                                                    @endif
                                                </div>
                                                <div class="bt-download">
                                                    <a href="{{ route('downloadDocument', $document->id) }}"><i class="fa fa-cloud-download"></i>&nbsp;@lang('label.downloads')</a>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('messages.notifications')
                                        </div>
                                    </div>
                                </div>

                           </div>
                       </div>
                    </div>
                    <div class="row viewer-pdf">
                        <div class="col-md-10 col-md-offset-1">
                            <object data="{{ $document->document_path }}" type="application/pdf" width="100%" height="700px">
                                <embed src="{{ $document->document_path }}" type="application/pdf">
                                    <p>@lang('label.browser_not_support_pdf')<a href="{{ route('downloadDocument', $document->id) }}">@lang('label.download_pdf')</a></p>
                                </embed>
                            </object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
