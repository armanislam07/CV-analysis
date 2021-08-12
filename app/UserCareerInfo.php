<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCareerInfo extends Model
{
    protected $fillable = ['objective', 'present_salary', 'expected_salary', 'job_lavel','career_summary', 'special_quality',
	];
}
