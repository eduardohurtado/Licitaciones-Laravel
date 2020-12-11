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

            <h2>Nueva Área</h2>

            <form method="POST" action="{{ route('areas.store') }}" role="form">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col">
                        <label>Nombre del Área</label>
                        <input type="text" class="form-control" name="nombre_area" placeholder="Ingrese nombre">
                    </div>
                </div>

                <input type="submit" value="Enviar" class="btn btn-success btn-block">
                <a href="{{ action('AreaController@index') }}" class="btn btn-danger btn-block">Regresar</a>
            </form>
        </div>
    </div>

    <script type="text/javascript"></script>
@endsection
