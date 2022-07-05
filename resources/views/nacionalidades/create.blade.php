@extends('adminlte::page')
@section('content')
<h3>Nova Série</h3>
@if ($errors->any())
<ul class="alert alert-danger">
    @foreach($erros->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
{!! Form::open(['route'=>'nacionalidades.store']) !!}
<div class="form-group">
    {!! Form::label('descricao','descrição') !!}
    {!! Form::text('descricao',null,['class'=>'form-control','required']) !!}
    <div>

        <div class="form-group">
            {!! Form::submit('Criar Série',['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar',['class'=>'btn btn-default'])!!}
        </div>
        {!! Form::close() !!}

        @stop