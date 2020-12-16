@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista de Documentos</b></span>
            </div>
        </div>

        <div class="table-responsive p-1">
            <table class="table table-striped table-bordered" id="areaTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Documento</th>
                        <th scope="col">URL Documento</th>
                        <th scope="col">Fecha Entrega</th>
                        <th scope="col">Usuario Entrega</th>
                        <th scope="col">Licitación</th>
                        <th scope="col">Área</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->nombre_documentos }}</td>
                            <td class="text-center">
                                <a href="{{ route('documentos.download', $item->id) }}" target="blank"
                                    class="btn btn-primary">
                                    Descargar
                                </a>
                            </td>
                            <td>{{ $item->fecha_entrega }}</td>
                            <td>{{ $item->usuario_entrega }}</td>
                            <td>
                                {{-- Querying current Licitacion
                                --}}
                                @php

                                $current_lici= App\Models\Licitacion::find($item->licitacion_id)

                                @endphp
                                {{ $current_lici->nombre }}
                            </td>
                            <td>
                                {{-- Querying current Area --}}
                                @php

                                $current_area= App\Models\Area::find($item->area_id)

                                @endphp
                                {{ $current_area->nombre_area }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#areaTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No hay registros disponibles",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros)",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
            });
        });

    </script>
@endsection
