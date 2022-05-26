@extends('adminlte::page')

@section('content')
<h3> Editar Ator {{$ator->nome}}</h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>"atores/$ator->id/update", 'method'=>'put']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', $ator->nome, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('nacionalidade_id', 'Nacionalidade') !!}
    {!! Form::select('nacionalidade_id',
        \App\Models\Nacionalidade::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
    $ator->nacionalidade,['class'=>'form-control', 'require']) !!}
</div>

<div class="form-group">
    {!! Form::label('dt_nascimento', 'Data de Nascimento') !!}
    {!! Form::date('dt_nascimento', $ator->dt_nascimento, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('inicio_atividades', 'Inicio das Atividades') !!}
    {!! Form::date('inicio_atividades', $ator->inicio_atividades, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Editar Ator', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop