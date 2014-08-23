@extends('dashboard.layout')

@section('content')

<div class="container-fluid main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-edit"></i>Ubicacion Geografica
                </div>
                <div class="widget-content padded">
                    <div class="col-lg-12">
                        {{ Form::open(['route' => 'save_ubication', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                        <div class="form-group col-lg-12">
                            {{ Form::label('flag_direccion','¿Desea mostrar la dirección de su empresa / negocio en su perfil?') }}
                            <input type="checkbox" data-on="primary" data-off="info" class="switch switch-small" id="flag_direccion" name="flag_direccion">
                        </div>

                        <div class="form-group col-lg-12">
                            {{ Form::label('direccion','Dirección') }}
                            {{ Form::text('direccion',null,['class' => 'form-control input-small']) }}
                            {{ $errors->first('direccion', '<p class="error_message">:message</p>') }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('departamento', 'Departamento') }}
                            {{ Form::select('departamento',['0' => '-- Seleccione --'],null, array('class' => 'form-control input-sm')) }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('provincia', 'Provincia') }}
                            {{ Form::select('provincia',['0' => '-- Seleccione --'],null, array('class' => 'form-control input-sm')) }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('distrito', 'Distrito') }}
                            {{ Form::select('distrito',['0' => '-- Seleccione --'],null, array('class' => 'form-control input-sm')) }}
                        </div>


                        <div class="form-group col-lg-12">
                            {{ Form::label('flag_map','¿Desea mostrar la ubicacion geográfica en su perfil?') }}
                            <input type="checkbox" data-on="primary" data-off="info" class="switch switch-small" id="flag_direccion" name="flag_direccion">
                        </div>


                        {{ Form::close() }}
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        {{ $map['js'] }}
                        {{ $map['html'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin_user/search.js') }}"></script>
@endsection