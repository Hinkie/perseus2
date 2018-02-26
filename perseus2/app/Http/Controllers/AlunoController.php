<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Aluno;
use \App\Endereco;
use \App\User;
use Hash;
use DB;

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

    // SELECT * FROM `funcionarios` WHERE YEAR (created_at) = 2018 ORDER BY id DESC

    // Cria um usuario
    // Cria um endereco
    // Criar um aluno usando os ids do usuario e endereco criados
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
            'curso_id' => 'required|numeric',
            'desconto' => 'nullable|min:1|max:100',
            'fixo' => 'nullable|required_without:celular|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'celular' => 'nullable|required_without:fixo|min:13|max:13|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'email' => 'required|email|min:7|max:150|unique:funcionarios'

        ]);


        $result_user = User::create ([
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'role_id' => 4
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
        
        $aluno = new \App\Aluno;
        
        Aluno::create ([
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
            'curso_id' => request('curso_id'),
            'desconto' => request('desconto'),
            'endereco_id' => $result_endereco->id,
            'fixo' => request('fixo'),
            'celular' => request('celular'),
            'email' => request('email')
        ]);
    
        flash('Cadastro efetuado com sucesso');

        return redirect('/admin/cadastrarAluno');

        }

    public function update(Aluno $aluno) 
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
            'cpf' => 'required|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+$/u|unique:funcionarios,cpf,'.$aluno->id,
            'rg' => 'required|digits_between:8,17|regex: /^[0-9]+[-]*[0-9]+$/u|unique:funcionarios,rg,'.$aluno->id,
            'orgao_emissor' => 'required|min:2|max:150|regex:/^[\pL\s\-]+$/u',
            'data_de_emissao' => 'required|min:10|max:10|regex:/^[0-9]+[\/][0-9]+[\/]*[0-9]+$/u',
            'nome_mae' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            'nome_pai' => 'nullable|max:150|regex:/^[\pL\s\-]+$/u',
            'estado_civil_id' => 'required|numeric',
            'curso_id' => 'required|numeric',
            'desconto' => 'nullable|min:1|max:100',
            'status_aluno_id' => 'required|numeric',
            'fixo' => 'nullable|required_without:celular|min:12|max:12|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'celular' => 'nullable|required_without:fixo|min:13|max:13|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'email' => 'required|email|min:7|max:150|unique:funcionarios,email,'.$aluno->id

        ]);

        $user = User::find($aluno->usuario->id);

        $user->update([
            'username' => request('username'),
            'password' => Hash::make(request('new_password')),
        ]);

        $endereco = Endereco::find($aluno->endereco->id);

        $endereco->update([
            'logradouro' => request('logradouro'),
            'numero' => request('numero'),
            'complemento' => request('complemento'),
            'bairro' => request('bairro'),
            'cidade' => request('cidade'),
            'UF' => request('UF'),
            'cep' => request('cep')
        ]);
            
        $aluno->update([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'user_id' => $aluno->user_id,
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
            'curso_id' => request('curso_id'),
            'desconto' => request('desconto'),
            'status_aluno_id' => request('status_aluno_id'),
            'endereco_id' => $aluno->endereco_id,
            'fixo' => request('fixo'),
            'celular' => request('celular'),
            'email' => request('email')
        
        ]);
    
        flash('Edição efetuada com sucesso');

        return redirect('/admin/alunos/'.$aluno->id);
    
    }

}
