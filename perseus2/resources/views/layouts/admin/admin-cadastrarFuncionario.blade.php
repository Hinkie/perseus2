@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
		<form method="POST" action="/admin/funcionario">
			{{ csrf_field() }}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('nome') ? ' has-error' : '' }}">
					<label>Nome*</label>
					<input type="text"  class="form-control" id="nome"   value="{{ old('nome') }}" name="nome" required>
				</div>
				<div class="form-group col-md-6 {{ $errors->has('sobrenome') ? ' has-error' : '' }}">
					<label>Sobrenome*</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{ old('sobrenome') }}" name="sobrenome" required>
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 {{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
					<label>Data de Nascimento*</label>
					<input type="text"  class="form-control" id="data_nascimento"   value="{{ old('data_nascimento') }}" name="data_nascimento" onkeypress="mascara(this, '##/##/####')" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('rg') ? ' has-error' : '' }}">
					<label>RG*</label>
					<input type="text"  class="form-control" id="rg"   value="{{ old('rg') }}" name="rg" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('orgao_emissor') ? ' has-error' : '' }}">
					<label>Orgão emissor*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="orgao_emissor"   value="{{ old('orgao_emissor') }}" name="orgao_emissor" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('data_de_emissao') ? ' has-error' : '' }}">
					<label>Data de emissão*</label>
					<input type="text"  class="form-control" id="data_de_emissao" onkeypress="mascara(this, '##/##/####')"  value="{{ old('data_de_emissao') }}" name="data_de_emissao" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('cpf') ? ' has-error' : '' }}">
					<label>CPF*</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ old('cpf') }}" name="cpf" required onkeypress="mascara(this, '#########-##')">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('naturalidade') ? ' has-error' : '' }}">
					<label>Naturalidade*</label>
					<input type="text"  class="form-control" id="naturalidade"   value="{{ old('naturalidade') }}" name="naturalidade" required >
				</div>
				<div class="form-group col-md-2 {{ $errors->has('estado_civil_id') ? ' has-error' : '' }}">
					<label>Estado Civil*</label>
					<select class="form-control" id="estado_civil_id"  value="{{ old('estado_civil_id') }}" name="estado_civil_id" required>
						<option value="1">Solteiro(a)</option>
					    <option value="2">Casado(a)</option>
					    <option value="3">Divorciado(a)</option>
					    <option value="4">Viúvo(a)</option>
					    <option value="5">Seperado(a)</option>
					</select>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_mae') ? ' has-error' : '' }}">
					<label>Nome da mãe*</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ old('nome_mae') }}" name="nome_mae" required>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_pai') ? ' has-error' : '' }}">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{ old('nome_pai') }}" name="nome_pai">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('genero') ? ' has-error' : '' }}">
					<label>Gênero</label>
					<select class="form-control" id="genero"  name="genero"  value="{{ old('genero') }}" required>
						<option>Masculino</option>
						<option>Feminino</option>
					</select>	
				</div>
			</div>	
			{{-- endereco --}}
			<div class="form-row">
				<div class="form-group col-md-5 {{ $errors->has('logradouro') ? ' has-error' : '' }}">
					<label>Endereço*</label>
					<input type="text"  class="form-control" id="logradouro"  name="logradouro"  value="{{ old('logradouro') }}" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('numero') ? ' has-error' : '' }}">
					<label>Numero*</label>
					<input type="text"  class="form-control" id="numero"   value="{{ old('numero') }}" name="numero" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('complemento') ? ' has-error' : '' }}">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ old('complemento') }}" name="complemento" required>
				</div>	
				<div class="form-group col-md-3 {{ $errors->has('bairro') ? ' has-error' : '' }}">
					<label>Bairro*</label>
					<input type="text"  class="form-control" id="bairro"   value="{{ old('bairro') }}" name="bairro" required>
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 {{ $errors->has('cidade') ? ' has-error' : '' }}">
					<label>Cidade*</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ old('cidade') }}" name="cidade" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('UF') ? ' has-error' : '' }}">
					<label>UF*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="UF"   value="{{ old('UF') }}" name="UF" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('cep') ? ' has-error' : '' }}">
					<label>CEP*</label>
					<input type="text"  class="form-control" id="cep"   value="{{ old('cep') }}" name="cep" onkeypress="mascara(this, '#####-###')" required>
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
					<label>Email*</label>
					<input type="text"  class="form-control" id="email"   value="{{ old('email') }}" name="email" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('fixo') ? ' has-error' : '' }}">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ old('fixo') }}" name="fixo"  onkeypress="mascara(this, '##-####-####')">
				</div>
				<div class="form-group col-md-3 {{ $errors->has('celular') ? ' has-error' : '' }}">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ old('celular') }}" name="celular"  onkeypress="mascara(this, '##-#####-####')" >
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				<div class="form-group col-md-3 {{ $errors->has('funcao_id') ? ' has-error' : '' }}">
					<label>Função*</label>
					<select class="form-control" id="funcao_id"   value="{{ old('funcao_id') }}" name="funcao_id" required>
							@foreach ($funcoes as $funcao_id)
								<option value="{{$funcao_id->id}}">{{$funcao_id->nome}}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('username') ? ' has-error' : '' }}">
					<label>Usuario*</label>
					<input type="text"  class="form-control" id="username"   value="{{ old('username') }}" name="username" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('password') ? ' has-error' : '' }}">
					<label>Senha*</label>
					<input type="password"  class="form-control" id="password"  name="password"  value="{{ old('password') }}" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label>Confirmação da senha*</label>
					<input type="password"  class="form-control" id="password_confirmation"  name="password_confirmation"  value="{{ old('password_confirmation') }}" required>
				</div>
				<div class="form-group col-md-12">
			        <p>*=Campos Obrigatórios</p>
			        @if( count( $errors ) > 0 )
			           @foreach ($errors->all() as $error)
			            	<span style="color:red" class="help-block">
			            		<strong>{{ $error}}</strong>
			            	</span>
			          @endforeach
			        @endif
				</div>
				<div class="form-group col-md-3">
			        <button type="submit" class="btn btn-primary">
			            Cadastrar
			        </button>
				</div>		
			</div>				
		</form>
		
	</div>

	@include('flash::message')

@endsection
