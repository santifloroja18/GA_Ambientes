@extends('layout.app')
@section('meta-description', 'Vista para editar usuario')
@section('title','Editar usuario.')
@section('content')
@section('codigo-javascript-head')
        {{-- script para mostrar modal al cargar pagina - inicio --}}
        <script>
            $(document).ready(function(){
                $('#modal-edit-user').modal('show');
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
                <div class="modal fade dialog-style" id="modal-edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('user.update',$data)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="name" required value="{{$data -> name}}">
                                        <label for="floatingInput">Nombre</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="email" required value="{{$data -> email}}">
                                        <label for="floatingInput">Email</label>
                                    </div>   
                                    <div class="navegacion-btn-edit">
                                        <a class="btnn-style a" href="{{route('users')}}">Regresar</a>
                                        <input class="btn btnn-style" type="submit" value="Editar Usuario">
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