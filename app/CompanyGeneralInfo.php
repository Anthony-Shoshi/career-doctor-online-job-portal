<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyGeneralInfo extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'company_default_country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'company_default_city_id', 'id');
    }

    public function industry()
    {
        return $this->belongsTo(JobIndustry::class, 'industry_id', 'id');
    }
}
