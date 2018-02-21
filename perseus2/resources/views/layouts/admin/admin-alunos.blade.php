@extends('layouts.admin.admin-master')

@section('conteudo')

<form action="/admin/alunos/busca" method="POST" role="search">
    {{ csrf_field() }}
    <div class="ui input">
        <input type="text" class="form-control" name="busca"
            placeholder="Pesquisar Funcionário"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
   <table class="ui celled table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Funcão</th>
            <th>E-mail</th>
            <th>Telefone fixo</th>
            <th>Celular</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($alunos as $aluno)
       @if ($aluno->status_id == 1)
           <tr class="negative">
       @elseif ($aluno->status_id == 2)
           <tr class="warning">
       @else
          <tr>
       @endif
                <td><a href="/admin/alunos/{{$aluno->id}}">{{$aluno->nome}} {{$aluno->sobrenome}}</a></td>
                <td>{{$aluno->funcao->nome}}</td>
                <td>{{$aluno->email}}</td>
                <td>{{$aluno->fixo}}</td> 
                <td>{{$aluno->celular}}</td>  
                <td>{{$aluno->status->nome}}</td>     
        </tr>
        @endforeach 
    </tbody>
</table>

{{ $alunos->links('layouts.paginacao') }}

@endsection
