@extends ('layouts.default')

@section('content')
<div class="container-fluid">
<h3> Acervo </h3>


<table class=" table table-stripe table-bordered table-hover">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Data do evento</th>
        <th>Local</th>
        <th>Ações</th>
        </th>
    </thead>

    <tbody>
    @foreach($calendarios as $calendario)
         <tr>
         <td>{{$calendario->nome}}</td>
         <td>{{$calendario->data_atividades}}</td>
         <td>{{$calendario->local}}</td>
        </td>
        <td>
                <a href="{{route('calendarios.edit', ['id'=>$calendario->id])}}" class="btn-sm btn-success">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao({{$calendario->id}})" class="btn-sm btn-danger">Remover</a>
        <td>
    </td>
@endforeach
    </tbody>
</table>

{{$calendarios->links("pagination::bootstrap-4")}}

<a href="{{route('calendarios.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

@section("table-delete")
"calendarios"
@endsection