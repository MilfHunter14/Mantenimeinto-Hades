<!DOCTYPE html>
<html lang="en">
<x-head titulo="Empleados">


    <x-navbar></x-navbar>

        <!-- ======= Hero Section ======= -->
        <section>

            <div class="container">

            <div class="separar">
                <h1 style="text-align: center">Listado de Empleados</h1>
            </div>

            <div class="separar">
                <a class="btn btn-primary" href="/empleado/create">
                    <i class="fa-solid fa-user-plus"></i> Registrar Empleado
                </a>
            </div>
                
            <div class="separar">
                <table class="table-responsive-md table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Género</th>
                            <th>Teléfono</th>
                            <th>Calle</th>
                            <th>Colonia</th>
                            <th>Municipio</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estado Civil</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @foreach($empleados as $empleado)
                    <tbody>
                        <tr>
                            <td>
                                <!--Nos dirigira al metodo show del controlador -->
                                <a href="/empleado/{{ $empleado->id }}">   
                                {{ $empleado->nombre }}
                                </a>

                            </td>
                            <td>{{ $empleado->apellidos }}</td>
                            <td>{{ $empleado->genero }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->calle }}</td>
                            <td>{{ $empleado->colonia }}</td>
                            <td>{{ $empleado->municipio }}</td>
                            <td>{{ $empleado->fecha_nac }}</td>
                            <td>{{ $empleado->estado_civil }}</td>

                            <td>
                                <!--Nos dirigira al metodo edit del controlador -->
                                <a class="btn btn-warning" href="/empleado/{{ $empleado->id }}/edit">   
                                    <i class="fa-solid fa-pencil"></i> Editar
                                </a>

                            </td>

                            <td> 
                                <!--action lo manda al método DELETE-->
                                <form class="form-eliminar" method="POST" action="/empleado/{{ $empleado->id }}">

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
