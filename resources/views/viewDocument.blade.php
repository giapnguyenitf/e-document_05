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
                                        <h5 id="{{ $document->id }}">{{ $document->name }}</h5>
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

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="comment-header">
                                <div><i class="fa fa-commenting-o fa-2x"></i></div>
                                <div><h5>@lang('label.comment')</h5></div>
                                <div class="line"><hr></div>
                            </div>
                            <div class="comment-body">
                                <input id="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input id="document_id" type="hidden" value="{{ $document->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row box-comment">
                                <div class="col-md-1">
                                    <div class="avatar-user-comment">
                                        <img class="img-responsive" src="{{ Storage::url(config('setting.avatar_path').Auth::user()->avatar) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="comment-textarea{{ $errors->has('messages') ? ' has-error' : '' }}">
                                        <form action="" method="post">
                                            <textarea class="form-control" name="comment_messages" id="comment_messages" rows="2"></textarea>
                                            <input class="btn btn-primary" type="button" name="bt_comment" id="bt_comment" value="@lang('label.comment')">
                                        </form>
                                    </div>
                                    @if ($errors->has('messages'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('messages') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="comment-row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    {{ Html::script('js/comment.js') }}
    {{ Html::script('js/master.js') }}
@endsection
