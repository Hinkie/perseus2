<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Telefone;

class TelefoneController extends Controller
{
    public function telefones() 
    {    
        $telefones = Telefone::orderBy('local', 'ASC')->paginate(25);

        return view('layouts.admin.admin-telefones', compact('telefones'));
    }

    public function editarTelefone(Telefone $telefone) 
    {    
        return view('layouts.admin.admin-editarTelefone', compact('telefone'));
    }

    public function store() 
    {	
    	
    	$this->validate(request(),[	
    		'local' => 'required|regex:/[a-zA-Z0-9\s]+/|min:2|max:150',
    		'numero' => 'nullable|required_without:ramal|min:9|max:9',
    		'ramal' => 'nullable|required_without:numero|min:2|max:3|digits_between:1,4',
    	]);

    	$telefone = new \App\Telefone;

    	Telefone::create ([
    		'local' => request('local'),
    		'numero' => request('numero'),
    		'ramal' => request('ramal')
    	]);

    	flash('Cadastro efetuado com sucesso');
    	//Redireciona para a pagina correspondendo ao role		
    	$funcao = Auth::user()->role->name;

    	return redirect('/'.$funcao.'/telefones');
   
    }

    public function update(Telefone $telefone) 
    {	
    	
    	$this->validate(request(),[	
    		'local' => 'required|regex:/[a-zA-Z0-9\s]+/|min:2|max:150',
    		'numero' => 'nullable|required_without:ramal|min:9|max:9',
    		'ramal' => 'nullable|required_without:numero|min:2|max:3|digits_between:1,4',
    	]);

    	$telefone->update ([
    		'local' => request('local'),
    		'numero' => request('numero'),
    		'ramal' => request('ramal')
    	]);

    	flash('Edição efetuada com sucesso');
		//Redireciona para a pagina correspondendo ao role
    	$funcao = Auth::user()->role->name;

    	return redirect('/'.$funcao.'/telefones');
    
    }
}
