@extends ('layouts.default')

@section('content')
<div class="container-fluid">
<h3> Direcao </h3>


<table class=" table table-stripe table-bordered table-hover">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Ações</th>
        </th>
    </thead>

    <tbody>
    @foreach($direcoes as $direcao)
         <tr>
         <td>{{$direcao->nome}}</td>
         <td>{{$direcao->cargo}}</td>
        </td>
        <td>
                <a href="{{route('direcoes.edit', ['id'=>$direcao->id])}}" class="btn-sm btn-success">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao({{$direcao->id}})" class="btn-sm btn-danger">Remover</a>
        <td>
    </td>
@endforeach
    </tbody>
</table>

{{$direcoes->links("pagination::bootstrap-4")}}

<a href="{{route('direcoes.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

@section("table-delete")
"direcoes"
@endsection