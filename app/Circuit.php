<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Circuit extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	  protected $casts = [
        'titre' => 'array' , 
        'description' => 'array' , 
        'information' => 'array' ,
        'images' => 'array',
    ];
    public function plans(){
    	 return $this->hasMany('App\Planday');	
    }
}
