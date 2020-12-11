@extends('layouts.layout')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
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

            @if (Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif

            <h2 class="panel-title">Editar nombre de Área:</h2>

            <div style="height: 20px"></div>

            <form method="POST" action="{{ route('areas.update', $data->id) }}" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-row">
                    <div class="form-group col">
                        <label>Nombre del Área</label>
                        <input type="text" class="form-control" name="nombre_area" placeholder="Ingrese nombre"
                            value="{{ $data->nombre_area }}">
                    </div>

                </div>
                <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                <a href="{{ route('areas.index') }}" class="btn btn-danger btn-block">Regresar</a>
            </form>

        </div>
    </div>
@endsection
