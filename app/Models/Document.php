<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Document extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'file_name',
        'description',
        'size',
        'file_type',
        'thumbnail',
        'downloads',
        'views',
        'is_illegal',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnailPathAttribute()
    {
        return Storage::url(config('setting.thumbnails'). $this->thumbnail);
    }

    public function getDocumentPathAttribute()
    {
        return Storage::url(config('setting.documents_path'). $this->file_name);
    }

    public function getDownloadLinkAttribute()
    {
        return public_path(Storage::url(config('setting.download_path').$this->file_name));
    }
}
