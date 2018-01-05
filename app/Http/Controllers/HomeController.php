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
        $newUploadDocuments = Document::where('status', true)->orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::with('subCategories')->whereNull('parent_id')->orderBy('name', 'asc')->get();

        return view('home')->with(compact('newUploadDocuments','categories'));
    }
}
