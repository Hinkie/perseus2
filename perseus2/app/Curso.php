<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function aluno() 
    {
		return $this->hasMany('App\Alunos','status_id');
    }
}
