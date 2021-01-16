<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    {{-- Bootstrap & jQuery --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!-- Datatables -->
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.standalone.min.css') }}">
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Datepicker Languaje -->
    <script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>

    <title>Licitaciones</title>

    <!-- Header CSS styles -->
    <style>
        .header-row {
            background-color: #ccc;
        }

        #appHeaderTitle {
            font-size: 25px;
        }

        #headerLogo {
            height: 30px;
            width: auto;
        }

        .navShadow:hover {
            background: #ccc;
        }

    </style>
</head>

<body>

    {{-- Header --}}

    <div class="header-row" id="header-row" style="padding: 0px; overflow: hidden">
        <div class="container-fluid" style="padding: 0px">
            <div class="row">
                <div class="d-flex justify-content-around w-100">
                    <a class="navbar-brand logo m-4 mx-5" href="/">
                        <img src="https://laravel.com/assets/img/components/logo-laravel.svg"
                            alt="Header logo" id="headerLogo" />
                    </a>
                    <span id="appHeaderTitle" class="font-weight-bold ml-auto m-4 mx-5">LICITACIONES</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Nav Bar --}}

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #eee;">
        <a class="navbar-brand" style="cursor: default"><b>Navegación</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item navShadow">
                    <a class="nav-link active" href="/licitaciones">Licitaciones</a>
                </li>
                <li class="nav-item navShadow">
                    <a class="nav-link active" href="/areas">Áreas</a>
                </li>
                <li class="nav-item navShadow">
                    <a class="nav-link active" href="/documentos">Documentos</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Body --}}

    @yield('content')

    <div style="height: 50px;"></div>
</body>

<script>

</script>

</html>
