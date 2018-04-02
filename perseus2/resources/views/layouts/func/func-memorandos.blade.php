@extends('layouts.func.func-master')

@section('conteudo')
   @foreach ($alunos as $aluno)
		{{$aluno->nome}}</br>	
   @endforeach
@endsection
