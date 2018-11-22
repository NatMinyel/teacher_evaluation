<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            .content {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <!-- <div class="container full-height"> -->
        <div id="app">
            <main-App />
        </div>
        <!-- </div> -->
        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
        <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            });
        </script>
    </body>
</html>
