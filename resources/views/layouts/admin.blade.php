<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración')</title>

    <link rel="icon" href="{{ asset('/public/images/ciupac_2.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body.admin-ocean-bg {
            background: linear-gradient(180deg, #e0f7fa 0%, #ffffff 100%);
        }
    </style>
</head>
<body class="admin-ocean-bg">
    <div class="admin-wrapper d-flex min-vh-100">
        @include('admin.partials.sidebar')

        <div class="main-content flex-grow-1 d-flex flex-column">
            @include('admin.partials.topbar')

            <div class="container-fluid py-3">
                @include('admin.partials.flash')

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
