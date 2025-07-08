<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteFilmRequest;
use App\Services\MainService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    private MainService $mainService; 
    
    function __construct(MainService $service)
    {
        $this->mainService = $service;
    }

    public function home(): View
    {
        $movies = $this->mainService->getMainMovies();
        return view('home', ['movies' => $movies]);
    }

    public function favoriteFilm(FavoriteFilmRequest $request): RedirectResponse
    {
        $response = $this->mainService->favoriteFilm($request->favorite, $request->film_id);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('error_favorite', $response->getMessage());
        }

        return back();
    }

    public function showFavorites(): View
    {
        $response = $this->mainService->getFavorites();

        return view('favorites', ['films' => $response->getData()]);
    }
}
