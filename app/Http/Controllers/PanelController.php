<?php

namespace App\Http\Controllers;

use App\Services\PanelService;
use Illuminate\Http\Request;
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
        return view('register_film');
    }
}
