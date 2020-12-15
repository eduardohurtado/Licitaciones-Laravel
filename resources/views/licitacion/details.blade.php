@extends('layouts.layout')
@section('content')

    <div class="container mt-5">

        {{-- Custom messages --}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif

        {{-- Body --}}

        <div class="row">
            <div class="col-sm">
                <h2><b>Licitación N°: {{ $lici->id }}</b></h2>

                <h4>Nombre: {{ $lici->nombre }}</h4>
                <h4>Identificación: {{ $lici->id_cliente }}</h4>
            </div>

            <div class="col-sm text-right">
                <div style="margin-bottom: 10px">
                    <a class="btn btn-danger" href="{{ action('LicitacionController@edit', $lici->id) }}">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                </div>

                <form action="{{ action('LicitacionController@destroy', $lici->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button onclick="return confirm('¿Esta seguro de eliminar la licitación?')"
                        class="btn btn-danger btn-xs" type="submit">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>

        <div class="container-fluid mt-3">
            <div class="d-flex text-center justify-content-center">
                <h3>DOCUMENTOS</h3>
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
                            <th scope="col">Área</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docs as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->nombre_documentos }}</td>
                                <td>{{ $item->URL_documentos }}</td>
                                <td>{{ $item->fecha_entrega }}</td>
                                <td>{{ $item->usuario_entrega }}</td>
                                {{-- Querying Area name from current Document
                                --}}
                                <td>@php

                                    $current_area= App\Models\Area::find($item->area_id)

                                    @endphp
                                    {{ $current_area->nombre_area }}
                                </td>
                                <td class="d-flex justify-content-center">
                                    <div class="mr-3">
                                        <a class="btn btn-danger" href="{{ route('documentos.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                    </div>

                                    <form action="{{ action('DocumentoController@destroy', $item->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button onclick="return confirm('¿Esta seguro de eliminar el Documento?')"
                                            class="btn btn-danger btn-xs" type="submit">
                                            <i class="fa fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a class="btn btn-danger mt-3" href="{{ route('documentos.createWithID', $lici->id) }}">
                Añadir Nuevo Documento
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#areaTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encuentra el registro",
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
                }
            });
        });

    </script>
@endsection
