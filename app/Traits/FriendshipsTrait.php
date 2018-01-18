<?php
namespace App\Traits;

use Auth;
use App\Models\Friendship;
use App\Models\User;
use App\Models\Document;

trait FriendshipsTrait
{
    public function checkRelationship($id)
    {
        $user = User::where('id', $id)->get()->first();
        $recent_uploads = Document::where('user_id', $id)->orderBy('created_at', 'desc')->take(config('setting.number_new_documents'))->get();
       
        $number_friends = Friendship::where('first_user', $user->id)->orWhere(function ($query) use ($user) {
            $query->where('second_user', $user->id);
        })->where('status', true)->get()->count();

        $is_friend = Friendship::where(function ($query) use ($user) {
            $query->where('first_user', Auth::user()->id)->where('second_user', $user->id)->where('status', config('setting.true'));
        })->orWhere(function ($query) use ($user) {
            $query->where('first_user', $user->id)->where('second_user', Auth::user()->id)->where('status', config('setting.true'));
        })->get()->count();
        
        $request_send = Friendship::where('first_user', Auth::user()->id)
            ->where('second_user', $user->id)
            ->where('status', config('setting.false'))
            ->get()->count();

        $request_receive = Friendship::where('first_user', $user->id)
            ->where('second_user', Auth::user()->id)
            ->where('status', config('setting.false'))
            ->get()->count();
            
        $status = config('setting.is_not_friend');
        if ($is_friend) {
            $status = config('setting.is_friend');
        }
        if ($request_send) {
            $status = config('setting.request_send');
        }
        if ($request_receive) {
            $status = config('setting.request_receive');
        } 

        return compact('user', 'recent_uploads', 'number_friends', 'status');
    }
}
?>
