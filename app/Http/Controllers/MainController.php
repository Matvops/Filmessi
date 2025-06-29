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

    public function showFilm($token): View|RedirectResponse
    {
        $response = $this->mainService->showFilm($token);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('show_error', $response->getMessage());
        }

        return view('show_film', ['film' => $response->getData()]);
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
