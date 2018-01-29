<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;

class AlunoController extends Controller
{
    public function index() {
        	
	    $alunos = Aluno::orderBy('nome', 'DSC')->get();

	    return view('layouts.alunos', compact('alunos'));
    }
}
