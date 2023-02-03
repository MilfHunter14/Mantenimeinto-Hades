@if(session()->has('deletePapelera'))
    <script>
        Swal.fire(
            'Acción realizada correctamente',
            '{{ session('deletePapelera') }}',
            'success',
        )
    </script>
@endif
