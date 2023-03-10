<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    function city(){
        return $this->hasMany(City::class);
    }
}
