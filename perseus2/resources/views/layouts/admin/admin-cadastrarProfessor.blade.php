@extends('layouts.admin.admin-master')

@section('conteudo')
   @foreach ($alunos as $aluno)
		{{$aluno->nome}}</br>	
   @endforeach
@endsection
