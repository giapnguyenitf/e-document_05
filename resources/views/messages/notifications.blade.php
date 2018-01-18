<!-- update profile messages -->
@if(Session::has('update_profile_success'))
    <div class="alert alert-success">
        {{ Session::get('update_profile_success') }}
    </div>
@endif
@if(Session::has('update_profile_fail'))
    <div class="alert alert-danger">
        {{ Session::get('update_profile_fail') }}
    </div>
@endif
<!-- change password messages -->
@if(Session::has('update_password_success'))
    <div class="alert alert-success">
        {{ Session::get('update_password_success') }}
    </div>
@endif
@if(Session::has('update_password_fail'))
    <div class="alert alert-danger">
        {{ Session::get('update_password_fail') }}
    </div>
@endif
<!-- upload document -->
@if(Session::has('upload_document_success'))
    <div class="alert alert-success">
        {{ Session::get('upload_document_success') }}
    </div>
@endif
@if(Session::has('upload_document_fail'))
    <div class="alert alert-danger">
        {{ Session::get('upload_document_fail') }}
    </div>
@endif
<!-- download document -->
@if(Session::has('not_enough_coins'))
    <div class="alert alert-danger">
        {{ Session::get('not_enough_coins') }}
    </div>
@endif
@if(Session::has('file_not_found'))
    <div class="alert alert-danger">
        {{ Session::get('file_not_found') }}
    </div>
@endif
@if(Session::has('exception'))
    <div class="alert alert-danger">
        {{ Session::get('exception') }}
    </div>
@endif
