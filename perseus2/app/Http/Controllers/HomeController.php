<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role->name == 'admin') 
        {
            
            return redirect()->route('homeAdmin');

        }

        if(Auth::user()->role->name ==  'funcionario') 
        {
            
            return redirect()->route('homeFuncionario');

        }

        if(Auth::user()->role->name == 'professor') 
        {
            
            return redirect()->route('homeProfessor');

        }

        if(Auth::user()->role->name ==  'aluno') 
        {
            
            return redirect()->route('homeAluno');

        }
    }
}
