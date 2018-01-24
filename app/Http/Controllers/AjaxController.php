<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Friendship;
use App\Models\User;
use App\Models\Comment;
use App\Models\Document;
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

    public function getComments($id)
    {
        $comments = Document::find($id)->comments()->with('user')->orderBy('created_at', 'desc')->get();

        return Response::json($comments);
    }

    public function saveComment(CommentRequest $request)
    {
        if ($request->ajax()) {
            Comment::create($request->all());

            return Response::json([
                'status' => 200,
                'messages' => trans('messages.success'),
            ]);
        } else {
            return Response::json([
                'status' => 404,
                'messages' => trans('messages.fail'),
            ]);
        }
    }

    public function getDocument($id)
    {
        $document = Document::where('id', $id)->with('category')->get()->first();

        return Response::json($document);
    }

    public function getAllCategories()
    {
        $categories = Category::with('subCategories')->where([
            ['parent_id', '=', config('setting.null')],
        ])->orderBy('name', 'asc')->get();

        return Response::json($categories);
    }

    public function getSubCategories($parent_id)
    {
        $subCategories = Category::where('parent_id', $parent_id)->get();

        return Response::json($subCategories);
    }
}
