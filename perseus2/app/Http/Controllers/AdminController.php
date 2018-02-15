<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Funcionario;
use App\Funcao;
use App\Professor;
use App\Aluno;


class AdminController extends Controller
{
    public function alunos() 
    { 	
	    // $alunos = Aluno::orderBy('nome', 'DSC')->get();

    	$alunos = Aluno::paginate(1);

	    return view('layouts.admin.admin-alunos', compact('alunos'));
    }
	
	public function funcionarios() 
	{ 	
		$funcionarios = Funcionario::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-funcionarios', compact('funcionarios'));
	}

	public function funcionario(Funcionario $funcionario) 
	{	
		return view('layouts.admin.admin-funcionario', compact('funcionario'));
	}
	
	public function professores() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-professores', compact('alunos'));
	}
	
	public function cadastrarAluno() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-cadastrarAluno', compact('alunos'));
	}
	
	public function cadastrarFuncionario() 
	{ 	
		$funcoes = Funcao::all();

		return view('layouts.admin.admin-cadastrarFuncionario', compact('funcoes'));
	}
	
	public function cadastrarProfessor() 
	{ 	
		$alunos = Aluno::orderBy('nome', 'DSC')->get();

		return view('layouts.admin.admin-cadastrarProfessor', compact('alunos'));
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
