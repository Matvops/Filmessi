<?php

namespace App\Services;

use App\Repositories\FilmRepository;
use Illuminate\Database\Eloquent\Collection;

class PanelService {

    private FilmRepository $filmRepository;

    public function __construct()
    {
        $this->filmRepository = new FilmRepository;
    }

    public function getAllFilms(): Collection
    {
        return $this->filmRepository->getAll();
    }
}