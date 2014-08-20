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
                    {{ Form::open(['route' => 'upload_image', 'method' => 'POST', 'files' => true ,'role'=>'form-inline', 'novalidate']) }}
                    <div class="form-group">
                        {{ Form::label('image','Foto de tus Productos') }}
                        {{ Form::file('image', ['accept' => 'image/*']) }}
                    </div>
                    <input type="submit" value="Grabar" class="btn btn-success">
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection