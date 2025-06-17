<?php

namespace App\Http\Controllers;

use App\Services\MainService;
use Illuminate\Http\Request;
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
        $movies = $this->mainService->getNewMovies();
        return view('home', ['movies' => $movies]);
    }
}
