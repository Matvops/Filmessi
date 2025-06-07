<?php

namespace App\Services;

use App\Exceptions\AuthException;
use App\Repositories\UserRepository;
use App\Utils\Response;
use Illuminate\Support\Facades\Auth;

class AuthService {

    private UserRepository $userRepository;

    function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function authenticate($request): Response
    {

        $email = $request->input('email');
        $password = $request->input('password');

        try {

            $user = $this->userRepository->getUserToAuthentication($email);

            if(!$user) 
                throw new AuthException();
            
            if(!$user->email_verified_at) 
                throw new AuthException("Verifique seu email!");

            if(!Auth::attempt(['email' => $email, 'password' => $password]))
                throw new AuthException();

            $request->session()->regenerate();
            return Response::getResponse(true, '');

        } catch (AuthException $e) {
            return Response::getResponse(false, $e->getMessage());
        }
    }
}