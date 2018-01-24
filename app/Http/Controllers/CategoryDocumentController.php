<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Document;

class CategoryDocumentController extends Controller
{
    public function index($categoryId)
    {
        $categories = Category::with('subCategories')->where([ 
            ['parent_id', '=', config('setting.null')],
            ['status', '=', config('setting.true')],
        ])->orderBy('name', 'asc')->get();

        $documents = Document::where('category_id', $categoryId)->where('status', config('setting.true'))->orderBy('created_at', 'desc')->paginate(config('setting.number_per_page'));

        $newDocuments = Document::where([
            ['status', config('setting.true')],
            ['category_id', $categoryId],
        ])->orderBy('created_at', 'desc')->take(config('setting.number_new_documents'))->get();

        return view('home', compact('categories', 'newDocuments', 'documents'));
    }
}
