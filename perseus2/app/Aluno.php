<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
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

    public function status_aluno() 
    {
        return $this->belongsTo('App\StatusAluno','status_aluno_id');
    }

    public function curso() 
    {
        return $this->belongsTo('App\Curso','curso_id');
    }
}
