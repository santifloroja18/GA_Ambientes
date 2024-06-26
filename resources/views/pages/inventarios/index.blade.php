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
            <x-alert></x-alert>

@if($elements)
<div class="p-3 border border-1 rounded rounded-3" >
    <h1 class="text-center">Lista de elementos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">Ambiente</th>
              <th scope="col">Nombre Elemento</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Acciones</th>
            </tr>
         </thead>
        <tbody>
            @forelse($elements as $ele)

                <tr> 
                    <td>{{$ele -> environment}}</td>
                    <td>{{$ele -> element_name}}</td>
                    <td>{{$ele -> cantidad}}</td>
                    
                    <td >
                               {{-- BOTON PARA EDITAR UN ELEMENTO DE LA LISTA POR ID --}}
                        <div class="d-flex justify-content-start align-items-center">
                            <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalenvironmentstock{{$ele -> stock_id}}">
                            <i class="ph ph-pencil-line"></i>Editar
                            </a>

                                {{-- BOTON PARA ELIMINAR UN ELEMENTO DE LA LISTA POR ID --}}
                            <form class="d-flex justify-content-between align-items-center mx-2" action="{{route('element.destroy', $ele -> stock_id)}}" method="POST" class="form-deleteitem">
                                @csrf

                                @method('delete')
                                    <input class="btn btnn-style bg-dark text-light" type="submit" value="Eliminar" title="click para eliminar elemento">
                            </form>  
                                         
                        </div>
                        @include('components.alerts.alertDeleteElement')

                                @method("delete")
                                    <button href="#" class="btn btn-dark" type="submit">
                                    <i class="ph ph-pencil-line"></i>Eliminar
                                    </button>
                            </form>  
                              
                        </div>
                         @include('components.alerts.modalDeleteElement')

                    </td>
                     
                    </tr>
               
                @include('components.modalStock')
            @empty
            <div class="text-center"><h1>No existen ambientes creados en este piso</h1></div>
            @endforelse
            
        </tbody>
       
    </table>
     @include('components.alerts.alertDelete')
    <div class="option-floors d-flex justify-content-between align-items-center">
        @include('components.modalsinventario.modaladdelement')
        <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaladditem{{$ele -> environment_id}}">
        <i class="ph ph-plus-square text-success fw-bold" style="font-size: 1.3rem"></i></i>Agregar elemento 
        </a>
        <div>
            <a  
            title="Regresar a pisos"
            style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('floors')}}"><i class="ph ph-arrow-u-up-left text-success fw-bold" style="font-size: 1.3rem"></i> Volver
            </a>
            <a  
            title="Generar artichivo Excel"
            style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('export')}}">Exportar <i class="ph ph-file-pdf text-success fw-bold" style="font-size: 1.3rem"></i> <i class="ph ph-file-csv text-success fw-bold" style="font-size: 1.3rem"></i>
            </a>
        </div>
       
    </div>
</div>

@else

@forelse($room as $env)
<div class="p-3 border border-1 rounded rounded-3 bg-white">
<h3 class="text-center">No existe elementos relacionados con el ambiente {{$env -> id}}</h3>
<a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaladditem{{$env -> id}}">


@foreach($room as $env)
<div class="p-3 border border-1 rounded rounded-3 bg-white">
<h3 class="text-center">No existe elementos relacionados con el ambiente.</h3>
<a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modaladdelement{{$env -> id}}">

<i class="ph ph-plus-square text-success fw-bold" style="font-size: 1.3rem"></i></i>Agregar elemento
</a>
<a  
title="Regresar a pisos"
style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('floors')}}"><i class="ph ph-arrow-u-up-left text-success fw-bold" style="font-size: 1.3rem"></i> Volver
</a>
</div>
@include('components.alerts.modalDeleteElement')
@include('components.modalsinventario.modaladdinventario')
@endForeach
@endif
@endsection

@section('main')
    @include('partials.main')
@endsection

@include('components.alerts.alertDeleteElement')
@section('footer')
@include('partials.footer')
@endsection

@include('components.alerts.alertDelete')
 @endsection
@section('footer')
@include('partials.footer')
@endsection

