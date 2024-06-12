<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function requestedProviders() {
        return $this->hasMany(Provider::class, 'user_id');
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
    public function requests()
    {
        return $this->belongsToMany(Provider::class, 'requests');
    }


}
