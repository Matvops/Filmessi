<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Favorite;
use App\Repositories\UserRepository;
use App\Utils\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class FavoriteService {

    private UserRepository $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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