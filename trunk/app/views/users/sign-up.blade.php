@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        {{ Form::open(['route' => 'register', 'method' => 'POST', 'role'=>'form', 'novalidate']) }}
        <h1>Registro</h1>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('full_name', 'Nombres Completos') }}
                {{ Form::text('full_name',null,['class' => 'form-control input-sm']) }}
                {{ $errors->first('full_name', '<p class="error_message">:message</p>') }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Correo electrónico') }}
                {{ Form::email('email',null,['class' => 'form-control input-sm']) }}
                {{ $errors->first('email', '<p class="error_message">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('nombre_negocio', 'Nombre de tu Empresa / Negocio') }}
                {{ Form::text('nombre_negocio',null,['class' => 'form-control input-sm']) }}
                {{ $errors->first('nombre_negocio', '<p class="error_message">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('rubro', 'Categoría')}}
                {{ Form::select('rubro',$rubros, null, array('class' => 'form-control input-sm')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Clave') }}
                {{ Form::password('password',['class' => 'form-control input-sm']) }}
                {{ $errors->first('password', '<p class="error_message">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Confirma tu clave') }}
                {{ Form::password('password_confirmation',['class' => 'form-control input-sm']) }}
                {{ $errors->first('password_confirmation', '<p class="error_message">:message</p>') }}
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" value="Registrarme" class="btn btn-success">
        </div>
        {{ Form::close() }}
    </div>
</div>


@endsection