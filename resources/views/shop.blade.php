<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <shop-component></shop-component>
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© Infinitypaul:
            <a href="https://github.com/infinitypaul/coupons"> Github Source Code</a>
            <a href="https://medium.com/@infinitypail"> My Blog</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>

</body>
</html>
