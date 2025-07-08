<?php

namespace App\Http\Controllers;

use App\Services\PanelService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PanelController extends Controller
{
    private PanelService $panelService;

    function __construct(PanelService $service)
    {
        $this->panelService = $service;
    }
    
    public function panel(): View
    {
        $films = $this->panelService->getAllFilms();

        return view('panel', ['films' => $films]);
    }

    public function register(): View
    {
        $categories = $this->panelService->getAllCategories();

        return view('register_film', ['categories' => $categories]);
    }

    public function update($token): View|RedirectResponse
    {
        $response = $this->panelService->getFilm($token);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('update_error', $response->getMessage());
        }

        $categories = $this->panelService->getAllCategories();

        return view('update_film', ['film' => $response->getData(), 'categories' => $categories]);
    }
}
