<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateGeneralInfo extends Model
{
    protected $fillable = ['user_id', 'industry_id', 'contact_email', 'contact_phone', 'current_address', 'current_city_id', 'current_postcode', 'current_country_id', 'current_status'];
}
