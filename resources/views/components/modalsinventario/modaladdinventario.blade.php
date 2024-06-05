<div class="modal fade dialog-style" id="modaladd-element" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ventana-style">
            <div class="modal-header header-style">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo elemento</h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
               
                <form action="{{route('element.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-floating mb-3" >
                        <input type="number" class="form-control" id="floatingInput" name="environment_id" value="#">
                        <label for="floatingInput">Ambiente</label>
                    </div >
                    <div class="form-group mb-3">
                        
                        <select class="form-control bg-dark text-light"  name="element_id" id="element_id" >
                            <option selected class="bg-dark">Desplegue y seleccione de la lista...</option>
                            @forelse($items as $i)
                              
                              <option value="{{$i -> id}}">{{$i -> id}} {{$i -> element_name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        
                        
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" name="cantidad">
                        <label for="floatingInput">Cantidad</label>
                    </div>
                    <input title="Agregar nuevo elemento a la lista" class="btn btnn-style bg-dark text-light" type="submit" value="Agregar a la lista" > 
                </form>
              
            </div>
        </div>
    </div>
  </div>