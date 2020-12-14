@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 50px;">

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

        <div class="container">
            <div class="row p-2">
                <span style="font-size: 25px;" class="col-sm"><b>Lista de Áreas</b></span>
                <div class="ml-auto">
                    <a href="{{ action('AreaController@create') }}" class="btn btn-danger">Añadir Área</a>
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
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->nombre_area }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="mr-3">
                                    <a class="btn btn-danger" href="{{ action('AreaController@edit', $item->id) }}">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                </div>

                                <form action="{{ action('AreaController@destroy', $item->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('¿Esta seguro de eliminar el Área?')"
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
    </div>

    <script>
        $(document).ready(function() {
            $('#areaTable').DataTable();
        });

    </script>
@endsection
