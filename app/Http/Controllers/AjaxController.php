<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Friendship;
use App\Models\User;
use Response;
use Auth;

class AjaxController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with('subCategories')->where([
            ['parent_id', '=', config('setting.null')],
            ['status', '=', config('setting.true')],
        ])->orderBy('name', 'asc')->get();

        return Response::json($categories);
    }

    public function getRequestFriend()
    {
        $friend_requests = Friendship::where('second_user', Auth::user()->id)->where('status', config('setting.false'))->get()->count();
        $friends = Friendship::where(function ($query) {
            $query->where('first_user', Auth::user()->id)->where('status', config('setting.true'));
        })->orWhere(function ($query) {
            $query->where('second_user', Auth::user()->id)->where('status', config('setting.true'));
        })->get()->count();
        
        return Response::json([
            'friend_requests' => $friend_requests,
            'friends' => $friends,
        ]);
    }
}
