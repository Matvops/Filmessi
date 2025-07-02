<x-layouts.main_layout title="Favoritos">
    <x-slot:content>
        <x-header />

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