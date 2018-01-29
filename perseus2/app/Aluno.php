<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function orientador() {
        
        return $this->belongsTo('App\Teacher','teacher_id');
    
    }
}
