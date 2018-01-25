<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Category;
use App\Http\Requests\UpdateDocumentRequest;

class CensorDocumentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('subCategories')->where([ 
            ['parent_id', '=', config('setting.null')],
            ['status', '=', config('setting.true')],
        ])->orderBy('name', 'asc')->get();
        $documents = Document::where('status', config('setting.false'))->paginate(config('setting.number_per_page'));

        return view('admin.censorDocument', compact('documents', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateDocumentRequest $request)
    {
        $document_id = $request->id;
        $data = $request->only([
            'name',
            'description',
        ]);
        if ($request->hasFile('thumbnail')) {
            $thumbnail_path = $request->thumbnail->store(config('setting.thumbnails_path_folder'));
            $thumbnail = explode('/', $thumbnail_path)[2];
            $data['thumbnail'] = $thumbnail;
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}