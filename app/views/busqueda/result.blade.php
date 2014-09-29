@extends('layout')

@include('busqueda.busqueda',['Departamentos' => $listaDepartamento, 'Categorias' => $listaCategorias])

@section('content')
<div class="container mt40">
    <section class="row">
        @include('includes.negocio-list',['listaNegocios' => $listaNegocios])
    </section>
</div>
<a href="#" class="scrollup">Scroll</a>
@stop