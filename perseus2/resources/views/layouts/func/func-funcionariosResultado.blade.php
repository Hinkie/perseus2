@extends('layouts.admin.admin-master')

@section('conteudo')

<form action="/admin/funcionarios/busca" method="POST" role="search">
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

@if (count($funcionarios)== 0)
    <h3>Nenhum resultado encontrado</h3>
@else
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
      @foreach ($funcionarios as $funcionario)
         @if ($funcionario->status_id == 1)
             <tr class="negative">
         @elseif ($funcionario->status_id == 2 )
             <tr class="hidden">
         @else
            <tr>
         @endif
                  <td>{{$funcionario->nome}} {{$funcionario->sobrenome}}</td>
                  <td>{{$funcionario->funcao->nome}}</td>
                  <td>{{$funcionario->email}}</td>
                  <td>{{$funcionario->fixo}}</td> 
                  <td>{{$funcionario->celular}}</td>  
                  <td>{{$funcionario->status->nome}}</td>     
          </tr>
          @endforeach 
      </tbody>
    </table>
@endif

@endsection
