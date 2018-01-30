@extends('layouts.app')
	@section('content')
		@foreach ($alunos as $aluno)
			<div class="container-fluid">
				<h1>{{ucwords($aluno->nome)}}</h1>
				{{-- <h1>{{ucwords($aluno->orientador->nome)}}</h1> --}}
			</div>
		@endforeach
	@endsection
