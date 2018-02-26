@extends('layouts.admin.admin-master')
@section('conteudo')

	<div class="container">
		<form method="POST" action="/admin/funcionarios/editar/{{$funcionario->id}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('nome') ? ' has-error' : '' }}">
					<label>Nome*</label>
					<input type="text"  class="form-control" id="nome"   value="{{ $funcionario->nome }}" name="nome" required>
				</div>
				<div class="form-group col-md-6 {{ $errors->has('sobrenome') ? ' has-error' : '' }}">
					<label>Sobrenome*</label>
					<input type="text"  class="form-control" id="sobrenome"   value="{{ $funcionario->sobrenome }}" name="sobrenome" required>
				</div>
			</div>
			{{-- Documentos --}}
			<div class="form-row">
				<div class="form-group col-md-2 {{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
					<label>Data de Nascimento*</label>
					<input type="text"  class="form-control" id="data_nascimento"   value="{{ $funcionario->data_nascimento }}" name="data_nascimento" onkeypress="mascara(this, '##/##/####')" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('rg') ? ' has-error' : '' }}">
					<label>RG*</label>
					<input type="text"  class="form-control" id="rg"   value="{{ $funcionario->rg }}" name="rg" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('orgao_emissor') ? ' has-error' : '' }}">
					<label>Orgão emissor*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="orgao_emissor"   value="{{ $funcionario->orgao_emissor }}" name="orgao_emissor" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('data_de_emissao') ? ' has-error' : '' }}">
					<label>Data de emissão*</label>
					<input type="text"  class="form-control" id="data_de_emissao" onkeypress="mascara(this, '##/##/####')"  value="{{ $funcionario->data_de_emissao }}" name="data_de_emissao" required>
				</div>
				<div class="form-group col-md-2 {{ $errors->has('cpf') ? ' has-error' : '' }}">
					<label>CPF*</label>
					<input type="text"  class="form-control" id="cpf"   value="{{ $funcionario->cpf }}" name="cpf" required onkeypress="mascara(this, '#########-##')">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('naturalidade') ? ' has-error' : '' }}">
					<label>Naturalidade</label>
					<input type="text"  class="form-control" id="naturalidade"   value="{{ $funcionario->naturalidade }}" name="naturalidade" >
				</div>
				<div class="form-group col-md-2 {{ $errors->has('estado_civil_id') ? ' has-error' : '' }}">
					<label>Estado Civil*</label>
					<select class="form-control" id="estado_civil_id"  name="estado_civil_id" required>
						@foreach ($estado_civil as $estado_civil)
							@if($estado_civil->id == $funcionario->estado_civil_id)
								<option value="{{$estado_civil->id}}" selected>{{$estado_civil->nome}}</option>
							@else
								<option value="{{$estado_civil->id}}">{{$estado_civil->nome}}</option>
							@endif	
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_mae') ? ' has-error' : '' }}">
					<label>Nome da mãe*</label>
					<input type="text"  class="form-control" id="nome_mae"   value="{{ $funcionario->nome_mae }}" name="nome_mae" required>
				</div>
				<div class="form-group col-md-4 {{ $errors->has('nome_pai') ? ' has-error' : '' }}">
					<label>Nome do Pai</label>
					<input type="text"  class="form-control" id="nome_pai"   value="{{ $funcionario->nome_pai }}" name="nome_pai">
				</div>
				<div class="form-group col-md-2 {{ $errors->has('genero') ? ' has-error' : '' }}">
					<label>Gênero</label>
					<select class="form-control" id="genero"  name="genero"  value="{{ $funcionario->genero }}" required>
						@if ($funcionario->genero == 'Masculino')
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
					<input type="text"  class="form-control" id="logradouro"  name="logradouro"  value="{{ $funcionario->endereco->logradouro }}" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('numero') ? ' has-error' : '' }}">
					<label>Numero*</label>
					<input type="text"  class="form-control" id="numero"   value="{{ $funcionario->endereco->numero }}" name="numero" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('complemento') ? ' has-error' : '' }}">
					<label>Complemento</label>
					<input type="text"  class="form-control" id="complemento"   value="{{ $funcionario->endereco->complemento }}" name="complemento" >
				</div>	
				<div class="form-group col-md-3 {{ $errors->has('bairro') ? ' has-error' : '' }}">
					<label>Bairro*</label>
					<input type="text"  class="form-control" id="bairro"   value="{{ $funcionario->endereco->bairro }}" name="bairro" required>
				</div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-5 {{ $errors->has('cidade') ? ' has-error' : '' }}">
					<label>Cidade*</label>
					<input type="text"  class="form-control" id="cidade"   value="{{ $funcionario->endereco->cidade }}" name="cidade" required>
				</div>
				<div class="form-group col-md-1 {{ $errors->has('UF') ? ' has-error' : '' }}">
					<label>UF*</label>
					<input type="text"   onkeydown="upperCaseF(this)" style="text-transform:uppercase" class="form-control" id="UF"   value="{{ $funcionario->endereco->UF }}" name="UF" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('cep') ? ' has-error' : '' }}">
					<label>CEP*</label>
					<input type="text"  class="form-control" id="cep"   value="{{ $funcionario->endereco->cep }}" name="cep" onkeypress="mascara(this, '#####-###')" required>
				</div>
				<div class="form-group col-md-3 ">
					<label>Status*</label>
					<select class="form-control" id="status_id"  name="status_id"   value="{{ $funcionario->status->nome }}" required>
						@foreach ($status as $status)
							@if($status->id == $funcionario->status_id)
								<option value="{{$status->id}}" selected>{{$status->nome}}</option>
							@else
								<option value="{{$status->id}}">{{$status->nome}}</option>
							@endif	
						@endforeach
					</select>
				</div>
			</div>	
			{{-- Contato --}}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
					<label>Email*</label>
					<input type="text"  class="form-control" id="email"   value="{{ $funcionario->email }}" name="email" required>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('fixo') ? ' has-error' : '' }}">
					<label>Telefone fixo com DDD</label>
					<input type="text"  class="form-control" id="fixo"   value="{{ $funcionario->fixo }}" name="fixo"  onkeypress="mascara(this, '##-####-####')">
				</div>
				<div class="form-group col-md-3 {{ $errors->has('celular') ? ' has-error' : '' }}">
					<label>Celular com DDD</label>
					<input type="text"  class="form-control" id="celular"   value="{{ $funcionario->celular }}" name="celular"  onkeypress="mascara(this, '##-#####-####')" >
				</div>
			</div>
			{{-- Usuario e funcao --}}
			<div class="form-row">
				<div class="form-group col-md-3 {{ $errors->has('funcao_id') ? ' has-error' : '' }}">
					<label>Função*</label>
					<select class="form-control" id="funcao_id"   value="{{ $funcionario->funcao_id }}" name="funcao_id" required>
							@foreach ($funcoes as $funcao)
								@if($funcao->id == $funcionario->funcao_id)
									<option value="{{$funcao->id}}" selected>{{$funcao->nome}}</option>
								@else
									<option value="{{$funcao->id}}">{{$funcao->nome}}</option>
								@endif		
							@endforeach
					</select>
				</div>
				<div class="form-group col-md-3 {{ $errors->has('username') ? ' has-error' : '' }}">
					<label>Usuario</label>
					<input type="text"  class="form-control" id="username"   value="{{ $funcionario->usuario->username }}" name="username">
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
