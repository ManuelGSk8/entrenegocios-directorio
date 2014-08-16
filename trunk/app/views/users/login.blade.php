@extends('layout')

@section('content')
<div class="container mt40">
    <section class="row">
        <h1>Login</h1>

        {{ Form::open(['route' => 'log_in', 'method' => 'POST', 'role'=>'form', 'novalidate']) }}
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('email', 'Correo electrónico') }}
                    {{ Form::email('email',null,['class' => 'form-control input-sm']) }}
                    {{ $errors->first('email', '<p class="error_message">:message</p>') }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Contraseña') }}
                    {{ Form::password('password',['class' => 'form-control input-sm']) }}
                    {{ $errors->first('password', '<p class="error_message">:message</p>') }}
                </div>
                <p>
                    <input type="submit" value="Ingresar" class="btn btn-success">
                </p>
            </div>
        {{ Form::close() }}
    </section>
</div>

@endsection