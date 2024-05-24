@extends('layout.app')
@section('meta-description', 'Pagina de bienvenida')
@section('title','Bienvenido(a).')
@section('header')
        @include('partials.header')
@endsection
@section('content')
        <x-alert></x-alert>
        <div class="container-grl-welcome">
                <div class="header-welcome">
                <div class="logo-welcome">
                        <img src="{{url('asset/images/icono_sena.png')}}" alt="logo">
                        <span>GA | System</span>
                </div>
                <a href="{{route('login')}}" class="btn-lr-navigation-welcome">Iniciar Sesión</a>
                </div>
                <div class="container-portada-welcome">
                <div class="portada-uno">
                        <img class="portada-img" src="{{url('asset/images/portada.png')}}" alt="portada">
                </div>
                <div class="portada-dos">
                        <h2>Bienvenido(a) a GA | System.</h2><br>
                        <p>GA | System busca gestionar, automatizar tareas repetitivas y procesos manuales, optimizando los procesos, lo cual permite al servicio nacional de aprendizaje SENA utilizar mejor sus recursos y reducir los tiempos de ejecución. </p>
                </div>
                </div>

        </div>
@endsection
@section('footer')
        @include('partials.footer')
@endsection