@section('scripts')
    <script>
        Swal.fire({
  title: "<strong>ADVERTENCIA</strong>",
  icon: "warning",
  html: `
    Entrega <b>tardia</b>,
    de las llaves
    `,
  focusConfirm: false,
  confirmButtonText: `
    <i class="fa fa-thumbs-up"></i> Aceptar!
  `,
  confirmButtonAriaLabel: "Thumbs up, great!",
});
    </script>
@endsection

