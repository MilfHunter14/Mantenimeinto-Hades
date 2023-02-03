@if(session()->has('editar'))
    <script>
        Swal.fire(
            'Edición de manera éxitosa',
            '{{ session('editar') }}',
            'success'
        )
    </script>
@endif