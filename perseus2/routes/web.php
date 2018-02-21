<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Redireciona para a home de cada role 
Route::get('/', 'HomeController@index')->name('home');

Route::get('teste', 'FuncionarioController@update');


// Route::post('/funcionario/add', 'funcionarioController@add')->name('add');

//Grupo de rotas referentes aos admins.
Route::group(['middleware' => ['auth','roles:admin']], function () {
    
    Route::get('/admin', function () { return redirect('/admin/funcionarios');});
   
    Route::get('/admin/funcionarios', 'AdminController@funcionarios')->name('homeAdmin');
    Route::get('/admin/funcionarios/{funcionario}', 'AdminController@funcionario');
    Route::get('/admin/cadastrarFuncionario', 'AdminController@cadastrarFuncionario');
    Route::get('/admin/funcionarios/editar/{funcionario}', 'AdminController@editarFuncionario');
    
    Route::get('/admin/professores', 'AdminController@professores');
    Route::get('/admin/professores/{professor}', 'AdminController@professor');
    Route::get('/admin/cadastrarProfessor', 'AdminController@cadastrarProfessor');
    Route::get('/admin/professores/editar/{professor}', 'AdminController@editarProfessor');

    Route::get('/admin/alunos', 'AdminController@alunos');
    Route::get('/admin/alunos/{aluno}', 'AdminController@aluno');
    Route::get('/admin/cadastrarAluno', 'AdminController@cadastrarAluno');
    Route::get('/admin/alunos/editar/{aluno}', 'AdminController@editarAluno');

    Route::get('/admin/memorandos', 'AdminController@memorandos');
    Route::get('/admin/telefones', 'AdminController@telefones');
    Route::get('/admin/relatorios', 'AdminController@relatorios');

    Route::post('/admin/funcionarios/busca', 'AdminController@buscaFuncionario');
    Route::post('/admin/funcionario', 'ProfessorController@store');
    
    Route::post('/admin/professores/busca', 'AdminController@buscaProfessor');
    Route::post('/admin/professor', 'ProfessorController@store');
    
    Route::post('/admin/alunos/busca', 'AdminController@buscaAluno');
    Route::post('/admin/aluno', 'AlunoController@store');

    Route::patch('/admin/funcionarios/editar/{funcionario}', 'FuncionarioController@update');
    Route::patch('/admin/professores/editar/{professor}', 'ProfessorController@update');
    Route::patch('/admin/alunos/editar/{aluno}', 'AlunoController@update');

});

//Grupo de rotas referentes aos alunos.
Route::group(['middleware' => ['auth','roles:aluno']], function () {
    
    Route::get('/aluno', function () { return redirect('/aluno/inicio');});
    Route::get('/aluno/inicio', 'AlunoController@inicio')->name('homeAluno');
    Route::get('/aluno/dados', 'AlunoController@dados');
    Route::get('/aluno/financeiro', 'AlunoController@financeiro');
    Route::get('/aluno/historico', 'AlunoController@historico');
    Route::get('/aluno/relatorios', 'AlunoController@relatorios');
    Route::get('/aluno/arquivos', 'AlunoController@arquivos');
    Route::get('/aluno/tarefas', 'AlunoController@tarefas');
    Route::get('/aluno/contato', 'AlunoController@contato');

});


