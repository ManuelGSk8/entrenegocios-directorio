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
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                   <div class="heading">
                       <i class="fa fa-edit"></i>asd
                   </div>
                   <div class="widget-content padded">
                       {{ Form::open(['route' => 'save_general', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                       <div class="col-lg-6">
                           <div class="form-group">
                               {{ Form::label('nombre_negocio', 'Nombre de tu Empresa / Negocio') }}
                               {{ Form::text('nombre_negocio', $negocio->nombre_negocio,['class' => 'form-control input-sm']) }}
                               {{ $errors->first('nombre_negocio', '<p class="error_message">:message</p>') }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('slogan_negocio', 'Slogan de tu Empresa / Negocio') }}
                               {{ Form::text('slogan_negocio',$negocio->slogan_negocio,['class' => 'form-control input-sm']) }}
                               {{ $errors->first('slogan_negocio', '<p class="error_message">:message</p>') }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('descripcion', 'Descripción') }}
                               {{ Form::text('descripcion',$negocio->descripcion,['class' => 'form-control input-sm']) }}
                               {{ $errors->first('descripcion', '<p class="error_message">:message</p>') }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('rubro', 'Categoría')}}
                               {{ Form::select('rubro',$rubros, $negocio->rubros_id, array('class' => 'form-control input-sm')) }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('website', 'Página web') }}
                               {{ Form::text('website',$negocio->website,['class' => 'form-control input-sm']) }}
                               {{ $errors->first('website', '<p class="error_message">:message</p>') }}
                           </div>

                       </div>
                       <div class="col-lg-6">
                           <div class="form-group">
                               {{ Form::label('fijo', 'Teléfono') }}
                               {{ Form::text('fijo',$negocio->fijo,['class' => 'form-control input-sm']) }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('movil', 'Teléfono Movil') }}
                               {{ Form::text('movil',$negocio->movil,['class' => 'form-control input-sm']) }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('email', 'Correo electrónico') }}
                               {{ Form::email('email', $negocio->email ,['class' => 'form-control input-sm']) }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('web_fb', 'Página de Facebook') }}
                               {{ Form::text('web_fb',$negocio->web_fb,['class' => 'form-control input-sm']) }}
                           </div>
                           <div class="form-group">
                               {{ Form::label('web_tw', 'Página de Twitter') }}
                               {{ Form::text('web_tw',$negocio->web_tw,['class' => 'form-control input-sm']) }}
                           </div>
                       </div>

                       <input type="submit" value="Grabar" class="btn btn-success">
                       {{ Form::close() }}
                   </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        <i class="fa fa-edit"></i>Tags
                    </div>
                    <div class="widget-content padded">
                        {{ Form::open(['route' => 'save_tags', 'method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
                        <div class="form-group">
                            {{ Form::label('tag', 'Tag input', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('tag',$tag,['class' => 'form-control col-lg-12', 'data-role' => 'tagsinput']) }}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" value="Grabar" class="btn btn-success"/>
                        </div>
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop