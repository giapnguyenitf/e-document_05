<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>
                            <span>@lang('common.e')</span>-@lang('common.document')
                        </h2>
                        <p>@lang('common.slogan')</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{ asset('images/home/map.png') }}" alt="" />
                        <p>@lang('common.address')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>@lang('common.service')</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#">@lang('common.online_help')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.contact_us')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.faq')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>@lang('common.e-document')</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#">@lang('common.home')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>@lang('common.policies')</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#">@lang('common.term_of_use')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.privacy_policy')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.refund_policy')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.billing_system')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.ticket_system')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>@lang('common.about')</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#">@lang('common.company_infomation')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.careers')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.office_location')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.affillate_program')</a>
                            </li>
                            <li>
                                <a href="#">@lang('common.copyright')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>@lang('common.receive_news')</h2>
                        {{ Form::open(['route' => 'login', 'class' => 'searchform', 'method' => 'POST', ] )}}
                            {{ Form::text('email', null, ['placeholder' => trans('common.your_email'), ]) }}
                            {{ Form::button('<i class="fa fa-arrow-circle-o-right"></i>', ['type' => 'submit', 'class' => 'btn btn-default']) }}
                            <p>@lang('common.get_the_most_update')</p>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">@lang('common.copyright_all')</p>
            </div>
        </div>
    </div>
</footer>
