@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
		<form method="POST" action="/admin/professores/editar/{{$professor->id}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('nome') ? ' has-error' : '' }}">
					<label>Nome*</label>
					<input type="text"  class="form-control" id="nome"   value="{{ $professor->nome }}" name="nome" required>
				</div>
				<div class="form-group col-md-6 {{ $errors->has('sobrenome') ? ' has-error' : '' }}">
					<label>Sobrenome*</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{ $professor->sobrenome }}" name="sobrenome" required>
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 {{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
					<label>Data de Nascimento*</label>
					<input type="text"  class="form-control" id="data_nascimento"   value="{{ $professor->data_nascimento }}" name="data_nascimento" onkeypress="mascara(this, '##/##/####')" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('rg') ? ' has-error' : '' }}">
					<label>RG*</label>
					<input type="text"  class="form-control" id="rg"   value="{{ $professor->rg }}" name="rg" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('orgao_emissor') ? ' has-error' : '' }}">
					<label>Orgão emissor*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="orgao_emissor"   value="{{ $professor->orgao_emissor }}" name="orgao_emissor" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('data_de_emissao') ? ' has-error' : '' }}">
					<label>Data de emissão*</label>
					<input type="text"  class="form-control" id="data_de_emissao" onkeypress="mascara(this, '##/##/####')"  value="{{ $professor->data_de_emissao }}" name="data_de_emissao" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('cpf') ? ' has-error' : '' }}">
					<label>CPF*</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ $professor->cpf }}" name="cpf" required onkeypress="mascara(this, '#########-##')">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('naturalidade') ? ' has-error' : '' }}">
					<label>Naturalidade</label>
					<input type="text"  class="form-control" id="naturalidade"   value="{{ $professor->naturalidade }}" name="naturalidade" >
				</div>
				<div class="form-group col-md-2 {{ $errors->has('estado_civil_id') ? ' has-error' : '' }}">
					<label>Estado Civil*</label>
					<select class="form-control" id="estado_civil_id"  name="estado_civil_id" required>
						@foreach ($estado_civil as $EC)
							@if($EC->id == $professor->estado_civil_id)
								<option value="{{$EC->id}}" selected>{{$EC->nome}}</option>
							@else
								<option value="{{$EC->id}}">{{$EC->nome}}</option>
							@endif	
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_mae') ? ' has-error' : '' }}">
					<label>Nome da mãe*</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ $professor->nome_mae }}" name="nome_mae" required>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_pai') ? ' has-error' : '' }}">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{ $professor->nome_pai }}" name="nome_pai">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('genero') ? ' has-error' : '' }}">
					<label>Gênero</label>
					<select class="form-control" id="genero"  name="genero"  value="{{ $professor->genero }}" required>
						@if ($professor->genero == 'Masculino')
							<option selected>Masculino</option>
							<option>Feminino</option>
						@else
							<option>Masculino</option>
							<option selected >Feminino</option>	
						@endif	
					</select>	
				</div>
			</div>	
			{{-- endereco --}}
			<div class="form-row">
				<div class="form-group col-md-5 {{ $errors->has('logradouro') ? ' has-error' : '' }}">
					<label>Endereço*</label>
					<input type="text"  class="form-control" id="logradouro"  name="logradouro"  value="{{ $professor->endereco->logradouro }}" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('numero') ? ' has-error' : '' }}">
					<label>Numero*</label>
					<input type="text"  class="form-control" id="numero"   value="{{ $professor->endereco->numero }}" name="numero" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('complemento') ? ' has-error' : '' }}">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ $professor->endereco->complemento }}" name="complemento" >
				</div>	
				<div class="form-group col-md-3 {{ $errors->has('bairro') ? ' has-error' : '' }}">
					<label>Bairro*</label>
					<input type="text"  class="form-control" id="bairro"   value="{{ $professor->endereco->bairro }}" name="bairro" required>
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 {{ $errors->has('cidade') ? ' has-error' : '' }}">
					<label>Cidade*</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ $professor->endereco->cidade }}" name="cidade" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('UF') ? ' has-error' : '' }}">
					<label>UF*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="UF"   value="{{ $professor->endereco->UF }}" name="UF" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('cep') ? ' has-error' : '' }}">
					<label>CEP*</label>
					<input type="text"  class="form-control" id="cep"   value="{{ $professor->endereco->cep }}" name="cep" onkeypress="mascara(this, '#####-###')" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('titulo') ? ' has-error' : '' }}">
					<label>Título*</label>
					<select class="form-control" id="titulo_id"  name="titulo_id" required>
						@foreach ($titulos as $titulo)
							@if($titulo->id == $professor->estado_civil_id)
								<option value="{{$titulo->id}}" selected>{{$titulo->nome}}</option>
							@else
								<option value="{{$titulo->id}}">{{$titulo->nome}}</option>
							@endif	
						@endforeach
					</select>
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-3 {{ $errors->has('email') ? ' has-error' : '' }}">
					<label>Email*</label>
					<input type="text"  class="form-control" id="email"   value="{{ $professor->email }}" name="email" required>
				</div>
				<div class="form-group col-md-3 ">
					<label>Status*</label>
					<select class="form-control" id="status_id"  name="status_id"   value="{{ $professor->status->nome }}" required>
						@foreach ($status as $status)
							@if($status->id == $professor->status_id)
								<option value="{{$status->id}}" selected>{{$status->nome}}</option>
							@else
								<option value="{{$status->id}}">{{$status->nome}}</option>
							@endif	
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('fixo') ? ' has-error' : '' }}">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ $professor->fixo }}" name="fixo"  onkeypress="mascara(this, '##-####-####')">
				</div>
				<div class="form-group col-md-3 {{ $errors->has('celular') ? ' has-error' : '' }}">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ $professor->celular }}" name="celular"  onkeypress="mascara(this, '##-#####-####')" >
				</div>
				<div class="form-group col-md-3 {{ $errors->has('tel_interno') ? ' has-error' : '' }}">
					<label>Telefone interno</label>
					<input type="text"  class="form-control" id="tel_interno"  name="tel_interno"  value="{{ $professor->tel_interno }}" onkeypress="mascara(this, '#####-####')">
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				<div class="form-group col-md-3 {{ $errors->has('username') ? ' has-error' : '' }}">
					<label>Usuario</label>
					<input type="text"  class="form-control" id="username"   value="{{ $professor->usuario->username }}" name="username">
				</div>
				<div class="form-group col-md-3 {{ $errors->has('new_password') ? ' has-error' : '' }}">
					<label>Nova senha</label>
					<input type="password"  class="form-control" id="new_password"  name="new_password" >
				</div>
				<div class="form-group col-md-3 {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
					<label>Confirmação nova senha</label>
					<input type="password"  class="form-control" id="new_password_confirmation"  name="new_password_confirmation">
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
			            Salvar
			        </button>
				</div>		
			</div>				
		</form>
	</div>

	
	
@endsection

