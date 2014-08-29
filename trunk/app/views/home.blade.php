@extends('layout')

@section('content')
<div class="container mt40">
    <section class="row">
    @foreach($listaNegocios as $rubros)
        @foreach($rubros->negocios as $negocio)
        <article class="col-xs-12 col-sm-6 col-md-3 appear-animation"  data-animation="fadeInUp" style="margin-top:15px; margin-bottom: 15px;">
            <div class="panel panel-default" style="box-shadow: 0 5px 6px 1px #888; border:0px solid transparent;">
                <div class="panel-heading" style="background-color:transparent; border-color:transparent; padding:0px;">
                    <div class="col-md-12" style="padding-left: 2px; padding-right: 0px; max-height: 80px; clear: left;">
                        <div class="col-md-12" style="padding-right: 0px;">
                            <span class="pull-left" style="font-size: 11px;font-family: cursive;color: rgb(180, 177, 162); padding-top: 5px;">

                                {{ $negocio->id }}
                                *{{ $rubros->descripcion }}
                           </span>
                           <span class="pull-right" >
                               <div class='row_icon'>
                                   <i title='Facebook' class="fb icon-facebook @if ($negocio->web_fb != '')  transition @else disable @endif"></i><i title='Twitter' class="tw icon-twitter @if ($negocio->web_tw != '') transition @else disable @endif"></i><i title='Web Site' class="gp icon-earth @if ($negocio->website != '') transition @else disable @endif"></i>
                               </div>
                           </span>
                        </div>
                        <div class="pull-left" style="clear: left">
                            <span class="pull-left" style="font-size: 13px;font-family: cursive; font-weight:bold; clear: left; padding-left:5px;">
                                <a href="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" title="{{ $negocio->nombre_negocio }}" target="_blank">{{ $negocio->nombre_negocio }}</a>
                            </span>
                            <span class="pull-left" style="font-size: 12px;font-family: cursive; clear: left; padding-left:8px;">
                               {{ Str::limit($negocio->descripcion,80) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="clear: left;">
                    <div class="white-triangle-pointer-item"></div>
                    @foreach($negocio->productos as $producto)
                    <a href="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" title="" class="zoom" data-title="Delicious Food" data-footer="Whatever your desire" data-type="image" data-toggle="lightbox" target="_blank">
                        @if($producto->perfil != null)
                        <img src="{{ asset($producto->url_image_small) }}" alt="" />
                        @endif
                        <span class="overlay"><i class="glyphicon glyphicon-plus-sign"></i></span>
                    </a>

                    @endforeach
                </div>

            </div>
        </article>
        @endforeach
    @endforeach

    </section>
</div>
@stop