@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
		<form method="POST" action="/admin/telefones/editar/{{$telefone->id}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group col-md-6 {{ $errors->has('local') ? ' has-error' : '' }}">
			            <label>Local</label>
			            <input type="text"  class="form-control" id="local"  name="local"  value="{{ $telefone->local }}" required>
			</div>
			
			<div class="form-group col-md-6 {{ $errors->has('numero') ? ' has-error' : '' }}">
			    <label>Telefone</label>
			    <input type="text"  class="form-control" id="numero"  name="numero"  value="{{ $telefone->numero }}" >
			</div>
			
			<div class="form-group col-md-6 {{ $errors->has('ramal') ? ' has-error' : '' }}">
			        <label>Ramal</label>
			        <input type="text"  class="form-control" id="ramal"  name="ramal"  value="{{ $telefone->ramal }}" >
			</div> 
			<button type="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: 15%;" >
			    Salvar
			</button>   
		</form>
	</div>

@endsection
