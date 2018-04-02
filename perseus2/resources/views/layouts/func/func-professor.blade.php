@extends('layouts.func.func-master')
@section('conteudo')

	<div class="container">
			<div class="form-row">
				<div class="form-group col-md-6 ">
					<label>Nome</label>
					<input type="text"  class="form-control" id="nome"   value="{{ $professor->nome }}" disabled name="nome">
				</div>
				<div class="form-group col-md-6 ">
					<label>Sobrenome</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{  $professor->sobrenome }}" disabled name="sobrenome">
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 ">
					<label>Data de Nascimento</label>
					<input type="text"  class="form-control" id="data_nascimento"  value="{{ $professor->data_nascimento }}" disabled name="data_nascimento">
				</div>
				<div class="form-group col-md-2">
					<label>RG</label>
					<input type="text"  class="form-control" id="rg"   value="{{  $professor->rg }}" disabled name="rg">
				</div>
				<div class="form-group col-md-2 ">
					<label>Orgão emissor</label>
					<input type="text"  class="form-control" id="orgao_emissor"  value="{{  $professor->orgao_emissor }}" disabled name="orgao_emissor">
				</div>
				<div class="form-group col-md-2 ">
					<label>Data de emissão</label>
					<input type="text"  class="form-control" id="data_de_emissao" value="{{ $professor->data_de_emissao }}" disabled name="data_de_emissao">
				</div>
				<div class="form-group col-md-2">
					<label>CPF</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ $professor->cpf }}" disabled name="cpf" ">
				</div>
				<div class="form-group col-md-2">
					<label>Naturalidade</label>
					<input type="text"  class="form-control" id="naturalidade"  value="{{ $professor->naturalidade }}" disabled name="naturalidade" >
				</div>
				<div class="form-group col-md-2">
					<label>Estado Civil</label>
					<input type="text" class="form-control" id="estado_civil_id"  value="{{ $professor->estado_civil->nome }}" disabled name="estado_civil_id">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome da mãe</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ $professor->nome_mae }}" disabled name="nome_mae">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{$professor->nome_pai }}" disabled name="nome_pai">
				</div>
				<div class="form-group col-md-2 ">
					<label>Gênero</label>
					<input type="text" class="form-control" id="genero"  disabled name="genero"  value="{{ $professor->genero }}">	
				</div>
			</div>	
			{{-- endereco --}}
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Endereço</label>
					<input type="text"  class="form-control" id="logradouro"  disabled name="logradouro"  value="{{ $professor->endereco->logradouro }}">
				</div>
				<div class="form-group col-md-1 ">
					<label>Numero</label>
					<input type="text"  class="form-control" id="numero"   value="{{$professor->endereco-> numero }}" disabled name="numero">
				</div>
				<div class="form-group col-md-3  ">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ $professor->endereco->complemento }}" disabled name="complemento">
				</div>	
				<div class="form-group col-md-3  ">
					<label>Bairro</label>
					<input type="text"  class="form-control" id="bairro"   value="{{$professor->endereco->bairro }}" disabled name="bairro">
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Cidade</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ $professor->endereco->cidade }}" disabled name="cidade">
				</div>
				<div class="form-group col-md-1  ">
					<label>UF</label>
					<input type="text" class="form-control" id="UF"   value="{{ $professor->endereco->UF }}" disabled name="UF">
				</div>
				<div class="form-group col-md-3 ">
					<label>CEP</label>
					<input type="text"  class="form-control" id="cep"   value="{{ $professor->endereco->cep }}" disabled name="cep" >
				</div>
				<div class="form-group col-md-3 ">
					<label>Título</label>
					<input type="text"  class="form-control" id="titulo"   value="{{ $professor->titulo->nome }}" disabled name="titulo" >
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Email</label>
					<input type="text"  class="form-control" id="email"   value="{{ $professor->email  }}" disabled name="email">
				</div>
				<div class="form-group col-md-3">
					<label>Status</label>
					<input type="text"  class="form-control" id="status_id"  name="status_id"  value="{{ $professor->status->nome  }}" disabled="">
				</div>
				<div class="form-group col-md-3">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ $professor->fixo }}" disabled name="fixo">
				</div>
				<div class="form-group col-md-3">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ $professor->celular }}" disabled name="celular"   >
				</div>
				<div class="form-group col-md-3">
					<label>Telefone interno</label>
					<input type="text"  class="form-control" id="tel_interno"   value="{{ $professor->tel_interno }}" disabled name="tel_interno"   >
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				</div>
				<div class="form-group col-md-3 ">
					<label>Usuario</label>
					<input type="text"  class="form-control" id="userdisabled name"   value="{{ $professor->usuario->username }}" disabled name="userdisabled name">
				</div>

				<div class="form-group col-md-12">
				    <a href="/funcionario/professores/editar/{{$professor->id}}">
				        <button type="submit" class="btn btn-primary" >
				        	Editar
				        </button>
				    </a> 
				</div>		
			</div>				
	</div>

		@include('flash::message')

@endsection
