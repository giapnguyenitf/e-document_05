<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = [
        'first_user',
        'second_user',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
