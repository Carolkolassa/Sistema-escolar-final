@extends('adminlte::page')

@section('content')
<h3> Editar Direcao {{$direcoes->nome}}</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"direcoes/$direcoes->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', $direcoes->nome, ['class' => 'form-control', 'required']) !!}
</div>

{!! Form::open(['url'=>"direcoes/$direcoes->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('cargo', 'Cargo:')!!}
    {!! Form::text('cargo', $direcoes->cargo, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Direcao', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop