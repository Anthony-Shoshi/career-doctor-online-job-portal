<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateGeneralInfo extends Model
{
    protected $fillable = ['user_id', 'industry_id', 'contact_email', 'contact_phone', 'current_address', 'current_city_id', 'current_postcode', 'current_country_id', 'current_status', 'created_by', 'updated_by'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'current_country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'current_city_id', 'id');
    }

    public function industry()
    {
        return $this->belongsTo(JobIndustry::class, 'industry_id', 'id');
    }
}
