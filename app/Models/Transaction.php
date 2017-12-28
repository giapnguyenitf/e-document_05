<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'coin_id',
        'amount',
        'status',
    ];

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}
