<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
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

    public function updateView($token): View|RedirectResponse
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

    public function update(UpdateFilmRequest $request): RedirectResponse
    {
        $inputs = $request->input();
        $image = $request->hasFile('image') ? $request->file('image') : null;
        
        $response = $this->panelService->update($inputs, $image);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('update_error', $response->getMessage());
        }

        return redirect()->route('panel');
    }
}
