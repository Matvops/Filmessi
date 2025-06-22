<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\StoreRequest;
use App\Services\AuthService;
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

    public function logout(): RedirectResponse
    {
        $this->authService->logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(StoreRequest $request): RedirectResponse|View
    {

        $response = $this->authService->register($request);

        if(!$response->getStatus()) {
            return back()
                ->withInput()
                ->with('error_auth', $response->getMessage());
        }

        return view('auth.confirm_email', ['user' => $response->getData()]);
    }

    public function email_confirmation($token): RedirectResponse
    {

        $response = $this->authService->email_confirmation($token);

        if(!$response->getStatus()) {
            return redirect()
                    ->route('login')
                    ->with('error_auth', $response->getMessage());
        }

        return redirect()
                ->route('login')
                ->with('success_auth', $response->getMessage());
    }
}
