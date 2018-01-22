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
                    <li><a href="{{ route('user.favorites') }}"><i class="fa fa-heart"></i> @lang('label.favorites')</a></li>
                    <li><a href="{{ route('user.downloaded') }}"><i class="fa fa-cloud-download"></i> @lang('label.downloaded')</a></li>
                    <li><a href="{{ route('user.uploaded') }}"><i class="fa fa-file"></i> @lang('label.uploaded')</a></li>
                    <li><a href="{{ route('user.depoisit') }}"><i class="fa fa-btc"></i> @lang('label.buy_coins')</a></li>
                    <li><a href="{{ route('friendsRequests') }}"><i class="fa fa-user-plus"></i> @lang('label.friend_requests')</a>&nbsp;&#40;<span class="friend_requests">0</span>&#41;</li>
                    <li><a href="{{ route('friendsList') }}"><i class="fa fa-users"></i> @lang('label.friends')</a>&nbsp;&#40;<span class="friends">0</span>&#41;</li>
                </ul>
            </div>
        </div>
    </div>
</div>
