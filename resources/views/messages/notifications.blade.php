<!-- upload messages -->
@if(Session::has('messages.success'))
    <div class="alert alert-success">
        {{ Session::get('messages.success') }}
    </div>
@endif
@if(Session::has('messages.fail'))
    <div class="alert alert-danger">
        {{ Session::get('messages.fail') }}
    </div>
@endif
<!-- change password messages -->
@if(Session::has('changePasswordStatus'))
    <div class="alert alert-danger">
        {{ Session::get('changePasswordStatus') }}
    </div>
@endif
