<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Favorite;
use App\Repositories\FilmRepository;
use App\Repositories\UserRepository;
use App\Utils\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MainService {
    
    private FilmRepository $filmRepository;
    private UserRepository $userRepository;

    function __construct()
    {
       $this->filmRepository = new FilmRepository; 
       $this->userRepository = new UserRepository;
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

    public function getFavorites(): Response
    {
        $user = $this->userRepository->getUserByEmail(Auth::user()->email);
        $favorites = $this->userRepository->getFavorites($user->user_id);

        return Response::getResponse(true, '', $favorites);
    }

     public function favoriteFilm($isFavorite, $filmIdEcnrypted): Response
    {
        try {

            $filmId = Crypt::decrypt($filmIdEcnrypted);
            $user = $this->userRepository->getUserByEmail(Auth::user()->email);

            DB::beginTransaction();
            
            if($isFavorite) {
                Favorite::where('favorite_film_id', $filmId)
                        ->where('favorite_user_id', $user->user_id)
                        ->delete();
            } else {
                $favorite = new Favorite();
                $favorite->favorite_film_id = $filmId;
                $favorite->favorite_user_id = $user->user_id;
                $favorite->save();
            }

            DB::commit();
            return Response::getResponse(true, '');
        } catch (NotFoundException $e) {
            DB::rollBack();
            return Response::getResponse(false, $e->getMessage());
        }
    }
}