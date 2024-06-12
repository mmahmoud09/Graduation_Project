<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function requests()
    {
        return $this->belongsToMany(User::class, 'requests');
    }

}
