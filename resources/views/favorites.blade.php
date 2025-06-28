<x-layouts.main_layout title="Favoritos">
    <x-slot:content>
        <header class="bg-top-header">
            
            <div class="d-flex justify-content-between align-items-center py-2 px-3">
                <h1>
                    <a href="{{ route('home') }}" class="text-light display-2 text-decoration-none">FILMESSI</a>
                </h1>

                @if(session('error_favorite'))
                    <div class="apaga-toast p-3 rounded-1 bg-black text-danger text-center container w-25 fs-4">
                        {{session('error_favorite')}}
                    </div>
                @endif

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
                            <a class="nav-link text-light fs-5 nav-hover" href="#">Favoritos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5 nav-hover" href="{{ route('about') }}">Sobre</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input type="search" placeholder="Pesquisar" aria-label="Search"
                                class="me-2 text-light bg-bottom-header outline-none focus-ring shadow-none 
                                border-top-0 border-end-0 border-start-0 fs-5"/>
                    </form>
                </div>
            </nav>
        </header>

        <main class="h-100 w-100">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 h-75 w-75 mt-5 mx-auto container">
                @foreach ($films as $film)
                    <a href="{{ route('show', ['token' => $film->film_id]) }}">
                        <div class="position-relative rounded">
                            <div class="w-100 position-absolute z-2 d-flex justify-content-between">
                                <p class="text-light fs-4 fw-bold px-3 py-4 text_image">{{ $film->year }}</p>
                                <p class="text-light fs-4 fw-bold px-3 py-4 text_image">{{ $film->translated ? 'DUB' : 'LEG'}}</p>
                            </div>
                            <div class="card-content">
                                <img src="{{ $film->image_path }}" alt="{{ $film->title }}" class="card-container-favorites_image">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </x-slot:content>
</x-layouts.main_layout>