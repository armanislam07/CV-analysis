<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
    	'exp_com_name',
    	'exp_com_business',
    	'exp_com_designation',
    	'exp_com_department',
    	'exp_com_location',
    	'exp_to_date',
    	'exp_com_responsibilities',
    	'exp_area',
        'user_exp_keyword',
    ];
    protected $casts = [

        'exp_from_date' => 'date:Y-m-d',
        'exp_to_date' => 'date:Y-m-d'
    ];
    

    public function duration()
    {
        $start = Carbon::parse($this->exp_from_date);
        $end = Carbon::parse($this->exp_to_date);
        $years = $end->diffInYears($start);
        $seconds = $end->diffInSeconds($start);

        return $hours . ':' . $seconds;
    }
}
