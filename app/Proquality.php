<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proquality extends Model
{
    protected $fillable = ['certificat', 'institute', 'location', 'pass_year', 'duration'
    ];
}
