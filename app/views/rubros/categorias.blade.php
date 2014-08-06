@extends('layout')

@section('content')

<div class="container mt40">
    <h1>{{ $rubro->descripcion }}</h1>
    <section class="row">
        @foreach ($rubro->negocios as $negocio)
        <article class="col-xs-12 col-sm-6 col-md-3">
            <div class="col-md-12" style="padding-left: 2px; padding-right: 0px;">
               <span class="pull-left" style="font-size: 11px;font-family: cursive;color: rgb(180, 177, 162);">
                   {{ $rubro->descripcion }}
               </span>
                <span class="pull-right">
                   <div class='row_icon'><i class='icon-facebook fa fa-facebook'></i><i class='icon-twitter fa fa-twitter'></i></div>
               </span>
            </div>
            <div class="panel panel-default">

                <div class="panel-body">
                    @foreach($negocio->productos as $producto)
                    <a href="{{ $producto->url_image }}" title="" class="zoom" data-title="Delicious Food" data-footer="Whatever your desire" data-type="image" data-toggle="lightbox">
                        <img src="{{ $producto->url_image }}" alt="" />
                        <span class="overlay"><i class="glyphicon glyphicon-plus-sign"></i></span>
                    </a>

                    @endforeach
                </div>
                <div class="panel-footer">
                    <h4><a href="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" title="{{ $negocio->nombre_negocio }}">{{ $negocio->nombre_negocio }}</a></h4>
                    <span class="pull-right">
                        <i id="like2" class="glyphicon glyphicon-thumbs-up"></i> <div id="like2-bs3"></div>
                        <i id="dislike2" class="glyphicon glyphicon-thumbs-down"></i> <div id="dislike2-bs3"></div>
                    </span>
                </div>
            </div>
        </article>
        @endforeach

    </section>



</div>