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
        </th>
    </thead>

    <tbody>
        @foreach($filmes as $filme)
        <tr>
            <td>{{$filme->nome}}</td> 
            <td>{{$filme->categoria}}</td> 
            <td>{{$filme->filme_atores}}</td>  
            </td>
                
        @endforeach
    </tbody>
</table>

<a href="{{route('filmes.create',[])}}" class="btn-sm btn-info">Adicionar</a>
</div>
@stop

