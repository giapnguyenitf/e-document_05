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
                            <img src="images/home/map.png" alt="" />
                            <p>255-257 Hùng Vương, Vĩnh Trung, Thanh Khê, Đà Nẵng, Vietnam</p>
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
                                <li>
                                    <a href="#">Kinh tế-Tài chính</a>
                                </li>
                                <li>
                                    <a href="#">Văn học-Đời sống</a>
                                </li>
                                <li>
                                    <a href="#">Tiếng anh-Ngoại ngữ</a>
                                </li>
                                <li>
                                    <a href="#">Kỹ năng mềm</a>
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
                            <form action="#" class="searchform">
                                <input type="text" placeholder="@lang('common.your_email')" />
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-arrow-circle-o-right"></i>
                                </button>
                                <p>@lang('common.get_the_most_update')</p>
                            </form>
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
    <!--/Footer-->
    {{ Html::script('js/jquery.js')}}
    {{ Html::script('js/bootstrap.js')}}
</body>
</html>
