<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free-5.6.1-web/css/all.css') }}">
	
        <title>Laravel</title>

        <!-- Fonts -->

    </head>
    <body>
        <!-- <div class="container full-height"> -->
        <div id="app">
            <main-App />
        </div>
        <!-- </div> -->

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
