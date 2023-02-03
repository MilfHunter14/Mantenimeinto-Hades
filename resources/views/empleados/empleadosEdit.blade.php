<!DOCTYPE html>
<html lang="en">
<x-head titulo="Editar Empleado">

    <x-navbar></x-navbar>

        <section class="vh-100 bg-image" style="background-image: url('/img/empleados.jpg')">
        
            <div class="separar">
                <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                    <div class="container h-100">
                    <div class="separar"> 
                        <a class="btn btn-dark" style="background-color:black" href="/empleado">
                            <i class="fa-solid fa-circle-arrow-left"></i> Regresar
                        </a>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">    
                            <h2 class="text-uppercase text-center mb-5">Editar Empleado</h2>

                            <form method="POST" action="/empleado/{{ $empleado->id }}">

                            @csrf
                            @method('PATCH')

                                <div class="form-outline mb-4">
                                <label class="form-label" for="nombre">Nombre: </label>
                                <input type="text" class="form-control form-control-lg" name="nombre" id="nombre"  autocomplete="off" required value="{{ old('nombre') ?? $empleado->nombre }}">
                                @error('nombre')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="apellidos">Apellidos: </label></br>
                                <input type="text" class="form-control form-control-lg"  name="apellidos" id="apellidos" autocomplete="off" required value="{{ old('apellidos') ?? $empleado->apellidos }}">
                                @error('nombre')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="genero">Género: </label><br/>
                                    <select name="genero" class="form-control form-control-lg" required>
                                        <option selected disabled>Seleccione una opción</option>
                                        <option value="M" {{ $empleado->genero == 'M' ? 'selected' : '' }}>Masculino</option>>Masculino</option>
                                        <option value="F" {{ $empleado->genero == 'F' ? 'selected' : '' }}>Femenino</option>
                                        <option value="X" {{ $empleado->genero == 'X' ? 'selected' : '' }}>Prefiero no decirlo</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="telefono">Teléfono: </label></br>
                                <input type="text" class="form-control form-control-lg" name="telefono" id="telefono" autocomplete="off" min=10 max=10 required value="{{ old('telefono') ?? $empleado->telefono }}" maxlength="10">
                                @error('telefono')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="calle">Calle: </label></br>
                                <input type="text" class="form-control form-control-lg" name="calle" id="calle" autocomplete="off" required value="{{ old('calle') ?? $empleado->calle }}">
                                @error('calle')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="colonia">Colonia: </label></br>
                                <input type="text" class="form-control form-control-lg" name="colonia" id="colonia" autocomplete="off" required value="{{ old('colonia') ?? $empleado->colonia }}">
                                @error('colonia')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label"for="municipio">Municipio: </label></br>
                                <input type="text" class="form-control form-control-lg" name="municipio" id="municipio" autocomplete="off" required value="{{ old('municipio') ?? $empleado->municipio }}">
                                @error('municipio')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label"for="fecha_nac">Fecha de Nacimiento: </label></br>
                                <input type="date" class="form-control form-control-lg" name="fecha_nac" id="fecha_nac" required value="{{ old('fecha_nac') ?? $empleado->fecha_nac }}">
                                @error('fecha_nac')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="estado_civil">Estado Civil: </label><br/>
                                    <select class="form-control form-control-lg" name="estado_civil" required>
                                        <option selected disabled>Seleccione una opción</option>
                                        <option value="Soltero" {{ $empleado->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                        <option value="Casado" {{ $empleado->estado_civil == 'Casado' ? 'selected' : '' }}>Casado</option>
                                        <option value="Divorciado" {{ $empleado->estado_civil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                        <option value="Viudo" {{ $empleado->estado_civil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                                        <option value="Concubinato" {{ $empleado->estado_civil == 'Concubinato' ? 'selected' : '' }}>Concubinato</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label"for="municipio">Email: </label></br>
                                <input type="email" class="form-control form-control-lg" name="email" id="email" autocomplete="off" required value="{{old('email') ?? $empleado->email}}">
                                @error('email')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                <button type=submit
                                    class="btn btn-warning btn-block btn-lg gradient-custom-4 text-body"><i class="fa-regular fa-circle-check"></i> Guardar</button>
                                </div>

                            </form>

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