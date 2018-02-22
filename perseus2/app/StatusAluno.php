<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAluno extends Model
{
    protected $table = 'status_aluno';

    public function aluno() 
    {
		return $this->hasMany('App\Aluno','status_aluno_id');
    }
}
