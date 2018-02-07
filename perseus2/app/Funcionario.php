<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $guarded = [];

    public function usuario() 
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function estado_civil() 
    {
        return $this->belongsTo('App\EstadoCivil','estado_civil_id');
    }

    public function endereco() 
    {
        return $this->hasOne('App\Endereco','id','endereco_id');  
    }

    public function status() 
    {
        return $this->belongsTo('App\Status','status_id');
    }

    public function funcao() 
    {
        return $this->belongsTo('App\Funcao','funcao_id');
    }
}
