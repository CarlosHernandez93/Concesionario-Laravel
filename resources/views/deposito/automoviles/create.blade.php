@extends('layouts.admin')
@section('contenido')
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva Automovil</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('Automoviles.store') }}" method="POST" class="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="automoviles">Marca</label>
                <input type="text" class="form-control" name="Marca" id="Marca" placeholder="Ingresa el nombre de la marca">
            </div>

            <div class="form-group">
                <label for="Referencia">Referencia</label>
                <input type="text" class="form-control" name="Referencia" id="Referencia" placeholder="Ingresa la referencia">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="Descripcion" id="descripcion" placeholder="Ingresa la descripción">
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
            </div>
        </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!-- /.row -->
@endsection