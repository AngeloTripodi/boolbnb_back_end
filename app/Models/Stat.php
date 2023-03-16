<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        //! TODO: add apartment_id column
        'ip_address',
        'data_view'
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
