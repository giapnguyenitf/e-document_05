<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\History;
use App\Models\Favorite;
use Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function showUploaded()
    {
        $uploaded = Document::where('user_id', Auth::user()->id)->paginate(config('setting.number_per_page'));

        return view('user.uploaded', compact('uploaded'));
    }

    public function showDownloaded()
    {
        $downloaded = History::where('user_id', Auth::user()->id)->where('type', config('setting.download'))->get();

        return view('user.downloaded', compact('downloaded'));
    }

    public function showFavorites()
    {
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        
        return view('user.favorites', compact('favorites'));
    }
}
