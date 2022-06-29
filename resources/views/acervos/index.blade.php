@extends ('layouts.default')

@section('content')
<div class="container-fluid">
<h3> Acervo </h3>


<table class=" table table-stripe table-bordered table-hover">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
        </th>
    </thead>

    <tbody>
    @foreach($acervos as $acervo)
         <tr>
         <td>{{$acervo->nome}}</td>
         <td>{{$acervo->descricao}}</td>
        </td>
        <td>
                <a href="{{route('acervos.edit', ['id'=>$acervo->id])}}" class="btn-sm btn-success">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao({{$acervo->id}})" class="btn-sm btn-danger">Remover</a>
        <td>
    </td>
@endforeach
    </tbody>
</table>

{{$acervos->links("pagination::bootstrap-4")}}

<a href="{{route('acervos.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

@section("table-delete")
"acervos"
@endsection