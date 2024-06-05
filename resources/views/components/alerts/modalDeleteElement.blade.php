 {{-- Sección para confirmar eliminar ambiente con alerta bootstrap --}}
 @section('DeleteElementAlert')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- Validación desde EnvironmentController para mostrar mensaje de ambiente eliminado --}}
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
     // validación envio de formulario para eliminar ambiente
     $('.form-destroy').submit(function(e){
       e.preventDefault();
         Swal.fire({
         title: "Estas seguro de eliminar este ambiente?",
         text: "No podra deshacer los cambios!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Sí, eliminar",
         cancelButtonText: "Cancelar",
         }).then((result) => {
         if (result.isConfirmed) {
         this.submit();
         }
         });
                 })
             
 </script>
 @endsection
 