<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
    	'exam_title','education_type', 'subject', 'institute', 'board', 'result', 'result_scale', 'pass_year', 'duration'
    ];
}
