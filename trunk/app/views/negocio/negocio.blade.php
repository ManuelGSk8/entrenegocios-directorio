@extends('layout')

@section('content')
<div class="container mt40">

    <section class="row">
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
        </div>
        <div class=" col-md-4" >
            <div class="col-md-12" style="background-color:#ffffff; box-shadow: 0 5px 6px 1px #888;">
              <h4>Descripción:</h4>
              <p>
                {{ $negocio->descripcion }}
              </p>
              <hr style="clear: left;"/>
              <h4>Redes Sociales / Web:</h4>
              <div class="col-md-12" >
                  <div class='row_icon' style="font-size: 25px; margin: 10px;">
                      <i title='Facebook' class="fb icon-facebook @if ($negocio->web_fb != '')  transition @else disable @endif"></i>
                      <i title='Twitter' class="tw icon-twitter @if ($negocio->web_tw != '') transition @else disable @endif"></i>
                      <i title='Web Site' class="gp icon-earth @if ($negocio->website != '') transition @else disable @endif"></i>
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
                          <span>{{ $negocio->mail }}</span>
                      </li>
                      <li>
                          <strong>Web:</strong>
                          <span>{{ $negocio->website }}</span>
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
              <div class="col-md-12" >
                {{ $map['js'] }}
                {{ $map['html'] }}
              </div>
              @endif
            </div>
        </div>
    </section>
</div>

@endsection