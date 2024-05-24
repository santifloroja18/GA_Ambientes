@extends('layout.app')
@section('meta-description', 'Formularios de inicio de sesion')
@section('title','Inicio de sesión')

@section('header')
        @include('partials.header')
@endsection
    @section('content')
        <div class="container-grl-lr">
            <div class="container-logo-lr">
                <div>
                    <img src="{{url('asset/images/icono_sena.png')}}" alt="logo">
                    <span>GA | System</span>
                </div>
                <span></span>
                </div>
            <div class="container-login-register-grl">
                <div class="container-form">
                    <form class="sign-in" action="{{route('login-validate')}}" method="POST">
                        <h2>Iniciar Sesion</h2>
                        <span>Use su correo y contraseña</span>
                        @csrf
                        <div class="container-input">
                            <i class="ph ph-envelope-simple"></i>
                            <input type="email" name="email" placeholder="correo electronico" required value="{{old('email')}}">
                            <p >@error('email') {{$message}} @enderror</p>
                        </div>
                        <div class="container-input">
                            <i class="ph ph-lock-simple"></i>
                            <input type="password" name="password" required placeholder="contraseña">
                            <p>@error('password') {{$message}} @enderror</p>
                        </div>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                        <input class="button" type="submit" value="Iniciar Sesión">
                    </form>
                </div>
                <div class="container-form">
                    <form class="sign-up" action="{{route('register-store')}}" method="POST">
                        <h2>Registrarse</h2>
                        <span>Use su correo electronico para registrarse</span>
                        @csrf
                        <div class="container-input">
                            <i class="ph ph-user"></i>
                            <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}" required autofocus>
                        </div>
                        <div class="container-input">
                            <i class="ph ph-envelope-simple"></i>
                            <input type="email" name="email" placeholder="correo electronico" value="{{old('email')}}" required>
                        </div>
                        <div class="container-input">
                            <i class="ph ph-lock-simple"></i>
                            <input type="password" name="password" placeholder="contraseña" required>
                        </div>
                        <div class="container-input">
                            <i class="ph ph-lock"></i>
                            <input type="password" name="password_confirmation" placeholder="confirmar contraseña" required>
                        </div>
                        <input type="submit" class="button" value="Registrarse">
                    </form>
                </div>
                <div class="container-welcome">
                    <div class="welcome-sign-up welcome">
                    <h3>¡Hola!</h3>
                    <p>
                        Aún no estás registrado, regístrate con tus datos personales.
                    </p>
                    <button class="button dif btn-sign-up" id="btn-sign-up">Registrarse</button>
                    </div>
                    <div class="welcome-sign-in">
                    <h3>¡Bienvenido!</h3>
                    <p>
                        Si ya estás registrado, inicia sesión con tus datos personales.
                    </p>
                    <button class="button dif btn-sign-in" id="btn-sign-in">Iniciar Sesión</button>
                    </div>
                </div>
            </div>
            <div class="nav-link-lr">
                <a href="{{route('welcome')}}"><i class="ph-bold ph-arrow-left"></i>Regresar</a>
                <span></span>
            </div>
        </div>
    @endsection
@section('footer')
        @include('partials.footer')
@endsection
    
