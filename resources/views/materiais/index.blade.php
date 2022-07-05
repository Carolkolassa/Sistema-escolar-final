@extends ('layouts.default')

@section('content')
<div class="container-fluid">
    <h3> Materiais </h3>


    <table class=" table table-stripe table-bordered table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Ações</th>
                </th>
        </thead>

        <tbody>
            @foreach($materiais as $material)
            <tr>
                <td>{{$material->nome}}</td>
                <td>{{$material->quantidade}}</td>
                </td>
                <td>
                    <a href="{{route('materiais.edit', ['id'=>$material->id])}}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{$material->id}})" class="btn-sm btn-danger">Remover</a>
                <td>
                </td>
                @endforeach
        </tbody>
    </table>

    {{$materiais->links("pagination::bootstrap-4")}}

    <a href="{{route('materiais.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

@section("table-delete")
"materiais"
@endsection