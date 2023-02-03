@if(session()->has('delete'))
    <script>
        Swal.fire(
            'Acción realizada correctamente',
            '{{ session('delete') }}',
            'success'
        )
    </script>
@endif


