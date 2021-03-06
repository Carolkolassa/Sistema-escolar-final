@extends('adminlte::page')

@section('content')
<h3> Materiais </h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>'materiais/store']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:')!!}
    {!! Form::text('quantidade', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Materiais', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

@stop