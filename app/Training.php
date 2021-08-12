<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['traning_title', 'topic', 'institute', 'country', 'location', 'pass_year', 'duration'
    ];
}
