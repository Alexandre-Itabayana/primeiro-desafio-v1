@extends('orcamentos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Oficina 2.0</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-white" href="/orcamentos/show" title="Pesquisar Orçamento">&#128270;</a>
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
            <th>No</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data de criação</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($orcamentos as $orcamento)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $orcamento->cliente }}</td>
            <td>{{ $orcamento->vendedor }}</td>
            <td>{{ $orcamento->descricao }}</td>
            <td>{{ $orcamento->valor }}</td>
            <td>Criado em: {{ $orcamento->created_at }}</td>
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
    </table>
  
    {!! $orcamentos->links() !!}
      
@endsection