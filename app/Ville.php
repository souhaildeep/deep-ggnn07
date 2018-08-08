<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ville extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	  protected $casts = [
        'ville' => 'array' , 
        
    ];
}
