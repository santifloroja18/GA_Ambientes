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

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="id" name="floor_id" hidden>
                                    
                                </div>
                                <input class="btn btnn-style" type="submit" value="Crear Ambiente" title="click para crear ambiente">
                            </form>
                        </div>
                    </div>
                </div>
              </div>

            <div class="card">
               
                <div class="card-header text-center">
                    <h1>Ambientes piso {{$id}}</h1>
                </div>
                
                <div class="card-body">
                    <div style="background-color: red; text-align:center; font-size: 20px">
                    <p style="color: white">@error('environment') {{$message}} @enderror</p>
                    </div>
                     <h4 class="text-center" style="font-family:Arial, Helvetica, sans-serif">Click sobre los ambientes para gestionar cambios</h4>
                     <div class="ml-5 mx-5 p-2 rounded border border-2">
                        <ul class="d-flex flex-nowrap">
                            @forelse($environs as $floor)
                           
                              <a 
                              title="Cambios e Inventario"
                              class="environment-link rounded border border-1 text-center p-2 text-light" style="width: 8%; background-color: #021b0f"
                              id="btnshowenvironment"
                              data-bs-toggle="modal" data-bs-target="#modalshowenvironment{{$floor -> id}}" href="#">
                              <li>{{$floor -> environment}}</li>
                              </a>
                          
                             
                             @include('components.modaledit')
                            @empty
                            <div class="text-center"><h1>No existen ambientes creados en este piso</h1></div>
                              
                            @endforelse
                             
                           
                              </ul>
                            
                     </div>
                   
                   
                </div>
                <div class="m-5 p-2 rounded border border-2">
                    <a 
                    title="Agregar otro ambiente"
                    style="background-color: #021b0f" class="btn fw-bold text-light" data-bs-toggle="modal" data-bs-target="#modal-addambiente" href="#modal-addambiente" id="btnmodal" data-id={{$id}} ><i class="ph ph-plus-square text-success fw-bold" style="font-size: 1.3rem"></i> Agregar ambiente</a>
                    <a  
                    title="Regresar a pisos"
                    style="background-color: #021b0f" class="btn fw-bold text-light" href="{{route('floors')}}"><i class="ph ph-arrow-u-up-left text-success fw-bold" style="font-size: 1.3rem"></i> Volver
                    </a>
                 
                  </div>
                  
                   <script>
                    $(document).on("click", "#btnmodal", function(){
                       var id = $(this).data('id');
                       $("#id").val(id);

                    });
                   </script>
              </div>    
                 
              @endsection

              @section('main')
                  @include('partials.main')
              @endsection
              
              @section('footer')
              @include('partials.footer')
              @endsection