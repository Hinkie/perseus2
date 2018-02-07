<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function funcionario() 
    {
		return $this->hasMany('App\Funcionario','status_id');
    }
}
