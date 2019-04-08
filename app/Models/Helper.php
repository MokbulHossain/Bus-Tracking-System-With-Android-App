<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
     protected $table  = "helper";

    protected $fillable = [
    	'id','name', 'contact', 'nid', 'address'
    ];
}
