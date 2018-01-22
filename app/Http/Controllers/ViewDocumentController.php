<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Document;
use App\Models\Favorite;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveHistoryTrait;
use Auth;
use Storage;
use Session;

class ViewDocumentController extends Controller
{
    use SaveHistoryTrait;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index($id)
    {
        try
        {
            $categories = Category::with('subCategories')->where([ 
                ['parent_id', '=', config('setting.null')],
                ['status', '=', config('setting.true')],
            ])->orderBy('name', 'asc')->get();
            
            $favorites = Favorite::where('user_id', Auth::user()->id)->where('document_id', $id)->get()->count();
            $document = Document::where('id', $id)->get()->first();
            $document->views ++;
            $document->save();
            $history = $this->addViewHistory($document->id);
    
            return view('viewDocument', compact('categories', 'document', 'favorites'));
        } catch(\Exception $e) {
            Session::flash('exception', trans('messages.exception'));

            return back();
        }
    }

    public function favorites($id)
    {
        try
        {
            $favorites = new Favorite;
            $favorites->user_id = Auth::user()->id;
            $favorites->document_id = $id;
            $favorites->save();

            return back();
        } catch(\Exception $e) {
            Session::flash('exception', trans('messages.exception'));
            
            return redirect()->route('index');
        }
    }

    public function unFavorites($id)
    {
        try
        {
            Favorite::where('document_id', $id)->where('user_id', Auth::user()->id)->delete();
            
            return back();
        } catch(\Exception $e) {
            Session::flash('exception', trans('messages.exception'));
            
            return back();
        }
    }

    public function download($id)
    {
        try
        {
            $user = Auth::user();
            $document = Document::find($id);
            $exists = Storage::disk('public')->exists(config('setting.documents').$document->file_name);
            if ($exists) {
                if ($user->free_download) {
                    $user->free_download --;
                    $user->save();
                    $document->downloads ++;
                    $document->save();
                    $this->addDownloadHistory($document->id);
    
                    return response()->download($document->download_link);
                }
                if ($user->avaiable_coin >= 10) {
                    $user->avaiable_coin -= 10;
                    $user->save();
                    $document->downloads ++;
                    $document->save();
                    $this->addDownloadHistory($document->id);
    
                    return response()->download($document->download_link);
                }
                Session::flash('not_enough_coins', trans('messages.not_enough_coins'));
            
                return back();
            }
            Session::flash('file_not_found', trans('messages.file_not_found'));

            return back();
        } catch(\Exception $e) {
            Session::flash('exception', trans('messages.exception'));

            return back();
        }
    }
}
