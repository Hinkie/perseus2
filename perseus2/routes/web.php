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
    //Rotas GET das paginas referentes aos telefones, memorandos,relatorios e ferramentas
    Route::get('/admin/memorandos', 'AdminController@memorandos');
    Route::get('/admin/telefones', 'TelefoneController@telefones');
    Route::get('/admin/telefones/editar/{telefone}', 'TelefoneController@editarTelefone');
    Route::get('/admin/relatorios', 'AdminController@relatorios');
    Route::get('/admin/ferramentas', 'AdminController@ferramentas');
    Route::get('/admin/ferramentas/criarCalendario', 'CalendarioController@createCalendario');
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
    Route::post('/admin/telefones', 'TelefoneController@store');
    //Rotas PATCH para a edição dos modelos
    Route::patch('/admin/funcionarios/editar/{funcionario}', 'FuncionarioController@update');
    Route::patch('/admin/professores/editar/{professor}', 'ProfessorController@update');
    Route::patch('/admin/alunos/editar/{aluno}', 'AlunoController@update');
    Route::patch('/admin/telefones/editar/{telefone}', 'TelefoneController@update');

    Route::post('/admin/foto', 'AdminController@foto');

});

    Route::group(['middleware' => ['auth','roles:funcionario']], function () {
    //Redirecionado ao home dos funcionários
    Route::get('funcionario', function () { return redirect('funcionario/alunos');});
    //Rotas GET das paginas referentes aos profesores
    Route::get('funcionario/professores', 'FuncionarioController@professores');
    Route::get('funcionario/professores/{professor}', 'FuncionarioController@professor');
    Route::get('funcionario/cadastrarProfessor', 'FuncionarioController@cadastrarProfessor');
    Route::get('funcionario/professores/editar/{professor}', 'FuncionarioController@editarProfessor');
    //Rotas GET das paginas referentes aos alunos
    Route::get('funcionario/alunos', 'FuncionarioController@alunos')->name('homeFuncionario');
    Route::get('funcionario/alunos/{aluno}', 'FuncionarioController@aluno');
    Route::get('funcionario/cadastrarAluno', 'FuncionarioController@cadastrarAluno');
    Route::get('funcionario/alunos/editar/{aluno}', 'FuncionarioController@editarAluno');
    //Rotas GET das paginas referentes aos telefones, memorandos,relatorios e ferramentas
    Route::get('funcionario/memorandos', 'FuncionarioController@memorandos');
    Route::get('funcionario/telefones', 'TelefoneController@telefones');
    Route::get('funcionario/telefones/editar/{telefone}', 'TelefoneController@editarTelefone');
    Route::get('funcionario/relatorios', 'FuncionarioController@relatorios');
    Route::get('funcionario/ferramentas', 'FerramentasController@createCalendario');
    //Rotas POST  das paginas referentes aos professores
    Route::post('funcionario/professores/busca', 'FuncionarioController@buscaProfessor');
    Route::post('funcionario/professor', 'ProfessorController@store');
    //Rotas POST  das paginas referentes aos alunos
    Route::post('funcionario/alunos/busca', 'FuncionarioController@buscaAluno');
    Route::post('funcionario/aluno', 'FuncionarioController@store');
    //Rotas POST das paginas referentes aos telefones, memorandos e relatorios
    Route::post('funcionario/telefones', 'TelefoneController@store');
    //Rotas PATCH para a edição dos modelos
    Route::patch('funcionario/funcionarios/editar/{funcionario}', 'FuncionarioController@update');
    Route::patch('funcionario/professores/editar/{professor}', 'ProfessorController@update');
    Route::patch('funcionario/alunos/editar/{aluno}', 'AlunoController@update');
    Route::patch('funcionario/telefones/editar/{telefone}', 'TelefoneController@update');

});

//Grupo de rotas referentes aos professores.
Route::group(['middleware' => ['auth','roles:professor']], function () {
    
    Route::get('/professor', function () { return redirect('/aluno/inicio');});
    Route::get('/professor/inicio', 'ProfessorController@inicio')->name('homeProfessor');
    Route::get('/professor/dados', 'ProfessorController@dados');
    Route::get('/professor/financeiro', 'ProfessorController@financeiro');
    Route::get('/professor/historico', 'ProfessorController@historico');
    Route::get('/professor/relatorios', 'ProfessorController@relatorios');
    Route::get('/professor/arquivos', 'ProfessorController@arquivos');
    Route::get('/professor/tarefas', 'ProfessorController@tarefas');
    Route::get('/professor/contato', 'ProfessorController@contato');

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
