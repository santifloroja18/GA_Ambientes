<div class="modal fade dialog-style" id="modalenvironmentstock{{$ele -> stock_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ventana-style">
            <div class="modal-header header-style">
            <h5 class="modal-title" id="exampleModalLabel">Actualización de datos</h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
               
                <form action="{{route('element.update', $ele -> stock_id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-floating mb-3" hidden>
                        <input type="number" class="form-control" id="floatingInput" name="environment_id" value="{{$ele -> environment}}">
                        <label for="floatingInput">Ambiente</label>
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="element_id" id="element_id" >
                            <option value="{{$ele -> element_id}}" selected >{{$ele -> element_id}} {{$ele -> element_name}}</option>
                            @forelse($items as $i)
                              <option  value="{{$i -> id}}">{{$i -> id}} {{$i -> element_name}}</option>
                            @empty
                                sin registros de inventario
                            @endforelse
                        </select> 
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" name="cantidad" value="{{$ele -> cantidad}}">
                        <label for="floatingInput">Cantidad</label>
                    </div>
                    <input class="btn btnn-style" type="submit" value="Actualizar datos">
                </form>
              
            </div>
        </div>
    </div>
  </div>