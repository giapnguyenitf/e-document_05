<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use Auth;
use Session;

class FriendController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create($id)
    {
        try
        {
            $first_user = Auth::user()->id;
            $second_user = $id;
            Friendship::create(compact('first_user', 'second_user'));

            return back();
        } catch(\Exception $e) {
            Session::flash('addFriendFail', trans('label.add_friend_fail'));

            return back();
        }
    }

    public function delete($id)
    {
        try
        {
            Friendship::where(function ($query) use ($id){
                $query->where('first_user', Auth::user()->id)->where('second_user', $id);
            })->orWhere(function ($query) use ($id) {
                $query->where('first_user', $id)->where('second_user', Auth::user()->id);
            })->delete();

            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function update($id)
    {
        try
        {
            Friendship::where('first_user', $id)
                ->where('second_user', Auth::user()->id)
                ->update(['status' => config('setting.true')]);

            return back();
        } catch(\Exception $e) {
            return back();
        }
    }
}
