<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = ['name', 'organization', 'designation', 'mobile', 'email', 'relation'
    ];
}
