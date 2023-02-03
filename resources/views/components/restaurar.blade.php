@if(session()->has('restaurar'))
    <script>
        Swal.fire(
            'Restauración de manera éxitosa',
            '{{ session('restaurar') }}',
            'success'
        )
    </script>
@endif