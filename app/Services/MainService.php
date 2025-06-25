<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Repositories\FilmRepository;
use App\Utils\Response;
use Illuminate\Support\Facades\Crypt;

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

    public function showFilm($token): Response
    {
        try {
            $id = Crypt::decrypt($token);

            $film = $this->filmRepository->getFilmById($id);

            return Response::getResponse(true, '', $film);
        } catch (NotFoundException $e) {
            return Response::getResponse(false, $e->getMessage());
        }
    }
}