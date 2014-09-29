@foreach($listaNegocios as $negocio)
<article class="col-xs-12 col-sm-6 col-md-3 appear-animation"  data-animation="fadeInUp" style="margin-top:15px; margin-bottom: 15px;">
    <div class="panel panel-default" style="box-shadow: 0 5px 6px 1px #888; border:0px solid transparent;">
        <div class="panel-heading" style="background-color:transparent; border-color:transparent; padding:0px;">
            <div class="col-md-12" style="padding-left: 2px; padding-right: 0px; max-height: 80px; clear: left;">
                <div class="col-md-12" style="padding-right: 0px;">
                           <span class="pull-left" style="font-size: 11px;font-family: cursive;color: rgb(180, 177, 162); padding-top: 5px;">
                                <a href="{{ route('categoria', [$negocio->rubSlug,$negocio->rubId]) }}"> *{{ $negocio->rubDescripcion }}</a>
                           </span>
                           <span class="pull-right" >
                               <div class='row_icon'>
                                   <a href="{{ 'http://'.$negocio->web_fb }}" target="_blank" @if($negocio->web_fb == '') class="disable" @endif><i title='Facebook' class="fb icon-facebook transition  "></i></a><a href="{{ 'http://'.$negocio->web_tw }}" target="_blank" @if ($negocio->web_tw == '') class="disable" @endif><i title='Twitter' class="tw icon-twitter transition "></i></a><a href="{{ 'http://'.$negocio->website }}"  target="_blank" @if ($negocio->website == '') class="disable" @endif><i title='Web Site' class="gp icon-earth transition "></i></a>
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
            <a href="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" title="" class="zoom" data-title="Delicious Food" data-footer="Whatever your desire" data-type="image" data-toggle="lightbox" target="_blank">
                <img src="{{ asset($negocio->url_image_small) }}" alt="" />
                <!--<span class="overlay"><i class="glyphicon glyphicon-plus-sign"></i></span>-->
            </a>
        </div>
    </div>
</article>
@endforeach
<div class="col-lg-12">
    {{$listaNegocios->links()}}
</div>