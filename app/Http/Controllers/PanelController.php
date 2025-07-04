<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Services\PanelService;
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

    public function storeFilm(StoreFilmRequest $request)
    {
        $inputs = $request->input();
        $image = $request->file('image');

        $response = $this->panelService->register($inputs, $image);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('register_error', $response->getMessage());
        }

        return redirect()->route('panel');
    }
}
