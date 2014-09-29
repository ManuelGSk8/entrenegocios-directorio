<div class="container mt40">



    <section class="row">
        <h2>Encuentra lo que búscas en nuestro <strong>Directorio</strong> </h2>
        {{ Form::open(['method' => 'POST', 'role'=>'form-horizontal', 'novalidate']) }}
            <div class="form-group col-lg-3">
                {{ Form::label('cboDepar', 'Departamento') }}
                <div class="col-lg-12">
                {{ Form::select('cboDepar',$Departamentos, null, array('class' => 'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group col-lg-3">
                {{ Form::label('cboCat', 'Categorias') }}
                <div class="col-lg-12">
                    {{ Form::select('cboCat',$Categorias, null, array('class' => 'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group col-lg-6">
                {{ Form::label('txtBuscar', 'Busqueda por palabras', ['class' => 'col-lg-12']) }}
                <div class="col-lg-8">
                    {{ Form::text('txtBuscar',null,['class' => 'form-control input-sm', 'placeholder' => 'Buscar']) }}
                </div>
                <button id="btnSearch" class="btn btn-primary col-lg-3 pull-right"><i class="fa fa-search"></i> Buscar </button>
            </div>
        {{ Form::close()}}
        <!--
        <form role="form" class="form-horizontal">
            <div class="form-group col-lg-3">
                <label for="cboDepar">Departamento</label>
                <div class="col-lg-12">
                    <select class="form-control input-sm" id="cboDepar">
                        <option value="1">Seleccione</option>
                        <option value="2">Departamento</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-3">
                <label for="cboCat">Categorias</label>
                <div class="col-lg-12">
                    <select class="form-control input-sm" id="cboCat">
                        <option value="1">Seleccione</option>
                        <option value="2">Categoria</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="txtBuscar" class="col-lg-12">Busqueda por palabras</label>
                <div class="col-lg-8">
                    <input id="txtBuscar" type="text" placeholder="Buscar" class="form-control input-sm"/>
                </div>
                <button type="submit" class="btn btn-primary col-lg-3 pull-right"><i class="fa fa-search"></i> Buscar </button>
            </div>
        </form>-->
    </section>
</div>


