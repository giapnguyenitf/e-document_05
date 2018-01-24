<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;

class AcceptDocumentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function accept($id)
    {
        Document::where('id', $id)->update(['status' => config('setting.true')]);

        return redirect()->route('censor-document.index');
    }
}
