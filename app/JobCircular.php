<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCircular extends Model
{
    protected $fillable = [
    	'job_title', 'vacancy', 'job_context', 'employment_status', 'education_type', 'education_requirements', 'experience','job_exp_keyword','job_catagories', 'salary', 'accepted_parcent', 'job_area', 'job_deadline',  
    ];
}
