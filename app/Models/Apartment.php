<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
