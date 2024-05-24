@extends('layout.app')
@section('meta-description', 'Vista para ver cronograma')
@section('title','Ver Cronograma.')
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
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
                <x-alert>
                </x-alert>
                <ul class="breadcrumbs">
                    <li class="lii"><a class="aa" href="#">Ver Cronograma</a></li>
                    <li class="lii" class="divider">|</li>
                    <li class="lii"><a class="aa" class="active">Dashboard</a></li>
                </ul>
                <div class="container-index-schedule">
                    {{-- @foreach ( $data as $schedule )
                    <div class="card" style="width: 21rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $schedule -> instructor}}</li>
                            <li class="list-group-item">{{ $schedule -> programa}}</li>
                            <li class="list-group-item">{{ $schedule -> hora_entrada}}</li>
                            <li class="list-group-item">{{ $schedule -> hora_salida}}</li>
                        </ul>
                    </div>
                    @endforeach --}}
                    <div class="accordion" id="accordionExample">
                        @forelse ( $data as $schedule )
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$schedule -> id}}" aria-expanded="false" aria-controls="collapse{{$schedule -> id}}">
                                    Programación del instructor: {{ $schedule -> instructor}}.
                                </button>
                            </h2>
                            <div id="collapse{{$schedule -> id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table text-center" style="font-size: 0.9rem">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">CC</th>
                                                <th scope="col">Instructor</th>
                                                <th scope="col">Ambiente</th>
                                                <th scope="col">Día</th>
                                                <th scope="col">Franja</th>
                                                <th scope="col">Ficha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $schedule -> CC}}</td>
                                                <td>{{ $schedule -> instructor}}</td>
                                                <td>{{ $schedule -> ambiente}}</td>
                                                <td>{{ $schedule -> dia}}</td>
                                                <td>{{ $schedule -> franja}}</td>
                                                <td>{{ $schedule -> ficha}}</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h3 class="alert-schedules-no-data">El cronograma no ha sido importado.</h3>
                        @endforelse
                    </div>
                    <div class="d-flex ">
                        {{$data -> links()}}
                    </div>
                </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection