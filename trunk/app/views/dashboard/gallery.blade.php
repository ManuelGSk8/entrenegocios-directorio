@extends('dashboard.layout')

@section('content')

<div class="container-fluid main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="widget-content padded">
                    <a href="#myModal" class="btn btn-primary btn" data-toggle=modal>Open Modal</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="widget-content padded">

                    @foreach ($productos as $producto)

                    <div class="col-lg-2 col-md-3 col-xs-12 thumb">
                         <a class="fancybox thumbnail" href="{{ asset($producto->url_image_large) }}">
                             <img src="{{ asset($producto->url_image_small) }}" alt="" >
                         </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id=myModal>
    <div class=modal-dialog>
        <div class=modal-content>
            <div class=modal-header>
                <button aria-hidden=true class=close data-dismiss=modal type=button>&times;</button>
                <h4 class=modal-title> Se7en </h4>
            </div>
            <div class=modal-body>
                <h1> Welcome </h1>
                {{ Form::open(['route' => 'upload_image', 'class' => 'dropzone', 'id' => 'dropzone_id', 'files' => 'true']) }}
                <div class="fallback">
                    {{ Form::file('file', ['accept' => 'image/*']) }}
                </div>
                {{ Form::close()}}
            </div>
            <div class=modal-footer>
                <button class="btn btn-primary" type=button>Save Changes</button><button class="btn btn-default-outline" data-dismiss=modal type=button>Close</button>
            </div>
        </div>
    </div>
</div>
@endsection