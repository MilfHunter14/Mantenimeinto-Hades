@if(session()->has('insertar'))
    <script>
        Swal.fire(
            'Inserción de manera éxitosa',
            '{{ session('insertar') }}',
            'success'
        )
    </script>
@endif