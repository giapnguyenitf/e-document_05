<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\Friendship;
use App\Traits\FriendshipsTrait;
use Auth;

class ShowUserController extends Controller
{
    use FriendshipsTrait;

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index($id)
    {
        if ($id == Auth::user()->id) {
            return redirect()->route('profile.index');
        }

        return view('userInfo')->with($this->checkRelationship($id));
    }
}
