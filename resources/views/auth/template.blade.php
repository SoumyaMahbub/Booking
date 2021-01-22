<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <title>Booking - @yield('title')</title>
</head>

<body class="pt-2">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card animate__animated animate__slideInDown">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>