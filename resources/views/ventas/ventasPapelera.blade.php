<!DOCTYPE html>
<html lang="en">
<x-head titulo="Ventas">

    <x-navbar></x-navbar>


        <!-- ======= Hero Section ======= -->
        <section class="table-responsive-md">

            <div class="container">
            <div class="separar">
                <h1 style="text-align: center">Papelera de Ventas</h1>
            </div>

            <div class="separar"> 
                <a class="btn btn-dark" style="background-color:black" href="/venta">
                    <i class="fa-solid fa-circle-arrow-left"></i> Regresar
                </a>
            </div>

            <div class="separar">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th>ID de la Venta</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Modelo</th> 
                            <th>Fecha de la Venta</th>
                            <th>Tipo de Pago</th>
                            <th>Restaurar</th>
                            <th>Eliminar</th>    
                        </tr>
                    </thead>
                    @foreach($ventas as $venta)
                    <tbody>
                        <tr>
                            <td>
                                <!--Nos dirigira al metodo show del controlador -->
                                <a href="/venta/{{ $venta->id }}">   
                                {{ $venta->id }}
                                </a>

                            </td>
                            <!--LLAVES FORANEAS -->
                            <td>{{ $venta->empleado->nombre }}</td>
                            <td>{{ $venta->empleado->apellidos }}</td>
                            <!--FIN LLAVES FORANEAS -->
                            

                            <!--RELACIÓN MUCHOS A MUCHOS -->
                            <td>
                            @foreach($venta->sneakers as $sneaker)
                                {{ $sneaker->nombre }}</br>
                            @endforeach
                            </td>
                            <!--FIN RELACIÓN MUCHOS A MUCHOS -->
                            
                            <td>{{ $venta->fecha_venta }}</td>
                            <td>{{ $venta->forma_pago }}</td>
                        
                            <td>
                                <!--Nos dirigira al metodo ventasRestore del controlador -->
                                <a class="btn btn-success" href="/ventas/{{ $venta->id }}/ventasRestore">   
                                    <i class="fa-solid fa-trash-can-arrow-up"></i> Restaurar
                                </a>

                            </td>

                            <td> 
                                <!--action lo manda al métodoventasDelete-->
                                <form class="form-papelera" method="POST" action="/ventas/{{ $venta->id }}/ventasDelete">

                                    <!-- Nos permite realizar la operación desde html-->
                                    @csrf
                                    @method('DELETE')

                                    <button type=submit class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

        </section><!-- End Hero -->
 
</x-head>
</html>