@extends('adminlte::page')

@section('content')
<h3> Editar Série</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"nacionalidades/$nacionalidade->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('descricao', 'descricao:')!!}
    {!! Form::text('descricao', $nacionalidade->descricao, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Série', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop