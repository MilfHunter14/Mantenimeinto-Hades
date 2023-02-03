<!DOCTYPE html>
<html lang="en">
<x-head titulo="Mostrar Empleado">
    
    <x-navbar></x-navbar>

        <section class="h-100 bg-white">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
            <a class="btn btn-dark" style="background-color:black" href="/empleado">
                <i class="fa-solid fa-circle-arrow-left"></i> Regresar Listado de Empleados
            </a>
                <div class="separar">
                <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                    <img src="/img/mostrarempleados1.jpg"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                    </div>
                    <div class="col-xl-6">
                
                        <h3 class="mb-5 text-uppercase">Detalles del Empleado</h3>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Nombre</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" value="{{ $empleado->nombre }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Apellidos</label>
                            <input type="text" id="form3Example1n" class="form-control form-control-lg" value="{{ $empleado->apellidos }}" disabled />   
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m1">Género</label>
                            <input type="text" id="form3Example1m1" class="form-control form-control-lg" value="{{ $empleado->genero }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n1">Teléfono</label>
                            <input type="text" id="form3Example1n1" class="form-control form-control-lg" value="{{ $empleado->telefono }}" disabled />
                            </div>
                        </div>
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8">Calle</label>
                        <input type="text" id="form3Example8" class="form-control form-control-lg" value="{{ $empleado->calle }}" disabled />
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Colonia</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" value="{{ $empleado->colonia }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Municipio</label>
                            <input type="text" id="form3Example1n" class="form-control form-control-lg" value="{{ $empleado->municipio }}" disabled />   
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Fecha de Nacimiento</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" value="{{ $empleado->fecha_nac }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Estado Civil</label>
                            <input type="text" id="form3Example1n" class="form-control form-control-lg" value="{{ $empleado->estado_civil }}" disabled />   
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Email</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" value="{{ $empleado->email }}" disabled />
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</x-head>
</html>