<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Response;

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
}
