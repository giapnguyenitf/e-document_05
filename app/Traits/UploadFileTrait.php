<?php
namespace App\Traits;

use Carbon;
use Auth;

trait UploadFileTrait
{
    public function uploadFile($request)
    {
        $user_id = Auth::user()->id;
        $file_path = $request->document->store(config('setting.documents_path'));
        $file_name = explode('/', $file_path)[2];
        $file_type = $request->document->extension();
        $size = round($request->document->getClientSize()/(1024*1024), 2);
        $created_at = Carbon\Carbon::now();
        $updated_at = Carbon\Carbon::now();
        $thumbnail_path = $request->thumbnail->store(config('setting.thumbnails_path'));
        $thumbnail = explode('/', $thumbnail_path)[2];
        
        return compact('file_name', 'file_type', 'size', 'thumbnail', 'user_id', 'created_at', 'updated_at');
    }
}
?>
