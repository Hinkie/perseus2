<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Funcionario;
use App\Funcao;
use App\Status;
use App\StatusAluno;
use App\EstadoCivil;
use App\Professor;
use App\Aluno;
use App\Titulo;
use App\Curso;
use App\Calendario;
use Config;
use Image;
use Hash;
use DB;

class FuncionarioController extends Controller
{
		//Professores
	    public function cadastrarProfessor() 
	    { 	
	    	$titulo = Titulo::all();

	    	return view('layouts.func.func-cadastrarProfessor', compact('titulos'));
	    }

		public function professores() 
		{ 	
			$professores = Professor::orderBy('nome', 'ASC')->paginate(25);

			return view('layouts.func.func-professores', compact('professores'));
		}

		public function professor(Professor $professor) 
		{	
			return view('layouts.func.func-professor', compact('professor'));
		}

		public function buscaProfessor() 
		{	
			$busca = request('busca');

			$professores = Professor::where('nome','LIKE',"%{$busca}%")
							->orWhere('sobrenome','LIKE',"%{$busca}%")->get();
				
			return view('layouts.func.func-professoresResultado', compact('professores'));
		}

		public function editarProfessor(Professor $professor) 
		{	
			$titulos = Titulo::all();

			$status = Status::all();

			$estado_civil = EstadoCivil::all();

			return view('layouts.func.func-editarProfessor', compact('professor','estado_civil','titulos','status'));
		}

		//Alunos
	  	public function cadastrarAluno() 
	   { 	
	   	$cursos = Curso::orderBy('nome', 'ASC')->get();

	   	return view('layouts.func.func-cadastrarAluno',compact('cursos'));
	   }

	   	public function alunos() 
	   	{ 	
	   		$alunos = Aluno::orderBy('nome', 'ASC')->paginate(25);

	   		return view('layouts.func.func-alunos', compact('alunos'));
	   	}

	   	public function aluno(Aluno $aluno) 
	   	{	
	   		return view('layouts.func.func-aluno', compact('aluno'));
	   	}

	   	public function buscaAluno() 
	   	{		
	   		$busca = request('busca');

	   		$alunos = Aluno::where('nome','LIKE',"%{$busca}%")
	   						->orWhere('sobrenome','LIKE',"%{$busca}%")->get();
	   			
	   		return view('layouts.func.func-alunosResultado', compact('alunos'));
	   	}

	   	public function editarAluno(Aluno $aluno) 
	   	{	
	   		$status = StatusAluno::all();

	   		$cursos = Curso::orderBy('nome', 'ASC')->get();
	   		
	   		$estado_civil = EstadoCivil::all();

	   		return view('layouts.func.func-editarAluno', compact('aluno','estado_civil','cursos','status'));
	   	}
	// Cria um usuario
	// Cria um endereco
	// Criar um funcionario usando os ids do usuario e endereco criados
	public function store() 
	{	
		$user = new \App\User;

		$this->validate(request(),[	

			'username' => 'required|min:3|max:20|alpha_num|unique:users',
			'password' => 'required|min:3|max:150|confirmed',
			'logradouro' => 'required|min:3|max:150|regex:/^[\pL\s\-]+$/u',
			'numero' => 'required|digits_between:1,10',
			'complemento' => 'nullable|max:150',
			'bairro' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'UF' => 'required|alpha|min:2|max:2',
			'cep' => 'required|min:9|max:9|regex:/^[0-9]+[-]*[0-9]+$/u',
			'nome' => 'required|alpha|min:2|max:150',
			'sobrenome' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'data_nascimento' => 'required||min:10|max:10|regex:/^[0-9]+[\/][0-9]+[\/]*[0-9]+$/u',
			'genero' => 'required|alpha',
			'naturalidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'cpf' => 'required|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+$/u|unique:funcionarios',
			'rg' => 'required|digits_between:8,17|regex: /^[0-9]+[-]*[0-9]+$/u|unique:funcionarios',
			'orgao_emissor' => 'required|min:2|max:150|regex:/^[\pL\s\-]+$/u',
			'data_de_emissao' => 'required|min:10|max:10|regex:/^[0-9]+[\/][0-9]+[\/]*[0-9]+$/u',
			'nome_mae' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'nome_pai' => 'nullable|max:150|regex:/^[\pL\s\-]+$/u',
			'estado_civil_id' => 'required|numeric',
			'funcao_id' => 'required|numeric',
			'fixo' => 'nullable|required_without:celular|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'celular' => 'nullable|required_without:fixo|min:13|max:13|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'email' => 'required|email|min:7|max:150|unique:funcionarios'

		]);


		$result_user = User::create ([
			'username' => request('username'),
			'password' => Hash::make(request('password')),
			'role_id' => 2
		]);

		$endereco = new \App\Endereco;

		$result_endereco = Endereco::create ([
			'logradouro' => request('logradouro'),
			'numero' => request('numero'),
			'complemento' => request('complemento'),
			'bairro' => request('bairro'),
			'cidade' => request('cidade'),
			'UF' => request('UF'),
			'cep' => request('cep')
		]);
		
		$funcionario = new \App\Funcionario;
		
		Funcionario::create ([
			'nome' => request('nome'),
			'sobrenome' => request('sobrenome'),
			'user_id' => $result_user->id,
			'data_nascimento' => request('data_nascimento'),
			'genero' => request('genero'),
			'naturalidade' => request('naturalidade'),
			'cpf' => request('cpf'),
			'rg' => request('rg'),
			'orgao_emissor' => request('orgao_emissor'),
			'data_de_emissao' => request('data_de_emissao'),
			'nome_mae' => request('nome_mae'),
			'nome_pai' => request('nome_pai'),
			'estado_civil_id' => request('estado_civil_id'),
			'funcao_id' => request('funcao_id'),
			'endereco_id' => $result_endereco->id,
			'fixo' => request('fixo'),
			'celular' => request('celular'),
			'email' => request('email')
		]);
	
		flash('Cadastro efetuado com sucesso');

		return redirect('/func/cadastrarFuncionario');

		}

	public function update(Funcionario $funcionario) 
	{	

		$this->validate(request(),[	

			'username' => 'required|min:3|max:20|alpha_num|distinct',
			'new_password' => 'nullable|min:3|max:150|confirmed',
			'logradouro' => 'required|min:3|max:150|regex:/^[\pL\s\-]+$/u',
			'numero' => 'required|digits_between:1,10',
			'complemento' => 'nullable|max:150',
			'bairro' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'UF' => 'required|alpha|min:2|max:2',
			'cep' => 'required|min:9|max:9|regex:/^[0-9]+[-]*[0-9]+$/u',
			'nome' => 'required|alpha|min:2|max:150',
			'sobrenome' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'data_nascimento' => 'required||min:10|max:10|regex:/^[0-9]+[\/][0-9]+[\/]*[0-9]+$/u',
			'genero' => 'required|alpha',
			'naturalidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'cpf' => 'required|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+$/u|unique:funcionarios,cpf,'.$funcionario->id,
			'rg' => 'required|digits_between:8,17|regex: /^[0-9]+[-]*[0-9]+$/u|unique:funcionarios,rg,'.$funcionario->id,
			'orgao_emissor' => 'required|min:2|max:150|regex:/^[\pL\s\-]+$/u',
			'data_de_emissao' => 'required|min:10|max:10|regex:/^[0-9]+[\/][0-9]+[\/]*[0-9]+$/u',
			'nome_mae' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
			'nome_pai' => 'nullable|max:150|regex:/^[\pL\s\-]+$/u',
			'estado_civil_id' => 'required|numeric',
			'funcao_id' => 'required|numeric',
			'status_id' => 'required|numeric',
			'fixo' => 'nullable|required_without:celular|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'celular' => 'nullable|required_without:fixo|min:13|max:13|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'email' => 'required|email|min:7|max:150|unique:funcionarios,email,'.$funcionario->id

		]);

		$user = User::find($funcionario->usuario->id);

		$user->update([
			'username' => request('username'),
			'password' => Hash::make(request('new_password')),
		]);

		$endereco = Endereco::find($funcionario->endereco->id);

		$endereco->update([
			'logradouro' => request('logradouro'),
			'numero' => request('numero'),
			'complemento' => request('complemento'),
			'bairro' => request('bairro'),
			'cidade' => request('cidade'),
			'UF' => request('UF'),
			'cep' => request('cep')
		]);
			
		$funcionario->update([
			'nome' => request('nome'),
			'sobrenome' => request('sobrenome'),
			'user_id' => $funcionario->user_id,
			'data_nascimento' => request('data_nascimento'),
			'genero' => request('genero'),
			'naturalidade' => request('naturalidade'),
			'cpf' => request('cpf'),
			'rg' => request('rg'),
			'orgao_emissor' => request('orgao_emissor'),
			'data_de_emissao' => request('data_de_emissao'),
			'nome_mae' => request('nome_mae'),
			'nome_pai' => request('nome_pai'),
			'estado_civil_id' => request('estado_civil_id'),
			'funcao_id' => request('funcao_id'),
			'status_id' => request('status_id'),
			'endereco_id' => $funcionario->endereco_id,
			'fixo' => request('fixo'),
			'celular' => request('celular'),
			'email' => request('email')
		
		]);
	
		flash('Edição efetuada com sucesso');

		return redirect('/func/funcionarios/'.$funcionario->id);
	
	}
}

