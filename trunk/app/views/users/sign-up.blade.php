@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Registro</h1>

            {{ Form::open(['route' => 'register', 'method' => 'POST', 'role'=>'form']) }}

            <div class="form-group">
                {{ Form::label('full_name', 'Nombre completo') }}
                {{ Form::text('full_name',null,['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Correo electrónico') }}
                {{ Form::text('email',null,['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Clave') }}
                {{ Form::password('password',['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Repite tu clave') }}
                {{ Form::password('password_confirmation',['class' => 'form-control']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>


@endsection