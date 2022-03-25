<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link type="image/png" rel="icon" href="{{asset('logo.png')}}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
        <script src="https://unpkg.com/imask"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-amber-100 ">
            @include('layouts.navigation')
            @if ($message = Session::get('success'))
                <x-alert.success>{!! $message !!}</x-alert.success>
            @endif
            @if ($message = Session::get('danger'))
                <x-alert.danger>{!! $message !!}</x-alert.danger>
            @endif
            <main>
                @yield('content')
            </main>

        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const phones = document.querySelectorAll('input[type="tel"]')
                phones.forEach(function (el) {
                    const maskOptions = {
                        mask: '+{7}(000)000-00-00'
                    };
                    IMask(el, maskOptions);
                })
                const txs = document.querySelectorAll("textarea");
                txs.forEach(function (tx) {
                    tx.setAttribute("style", "height:" + (tx.scrollHeight) + "px;overflow-y:hidden;");
                    tx.addEventListener("input", function () {
                        this.style.height = "auto";
                        this.style.height = (this.scrollHeight) + "px";
                    });
                })
            })
        </script>
    </body>
</html>
