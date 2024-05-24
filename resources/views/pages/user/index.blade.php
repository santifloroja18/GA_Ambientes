@extends('layout.app')
@section('meta-description', 'Vista de la lista de usuarios')
@section('title','Usuarios.')
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
                <li class="lii"><a class="aa" href="#">Usuarios</a></li>
                <li class="lii" class="divider">|</li>
                <li class="lii"><a class="aa" class="active">Dashboard</a></li>
            </ul>
            <div class="container-index-users">
                <table class="table table-striped">
                    <h5 class="title-tables-user">Usuarios del sistema.</h5>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $user )
                        <tr>
                            <th scope="row">{{$user -> id}}</th>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>
                                <a class="btn-edit-role" href="{{route('user.editRole',$user)}}">Editar rol</a>
                                <a class="btn-edit-user" href="{{route('user.edit', $user)}}"><i class="ph ph-pencil-line"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection