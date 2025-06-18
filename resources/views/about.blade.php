<x-layouts.main_layout title="Sobre">
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
                </div>
            </nav>
        </header>


        <main class="w-75 m d-flex align-items-center flex-column mx-auto gap-4 mt-5 pt-5 container">
            <h1 class="text-uppercase text-light display-4">Filmessi</h1>
            <p class="text-light fs-4">Este site é um projeto desenvolvido com o objetivo de praticar meus conhecimentos em PHP e Laravel, com foco em autenticação, 
                autorização utilizando gates, interface com Bootstrap e templating com Blade. A proposta é consolidar o aprendizado por meio da 
                construção de uma aplicação web funcional e bem estruturada.
            </p>
        </main>

        <section class="mt-5 pt-5 container">
            <h1 class="text-uppercase text-light display-5 fw-bold">Contato</h1>
            <p class="text-light fs-4 pt-2 fw-semibold">Github: <a href="https://github.com/Matvops" class="text-light fs-5 fw-normal">https://github.com/Matvops</a></p>
            <p class="text-light fs-4 py-2 fw-semibold">Linkedin: <a href="https://www.linkedin.com/in/matheus-cadenassi-799125321/" class="text-light fs-5 fw-normal">https://www.linkedin.com/in/matheus-cadenassi-799125321/</a></p>
        </section>
    </x-slot:content>
</x-layouts.main_layout>