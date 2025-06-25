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

        <section class="mt-4 bg-black w-75 mx-auto pb-4">
            <ul id="menu-categorias" class="list-unstyled m-0 p-0 d-flex justify-content-around py-3 bg-dark-blue">
                <li><button class="text-decoration-none text-light fs-4 category-button" data-target='new'>Lançamentos</button></li>
                <li><button class="text-decoration-none text-light fs-4 category-button" data-target='most_visit'>Mais Vistos</button></li>
            </ul>
            

            <div id="carouselExample" class="carousel slide mt-4 mb-3">
                <div class="carousel-inner mx-auto">
                    <div id="carousel-container"></div>
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
            const allMovies = @json($movies);
            const container = document.getElementById('carousel-container');

            function renderMovies(category) {
                const movies = allMovies[category];
                const routeShow = '/show/:id';
                
                let html = '';
                for (let i = 0; i < movies.length; i += 4) {
                    const group = movies.slice(i, i + 4);

                    html += `
                        <div class="carousel-item ${i === 0 ? 'active' : ''}">
                            <div class="d-flex justify-content-between gap-2">
                                ${group.map(movie => `
                                    <a href="${routeShow.replace(':id', movie.film_id)}">
                                        <div class="position-relative rounded">
                                            <div class="w-100 position-absolute z-2 d-flex justify-content-between">
                                                <p class="text-light fs-4 fw-bold px-3 py-4">${movie.year}</p>
                                                <p class="text-light fs-4 fw-bold px-3 py-4">${movie.translated ? 'DUB' : 'LEG'}</p>
                                            </div>
                                            <div class="card-content">
                                                <img src="${movie.image_path}" alt="${movie.title}" class="card-container_image">
                                            </div>
                                        </div>
                                    </a>
                                `).join('')}
                            </div>
                        </div>
                    `;
                }

                container.innerHTML = html;
            }

            document.querySelectorAll('#menu-categorias button.category-button').forEach(btn => {
                btn.addEventListener('click', function() {
                    const categoria = this.dataset.target;
                    renderMovies(categoria);
                });
            });

            renderMovies('new');
        </script>
    </x-slot:content>
</x-layouts.main_layout>