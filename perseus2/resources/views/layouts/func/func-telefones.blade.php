@extends('layouts.func.func-master')

@section('conteudo')
<div class="ui grid">
    <div class="six wide column"> 
       <table class="ui collapsing table">
            <thead>
                <tr>
                    <th>Local</th>
                    <th>Numero</th>
                    <th>Ramal</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($telefones as $telefone)
                  <tr>
                        <td>{{$telefone->local}}</td>
                        <td>{{$telefone->numero}}</td>
                        <td>{{$telefone->ramal}}</td> 
                        <td>
                           <a href="/funcionario/telefones/editar/{{$telefone->id}}">
                               <button class="ui icon button">
                                   <i class="pe-7s-refresh"></i>
                               </button>
                           </a>
                        </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    <div class="six wide column">
        <div class="ui card" style="width: 100%">
            <div class="content">
                <div class="header">Novo telefone</div>
            </div>
            <div class="content">
                @if( count( $errors ) > 0 )
                   @foreach ($errors->all() as $error)
                        <span style="color:red" class="help-block">
                            <strong>{{ $error}}</strong>
                        </span>
                  @endforeach
                @endif

                <form method="POST" action="/funcionario/telefones">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6 {{ $errors->has('local') ? ' has-error' : '' }}">
                                <label>Local</label>
                                <input type="text"  class="form-control" id="local"  name="local"  value="{{ old('local') }}" required>
                    </div>
                    
                    <div class="form-group col-md-6 {{ $errors->has('numero') ? ' has-error' : '' }}">
                        <label>Telefone</label>
                        <input type="text"  class="form-control" id="numero"  name="numero"  value="{{ old('numero') }}" >
                    </div>
                    
                    <div class="form-group col-md-6 {{ $errors->has('ramal') ? ' has-error' : '' }}">
                            <label>Ramal</label>
                            <input type="text"  class="form-control" id="ramal"  name="ramal"  value="{{ old('ramal') }}" >
                    </div> 
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: 15%;" >
                        Cadastrar
                    </button>   
                </form>   
            </div>        
        </div>
    </div>        
</div>

@include('flash::message')

{{ $telefones->links('layouts.paginacao') }}

@endsection
