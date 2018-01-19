<?php
namespace App\Traits;

use Auth;
use App\Models\Document;
use App\Models\History;

trait SaveHistoryTrait
{
    public function addDownloadHistory($document_id)
    {
        $collect = History::where('user_id', Auth::user()->id)
            ->where('document_id', $document_id)
            ->where('type', config('setting.download'))->get();
        if ($collect->count()) {
            $history = $collect->first();
            $history->number ++;
            
            return $history->save();
        }
        $history = new History;
        $history->user_id = Auth::user()->id;
        $history->document_id = $document_id;
        $history->type = config('setting.download');
        
        return $history->save();
    }

    public function addViewHistory($document_id)
    {
        $collect = History::where('user_id', Auth::user()->id)
            ->where('document_id', $document_id)
            ->where('type', config('setting.view'))->get();
        if ($collect->count()) {
            $history = $collect->first();
            $history->number ++;

            return $history->save();
        }
        $history = new History;
        $history->user_id = Auth::user()->id;
        $history->document_id = $document_id;
        $history->type = config('setting.view');

        return $history->save();
    }
}
?>
