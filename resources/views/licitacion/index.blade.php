@extends('shared.shared')
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
        <table class="table table-striped table-bordered">
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
                @if($licitaciones->count())
                @foreach($licitaciones as $licitacion)
                <tr>
                    <th scope="row">index</th>
                    <td>{{$licitacion->nombre}}</td>
                    <td>{{$licitacion->id_cliente}}</td>
                    <td>{{$licitacion->fecha_inicio}}</td>
                    <td>{{$licitacion->fecha_cierre}}</td>
                    <td>{{$licitacion->fecha_presentacion_documentos}}</td>
                    <td><a class="btn btn-primary btn-xs" href=""><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                        <form action="" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">

                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">No hay registros.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection