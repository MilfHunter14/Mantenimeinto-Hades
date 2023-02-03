@if(session()->has('correo'))
    <script>
        Swal.fire(
            'Notificación enviada de manera éxitosa',
            '{{ session('correo') }}',
            'success'
        )
    </script>
@endif