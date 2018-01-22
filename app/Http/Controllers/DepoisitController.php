<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;

class DepoisitController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $table_price = Coin::where('type', config('setting.viettel'))->get();

        return view('user.depoisit', compact('table_price'));
    }
}
