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

    public function show()
    {
        $friends = User::whereIn('id', function ($query) {
            $query->select('second_user')->from('friendships')
            ->where(function ($query) {
                $query->where('first_user', Auth::user()->id)->where('status', config('setting.true'));
            });
        })->orWhereIn('id', function ($query) {
            $query->select('first_user')->from('friendships')
            ->where(function ($query) {
                $query->where('second_user', Auth::user()->id)->where('status', config('setting.true'));
            });
        })->paginate(config('setting.number_per_page'));

        return view('user.friendsList', compact('friends'));
    }

    public function showRequests()
    {
        $friends_requests = User::whereIn('id', function ($query) {
            $query->select('first_user')->from('friendships')
            ->where(function ($query) {
                $query->where('second_user', Auth::user()->id)->where('status', config('setting.false'));
            });
        })->paginate(config('setting.number_per_page'));

        return view('user.friendsRequests', compact('friends_requests'));
    }
}
