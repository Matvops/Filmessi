<?php

namespace App\Services;

use App\Repositories\FilmRepository;

class MainService {
    
    private FilmRepository $filmRepository;

    function __construct()
    {
       $this->filmRepository = new FilmRepository; 
    }

    public function getNewMovies(){
        return $this->filmRepository->getNewMovies();
    }
}