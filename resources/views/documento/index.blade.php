@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista de Documentos</b></span>
            </div>
        </div>

        <div class="table-responsive">
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
                            <td>{{ $item->URL_documentos }}</td>
                            <td>{{ $item->fecha_entrega }}</td>
                            <td>{{ $item->usuario_entrega }}</td>
                            <td>@php

                                $current_lici= App\Models\Licitacion::find($item->licitacion_id)

                                @endphp
                                {{ $current_lici->nombre }}
                            </td>
                            <td>@php

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
            $('#areaTable').DataTable();
        });

    </script>
@endsection
