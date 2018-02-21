@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
			<div class="form-row">
				<div class="form-group col-md-6 ">
					<label>Nome</label>
					<input type="text"  class="form-control" id="nome"   value="{{ $funcionario->nome }}" disabled name="nome">
				</div>
				<div class="form-group col-md-6 ">
					<label>Sobrenome</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{  $funcionario->sobrenome }}" disabled name="sobrenome">
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 ">
					<label>Data de Nascimento</label>
					<input type="text"  class="form-control" id="data_nascimento"  value="{{ $funcionario->data_nascimento }}" disabled name="data_nascimento">
				</div>
				<div class="form-group col-md-2">
					<label>RG</label>
					<input type="text"  class="form-control" id="rg"   value="{{  $funcionario->rg }}" disabled name="rg">
				</div>
				<div class="form-group col-md-2 ">
					<label>Orgão emissor</label>
					<input type="text"  class="form-control" id="orgao_emissor"  value="{{  $funcionario->orgao_emissor }}" disabled name="orgao_emissor">
				</div>
				<div class="form-group col-md-2 ">
					<label>Data de emissão</label>
					<input type="text"  class="form-control" id="data_de_emissao" value="{{ $funcionario->data_de_emissao }}" disabled name="data_de_emissao">
				</div>
				<div class="form-group col-md-2">
					<label>CPF</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ $funcionario->cpf }}" disabled name="cpf" ">
				</div>
				<div class="form-group col-md-2">
					<label>Naturalidade</label>
					<input type="text"  class="form-control" id="naturalidade"  value="{{ $funcionario->naturalidade }}" disabled name="naturalidade" >
				</div>
				<div class="form-group col-md-2">
					<label>Estado Civil</label>
					<input type="text" class="form-control" id="estado_civil_id"  value="{{ $funcionario->estado_civil->nome }}" disabled name="estado_civil_id">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome da mãe</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ $funcionario->nome_mae }}" disabled name="nome_mae">
				</div>
				<div class="form-group col-md-4 ">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{$funcionario->nome_pai }}" disabled name="nome_pai">
				</div>
				<div class="form-group col-md-2 ">
					<label>Gênero</label>
					<input type="text" class="form-control" id="genero"  disabled name="genero"  value="{{ $funcionario->genero }}">	
				</div>
			</div>	
			{{-- endereco --}}
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Endereço</label>
					<input type="text"  class="form-control" id="logradouro"  disabled name="logradouro"  value="{{ $funcionario->endereco->logradouro }}">
				</div>
				<div class="form-group col-md-1 ">
					<label>Numero</label>
					<input type="text"  class="form-control" id="numero"   value="{{$funcionario->endereco-> numero }}" disabled name="numero">
				</div>
				<div class="form-group col-md-3  ">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ $funcionario->endereco->complemento }}" disabled name="complemento">
				</div>	
				<div class="form-group col-md-3  ">
					<label>Bairro</label>
					<input type="text"  class="form-control" id="bairro"   value="{{$funcionario->endereco->bairro }}" disabled name="bairro">
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 ">
					<label>Cidade</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ $funcionario->endereco->bairro }}" disabled name="cidade">
				</div>
				<div class="form-group col-md-1  ">
					<label>UF</label>
					<input type="text" class="form-control" id="UF"   value="{{ $funcionario->endereco->UF }}" disabled name="UF">
				</div>
				<div class="form-group col-md-3 ">
					<label>CEP</label>
					<input type="text"  class="form-control" id="cep"   value="{{ $funcionario->endereco->cep }}" disabled name="cep" onkeypress="mascara(this, '#####-###')">
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Email</label>
					<input type="text"  class="form-control" id="email"   value="{{ $funcionario->email  }}" disabled name="email">
				</div>
				<div class="form-group col-md-3">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ $funcionario->fixo }}" disabled name="fixo">
				</div>
				<div class="form-group col-md-3">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ $funcionario->celular }}" disabled name="celular"   >
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Função</label>
					<input type="text" class="form-control" id="funcao_id"   value="{{ $funcionario->funcao->nome }}" disabled name="funcao_id">
							
					</select>
				</div>
				<div class="form-group col-md-3 ">
					<label>Usuario</label>
					<input type="text"  class="form-control" id="userdisabled name"   value="{{ $funcionario->usuario->username }}" disabled name="userdisabled name">
				</div>
				<div class="form-group col-md-12">
				    <a href="/admin/funcionarios/editar/{{$funcionario->id}}">
				        <button type="submit" class="btn btn-primary" >
				        	Editar
				        </button>
				    </a> 
				</div>		
			</div>				
	</div>

		@include('flash::message')

@endsection
