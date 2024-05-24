@extends('layout.app')
@section('meta-description', 'Vista para crear usuarios')
@section('title','Crear usuario.')
@section('content')

@section('header')
        @include('partials.header')
@endsection


    @section('sidebar')
        @include('partials.sidebar')
    @endsection

        @section('navbar')
            @include('partials.navbar')
        @endsection

            @section('content')
            <ul class="breadcrumbs">
                <li class="lii"><a class="aa" href="#">Crear usuario</a></li>
                <li class="lii" class="divider">|</li>
                <li class="lii"><a class="aa" class="active">Dashboard</a></li>
            </ul>
            <div class="container-create-users">
                <div class="form-group">
                    <h5 class="title-create-user">Crear nuevo usuario.</h5>
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3"> <!--fila 1 -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="text" class="form-control" name="name">
                                    <p style="color:red; font-size:0.8rem;" >@error('name') {{$message}} @enderror</p>
                                    <label for="">Nombre Completo</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="email" class="form-control" name="email">
                                    <p style="color:red; font-size:0.8rem;" >@error('email') {{$message}} @enderror</p>
                                    <label for="">Correo electronico</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3"> <!--fila 1 -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="role">
                                        <option value="gestor" selected>Asignar rol</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="coordinador">Coordinador</option>
                                        <option value="gestor">Gestor</option>
                                    </select>
                                    <label for="floatingSelect">Roles</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="number" class="form-control" name="telefono">
                                    <p style="color:red; font-size:0.8rem;" >@error('telefono') {{$message}} @enderror</p>
                                    <label for="">Celular</label>
                                </div>
                            </div>
                        </div>
                        <div class="row"> <!--fila 1 -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="password" class="form-control" name="password">
                                    <p style="color:red; font-size:0.8rem;" >@error('password') {{$message}} @enderror</p>
                                    <label for="">Contraseña</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="password" class="form-control" name="password_confirmation">
                                    <p style="color:red; font-size:0.8rem;" >@error('password') {{$message}} @enderror</p>
                                    <label for="">Confirmar contraseña</label>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-center mb-2 ">Horario laboral</h6>
                        <div class="row"> <!--fila 1 -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="time" class="form-control" name="hora_inicio">
                                    <p style="color:red; font-size:0.8rem;" >@error('hora_inicio') {{$message}} @enderror</p>
                                    <label for="">Hora de inicio</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="time" class="form-control" name="hora_fin">
                                    <p style="color:red; font-size:0.8rem;" >@error('hora_fin') {{$message}} @enderror</p>
                                    <label for="">Hora de finalización</label>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-danger" type="submit" value="Registrar Usuario">
                    </form>
                </div>
            </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection