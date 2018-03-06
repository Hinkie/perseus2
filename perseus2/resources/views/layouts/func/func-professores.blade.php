@extends('layouts.admin.admin-master')

@section('conteudo')

<form action="/admin/professores/busca" method="POST" role="search">
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
                <td><a href="/admin/professores/{{$professor->id}}">{{$professor->titulo->sigla}}{{$professor->nome}} {{$professor->sobrenome}}</a></td>
                <td>{{$professor->email}}</td>
                <td>{{$professor->tel_interno}}</td> 
                <td>{{$professor->fixo}}</td> 
                <td>{{$professor->celular}}</td>  
                <td>{{$professor->status->nome}}</td>     
        </tr>
        @endforeach 
    </tbody>
</table>

{{ $professores->links('layouts.paginacao') }}

@endsection
