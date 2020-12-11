@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">

        {{-- Custom messages --}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Body --}}

        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista de Licitaciones</b></span>
                <div class="ml-auto">
                    <a href="{{ action('LicitacionController@create') }}" class="btn btn-danger">Añadir Licitación</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="licitacionTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Cierre</th>
                        <th scope="col">Fecha Presentación Documentos</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->id_cliente }}</td>
                            <td>{{ $item->fecha_inicio }}</td>
                            <td>{{ $item->fecha_cierre }}</td>
                            <td>{{ $item->fecha_presentacion_documentos }}</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ action('LicitacionController@edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#licitacionTable').DataTable();
        });

    </script>
@endsection
