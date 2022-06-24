@extends('adminlte::page')

@section('content')
<h3> Editando Filme: {{$filme->nome}}</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"filmes/$filme->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('nome', 'nome:')!!}
    {!! Form::text('nome', $filme->nome, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('categoria', 'categoria') !!}
    {!! Form::text('categoria', $filme->categoria, ['class'=>'form-control', 'required']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Editar Filme', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

@stop