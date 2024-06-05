@extends('layout.app')
@section('meta-description', 'Vista de confirmacion de prestamo de ambientes')
@section('title','Prestamos de ambientes.')
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
            <x-alert>
            </x-alert>
            <ul class="breadcrumbs">
                <li class="lii"><a class="aa" href="#">Prestamos de ambiente</a></li>
                <li class="lii" class="divider">|</li>
                <li class="lii"><a class="aa" class="active">Dashboard</a></li>
            </ul>
            <div class="container-index-loan">
                <h5 class="text-center mb-3"><i style="font-size: 1.5rem" class="ph-bold ph-student"></i> Apertura de ambientes</h5>
                <form action="{{route('loan.store')}}" method="POST" >
                    @csrf
                    @foreach ( $data as $e )
                        <div>
                            <div class="row mb-3"> <!--fila 1 -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="id" value="{{$e -> id}}" hidden>
                                        <input  type="text" class="form-control" name="instructor" value="{{$e -> instructor}}"  >
                                        <label for="">Nombre del instructor</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" value="{{$e -> telefono}}" name="telefono"  >
                                        <label for="">telefono</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"> <!--fila 1 -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  type="email" class="form-control" name="email" value="{{$e -> email}}"  >
                                        <label for="">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input  type="number" class="form-control" value="{{$e -> documento}}" name="documento"  >
                                        <label for="">Documento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3"> <!--fila 1 -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" name="programa" value="{{$e -> programa}}"  >
                                        <label for="">Programa</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" value="{{$e -> hora_entrada}}" name="hora_entrada"  >
                                        <label for="">Hora de entrada</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" value="{{$e -> hora_salida}}" name="hora_salida"  >
                                        <label for="">Hora de salida</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4"> <!--fila 1 -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" name="fecha" value="{{$e -> fecha}}"  >
                                        <label for="">Fecha</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" value="{{$e -> dia}}" name="dia"  >
                                        <label for="">Dia</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input  type="text" class="form-control" value="{{$e -> ambiente}}" name="ambiente"  >
                                        <label for="">Ambiente</label>
                                    </div>
                                </div>
                                <input  type="text" value = {{0}} name="disponibilidad" hidden>
                            </div>
                            <input style="font-size: 0.9rem" class="btn btn-dark mb-5" type="submit" value="Confirmar Apertura">
                        </div>
                    @endforeach
                </form>
                
            </div>
            
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection


{{-- {{$fecha}} --}}