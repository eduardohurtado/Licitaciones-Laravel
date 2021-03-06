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

            <h2>Añadir Nuevo Documento</h2>

            <h4 class="mt-3">LICITACIÓN: "{{ $lici->nombre }}"</h4>

            <form method="POST" action="{{ route('documentos.storeDocument', $lici->id) }}" role="form"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-row">
                    <input type="hidden" class="form-control" name="licitacion_id" value="{{ $lici->id }}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre Documento</label>
                        <input type="text" class="form-control" name="nombre_documentos" placeholder="Ingrese nombre">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Seleccionar Documento</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="inputFileDoc" />
                            <label class="custom-file-label" for="inputFileDoc">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de Entrega</label>
                        <input type="text" class="form-control datepicker" name="fecha_entrega" placeholder="dd/mm/aa">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Usuario Entrega</label>
                        <input type="text" class="form-control datepicker" name="usuario_entrega" placeholder="dd/mm/aa">
                    </div>
                </div>

                <label>Seleccionar un área</label>
                <select class="form-control" name="area_id">
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                    @endforeach
                </select>

                <input type="submit" value="Añadir Documento" class="btn btn-success btn-block mt-3">
                <a href="{{ route('licitaciones.show', $lici->id) }}" class="btn btn-danger btn-block">Regresar</a>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // DatePicker Selector
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                language: "es",
                autoclose: true
            });

            // Put custom file name
            $('#inputFileDoc').on('change', function() {
                //get the file name
                var fileName = $(this).val().split('\\').pop();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        });

    </script>
@endsection
