@extends('adminlte::page')

@section('content')
<h3> Editar Materiais {{$materiais->nome}}</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"materiais/$materiais->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', $materiais->nome, ['class' => 'form-control', 'required']) !!}
</div>

{!! Form::open(['url'=>"materiais/$materiais->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:')!!}
    {!! Form::text('quantidade', $materiais->quantidade, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Materiais', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop