<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::with('subCategories')->where([ 
            ['parent_id', '=', config('setting.null')],
            ['status', '=', config('setting.true')],
        ])->orderBy('name', 'asc')->get();
        
        $newDocuments = Document::where('status', config('setting.true'))->orderBy('created_at', 'desc')->take(config('setting.number_new_documents'))->get();
        $documents = Document::orderBy('created_at', 'desc')->paginate(config('setting.number_per_page'));

        return view('home', compact('categories', 'newDocuments', 'documents'));
    }
}
