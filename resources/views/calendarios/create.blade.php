@extends('adminlte::page')

@section('content')
<h3> Calendário Acadêmico </h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>'calendarios/store']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('data_atividades', 'Data do Evento') !!}
    {!! Form::date('data_atividades', null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('local', 'Local:')!!}
    {!! Form::text('local', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Evento', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

@stop