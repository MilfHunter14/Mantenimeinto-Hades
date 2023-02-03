<!DOCTYPE html>
<x-head titulo="Actualiza - Imagen">

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
                    <img src= "/img/nike-fondo.png"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
        
                    </div>
                    <div class="col-xl-6">
                        <form action="/archivo/{{ $archivo->id }}" method="POST" enctype="multipart/form-data">
                        <h3 class="mb-5 text-uppercase">ACTUALIZA LA IMAGEN</h3>
                        
                            @csrf
                            @method('PATCH')
                        
                            <div class="form-outline mb-4">
                                <label class="form-label" for="imagen">Imagen</label>
                                <input class="form-control form-control-lg" type="file" name="imagen" id="imagen" value="{{old('imagen')}}" required>
                                @error('imagen')
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