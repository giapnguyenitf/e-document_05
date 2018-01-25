<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function index()
    {
        $users = User::count();
        $documents = Document::count();
        $categories = Category::count();

        return view('admin.index', compact('users', 'documents', 'categories'));
    }
}