<x-layouts.main_layout title="Home">
    <x-slot:content>
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

        <section class="mx-auto">
            <div class="main_image img-fluid d-flex align-items-end" style="background-image: url('{{asset('storage/images/av.jpg')}}');">
                 <div class="mx-auto text-center py-5">
                    <a href="#" class="btn btn-info px-4 py-2 fs-4">Assista</a>
            </div>
        </section>

        <section class="mt-4 bg-black w-75 mx-auto">
            <ul id="menu-categoria" class="list-unstyled m-0 p-0 d-flex justify-content-around py-3 bg-dark-blue">
                <li><button class="text-decoration-none text-light fs-4 category-button" data-target='new'>Lançamentos</button></li>
                <li><button class="text-decoration-none text-light fs-4 category-button" data-target='most-visit'>Mais Vistos</button></li>
            </ul>
            

            <div id="carouselExample" class="carousel slide mt-4 mb-3">
                <div class="carousel-inner mx-auto">
                    <div id="new">
                        <x-movies :movies="$movies['new']" />
                    </div>

                    <div id="most-visit" class="d-none">
                        <x-movies :movies="$movies['most_visit']" />
                    </div>
                </div>

                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
            
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>

        <script>
            const buttons = document.querySelectorAll('#menu-categoria button.category-button');

            buttons.forEach(button => {

                button.addEventListener('click', function(event) {

                    const targetId = this.dataset.target;

                    document.querySelectorAll('.carousel-inner > div').forEach(div => {
                        div.classList.add('d-none');
                    });

                    const targetDiv = document.getElementById(targetId);

                    if (targetDiv) {
                        targetDiv.classList.remove('d-none');
                    }
                });
            });
        </script>
    </x-slot:content>
</x-layouts.main_layout>