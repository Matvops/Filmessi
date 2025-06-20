<?php

namespace App\Services;

use App\Repositories\FilmRepository;

class MainService {
    
    private FilmRepository $filmRepository;

    function __construct()
    {
       $this->filmRepository = new FilmRepository; 
    }

    public function getMainMovies() {
        
        $movies = [
            'new' => $this->getNewMovies(),
            'most_visit' => $this->getMostVisitMovies()
        ];

        return $movies;
    }

    private function getNewMovies(){
        return $this->filmRepository->getNewMovies();
    }

    private function getMostVisitMovies() {
        return $this->filmRepository->getMostVisitMovies();
    }
}