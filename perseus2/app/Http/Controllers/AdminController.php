<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Aluno;

class AdminController extends Controller
{
    public function alunos() 
    { 	
	    $alunos = Aluno::orderBy('nome', 'DSC')->get();

	    return view('layouts.admin.admin-alunos', compact('alunos'));
    }
	
	public function funcionarios() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-funcionarios', compact('alunos'));
	}
	
	public function professores() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-professores', compact('alunos'));
	}
	
	public function registrarAluno() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-registrarAluno', compact('alunos'));
	}
	
	public function registrarFuncionario() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-registrarFuncionario', compact('alunos'));
	}
	
	public function registrarProfessor() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-registrarProfessor', compact('alunos'));
	}
	
	public function memorandos() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-memorandos', compact('alunos'));
	}
	
	public function telefones() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-telefones', compact('alunos'));
	}
	
	public function relatorios() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-relatorios', compact('alunos'));
	}    
}
