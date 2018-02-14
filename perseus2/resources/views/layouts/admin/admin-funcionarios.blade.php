@extends('layouts.admin.admin-master')

@section('conteudo')
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
       @elseif ($funcionario->status_id == 2)
           <tr class="warning">
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

@endsection
