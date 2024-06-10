 {{-- Sección para confirmar eliminar ambiente con alerta bootstrap --}}
 @section('alertFloorDelete')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- Validación desde EnvironmentController para mostrar mensaje de ambiente eliminado --}}
 @if(session('delete') == true)
     <script>
             Swal.fire({
             title: "Piso eliminado con exito!",
             icon: "success"
             });
     </script>
 @endif
 <script>
     // validación envio de formulario para eliminar ambiente
     $('.form-destroy').submit(function(e){
       e.preventDefault();
         Swal.fire({
         title: "Esta seguro de eliminar este piso?. Se borrara también todos los ambientes y la información relacionada con estos",
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
 