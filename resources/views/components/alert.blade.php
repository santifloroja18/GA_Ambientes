{{-- alerta de inicio de sesion - inicio --}}
@if (session('status_message'))
@section('codigo-javascript-body')
    <script>
        Swal.fire({
            text: "{{session('status_message')}}",
            icon: "success",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endsection
@endif
{{-- alerta de inicio de sesion - fin  --}}
@if (session('delete_message'))
@section('codigo-javascript-body')
    <script>
  Swal.fire({
  title: "Advertencia...",
  text: "{{session('delete_message')}}",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});
                
    </script>
@endsection
@endif