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
		<tr>
				<td>{{$funcionario->nome}} {{$funcionario->sobrenome}}</td>
				<td>{{$funcionario->funcao->nome}}</td>
				<td>{{$funcionario->email}}</td>
				<td>{{$funcionario->fixo}}</td>	
				<td>{{$funcionario->celular}}</td>	
				<td>{{$funcionario->status->nome}}</td>		
		</tr>
		@endforeach	
	</tbody>

<tfoot>
<tr><th colspan="12">
<div class="ui right floated pagination menu">
<a class="icon item">
<i class="left chevron icon"></i>
</a>
<a class="item">1</a>
<a class="item">2</a>
<a class="item">3</a>
<a class="item">4</a>
<a class="icon item">
<i class="right chevron icon"></i>
</a>
</div>
</th>
</tr></tfoot>
</table>

@endsection
