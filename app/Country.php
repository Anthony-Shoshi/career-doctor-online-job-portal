<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function companies()
    {
        return $this->hasMany(CompanyGeneralInfo::class);
    }

    public function candidates()
    {
        return $this->hasMany(CandidateGeneralInfo::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
