<!DOCTYPE html>
<x-head titulo="Mostrar Sneaker">

    <x-navbar></x-navbar>
    <section class="h-100 bg-white">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
            <a class="btn btn-dark" style="background-color:black" href="/sneaker">
                <i class="fa-solid fa-circle-arrow-left"></i> Lista de Sneakers
            </a>
                <div class="separar">
                <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                    @foreach ($sneaker->archivos as $archivo)
                    <img src= "{{ \Storage::url($archivo->ubicacion)}}"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                    @endforeach
                    </div>
                    <div class="col-xl-6">
                
                        <h3 class="mb-5 text-uppercase">Detalles del Sneaker</h3>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Nombre</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" value="{{ $sneaker->nombre }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Marca</label>
                            <input type="text" id="form3Example1n" class="form-control form-control-lg" value="{{ $sneaker->marca }}" disabled />   
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1m1">Precio</label>
                            <input type="text" id="form3Example1m1" class="form-control form-control-lg" value="{{ $sneaker->precio }}" disabled />
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="form3Example1n1">Talla</label>
                            <input type="text" id="form3Example1n1" class="form-control form-control-lg" value="{{ $sneaker->talla }}" disabled />
                            </div>
                        </div>
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8">Stock</label>
                        <input type="text" id="form3Example8" class="form-control form-control-lg" value="{{ $sneaker->stock }}" disabled />
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