<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadDocumentRequest;
use App\Models\Document;
use App\Models\Category;
use App\Traits\UploadFileTrait;
use App\Traits\NewCategoryTrait;
use Auth;
use Carbon;
use Session;

class DocumentController extends Controller
{
    use UploadFileTrait;
    use NewCategoryTrait;
    
    public function __construct()
    {
        return $this->middleware('auth');
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

        return view('user.upload', compact('categories'));
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
    public function store(UploadDocumentRequest $request)
    {
        try
        {
            $data = $request->only([
                'name',
                'description',
            ]);
            $data['category_id'] = $request->has('new_category') ? $this->addNewCategory($request) : $request->category_id; 
            $data += $this->uploadFile($request);
            Document::create($data);
            Session::flash('upload_document_success', trans('messages.upload_document_success'));

            return redirect()->route('document.index');
        } catch(\Exception $e) {
            Session::flash('upload_document_fail', trans('messages.upload_document_fail'));

            return back();
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
