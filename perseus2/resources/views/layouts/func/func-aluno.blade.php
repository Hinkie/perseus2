@extends('layouts.func.func-master')
@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
			<div class="form-row">
				<div class="form-group col-md-2 ">
					<img src="{{$aluno->foto}}" height="140px">
				</div>
				<div class="form-group col-md-5 ">
					<label>Nome</label>
					<input type="text"  class="form-control" id="nome"   value="{{ $aluno->nome }}" disabled name="nome">
				</div>
				<div class="form-group col-md-5 ">
					<label>Sobrenome</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{  $aluno->sobrenome }}" disabled name="sobrenome">
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 ">
					<label>Data de Nascimento</label>
					<input type="text"  class="form-control" id="data_nascimento"  value="{{ $aluno->data_nascimento }}" disabled name="data_nascimento">
				</div>
				<div class="form-group col-md-2">
					<label>RG</label>
					<input type="text"  class="form-control" id="rg"   value="{{  $aluno->rg }}" disabled name="rg">
				</div>
				<div class="form-group col-md-2 ">
					<label>Orgão emissor</label>
					<input type="text"  class="form-control" id="orgao_emissor"  value="{{  $aluno->orgao_emissor }}" disabled name="orgao_emissor">
				</div>
				<div class="form-group col-md-2 ">
					<label>Data de emissão</label>
					<input type="text"  class="form-control" id="data_de_emissao" value="{{ $aluno->data_de_emissao }}" disabled name="data_de_emissao">
				</div>
				<div class="form-group col-md-2">
					<label>CPF</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ $aluno->cpf }}" disabled name="cpf" ">
				</div>
				<div class="form-group col-md-2">
					<label>Naturalidade</label>
					<input type="text"  class="form-control" id="naturalidade"  value="{{ $aluno->naturalidade }}" disabled name="naturalidade" >
				</div>
				<div class="form-group col-md-2">
					<label>Estado Civil</label>
					<input type="text" class="form-control" id="estado_civil_id"  value="{{ $aluno->estado_civil->nome }}" disabled name="estado_civil_id">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome da mãe</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ $aluno->nome_mae }}" disabled name="nome_mae">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{$aluno->nome_pai }}" disabled name="nome_pai">
				</div>
				<div class="form-group col-md-2 ">
					<label>Gênero</label>
					<input type="text" class="form-control" id="genero"  disabled name="genero"  value="{{ $aluno->genero }}">	
				</div>
			</div>	
			{{-- endereco --}}
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Logradouro</label>
					<input type="text"  class="form-control" id="logradouro"  disabled name="logradouro"  value="{{ $aluno->endereco->logradouro }}">
				</div>
				<div class="form-group col-md-1 ">
					<label>Numero</label>
					<input type="text"  class="form-control" id="numero"   value="{{$aluno->endereco-> numero }}" disabled name="numero">
				</div>
				<div class="form-group col-md-3  ">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ $aluno->endereco->complemento }}" disabled name="complemento">
				</div>	
				<div class="form-group col-md-3  ">
					<label>Bairro</label>
					<input type="text"  class="form-control" id="bairro"   value="{{$aluno->endereco->bairro }}" disabled name="bairro">
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Cidade</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ $aluno->endereco->cidade }}" disabled name="cidade">
				</div>
				<div class="form-group col-md-1  ">
					<label>UF</label>
					<input type="text" class="form-control" id="UF"   value="{{ $aluno->endereco->UF }}" disabled name="UF">
				</div>
				<div class="form-group col-md-3 ">
					<label>CEP</label>
					<input type="text"  class="form-control" id="cep"   value="{{ $aluno->endereco->cep }}" disabled name="cep" onkeypress="mascara(this, '#####-###')">
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Status</label>
					<input type="text"  class="form-control" id="status_aluno_id"  name="status_aluno_id"  value="{{ $aluno->status_aluno->nome  }}" disabled="">
				</div>
				<div class="form-group col-md-3">
					<label>Email</label>
					<input type="text"  class="form-control" id="email"   value="{{ $aluno->email  }}" disabled name="email">
				</div>
				<div class="form-group col-md-3">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ $aluno->fixo }}" disabled name="fixo">
				</div>
				<div class="form-group col-md-3">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ $aluno->celular }}" disabled name="celular"   >
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Curso</label>
					<input type="text" class="form-control" id="curso_id"   value="{{ $aluno->curso->nome }}" disabled name="curso_id">
							
					</select>
				</div>
				<div class="form-group col-md-3 ">
					<label>Usuario</label>
					<input type="text"  class="form-control" id="userdisabled name"   value="{{ $aluno->usuario->username }}" disabled name="userdisabled name">
				</div>
				<div class="form-group col-md-3 {{ $errors->has('matricula') ? ' has-error' : '' }}">
					<label>Matricula</label>
					<input type="text"  class="form-control" id="matricula"  name="matricula"  value="{{ $aluno->matricula }}" disabled>
				</div>
				<div class="form-group col-md-12">
				    <a href="/funcionario/alunos/editar/{{$aluno->id}}">
				        <button type="submit" class="btn btn-primary" >
				        	Editar
				        </button>
				    </a> 
				</div>		
			</div>				
	</div>

		@include('flash::message')

@endsection
