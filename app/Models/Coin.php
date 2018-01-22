<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'cost',
        'coins_receive',
        'type',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getPriceAttribute()
    {
        return $this->cost . config('setting.vnd');
    }
}
