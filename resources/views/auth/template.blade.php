<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <title>Booking - @yield('title')</title>
</head>

<body class="pt-2">
    <div class="container mt-5">
        <div class="col-md-4 mx-auto">
            <div class="">
                <div class="card animate__animated animate__slideInDown">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>