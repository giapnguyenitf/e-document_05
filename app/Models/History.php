<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'document_id',
        'number',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
