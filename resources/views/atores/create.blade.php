@extends('adminlte::page')

@section('content')
<h3> Alunos </h3>

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</ul>
@endif

{!! Form::open(['url'=>'atores/store']) !!}
<div class="form-group">
    {!! Form::label('nome', 'Nome:')!!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('nacionalidade_id', 'Série') !!}
    {!! Form::select('nacionalidade_id',
    \App\Models\Nacionalidade::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
    null,['class'=>'form-control', 'require']) !!}
</div>

<div class="form-group">
    {!! Form::label('dt_nascimento', 'Data de Nascimento') !!}
    {!! Form::date('dt_nascimento', null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('inicio_atividades', 'Inicio das Atividades') !!}
    {!! Form::date('inicio_atividades', null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Aluno', ['class'=>'btn btn-primary'])!!}
    {!! Form::reset('limpar', ['class'=>'btn btn-default']) !!}
</div>


{!! Form::close() !!}

@stop