@extends('layouts.func.func-master')

@section('conteudo')

<form action="/funcionario/professores/busca" method="POST" role="search">
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

@if (count($professores)== 0)
    <h3>Nenhum resultado encontrado</h3>
@else
     <table class="ui celled table">
      <thead>
          <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone interno</th>
              <th>Telefone fixo</th>
              <th>Celular</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($professores as $professor)
         @if ($professor->status_id == 1)
             <tr class="negative">
         @elseif ($professor->status_id == 2)
             <tr class="warning">
         @else
            <tr>
         @endif
                  <td>{{$professor->nome}} {{$professor->sobrenome}}</td>
                  <td>{{$professor->funcao->nome}}</td>
                  <td>{{$professor->email}}</td>
                  <td>{{$professor->fixo}}</td> 
                  <td>{{$professor->celular}}</td>  
                  <td>{{$professor->status->nome}}</td>     
          </tr>
          @endforeach 
      </tbody>
    </table>
@endif

@endsection
