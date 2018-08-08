<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planday extends Model
{
     protected $casts = [
        'jour' => 'array' , 
        'titre' => 'array' , 
        'description' => 'array' ,    
    ];
}
