<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';

    public function funcionario() {
        
         return $this->hasMany('App\Funcionario','estado_civil_id');
    }
    
    public function professor() 
    {
		return $this->hasMany('App\Professor','estado_civil_id');
    }

    public function aluno() 
    {
		return $this->hasMany('App\Aluno','estado_civil_id');
    }
}
