<!DOCTYPE html>
<x-head titulo="Editar Sneaker">

    <x-navbar></x-navbar>

    <section class="vh-100 bg-image" style="background-image: url('/img/createSneaker.jpg')">
    
        <div class="separar">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                <div class="separar"> 
                    <a class="btn btn-dark" style="background-color:black" href="/sneaker">
                        <i class="fa-solid fa-circle-arrow-left"></i> Regresar
                    </a>
                </div>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">    
                            <h2 class="text-uppercase text-center mb-5">Editar Sneaker</h2>

                            <form action="/sneaker/{{ $sneaker->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <input class="form-control form-control-lg" type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $sneaker->nombre }}">
                                    @error('nombre')
                                        <i>{{ $message}}</i>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="marca">Marca</label>
                                    <input class="form-control form-control-lg" type="text" name="marca" id="marca" value="{{ old('marca') ?? $sneaker->marca }}">
                                    @error('marca')
                                        <i>{{ $message}}</i>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="precio">Precio</label>
                                    <input class="form-control form-control-lg" type="integer" name="precio" id="precio" value="{{ old('precio') ?? $sneaker->precio }}">
                                    @error('precio')
                                        <i>{{ $message}}</i>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="talla">Talla</label>
                                    <input class="form-control form-control-lg" type="text" name="talla" id="talla" value="{{ old('talla') ?? $sneaker->talla }}">
                                    @error('talla')
                                        <i>{{ $message}}</i>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="stock">Stock</label>
                                    <input class="form-control form-control-lg" type="integer" name="stock" id="stock" value="{{ old('nombre') ?? $sneaker->stock }}">
                                    @error('stock')
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