<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPersonalinfo extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'father_name', 'mother_name', 'dob', 'gender', 'religion', 'marital_status', 'nationality', 'user_email', 'user_email2', 'nid_no', 'mobile_number', 'mobile_number2', 'parmanent_address', 'paresent_address',
    ];
}
