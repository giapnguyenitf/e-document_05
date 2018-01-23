<?php

namespace App\Http\Controllers;
use App\Models\Document;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $categories = Category::with('subCategories')->where([ 
            ['parent_id', '=', config('setting.null')],
            ['status', '=', config('setting.true')],
        ])->orderBy('name', 'asc')->get();

        $documents = Document::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhereIn('user_id', function ($query) use ($keyword) {
                $query->select('id')->from('users')->where('name', 'like', '%' . $keyword . '%');
            })->paginate(config('setting.number_per_page'));

        return view('searchResult', compact('documents', 'categories'));
    }
}
