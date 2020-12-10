@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista Licitaciones</b></span>
                <div class="ml-auto">
                    <a href="" class="btn btn-danger">Añadir Licitación</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="licitacionTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Cierre</th>
                        <th scope="col">Fecha Presentación Documentos</th>
                        <th scope="col">Acciones</th>
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
                            <td class="text-center"><button class="edit-modal btn btn-info" data-info="">
                                    <i class="fa fa-edit"></i> Editar
                                </button>
                                <button class="delete-modal btn btn-danger" data-info="">
                                    <i class="fa fa-trash"></i>
                                    Borrar
                                </button>
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
