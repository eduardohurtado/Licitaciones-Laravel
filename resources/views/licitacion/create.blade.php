@extends('layouts.layout')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>¡Error!</strong> Por favor revise los campos obligatorios.<br><br>
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

            <h2>Nueva Licitación</h2>

            <form method="POST" action="{{ route('licitaciones.store') }}" role="form">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre Cliente</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Identificación Cliente</label>
                        <input type="number" class="form-control" name="id_cliente" placeholder="Ingrese identificación">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de Inicio</label>
                        <input type="text" class="form-control datepicker" name="fecha_inicio" placeholder="dd/mm/aa">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha de Cierre</label>
                        <input type="text" class="form-control datepicker" name="fecha_cierre" placeholder="dd/mm/aa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Fecha de Presentación de Documentos</label>
                        <input type="text" class="form-control datepicker" name="fecha_presentacion_documentos" placeholder="dd/mm/aa">
                    </div>
                </div>
                <input type="submit" value="Enviar" class="btn btn-success btn-block">
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
