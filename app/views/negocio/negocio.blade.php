@extends('layout')

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container mt40">

    <section class="row" style="margin-bottom: 20px;">
        <div class="col-md-offset-1 col-md-6" style="margin-bottom: 30px;">
            <div class="col-md-12" style="background-color:#ffffff; padding-left:0px; padding-right:0px; box-shadow: 0 5px 6px 1px #888;">
                <div class="col-md-12">
                    <h1>{{ $negocio->nombre_negocio }}</h1>
                    <h4>{{ $negocio->slogan_negocio }}</h4>
                </div>
                <div style="clear: left; position: relative;">
                    <div class="white-triangle-pointer-item"></div>
                    @foreach($negocio->productos as $producto)
                    <img src="{{ $producto->url_image_800x600 }}" alt="" width="100%" />
                    @endforeach
                </div>

            </div>
            <div class="col-md-12" style="background-color:#ffffff;  padding-right:0px; box-shadow: 0 5px 6px 1px #888; margin-top:20px;">
                <h3>Descripción:</h3>
                <p>
                    {{ $negocio->descripcion }}
                </p>
            </div>
        </div>
        <div class=" col-md-4" >
            <div class="col-md-12" style="background-color:#ffffff; box-shadow: 0 5px 6px 1px #888;">
              <h4>Links de redes sociales / web:</h4>
              <div class="col-md-12" >
                  <div class='row_icon' style="font-size: 25px; margin: 10px;">
                      @if ($negocio->web_fb != '')
                      <a href="{{ $negocio->web_fb }}" target="_blank" >
                        <i title='Facebook' class="fb icon-facebook"></i>
                      </a>
                      @endif
                      @if ($negocio->web_tw != '')
                      <a href="{{ $negocio->web_tw }}" target="_blank" >
                        <i title='Twitter' class="tw icon-twitter"></i>
                      </a>
                      @endif
                      @if ($negocio->website != '')
                      <a href="{{ $negocio->website }}" target="_blank">
                        <i title='Web Site' class="gp icon-earth"></i>
                      </a>
                      @endif
                  </div>
              </div>
              <hr style="clear: left;"/>
              <h4>Datos de contacto:</h4>
              <div class="col-md-12" >
                  <ul>
                      <li>
                          <strong>Fijo:</strong>
                          <span>{{ $negocio->fijo }}</span>
                      </li>
                      <li>
                          <strong>Movil:</strong>
                          <span>{{ $negocio->movil }}</span>
                      </li>
                      <li>
                          <strong>E-Mail:</strong>
                          <span> <a href="mailto:{{ $negocio->mail }}" > {{ $negocio->mail }}</a></span>
                      </li>
                      <li>
                          <strong>Web:</strong>
                          <span><a href="{{ $negocio->website }}" target="_blank">{{ $negocio->website }} </a></span>
                      </li>
                      @if ($negocio->flag_direccion === 1)
                      <li>
                          <strong>Dirección:</strong>
                          <span>{{ $negocio->direccion }}</span>
                      </li>
                      @endif
                  </ul>
              </div>
              @if ($negocio->flag_mapa === 1)
              <hr style="clear: left;"/>
              <h4>Ubicación:</h4>
              <div class="col-md-12" style="padding-bottom: 20px;">
                {{ $map['js'] }}
                {{ $map['html'] }}
              </div>
              @endif
              <hr style="clear: left;"/>
              <h4>Compartir:</h4>
              <div class="col-md-12" style="min-height: 80px;">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                      <div class="fb-like"  data-href="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                      <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" data-counturl="{{ route('negocio', [$negocio->slug, $negocio->id]) }}" data-lang="en" data-count="vertical">Tweet</a>
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                      <!-- Inserta esta etiqueta donde quieras que aparezca Botón +1. -->
                      <div class="g-plusone" data-size="tall" data-href="http://localhost/directorio_entrenegocios/public/smith-waelchi/1"></div>

                      <!-- Inserta esta etiqueta después de la última etiqueta de Botón +1. -->
                      <script type="text/javascript">
                          window.___gcfg = {lang: 'es'};

                          (function() {
                              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                              po.src = 'https://apis.google.com/js/platform.js';
                              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                      </script>
                  </div>


              </div>

            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-md-offset-1 col-md-10" style="margin-bottom: 30px;">
            <h3>Productos:</h3>
            <div class="col-md-12" >

                @foreach($negocio->productos as $producto)
                <div class="col-md-3 col-sm-6" >
                    <a class="fancybox thumbnail" href="{{ $producto->url_image_800x600 }}" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet" style="box-shadow: 0 5px 6px 1px #888;">
                        <img src="{{ $producto->url_image_350x350 }}" alt="" width="100%" />
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

@endsection