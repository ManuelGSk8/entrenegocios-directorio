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
                    {{ Form::open(['route' => 'save_ubication', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                    <div class="col-lg-12">
                        <div class="form-group col-lg-12">
                            {{ Form::label('flag_direccion','¿Desea mostrar la dirección de su empresa / negocio en su perfil?') }}
                            <input type="checkbox" data-on="primary" data-off="info" class="switch switch-small" id="flag_direccion" name="flag_direccion" @if ($negocio->flag_direccion == true) checked @endif>
                        </div>

                        <div class="form-group col-lg-12">
                            {{ Form::label('direccion','Dirección') }}
                            {{ Form::text('direccion',$negocio->direccion,['class' => 'form-control input-small']) }}
                            {{ $errors->first('direccion', '<p class="error_message">:message</p>') }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('departamento', 'Departamento') }}
                            {{ Form::select('departamento',$departamentos,$negocio->departamento, array('class' => 'form-control input-sm')) }}
                            {{ $errors->first('departamento', '<p class="error_message">:message</p>') }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('provincia', 'Provincia') }}
                            {{ Form::select('provincia',$provincias,$negocio->provincia, array('class' => 'form-control input-sm')) }}
                        </div>

                        <div class="form-group col-lg-4">
                            {{ Form::label('distrito', 'Distrito') }}
                            {{ Form::select('distrito',$distritos,$negocio->distrito, array('class' => 'form-control input-sm')) }}
                        </div>

                        <div class="form-group col-lg-12">
                            {{ Form::label('flag_mapa','¿Desea mostrar la ubicacion geográfica en su perfil?') }}
                            <input type="checkbox" data-on="primary" data-off="info" class="switch switch-small" id="flag_mapa" name="flag_mapa" @if ($negocio->flag_mapa == true) checked @endif>
                        </div>

                        <input type="hidden" id="latitud" name="latitud" value="{{ $negocio->latitud }}">
                        <input type="hidden" id="longitud" name="longitud"  value="{{ $negocio->longitud }}">
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="map-canvas" style="height: 300px; width: 1005;"></div>
                    </div>
                    <div class="form-group col-lg-12" style="margin-top: 10px;">
                        <input type="submit" value="Grabar" class="btn btn-success">
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<script src="{{ asset('admin_user/search.js') }}"></script>
-->

@endsection