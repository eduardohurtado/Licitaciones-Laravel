@extends('layouts.layout')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">

            {{-- Controller data validator --}}

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

            {{-- Body --}}

            <h2 class="panel-title">Editar Documento:</h2>

            <div style="height: 20px"></div>

            <form method="POST" action="{{ route('documentos.update', $doc->id) }}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre_documentos" placeholder="Ingrese nombre"
                            value="{{ $doc->nombre_documentos }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label>URL de documento/s</label>
                        <input type="text" class="form-control" name="URL_documentos" placeholder="Ingrese nombre"
                            value="{{ $doc->URL_documentos }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de Entrega</label>
                        <input type="text" class="form-control datepicker" name="fecha_entrega" placeholder="dd/mm/aa"
                            value="{{ $doc->fecha_entrega }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Usuario Entrega</label>
                        <input type="text" class="form-control datepicker" name="usuario_entrega" placeholder="dd/mm/aa"
                            value="{{ $doc->usuario_entrega }}">
                    </div>
                </div>

                <label>Seleccionar un área</label>
                <select class="form-control" name="area_id">
                    <option value="{{ $doc_area->id }}" selected>{{ $doc_area->nombre_area }}</option>

                    @foreach ($areas as $area)
                        {{-- Verify to remove default Documento area from list
                        --}}
                        @if ($area->id != $doc_area->id)
                            <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                        @endif
                    @endforeach
                </select>

                <input type="submit" value="Actualizar" class="btn btn-success btn-block mt-3">
                <a href="{{ route('licitaciones.show', $doc_lici->id) }}" class="btn btn-danger btn-block">Regresar</a>
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
