@if(session()->has('actualizarimagen'))
    <script>
        Swal.fire(
            'Acción realizada correctamente',
            '{{ session('actualizarimagen') }}',
            'success'
        )
    </script>
@endif
