<x-layouts.main_layout title="{{ $film->title }}">
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
                            <a class="nav-link text-light fs-5 nav-hover" href="{{ route('favorites') }}">Favoritos</a>
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

        <main class="my-5 container pb-5">
            <div class="bg-dark-blue p-5">
                <div class="d-flex justify-content-between align-items-center border-bottom px-1 pb-3 mb-4">
                    <h1 class="text-light">{{ $film->title }}</h1>
                    
                    <form method="post" action="{{route('favorite')}}">
                        @csrf
                        <input type="hidden" name="favorite" value="{{$film->favorite}}">
                        <input type="hidden" name="film_id" value="{{$film->film_id}}">      
                        
                        @if($film->favorite)
                        <button type="submit" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="yellow" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                    <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"/>
                                </svg>
                            </button>
                            @else
                            <button type="submit" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="yellow" class="bi bi-bookmark" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                </svg>
                            </button>
                            @endif
                        </form>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-5 ">
                        <div>
                            <div class="card-content">
                                <img src="{{asset("$film->image_path")}}" alt="{{$film->title}}" class="card-container_image">
                            </div>
                        </div>
                        <div>
                            <p class="text-light fs-4 fw-medium">{{$film->description}}</p>
                            
                            <a href="{{$film->link}}" class="btn btn-info text-light fs-4 fw-semibold text-decoration-none" target="blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                    <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
                                </svg> 
                                PLAY
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </x-slot:content>
    </x-layouts.main_layout>