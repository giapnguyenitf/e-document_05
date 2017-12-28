<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'cost_per_coin',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
