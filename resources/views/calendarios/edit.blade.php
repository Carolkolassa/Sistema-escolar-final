@extends('adminlte::page')

@section('content')
<h3> Editar Evento {{$Calendario->nome}}</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"calendarios/$Calendario->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', $Calendario->nome, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('data_atividades', 'Data do Evento') !!}
    {!! Form::date('data_atividades', $Calendario->data_atividades, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('local', 'Local:')!!}
    {!! Form::text('local', $Calendario->local, ['class' => 'form-control', 'required']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Editar Evento', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop