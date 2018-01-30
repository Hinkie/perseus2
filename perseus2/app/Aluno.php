<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

	protected $guarded = [];

    public function orientador() 
    {
        return $this->belongsTo('App\Teacher','teacher_id');
    }
    
    public function usuario() {
        
        return $this->hasOne('App\User','id','user_id');
    
    }
}
