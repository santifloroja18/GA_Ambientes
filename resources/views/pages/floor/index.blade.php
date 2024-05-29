@extends('layout.app')
@section('meta-description', 'Vista de los ambientes')
@section('title','Pisos - Ambientes.')
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
                {{-- alerta de inicio de sesion - inicio --}}
                <x-alert></x-alert>
                {{-- alerta de inicio de sesion - fin  --}}
                {{------------------------------------- HTML ventanas modales inicio -------------------------------------}}
                <div class="modal fade dialog-style" id="modal-create-piso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo ambiente</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('floor.store')}}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="floor" required>
                                        <p>@error('floor') {{$message}} @enderror</p>
                                        <label for="floatingInput">Ingresa el número del piso</label>
                                    </div>
                                    <input class="btn btnn-style right" type="submit" value="Crear Piso">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{------------------------------------- HTML ventanas modales fin -------------------------------------}}
                <ul class="breadcrumbs">
                    <li class="lii"><a class="aa" href="#">Ambientes</a></li>
                    <li class="lii" class="divider">|</li>
                    <li class="lii"><a class="aa" class="active">Dashboard</a></li>
                </ul>
                <div class="container-index-floors">
                    <div class="option-floors">
                        <span></span>
                        <a data-bs-toggle="modal" data-bs-target="#modal-create-piso" href="#">Crear Piso</a>
                    </div>
                    <div class="container-accordion">
                        @forelse ( $data as $floor )
                        <div class="tab">
                            <input type="radio" name="acc" id="acc{{$floor -> id}}">
                            <label for="acc{{$floor -> id}}">
                                <h2>{{$floor -> floor}}</h2>
                                <h3>Piso - Ambientes</h3>
                            </label>
                            <a href="{{route('floor.edit', $floor)}}" ><i class="ph ph-pencil-line"></i></a>
                            <div class="content">
                                <div>
                                    <ul>
                                        <li class="environment-link"><a class="environment-link-a" href="#">101</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">102</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">103</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">104</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">105</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">106</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">107</a></li>
                                        <li class="environment-link"><a class="environment-link-a" href="#">108</a></li>
                                    </ul>
                                    <a href="" class="environment-option"> Gestionar Ambientes</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h4 class="alert-agregar-ambiente">Oprima en el botón crear piso para agregar uno nuevo piso.</h4>
                        @endforelse
                </div>
            @endsection

        @section('main')
            @include('partials.main')
        @endsection
        
@section('footer')
        @include('partials.footer')
@endsection