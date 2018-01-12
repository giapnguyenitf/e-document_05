<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'password',
        'provider',
        'provider_id',
        'is_admin',
        'remember_token',
        'firstname',
        'lastname',
        'date_of_birth',
        'address',
        'phone',
        'gender',
        'avatar',
        'avaiable_coin',
        'free_download',
        'number_illegal',
        'is_ban',
    ];

    public function documents() 
    {
        return $this->hasMany(Document::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function transactions() 
    {
        return $this->hasMany(Transaction::class);
    }

    public function histories() 
    {
        return $this->hasMany(History::class);
    }

    public function favorites() 
    {
        return $this->hasMany(Favorite::class);
    }

    public function friendships() 
    {
        return $this->hasMany(Friendship::class);
    }

    public function setPasswordHashAttribute($value)
    {
        $this->password = bcrypt($value);
    }
}
