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
                        <th scope="col">ID Licitacion</th>
                        <th scope="col">ID Área</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nombre_documentos }}</td>
                            <td>{{ $item->URL_documentos }}</td>
                            <td>{{ $item->fecha_entrega }}</td>
                            <td>{{ $item->usuario_entrega }}</td>
                            <td>{{ $item->id_licitacion }}</td>
                            <td>{{ $item->id_area }}</td>
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
            $('#areaTable').DataTable();
        });

    </script>
@endsection
