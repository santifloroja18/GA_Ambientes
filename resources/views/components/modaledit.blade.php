<div class="modal fade dialog-style" id="modalshowenvironment{{$floor -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ventana-style">
            <div class="modal-header header-style">
            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo ambiente</h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('environs.update', $floor -> id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                       
                        <input type="text" class="form-control" id="floatingInput" name="environment" value="{{$floor -> environment}}" >
                        <label for="floatingInput">Numero ambiente</label>
                        
                    </div>
               
                    <div class="form-floating mb-3">
                       
                        <input type="number" class="form-control" id="floor_id" name="floor_id" value="{{$floor -> floor_id}}">
                      
                    </div>
                    <input class="btn btnn-style" type="submit" value="Actualizar datos" title="click para actualizar ambiente"> 
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        
    
                    </div> --}}
                    
                </form>
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
    @section('alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('delete') == true)
        <script>
                Swal.fire({
                title: "Eliminado!",
                text: "El ambiente se ha eliminado correctamente.",
                icon: "success"
                });
        </script>
    @endif
    <script>
        $('.form-destroy').submit(function(e){
          e.preventDefault();
          Swal.fire({
title: "Estas seguro de eliminar este ambiente?",
text: "No podra deshacer los cambios!",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Sí, eliminar"
}).then((result) => {
if (result.isConfirmed) {
// Swal.fire({
//   title: "Deleted!",
//   text: "Your file has been deleted.",
//   icon: "success"
// });
this.submit();
}
});
        })
       
    </script>
    @endsection
  </div>
  