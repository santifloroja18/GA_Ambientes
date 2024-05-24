<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            {{-- title, icono y description --}}
            <title>GA | System - @yield('title')</title>
            <meta name="description" content="@yield('meta-description','defaul meta description')">
            <link rel="shortcut icon" href="{{url('asset/images/icono_sena.png')}}" type="image/x-icon">

            {{-- hoja de estilos css --}}
            {{-- <link rel="stylesheet" href="{{url('asset/css/style.css')}}"> --}}

            {{-- fonts --}}
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

            {{-- cdn - de css --}}
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

            {{-- cdn - de js --}}
            <script src="https://unpkg.com/@phosphor-icons/web"></script>

            {{-- plugins de css locales --}}
            <link rel="stylesheet" href="{{url('asset/plugins/css/main.min.css')}}">

            {{-- plugins de js locales --}}
            <script src="{{url('asset/plugins/js/jquery-3.7.1.min.js')}}"></script>
            <script src="{{url('asset/plugins/js/sweetalert2.all.min.js')}}"></script>
            <script src="{{url('asset/plugins/js/main.min.js')}}"></script>
            <script src="{{url('asset/plugins/js/es.js')}}"></script>

            {{-- directivas vite --}}
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            
            @yield('codigo-javascript-head')

        </head>
        @yield('header')
            @yield('sidebar')
            @yield('navbar')
                @yield('content')
            @yield('main')
            @yield('alert')
        @yield('codigo-javascript-body')
        @yield('footer')
            
