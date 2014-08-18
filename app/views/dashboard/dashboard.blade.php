@extends('dashboard.layout')

@section('content')
    <div class="container-fluid main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container stats-container">
                    <div class="col-md-3" >
                        <div class="number">
                            <i class="fa fa-eye" style="font-size: 60px;"></i> 86
                        </div>
                        <div class="text"> Visitas de mi página </div>
                    </div>
                    <div class="col-md-3" style="background-color: #3b5998;">
                        <div class="number" style="color: #ffffff">
                            <i class="fa fa-facebook" style="font-size: 60px;"></i> 86
                        </div>
                        <div class="text" style="color: #ffffff"> Likes de mi página </div>
                    </div>
                    <div class="col-md-3" style="background-color: #00b2f1;">
                        <div class="number" style="color: #ffffff">
                            <i class="fa fa-twitter" style="font-size: 60px;"></i> 613
                        </div>
                        <div class="text" style="color: #ffffff"> Tweets de mi página </div>
                    </div>
                    <div class="col-md-3" style="background-color: #d73d32;">
                        <div class="number" style="color: #ffffff">
                            <i class="fa fa-google-plus" style="font-size: 60px;"></i> 613
                        </div>
                        <div class="text" style="color: #ffffff"> +1 de mi página </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="widget-container fluid-height clearfix">
                   <div class="heading">
                       <i class="fa fa-edit"></i>asd
                   </div>
                   <div class="widget-content padded">
                       {{ Form::open(['route' => 'save_general', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                       <div class="form-group">
                           {{ Form::label('full_name', 'Nombre de tu Empresa / Negocio') }}
                           {{ Form::text('full_name',null,['class' => 'form-control input-sm']) }}
                       </div>
                       <div class="form-group">
                           {{ Form::label('slogan_negocio', 'Slogan de tu Empresa / Negocio') }}
                           {{ Form::text('slogan_negocio',null,['class' => 'form-control input-sm']) }}
                       </div>
                       <div class="form-group">
                           {{ Form::label('descripcion', 'Descripción') }}
                           {{ Form::text('descripcion',null,['class' => 'form-control input-sm']) }}
                       </div>
                       <div class="form-group">
                           {{ Form::label('rubro', 'Categoría')}}
                           {{ Form::select('rubro', ['L' => 'Large', 'S' => 'Small'], null, array('class' => 'form-control')) }}
                       </div>
                       <div class="form-group">
                           {{ Form::label('website', 'Página web') }}
                           {{ Form::text('website',null,['class' => 'form-control input-sm']) }}
                       </div>
                       <input type="submit" value="Grabar" class="btn btn-success">
                       {{ Form::close() }}
                   </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        <i class="fa fa-edit"></i>dssa
                    </div>
                    <div class="widget-content padded">
                        {{ Form::open(['route' => 'save_contact', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                        <div class="form-group">
                            {{ Form::label('fijo', 'Teléfono') }}
                            {{ Form::text('fijo',null,['class' => 'form-control input-sm']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('movil', 'Teléfono Movil') }}
                            {{ Form::text('movil',null,['class' => 'form-control input-sm']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Correo electrónico') }}
                            {{ Form::email('email',null,['class' => 'form-control input-sm']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('web_fb', 'Página de Facebook') }}
                            {{ Form::text('web_fb',null,['class' => 'form-control input-sm']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('web_tw', 'Página de Twitter') }}
                            {{ Form::text('web_tw',null,['class' => 'form-control input-sm']) }}
                        </div>
                        <input type="submit" value="Grabar" class="btn btn-success">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop