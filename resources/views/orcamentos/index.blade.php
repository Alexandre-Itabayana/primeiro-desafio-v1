@extends('orcamentos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Oficina 2.0</h2>
            </div>
            <div class="pull-right col">
                <a class="btn btn-success" href="{{ route('orcamentos.create') }}"> Cadastrar Novo Orçamento</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>@sortablelink('id')</th>
            <th>@sortablelink('cliente')</th>
            <th>@sortablelink('vendedor')</th>
            <th>Descrição</th>
            <th>@sortablelink('valor')</th>
            <th>@sortablelink('created_at', 'Data')</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($orcamentos as $orcamento)
        <tr>
            <td>{{ $orcamento->id  }}</td>
            <td>{{ $orcamento->cliente }}</td>
            <td>{{ $orcamento->vendedor }}</td>
            <td>{{ $orcamento->descricao }}</td>
            <td>{{ $orcamento->valor }}</td>
            <td>{{ $orcamento->created_at->format('Y-m-d') }}</td>
            <td>
                <form action="{{ route('orcamentos.destroy',$orcamento->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('orcamentos.edit',$orcamento->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
       
        @endforeach
        
        <tbody></tbody>
          
    </table>
    <div class="row">
    <div class = "col-md-12" >
        <h2>Pesquisar</h2>
        <form action="/search" class="form-group" method="get">
            <div class="form-group mb2">
                <input type="text" name="search_cliente" placeholder="Nome do Cliente" class="form-control">
            </div>
            <div class="form-group mb2">    
                <input type="text" name="search_vendedor" placeholder="Nome do Vendedor" class="form-control">
            </div>
            <div class="row">
            <div class="form-group col-sm-5 ">    
                <input type="date" default="" name="data_inicio"  class="form-control" >
                <small id="dateHelp" class="form-text text-muted">Data de inicial.</small>
            </div> 
            <div class="form-group col-sm-5 ">   
                <input type="date" name="data_fim"  class="form-control">
                <small id="dateHelp" class="form-text text-muted">Data final.</small>
            </div>
            </div>
            <div class="form-group mb2">    
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                    <a class="btn btn-secondary" href="/orcamentos">Limpar Filtro</a>
            </div>
        </form>     
    </div> 
    </div> 
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    {!! $orcamentos->appends(\Request::except('página'))->render() !!}
      
@endsection
