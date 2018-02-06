<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Aluno;

class AlunoController extends Controller
{
    public function index() 
    { 	
	    $alunos = Aluno::orderBy('nome', 'DSC')->get();

	    return view('layouts.aluno.aluno-inicio', compact('alunos'));
    }

    public function inicio() 
    { 	
	    $id = Auth::id();

	    $aluno = Aluno::find($id);

	    return view('layouts.aluno.aluno-inicio', compact('aluno'));
    }
    
    public function arquivos() 
    {   
        $id = Auth::id();

        $aluno = Aluno::find($id);

        return view('layouts.aluno.aluno-arquivos', compact('aluno'));
    }
    
    public function dados() 
    {   
    $id = Auth::id();

    $aluno = Aluno::find($id);

    return view('layouts.aluno.aluno-dados', compact('aluno'));
    }
    
    public function financeiro() 
    {   
    $id = Auth::id();

    $aluno = Aluno::find($id);

    return view('layouts.aluno.aluno-financeiro', compact('aluno'));
    }
    
    public function historico() 
    {   
    $id = Auth::id();

    $aluno = Aluno::find($id);

    return view('layouts.aluno.aluno-historico', compact('aluno'));
    }
    
    public function relatorios() 
    {   
        $id = Auth::id();

        $aluno = Aluno::find($id);

        return view('layouts.aluno.aluno-relatorios', compact('aluno'));
    }
    
    public function tarefas() 
    {   
        $id = Auth::id();

        $aluno = Aluno::find($id);

        return view('layouts.aluno.aluno-tarefas', compact('aluno'));
    }

    public function contato() 
    {   
        $id = Auth::id();

        $aluno = Aluno::find($id);

        return view('layouts.aluno.aluno-contato', compact('aluno'));
    }

}
