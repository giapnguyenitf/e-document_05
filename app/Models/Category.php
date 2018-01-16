<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function parentCategory()
    {
        return $this->belongsToOne(Category::class, 'parent_id');
    }
    
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', '=', config('setting.true'))->orderBy('name', 'asc');
    }
}
