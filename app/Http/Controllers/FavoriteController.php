<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteFilmRequest;
use App\Services\FavoriteService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    private FavoriteService $favoriteService;

    function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function favoriteFilm(FavoriteFilmRequest $request): RedirectResponse
    {
        $response = $this->favoriteService->favoriteFilm($request->favorite, $request->film_id);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('error_favorite', $response->getMessage());
        }

        return back();
    }

    public function showFavorites(): View
    {
        $response = $this->favoriteService->getFavorites();

        return view('favorites', ['films' => $response->getData()]);
    }
}
