<?php

Auth::routes();
//Redireciona para a home de cada role 
Route::get('/', 'HomeController@index')->name('home');

Route::get('teste', 'AdminController@teste');

// Route::post('/funcionario/add', 'funcionarioController@add')->name('add');

//Grupo de rotas referentes aos admins
Route::group(['middleware' => ['auth','roles:admin']], function () {
    //Redirecionado ao home dos admins
    Route::get('/admin', function () { return redirect('/admin/funcionarios');});
    //Rotas GET das paginas referentes aos funcionarios
    Route::get('/admin/funcionarios', 'AdminController@funcionarios')->name('homeAdmin');
    Route::get('/admin/funcionarios/{funcionario}', 'AdminController@funcionario');
    Route::get('/admin/cadastrarFuncionario', 'AdminController@cadastrarFuncionario');
    Route::get('/admin/funcionarios/editar/{funcionario}', 'AdminController@editarFuncionario');
    //Rotas GET das paginas referentes aos profesores
    Route::get('/admin/professores', 'AdminController@professores');
    Route::get('/admin/professores/{professor}', 'AdminController@professor');
    Route::get('/admin/cadastrarProfessor', 'AdminController@cadastrarProfessor');
    Route::get('/admin/professores/editar/{professor}', 'AdminController@editarProfessor');
    //Rotas GET das paginas referentes aos alunos
    Route::get('/admin/alunos', 'AdminController@alunos');
    Route::get('/admin/alunos/{aluno}', 'AdminController@aluno');
    Route::get('/admin/cadastrarAluno', 'AdminController@cadastrarAluno');
    Route::get('/admin/alunos/editar/{aluno}', 'AdminController@editarAluno');
    //Rotas GET das paginas referentes aos telefones, memorandos e relatorios
    Route::get('/admin/memorandos', 'AdminController@memorandos');
    Route::get('/admin/telefones', 'TelefoneController@telefones');
    Route::get('/admin/relatorios', 'AdminController@relatorios');
    //Rotas POST  das paginas referentes aos funcionarios
    Route::post('/admin/funcionarios/busca', 'AdminController@buscaFuncionario');
    Route::post('/admin/funcionario', 'ProfessorController@store');
    //Rotas POST  das paginas referentes aos professores
    Route::post('/admin/professores/busca', 'AdminController@buscaProfessor');
    Route::post('/admin/professor', 'ProfessorController@store');
    //Rotas POST  das paginas referentes aos alunos
    Route::post('/admin/alunos/busca', 'AdminController@buscaAluno');
    Route::post('/admin/aluno', 'AlunoController@store');
    //Rotas POST das paginas referentes aos telefones, memorandos e relatorios
    Route::post('/telefones', 'TelefoneController@store');
    //Rotas PATCH para a edição dos modelos
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


