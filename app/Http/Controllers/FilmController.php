<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Services\FilmService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    private FilmService $filmService;

    function __construct(FilmService $service)
    {
        $this->filmService = $service;
    }

    public function register(StoreFilmRequest $request)
    {
        $inputs = $request->input();
        $image = $request->file('image');

        $response = $this->filmService->register($inputs, $image);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('register_error', $response->getMessage());
        }

        return redirect()->route('panel');
    }

     public function update(UpdateFilmRequest $request): RedirectResponse
    {
        $inputs = $request->input();
        $image = $request->hasFile('image') ? $request->file('image') : null;
        
        $response = $this->filmService->update($inputs, $image);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with('update_error', $response->getMessage());
        }

        return redirect()->route('panel');
    }
}
