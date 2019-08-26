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
}
