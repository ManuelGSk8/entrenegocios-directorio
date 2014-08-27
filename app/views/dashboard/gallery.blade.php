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
                    <div class="gallery-container isotope" style="position: relative; overflow: hidden; height: auto; width: 100%;">
                        @foreach ($productos as $producto)

                        <div class="col-lg-2 col-md-3 col-xs-12 ">
                            <div class="panel panel-default" >
                                <div class="panel-body" style="padding: 0px !important;">
                                     <img src="{{ asset($producto->url_image_small) }}" alt="" width="100%" height="100%">
                                </div>
                                <div class="panel-footer " style="padding: 0px;">
                                    <a class="btn @if ($producto->perfil != null) btn-success @else btn-default @endif col-md-3" href="#" style="border-radius: 0px; margin: 0 0px 10px 0;">
                                        <i class="fa fa-check" style="margin: 0px;"></i>
                                    </a>
                                    <a class="btn btn-primary col-md-3" href="#" style="border-radius: 0px; margin: 0 0px 10px 0;">
                                        <i class="fa fa-pencil" style="margin: 0px;"></i>
                                    </a>
                                    <a class="btn btn-info col-md-3 fancybox " style="border-radius: 0px; margin: 0 0px 10px 0;" href="{{ asset($producto->url_image_large) }}" data-fancybox-group="gallery">
                                        <i class="fa fa-search" style="margin: 0px;"></i>
                                    </a>
                                    <a class="btn btn-danger col-md-3" href="#" style="border-radius: 0px; margin: 0 0px 10px 0;">
                                        <i class="fa fa-trash-o" style="margin: 0px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
                {{ Form::open(['route' => 'upload_image', 'class' => 'dropzone', 'id' => 'dropzone_id', 'files' => 'true', 'id' => 'my-awesome-dropzone']) }}
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

<script src="{{ asset('admin_user/query.js') }}"></script>
@endsection