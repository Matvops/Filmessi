<x-layouts.main_layout title="Panel">
    <x-slot:content>
        <x-header />

        <div class="w-75 h-100 mx-auto my-5">
            <div class="mb-5">
                <a href="{{ route('register_film') }}" class="btn btn-info px-5 py-3 fs-5 fw-semibold">Cadastrar</a>
            </div>

            <main>
                <ul class="list-inline">
                    @if(session('update_error'))
                        <p class="text-danger w-100 text-end fs-5">{{session('update_error')}}</p>
                    @endif
                    @foreach ($films as $film)
                        <li class="border border-top-0 border-end-0 border-start-0 py-4 d-flex">
                            <img src="{{ $film->image_path }}" alt="{{ $film->title }}" class="card-container-panel_image">

                            <div class="d-flex justify-content-between w-100 px-5">
                                <div class="d-flex flex-column justify-content-between">
                                        <h1 class="text-light fw-medium kantumruy">{{ $film->title }}</h1>
                                    <div>
                                        <h2 class="fs-3 text-light text-uppercase">
                                            {{$film->views}} visualizações
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                            </svg>
                                        </h2>
                                        
                                        <h2 class="fs-3 text-light text-uppercase">{{$film->year}} {{ $film->translated ? "DUB" : "LEG"}}</h2>
                                    </div>
                                    @if ($film->active)
                                        <h2 class="fs-4 text-success text-uppercase">ATIVO</h2>
                                    @else
                                        <h2 class="fs-4 text-danger text-uppercase">INATIVO</h2>
                                    @endif
                                </div>

                                <div class="align-self-center">
                                    <a href="{{route('update_view_film', ['token' => $film->film_id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white" class="bi bi-pencil-fill pencil-film cursor-pointer" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </main>
        </div>
    </x-slot:content>
</x-layouts.main_layout>