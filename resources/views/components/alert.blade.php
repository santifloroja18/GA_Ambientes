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

@if (session('info_message'))
@section('codigo-javascript-body')
    <script>
        Swal.fire({
            text: "{{session('info_message')}}",
            icon: "warning",
            showConfirmButton: true,
        });
    </script>
@endsection
@endif
{{-- alerta de inicio de sesion - fin  --}}

{{-- alerta de inicio de sesion - inicio --}}
@if (session('faild_request'))
@section('codigo-javascript-body')
    <script>
        Swal.fire({
            text: "{{session('faild_request')}}",
            icon: "error",
        });
    </script>
@endsection
@endif
{{-- alerta de inicio de sesion - fin  --}}