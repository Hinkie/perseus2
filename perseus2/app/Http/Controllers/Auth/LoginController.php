<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function username()
    {
        return 'username';
    }

    public function authenticated($request , $user)
    {
        if($user->role->name == 'admin') 
        {
            
            return redirect()->route('homeAdmin');

        }

        if($user->role->name == 'funcionario') 
        {
            
            return redirect()->route('homeFuncionario');

        }

        if($user->role->name == 'professor') 
        {
            
            return redirect()->route('homeProfessor');

        }

        if($user->role->name == 'aluno') 
        {
            
            return redirect()->route('homeAluno');

        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

