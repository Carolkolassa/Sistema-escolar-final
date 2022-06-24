@extends ('layouts.default')

@section('content')
<div class="container-fluid">
<h3> Filmes </h3>


<table class=" table table-stripe table-bordered table-hover">
    <thead>
        <tr>
        <th>Filme</th>
        <th>Categoria</th>
        <th>Atores</th>
        <th>Ações</th>
        </th>
    </thead>

    <tbody>
    @foreach($filmes as $filme)
         <tr>
         <td>{{$filme->nome}}</td>
         <td>{{$filme->categoria}}</td>
         <td>
            @foreach($filme->atores as $a)
                <li>{{ $a->ator->nome }}</li>
            @endforeach
        </td>
        <td>
                <a href="{{route('filmes.edit', ['id'=>$filme->id])}}" class="btn-sm btn-success">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao({{$filme->id}})" class="btn-sm btn-danger">Remover</a>
        <td>
    </td>
@endforeach
    </tbody>
</table>

{{$filmes->links("pagination::bootstrap-4")}}

<a href="{{route('filmes.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

@section("table-delete")
"filmes"
@endsection