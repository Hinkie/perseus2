<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Funcionario;
use \App\Endereco;
use \App\User;
use Hash;
use DB;

class FuncionarioController extends Controller
{

	public function search() 
	{	

		$busca = request('busca');

		$funcionarios = Funcionario::where('nome','LIKE',"%{$busca}%")
						->orWhere('sobrenome','LIKE',"%{$busca}%")->get();

		if(Auth::user()->role->name == 'admin') 
		{
		    
		    return view('layouts.admin.admin-funcionariosResultado', compact('funcionarios'));

		}

		if(Auth::user()->role->name ==  'funcionario') 
		{
		    
		    return redirect()->route('homeFuncionario');

		}


		
		
	}
	
	// Cria um usuario
	// Cria um endereco
	// Criar um funcionario usando os ids do usuario e endereco criados
	public function store() 
	{	
		
		$user = new \App\User;

		$this->validate(request(),[	

			'username' => 'required|min:3|max:20|alpha_num|distinct',
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
			'fixo' => 'required|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'celular' => 'required|min:13|max:13|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
			'email' => 'required|email|min:7|max:150|unique:funcionarios'

		]);


		$result_user = User::create ([
			'username' => request('username'),
			'password' => Hash::make(request('password')),
			'role_id' => 3
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
	
		return redirect('/admin/funcionarios');
	
	}
}

