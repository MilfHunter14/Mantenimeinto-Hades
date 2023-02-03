@if(session()->has('validacion'))
    <script>
        Swal.fire(
            'Acción interrumpida, comprueba la información.',
            '{{ session('validacion') }}',
            'warning'
        )
    </script>
@endif