<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    protected $fillable = ['postion','company_name','city','country','is_current','start_date','created_by', 'updated_by'];
}
