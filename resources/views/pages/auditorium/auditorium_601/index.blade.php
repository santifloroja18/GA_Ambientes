@extends('layout.app')
@section('meta-description', 'Vista del calendario auditorio 601')
@section('title','Auditorio 601.')
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

                @can('auditoriumTres.store')
                    {{-- modal agregar reserva - inicio --}}
                    <div class="modal fade dialog-style" id="modal-create-reserve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content ventana-style">
                                <div class="modal-header header-style">
                                <h5 class="modal-title" id="exampleModalLabel">Crear nueva reserva</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('auditorium.storeSeis')}}" method="POST">
                                        @csrf
                                        <input type="date" name="end" id="end" class="form-control" hidden required>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="date" id="start" class="form-control" name="start"  required>
                                                    <label for="floatingInput">Ingresa la fecha</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" name="telefono" class="form-control" required>
                                                    <label for="floatingInput">Celular</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="time" class="form-control" name="hora_inicio"  required>
                                                    <label for="floatingInput">Ingresa la hora de inicio</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="time" name="hora_fin" class="form-control" required>
                                                    <label for="floatingInput">Ingresa la hora finalización</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" id="responsable" name="title" class="form-control" required>
                                            <label for="floatingInput">Nombre completo del responsable</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="dependencia"  required>
                                                    <label for="floatingInput">Dependencia o area</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="email" name="email" class="form-control" required>
                                                    <label for="floatingInput">Correo electronico</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="descripcion"  id="descripcion" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Descripcion</label>
                                        </div>
                                        <input type="number" name="belongs_auditorium" hidden value="601">
                                        <input class="btn btnn-style right" type="submit" value="Reservar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal agregar reserva - fin --}}
                @endcan

                <ul class="breadcrumbs">
                    <li class="lii"><a class="aa" href="#">Auditorio 601</a></li>
                    <li class="lii" class="divider">|</li>
                    <li class="lii"><a class="aa" class="active">Dashboard</a></li>
                </ul>
                <div class="container-index-auditorio-seisCeroUno" value="notranslate">
                    <div id="calendarAuditorioSeis">
                        
                    </div>
                </div>
                
            @endsection
        @section('main')
            @include('partials.main')
        @endsection
        @section('codigo-javascript-body')
            <script src="{{url('asset/js/appCalendarAuditorioSeis.js')}}"></script>
        @endsection
@section('footer')
        @include('partials.footer')
@endsection
