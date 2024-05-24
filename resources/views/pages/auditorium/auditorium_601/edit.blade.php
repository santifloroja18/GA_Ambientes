@extends('layout.app')
@section('meta-description', 'Vista para editar reserva')
@section('title','Editar reserva.')
@section('content')
@section('codigo-javascript-head')
        {{-- script para mostrar modal al cargar pagina - inicio --}}
        <script>
            $(document).ready(function(){
                $('#modal-edit-reserva').modal('show');
            })
        </script>
        {{-- script para mostrar modal al cargar pagina - fin --}}
@endsection

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
                <div class="modal fade dialog-style" id="modal-edit-reserva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Reserva</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('auditorium.update',$data)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" id="start" class="form-control" name="start" value="{{$data -> start}}"  >
                                                <p style="color:red; font-size:0.8rem;" >@error('start') {{$message}} @enderror</p>
                                                <label for="floatingInput">Ingresa la fecha</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" name="telefono" class="form-control" value="{{$data -> telefono}}" >
                                                <p style="color:red; font-size:0.8rem;" >@error('telefono') {{$message}} @enderror</p>
                                                <label for="floatingInput">Celular</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="time" class="form-control" name="hora_inicio" value="{{$data -> hora_ini}}" >
                                                <p style="color:red; font-size:0.8rem;" >@error('hora_inicio') {{$message}} @enderror</p>
                                                <label for="floatingInput">Ingresa la hora de inicio</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="time" name="hora_fin" class="form-control" value="{{$data -> hora_fin}}" >
                                                <p style="color:red; font-size:0.8rem;" >@error('hora_fin') {{$message}} @enderror</p>
                                                <label for="floatingInput">Ingresa la hora finalización</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" id="responsable" name="title" class="form-control" value="{{$data -> title}}">
                                        <p style="color:red; font-size:0.8rem;" >@error('title') {{$message}} @enderror</p>
                                        <label for="floatingInput">Nombre completo del responsable</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dependencia" value="{{$data -> dependencia}}" >
                                                <p style="color:red; font-size:0.8rem;" >@error('dependencia') {{$message}} @enderror</p>
                                                <label for="floatingInput">Dependencia o area</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" class="form-control" value="{{$data -> email}}" >
                                                <p style="color:red; font-size:0.8rem;" >@error('email') {{$message}} @enderror</p>
                                                <label for="floatingInput">Correo electronico</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="descripcion"  id="descripcion" style="height: 100px">{{$data -> descripcion}}</textarea>
                                        <label for="floatingTextarea2">Descripcion</label>
                                    </div> 
                                    <input type="number" name="belongs_auditorium" hidden value="601">
                                    <div class="navegacion-btn-edit">
                                        <a class="btnn-style a" href="{{route('reservas-auditorio-601')}}">Regresar</a>
                                        @can('auditoriumSeis.edit')
                                        <input class="btn btnn-style" type="submit" value="Editar Reserva">
                                        @endcan
                                    </div>
                                </form>
                                @can('auditoriumSeis.destroy')
                                <form action="{{route('auditoriumSeis.destroy',$data)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnn-style-eliminar" onclick="return confirm('Quieres Borrar')" type="submit">
                                        Eliminar reserva
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection