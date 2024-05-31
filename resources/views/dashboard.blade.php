@extends('layout.app')
@section('meta-description', 'dashboar')
@section('title','Dashboard.')
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
            <x-alert></x-alert>

            <ul class="breadcrumbs">
                <li class="lii"><a class="aa" href="#">Home</a></li>
                <li class="lii" class="divider">|</li>
                <li class="lii"><a class="aa" class="active">Dashboard</a></li>
            </ul>
            <div class="container-index-home">
                <div class="container-table-auditorios">
                    <table class="table table-striped text-center" style="font-size: 0.9rem;">
                        <h5 class="title-tables-reservas">Reservas de auditorios del día.</h5>
                        <thead>
                            <tr>
                                <th scope="col">Responsable</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Finalización</th>
                                <th scope="col">Auditorio</th>
                                <th scope="col">Dependencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $data as $reservas)
                            <tr>
                                <td>{{$reservas -> title}}</td>
                                <td>{{$reservas -> descripcion}}</td>
                                <td>{{$reservas -> telefono}}</td>
                                <td>{{$reservas -> email}}</td>
                                <td>{{$reservas -> hora_ini}}</td>
                                <td>{{$reservas -> hora_fin}}</td>
                                <td>{{$reservas -> belongs_auditorium}}</td>
                                <td>{{$reservas -> dependencia}}</td>
                            </tr>
                            @empty
                            <td colspan="8" scope="col" class="text-alert-dash">No se encontraron reservas para el día de hoy.</td> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="container-table-environment">
                    <h5 class="title-tables-reservas">Prestamos de ambientes activos.</h5>
                    <table class="table table-striped" style="font-size: 0.9rem;">
                        <thead>
                            <tr>
                                <th scope="col">Instructor</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $data as $reservas)
                            <tr>
                                <td>{{$reservas -> title}}</td>
                                <td>{{$reservas -> descripcion}}</td>
                                <td>{{$reservas -> telefono}}</td>
                                <td>{{$reservas -> email}}</td>
                            </tr>
                            @empty
                            <td colspan="4" scope="col" class="text-alert-dash">No se encontraron préstamos de ambientes activos.</td> 
                            @endforelse
                        </tbody>
                  </table>
                </div>
            </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection

@section('footer')
        @include('partials.footer')
@endsection