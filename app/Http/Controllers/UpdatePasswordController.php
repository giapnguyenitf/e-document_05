<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdatePasswordRequest;
use Auth;
use Session;

class UpdatePasswordController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function update(UpdatePasswordRequest $request)
    {
        try
        {
            $user = User::find(Auth::user()->id);
            $user->password_hash = $request->password;
            $user->save();
            Session::flash('update_password_success', trans('messages.update_password_success'));

            return redirect()->route('profile.index');
        } catch(\Exception $e) {
            Session::flash('update_password_fail', trans('messages.update_password_fail'));

            return back();
        }
    }
}
