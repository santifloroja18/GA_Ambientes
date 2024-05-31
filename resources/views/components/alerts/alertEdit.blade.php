 {{-- Sección para confirmar eliminar ambiente con alerta bootstrap --}}
 @section('alertEdit')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- Validación desde EnvironmentController para mostrar mensaje de ambiente eliminado --}}
 @if(session('edit') == true)
     <script>
             Swal.fire({
             title: "Actualizado!",
             text: "La información del ambiente se ha modificado correctamente.",
             icon: "success"
             });
     </script>
 @endif
 <script>
     // validación envio de formulario para eliminar ambiente
     $('.form-update').submit(function(e){
       e.preventDefault();
         Swal.fire({
         title: "Está seguro de modificar la información?",
         text: "No podra deshacer los cambios!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Sí, actualizar",
         cancelButtonText: "Cancelar",
         }).then((result) => {
         if (result.isConfirmed) {
         this.submit();
         }
         });
                 })
             
 </script>
 @endsection
 