<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function orientados() {
        
         return $this->hasMany('App\Aluno','teacher_id');
    }
}
