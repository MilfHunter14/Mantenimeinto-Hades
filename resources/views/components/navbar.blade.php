<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <img src="/img/marcas/jordan_blanco.png" height="40px" width="40px">
        <h1 class="logo me-auto"><a href="{{ url('/') }}">HADES</a></h1>
            <nav id="navbar" class="navbar">
                @if(Route::has('login'))
                    @auth
                    <ul>
                        <li><a class="nav-link scrollto active" href="{{ url('/') }}">Inicio</a></li> 
                        <li class="dropdown"><a href="#"><span>Gestión de Recursos</span><i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="/empleado">Empleados</a></li>
                                <li><a href="/sneaker">Sneakers</a></li>
                                <li><a href="/venta">Ventas</a></li>
                            </ul>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="getstarted scrollto" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            </form>
                        </li>
                    </ul>
                @else
                    <ul>
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Inicia Sesión</a></li>
                    </ul>
                    @endauth
                @endif
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->  
    </div>
</header>
    <!-- End Header -->
