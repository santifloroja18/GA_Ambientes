@extends('layout.app')
@section('meta-description', 'Vista editar rol usuario')
@section('title','Editar rol de usuario.')
@section('content')
@section('codigo-javascript-head')
        {{-- script para mostrar modal al cargar pagina - inicio --}}
        <script>
            $(document).ready(function(){
                $('#modal-edit-role').modal('show');
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
                <div class="modal fade dialog-style" id="modal-edit-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Asignar rol de usuario</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('user.updateRole',$user)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-floating mb-3">
                                        <div class="form-control" id="floatingInput">{{$user -> name}}</div>
                                        <label for="floatingInput">Nombre</label>
                                    </div>
                                    <div class="form-control mb-3">
                                        <h6 class="mb-3">listado de roles</h6>
                                    @foreach ( $roles as $role )
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$role -> id}}" id="Check{{$role -> name}}" name="roles">
                                            <label class="form-check-label" for="Check{{$role -> name}}">
                                                {{$role -> name}}
                                            </label>
                                        </div>
                                    @endforeach
                                    </div>
                                    <div class="navegacion-btn-edit">
                                        <a class="btnn-style a" href="{{route('users')}}">Regresar</a>
                                        <input class="btn btnn-style" type="submit" value="Asignar rol">
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
