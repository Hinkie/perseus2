<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
   protected $table = 'funcao';

   public function funcionario()
    {
    	return $this->hasMany('App\Funcionario','funcao_id');
	}
}
