<header class="bg-top-header">
    <div class="d-flex justify-content-between align-items-center py-2 px-3">
        <h1>
            <a href="{{ route('home') }}" class="text-light display-2 text-decoration-none">FILMESSI</a>
        <h1>
        @guest
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 fs-5">Entrar</a>
            </div>
        @endguest
        @auth
            <div>
                <a href="{{ route('logout') }}" class="btn btn-primary px-4 py-2 fs-5">Sair</a>
            </div>
        @endauth
    </div>
    <nav class="navbar bg-bottom-header">
        <div class="container-fluid">
            <ul class="list-unstyled m-0 p-0 d-flex gap-3">
                <li class="nav-item">
                    <a class="nav-link text-light fs-5 nav-hover" href="{{ route('home') }}">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fs-5 nav-hover" href="{{ route('favorites') }}">Favoritos</a>
                </li>
                @auth
                    @can('user_is_admin')
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5 nav-hover" href="{{ route('panel') }}">Painel</a>
                        </li>
                    @endcan
                @endauth
                <li class="nav-item">
                    <a class="nav-link text-light fs-5 nav-hover" href="{{ route('about') }}">Sobre</a>
                </li>
            </ul>
        </div>
    </nav>
</header>