<x-layouts.main_layout title="Home">
    <x-slot:content>
        <x-header />
        
        <section class="mx-auto">
            <div class="main_image img-fluid d-flex align-items-center flex-column justify-content-center py-2" style="background-image: url('{{asset('storage/images/av.jpg')}}');">
                 <h1 class="text-light kantumruy fw-bold display-5 text_image py-5">Vingadores: Guerra Infinita</h1>
                 <div class="mx-auto text-center py-5">
                    <a href="https://www.linkedin.com/in/matheus-cadenassi-799125321/" class="btn btn-info px-4 py-2 fs-4">Assista</a>
                 </div>
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
                                                <p class="text-light fs-4 fw-bold px-3 py-4 text_image">${movie.year}</p>
                                                <p class="text-light fs-4 fw-bold px-3 py-4 text_image">${movie.translated ? 'DUB' : 'LEG'}</p>
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