<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCommunity</title>
        <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
        <link href="{{ asset('assets/img/logo.png.png') }}" rel="apple-touch-icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    </head>
    <body>
        <noscript>You need to enable Javascript to view this application</noscript>
        <div id="root"></div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
