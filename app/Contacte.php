<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacte extends Model
{
    //
     protected $casts = [
        'titre' => 'array' , 
        'socialnet' => 'array' , 
    ];
    public function getRouteKeyName() {
        return 'titre';
    }
}
