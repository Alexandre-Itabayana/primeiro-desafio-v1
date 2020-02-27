@extends('orcamentos.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Orçamento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orcamentos.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Dados de entrada não validos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('orcamentos.update',$orcamento->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    <input type="text" name="cliente" value="{{ $orcamento->cliente }}" class="form-control" placeholder="Cliente">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Vendedor:</strong>
                  <input type="text" name="vendedor" value="{{ $orcamento->vendedor }}" class="form-control" placeholder="Vendedor">
              </div>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <textarea class="form-control" style="height:150px" name="descricao" placeholder="Detail">{{ $orcamento->descricao }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Valor:</strong>
                  <input type="number" name="name" value="{{ $orcamento->valor }}" class="form-control" placeholder="Valor">
              </div>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
   
    </form>
@endsection