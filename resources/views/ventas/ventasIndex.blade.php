<!DOCTYPE html>
<html lang="en">
<x-head titulo="Ventas">
    
    <x-navbar></x-navbar>

        <!-- ======= Hero Section ======= -->
        <section class="table-responsive-md">

            <div class="container">
            <div class="separar">
                <h1 style="text-align: center">Listado de Ventas de Empleados</h1>
            </div>

            <div class="separar d-flex">
                <a class="btn btn-primary" href="/venta/create">
                <i class="fa-solid fa-file-circle-plus"></i> Registrar Venta
                </a>
                <!-- Agregamos el botón que nos redirige a la vista de Papelera -->
                <a class="btn btn-secondary ms-auto"  href="/ventasPapelera">
                    <i class="fa-solid fa-box-archive"></i> Papelera
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
                            <th>Email</th>
                            <th>Confirmación</th>
                            <th>Editar</th>
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

                            <td>{{ $venta->empleado->email }}</td>
                            
                            <td>
                                <a class="btn btn-info" href="/email/ventaRegistrada/{{ $venta->id }}">
                                    <i class="fa-regular fa-paper-plane"></i> Enviar
                                </a>
                            </td>
                        
                            <td>
                                <!--Nos dirigira al metodo edit del controlador -->
                                <a class="btn btn-warning" href="/venta/{{ $venta->id }}/edit">   
                                <i class="fa-solid fa-pencil"></i> Editar
                                </a>

                            </td>

                            <td> 
                                <!--action lo manda al método DELETE-->
                                <form class="form-eliminar" method="POST" action="/venta/{{ $venta->id }}">

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