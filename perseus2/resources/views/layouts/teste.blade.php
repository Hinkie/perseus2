@extends('layouts.admin.admin-master')
@section('conteudo')

<form method="POST" action="/admin/foto" enctype="multipart/form-data" >
  {{ csrf_field() }}

<div class="form-group col-md-3 {{ $errors->has('') ? ' has-error' : '' }}">
          <label>Foto</label>
          <input type="file" name="foto" id="foto">
        </div>

        
<div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary">
                  Cadastrar
              </button>
        </div>    

        @if( count( $errors ) > 0 )
           @foreach ($errors->all() as $error)
                <span style="color:red" class="help-block">
                    <strong>{{ $error}}</strong>
                </span>
          @endforeach
        @endif

    </form>

    <div>
        <img src="{{$aluno->foto}}">
    </div>  


@endsection
