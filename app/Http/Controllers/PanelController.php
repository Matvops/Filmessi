<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PanelController extends Controller
{
    
    public function panel(): View
    {
        return view('panel');
    }
}
