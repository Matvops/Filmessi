<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{

    private AuthService $authService;

    function __construct(AuthService $service)
    {
        $this->authService = $service;
    }

    public function login(): View
    {
        return view("auth.login");
    }

    public function authenticate(AuthenticateRequest $request): RedirectResponse|View
    {
        $response = $this->authService->authenticate($request);

        if(!$response->getStatus()) {
            return back()
                    ->withInput()
                    ->with([
                        'error_auth' => $response->getMessage()
                    ]);
        }

        return redirect()->intended(route('home'));
    }
}
