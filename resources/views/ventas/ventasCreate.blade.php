<!DOCTYPE html>
<html lang="en">
<x-head titulo="Registrar Venta">

<x-navbar></x-navbar>
        
        <section class="vh-100 bg-image" style="background-image: url('/img/createVenta.jpg')">
        
            <div class="separar">
                <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                    <div class="container h-100">
                    <div class="separar"> 
                        <a class="btn btn-dark" style="background-color:black" href="/venta">
                            <i class="fa-solid fa-circle-arrow-left"></i> Regresar
                        </a>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">    
                            <h2 class="text-uppercase text-center mb-5">Registrar Venta</h2>

                            <form method="POST" action="/venta">

                            @csrf

                                <div class="form-outline mb-4">
                                <label class="form-label" for="empleado_id">Nombre: </label></br>
                                <select name="empleado_id" id="empleado_id" class="form-control form-control-lg" required>
                                    <option selected disabled>Seleccione una opción</option>
                                    @foreach($empleados as $empleado)
                                        <option value="{{ $empleado->id }}">{{$empleado->nombre}}</option>
                                    
                                    @endforeach
                                </select>
                                @error('empleado_id')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="sneaker_id">Modelo: </label></br>
                                <!--Los corchetes hacen referencia a que se enviara un arreglo-->
                                <select name="sneakers_id[]" multiple class="form-control form-control-lg" required>
                                    <option selected disabled>Seleccione una opción</option>
                                    @foreach($sneakers as $sneaker)
                                        <option value="{{ $sneaker->id }}">{{$sneaker->nombre}}</option>
                                    
                                    @endforeach
                                </select>
                                @error('sneaker_id')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="fecha_venta">Fecha de Venta: </label></br>
                                <input type="date" class="form-control form-control-lg"  name="fecha_venta" id="fecha_venta" autocomplete="off" required value="{{old('fecha_venta')}}">
                                @error('fecha_venta')
                                    <i>{{ $message}}</i>
                                @enderror
                                </div>

                                <div class="form-outline mb-4">
                                <label class="form-label" for="forma_pago">Método de pago: </label><br/>
                                <select name="forma_pago" id="forma_pago" class="form-control form-control-lg" required>
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta">Tarjeta</option>
                                    <option value="Transferencia">Transferencia bancaria</option>
                                </select>
                                    @error('forma_pago')
                                    <i>{{ $message}}</i>
                                     @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                <button type=submit
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"><i class="fa-regular fa-circle-check"></i> Guardar</button>
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
