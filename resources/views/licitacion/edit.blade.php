@extends('layouts.layout')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif

            <h2 class="panel-title">Editar Licitacion:</h2>
            <span class="panel-title" style="font-size: 30px">"{{ $licitacion->nombre }}"</span>

            <div style="height: 20px"></div>

            <form method="POST" action="" role="form">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre Cliente</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre"
                            value="{{ $licitacion->nombre }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Identificación Cliente</label>
                        <input type="number" class="form-control" name="id_cliente" placeholder="Ingrese identificación"
                            value="{{ $licitacion->id_cliente }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de Inicio</label>
                        <input type="text" class="form-control datepicker" name="fecha_inicio" placeholder="dd/mm/aa"
                            value="{{ $licitacion->fecha_inicio }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha de Cierre</label>
                        <input type="text" class="form-control datepicker" name="fecha_cierre" placeholder="dd/mm/aa"
                            value="{{ $licitacion->fecha_cierre }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Fecha de Presentación de Documentos</label>
                        <input type="text" class="form-control datepicker" name="fecha_presentacion_documentos"
                            placeholder="dd/mm/aa" value="{{ $licitacion->fecha_presentacion_documentos }}">
                    </div>
                </div>
                <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                <a href="{{ action('LicitacionController@index') }}" class="btn btn-danger btn-block">Regresar</a>
            </form>

        </div>
    </div>

    <script type="text/javascript">
        // DatePicker Selector
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });

    </script>
@endsection
