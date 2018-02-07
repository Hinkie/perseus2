<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';

    public function funcionario() {
        
         return $this->hasMany('App\Funcionario','estado_civil_id');
    }
}
