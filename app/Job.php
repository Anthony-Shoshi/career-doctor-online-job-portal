<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
