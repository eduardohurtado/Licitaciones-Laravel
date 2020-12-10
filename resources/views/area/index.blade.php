@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista de Áreas</b></span>
                <div class="ml-auto">
                    <a href="" class="btn btn-danger">Añadir Área</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="areaTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Del Area</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nombre_area }}</td>
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
