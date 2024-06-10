{{-- Ventana modal para editar y eliminar datos de un ambiente existente --}}
<div class="modal fade dialog-style" id="modalshowenvironment{{$floor -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ventana-style">
            <div class="modal-header header-style">
            
                <ul>
                    <li style="list-style-type: symbols(*)">* Modificar o eliminar ambiente</li>
                    <li>* Ver inventario</li>
                </ul>
        
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                {{-- formulario para actualizar datos del ambiente seleccionado mediante input y su valor id --}}
               
                 <div class="mb-3 d-flex justify-content-between align-items-center" >
                   
                    <a  
                    title="Ver inventario"
                    style="border: 1px solid black; margin-left:65%" class="btn text-dark " href="{{route('element.stock', $floor -> environment)}}">Ver Inventario
                    </a>
                 </div>
                <form action="{{route('environs.update', $floor -> id)}}" method="POST" class="form-update" >
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="environment" value="{{$floor -> environment}}" >
                        <label for="floatingInput">Numero ambiente</label> 
                    </div>
               
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floor_id" name="floor_id" value="{{$floor -> floor_id}}" hidden>
                      
                    </div>
                    <input class="btn btnn-style" type="submit" value="Actualizar datos" title="click para actualizar ambiente"> 
                    
                </form>
                {{-- formulario para eliminar un ambiente con un solo input y su valor id del ambiente --}}
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <form action="{{route('environs.destroy', $floor -> id)}}" method="POST" class="form-destroy">
                        @csrf
                        @method('delete')
                        <input class="btn btnn-style" type="submit" value="Eliminar ambiente" title="click para eliminar ambiente"> 
                    </form>
                    
                </div>   
            </div>
        </div>
    </div>
  </div>
  @include('components.alerts.alertEdit')
  @include('components.alerts.alertDelete')