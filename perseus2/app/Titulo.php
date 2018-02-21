<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{    
    public function professor() 
    {
		return $this->hasMany('App\Professor','titulo_id');
    }
}
