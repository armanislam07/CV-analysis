<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comProfile extends Model
{
    protected $fillable = [
    	'com_name', 'com_logo', 'com_cont_Pname', 'com_cont_Pmobile', 'com_email', 'com_number', 'com_service', 'com_Haddress', 'com_sub_address'
    ];
}
