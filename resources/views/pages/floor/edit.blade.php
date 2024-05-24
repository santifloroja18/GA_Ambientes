@extends('layout.app')
@section('meta-description', 'Vista editar piso')
@section('title','Editar Piso.')
@section('content')
@section('codigo-javascript-head')
        {{-- script para mostrar modal al cargar pagina - inicio --}}
        <script>
            $(document).ready(function(){
                $('#modal-edit-piso').modal('show');
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
                <div class="modal fade dialog-style" id="modal-edit-piso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo ambiente</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('floor.update',$data)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="floor" required value="{{$data -> floor}}">
                                        <p>@error('floor') {{$message}} @enderror</p>
                                        <label for="floatingInput">Ingresa el nuevo número del piso</label>
                                    </div>
                                    <div class="navegacion-btn-edit">
                                        <a class="btnn-style a" href="{{route('floors')}}">Regresar</a>
                                        <input class="btn btnn-style" type="submit" value="Editar Piso">
                                    </div>
                                </form>
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
