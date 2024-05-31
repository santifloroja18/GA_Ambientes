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
                            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo piso</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('floor.store')}}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="floor">
                                        
                                        <label for="floatingInput">Ingresa el número del piso</label>
                                    </div>
                                    <input class="btn btnn-style right" type="submit" value="Crear Piso" >
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal fade dialog-style" id="modal-addambiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo ambiente</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('environment.store')}}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                       
                                        <input type="text" class="form-control" id="floatingInput" name="environment">
                                        <label for="floatingInput">Numero ambiente</label>
                                        
                                    </div>
                                    {{--Input Elemento oculto --}}
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="id" name="floor_id">
                                    </div>
                                    <input class="btn btnn-style right" type="submit" value="Crear Ambiente" title="click para crear ambiente">
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
                <div style="background-color: red; text-align:center; font-size: 20px"><p style="color: white">@error('floor') {{$message}} @enderror</p></div>
                <div class="container-index-floors">
                <div style="background-color: red; text-align:center; font-size: 20px">
                    <p style="color: white">@error('environment') {{$message}} @enderror</p>
                </div>
                    <div class="container-index-floors">    
                    <div class="option-floors">
                        
                        <a class="btn bg-light text-black" href="{{route('dashboard')}}">Dashboard</a>
                        <a class="btn bg-light text-dark" data-bs-toggle="modal" data-bs-target="#modal-create-piso" href="#">Crear un piso</a>
                    {{-- form to create floor --}}
                       <form action="{{route('floor.destroy', $levels -> id)}}"    method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btnn-style" type="submit" value="Quitar Piso {{$levels -> floor}}" >
                        </form>

                       <form action="{{route('floor.save')}}" method="POST">
                        @csrf
                        <input type="number" class="form-control w-50" id="floatingInput" name="floor" value="{{$levels -> floor + 1}}" hidden>
                        <input class="btn btnn-style" type="submit" value="Agregar piso {{$levels->floor+1}}" >
                        </form>      
                                    
                    </div>
                    <div class="container-accordion">
                        @forelse ( $data as $floor )
                        <div class="tab d-flex justify-content-between pt-3">
                            <div class="option-floors">
                                <input type="radio" name="acc" id="acc{{$floor -> id}}">
                                <label for="acc{{$floor -> id}}">
                                <h3 class="m-2">Piso</h3>
                                <a href="#">{{$floor -> floor}}</a>
                            </label>
                            </div>
                            <div class="option-floors">
                                <a href="{{route('floor.environs', $floor -> floor)}}">Ver ambientes piso {{$floor -> floor}}</a>
                            </div>
                        </div>
                        @empty
                            <h4 class="alert-agregar-ambiente">Oprima en el botón crear piso para agregar un nuevo piso.</h4>
                        @endforelse

                        
                </div>

                <div class="modal fade dialog-style" id="modal-show-environment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ventana-style">
                            <div class="modal-header header-style">
                            <h5 class="modal-title" id="exampleModalLabel">Ambiente <input type="text" id="show_environment" disabled class="rounded w-25 text-center text-light"></h3></h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                               <h3 style="font-size: 1rem">Mostrar datos del ambiente <input type="text" id="show_environment"></h3>
                               <form action="#" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                   
                                    <input type="text" class="form-control" id="floatingInput" name="environment" >
                                    <label for="floatingInput">Numero ambiente</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floor_id" name="floor_id">
                                </div>
                                 
                                    <a class="btn btnn-style text-light" style="background-color:#021b0f; " type="submit" value="Actualizar" title="click para actualizar datos">Actualizar</a>
                                   <a class="btn btnn-style text-light"
                                   style="background-color:#021b0f" type="submit" value="Ver inventario" title="click para eliiminar ambiente">Ver inventario</a>
                                   <a class="btn btnn-style text-light" style="background-color:#021b0f " type="submit" value="Eliminar" title="click para eliiminar ambiente">Eliminar</a>
                             
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