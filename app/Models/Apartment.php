<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = array('user_id', 'title', 'slug', 'description', 'image', 'latitude', 'longitude', 'address', 'n_rooms', 'n_beds', 'n_bathrooms', 'square_meters', 'is_visible', 'n_price');

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)->withPivot('ending_date');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
