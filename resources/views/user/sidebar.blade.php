<div class="col-md-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5>@lang('label.member')</h5>
        </div>
        <div class="panel-body">
            <div class="avatar">
                <img class="img-responsive"  src="{{ Storage::url('avatars/'.Auth::user()->avatar) }}" alt="">
            </div>
            <div id="user-name">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p>Coins: {{ Auth::user()->avaiable_coin }}</p>
                </div>
            <div class="user-detail">
                <ul>
                    <li><a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> @lang('label.user_profile')</a></li>
                    <li><a href="{{ route('document.index') }}"><i class="fa fa-cloud-upload"></i> @lang('label.upload_now')</a></li>
                    <li><a href=""><i class="fa fa-heart"></i> @lang('label.favorites')</a></li>
                    <li><a href=""><i class="fa fa-cloud-download"></i> @lang('label.downloaded')</a></li>
                    <li><a href=""><i class="fa fa-file"></i> @lang('label.uploaded')</a></li>
                    <li><a href=""><i class="fa fa-btc"></i> @lang('label.buy_coins')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
